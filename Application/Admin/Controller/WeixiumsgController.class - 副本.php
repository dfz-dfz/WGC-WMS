<?php
namespace Admin\Controller;
use Think\Controller;
class WeixiumsgController extends CommonController{
    //维修列表
	public function getList(){
		$where = array();
		$where['weitype'] = array(array('eq',5),array('eq',6), 'or') ;
		$page = I('post.page',1,'intval');
		$nowpage = $page;
		
		$list = M('weixiumsg')->alias('w')->join('ecm_gongyingshang g ON w.send_uid = g.user_id')->join('ecm_member m ON m.user_id = g.user_id')->field('w.*,g.name,m.user_name')->where($where)->order('w.id desc')->page($page,100)->select();
		//获取对应的项目名称
		foreach($list as $kk=>$xm){
			$p_id = $xm['p_id'];
			if($p_id >= 1){
				$list[$kk]['p_name'] = M('project')->where(array('prj_id'=>$p_id))->getField('prj_name');
			}
		}
		$all_count = M('weixiumsg')->alias('w')->join('ecm_gongyingshang g ON w.send_uid = g.user_id')->join('ecm_member m ON m.user_id = g.user_id')->field('w.id')->where($where)->count();
		$count = count($list);
		//页码总数
		$allpagecount = $all_count/100;
		$pagecount = ceil($allpagecount);
		if(($nowpage >= $pagecount) &&  ($pagecount != 0)){
			$nowpage = $pagecount;
			$_POST['page'] = $nowpage;
			$page = $nowpage;
		}
		//$list = M('weixiumsg')->where($where)->order('id desc')->page($page,30)->select();
		//获取接受人名称
		foreach($list as $key=>$row){
			$rev_uid = $row['rev_uid'];
			$allname = '';
			if(!empty($rev_uid) && ($rev_uid != 'null')){
				$rev_uid = trim($rev_uid,',');
				
				$arr = explode(",",$rev_uid);
				foreach($arr as $k=>$uid){
					$uid = trim($uid);
					$name = M('gongyingshang')->where(array('user_id'=>$uid))->getField('name');
					$name = trim($name);
					if(!empty($name)){
						$allname.= ','.$name;
					}
				}
				$allname = trim($allname,',');
				$list[$key]['allname'] = $allname;
			}else{
				$list[$key]['allname'] = '';
			}
		}
		$this->assign('count',$count);
		$this->assign('all_count',$all_count);
		$this->assign('nowpage',$nowpage);
		$this->assign('pagecount',$pagecount);
		$this->assign('list',$list);
		$this->display('weixiulist');
	}
	//展示图片列表
	public function showpic(){
		$id = I('get.id',0,'intval');
		$img = M('weixiumsg')->where(array('id'=>$id))->getField('UserPhoto');
		//分割图片
		$showimg =  array();
		if(!empty($img) && ($img != 'null')){
			$imgarr2=explode(",",$img);
			$showimg = $imgarr2; 
		}
		$this->assign('showimg',$showimg);
		$this->display('picshow');
	}
	//根据手机号码，添加接受人
	public function addrev(){
		$id = I('post.id',1,'intval');
		$user_name = I('post.mobile',NULL);
		if(!empty($user_name)){
			$user_name = trim($user_name);
			$rev_uid = '';
			//判断用户是否存在
			$flag = false;
			$bucunzai = '';
			$allname = '';
			$userarr = explode(",",$user_name);
			foreach($userarr as $key=>$uname){
				$uname = trim($uname);
				$user_id = M('member')->where(array('user_name'=>$uname))->getField('user_id');
				if($user_id){
					//获取名称
					$name = M('gongyingshang')->where(array('user_id'=>$user_id))->getField('name');
					$allname.= ','.$name;
					$rev_uid.=','.$user_id;
				}else{
					$flag = true;
					$bucunzai.= $uname.' ';
				}
			}
			if($flag){
				$res = array('code'=>202,'message'=>$bucunzai.'不存在！');
				$this->ajaxReturn($res, "json");die;
			}
			$allname = trim($allname,',');
			$rev_uid.=',';
			$res = M('weixiumsg')->where(array('id'=>$id))->setField('rev_uid',$rev_uid);
			if($res === false){
				$ret = array('code'=>201,'message'=>'添加时发生错误！');
				$this->ajaxReturn($ret, "json");die;
			}else{
				$ret = array('code'=>200,'message'=>$allname);
				$this->ajaxReturn($ret, "json");die;
			}
		}
		$res = array('code'=>203,'message'=>'接受人不能为空！');
		$this->ajaxReturn($res, "json");die;
	}
	
	public function revlist(){
		$id = I('get.id',0,'intval');
		$this->assign('id',$id);
		$this->display('revlist');
	}
	
	//回复
	public function huifu(){
		$id = I('get.id',0,'intval');
		//当前人user_id
		 @session_start();
		$wgcadmininfo = $_SESSION["wgcadmininfo"];
		$user_id = $wgcadmininfo['user_id'];
		//$id = 85;
		$info = M('weixiumsg')->where(array('id'=>$id))->find();
		$res = array();
		//分割多个图像字串
		$userPhoto=$info['userphoto'];
		if(!empty($userPhoto) && ($userPhoto != 'null')){
			$imgarr=explode(",",$userPhoto);
			$info['img']=$imgarr; 
		}else{
			$info['img']=array(); 
		}
		if(!empty($info)){
			$uinf = getuinf($info['send_uid']);
			$info['name'] = $uinf[0]['name'];
			$info['zhiwei'] = $uinf[0]['zhiwei'];
			$info['mobile'] = $uinf[0]['mobile'];
			$info['userphoto'] = $uinf[0]['userphoto'];
			$rev_uid = trim($info['rev_uid'],',');
			$all = M('gongyingshang')->where(array('user_id'=>array('in',$rev_uid)))->field('name')->order('user_id desc')->select();
			$allname = '';
			foreach($all as $k => $v){
				$allname.=$v['name'].',';
			}
			$allname = trim($allname,',');
			$info['allname'] = $allname;
			//维系信息发布人user_id
			$send_uid = $info['send_uid'];
			//维系信息接受人user_id
			$rev_uid = $info['rev_uid'];
			//$rev_uid = trim($rev_uid,',');
			//回复信息是发布人的
			/*$where = array();
			$where['wx_id'] = $info['id'];
			$map['user_id'] = array('eq','10000');
			$map['rev_name'] = array('like','%,10000,%');
			$map['_logic'] = 'OR';
			$where['_complex'] = $map;
			$huifu = M('weixiureply')->where($where)->order('id asc')->select();*/
			$wx_id = $info['id'];
			$map = array(
				'weixiureply.user_id' => array('eq',$user_id),
				'weixiureply.rev_name' => array('like','%,'.$user_id.',%'),
				'_logic' => 'or'
			);
			$where = array(
				'wx_id' => $wx_id,
				'_complex' => $map,
			);
			$data = D('WeixiureplyView')->where($where)->order('type asc,pid asc')->select();
			$huifu = $this->orderBypid($data);
			
			if(!empty($huifu)){
				foreach($huifu as $k=>$r){
					$areaphoto = $huifu[$k]['areaphoto'];
					if(!empty($areaphoto) && ($areaphoto != 'null')){
						$img=explode(",",$areaphoto);
						$huifu[$k]['areaphoto']=$img;
					}else{
						$huifu[$k]['areaphoto']=array();
					}
				}
				$info['mans'] = $huifu;
			}else{
				$info['mans'] = array();
			}
		}
		//echo '<pre>';
		//print_r($info);die;
		$this->assign('info',$info);
		$this->display('huifu');
	}
	
	//回复
	public function addhuifu(){
		$id = I('get.id',0,'intval');
		$pid = I('get.pid',0,'intval');
		$type = I('get.type',0,'intval');
		$userid = I('get.userid',0,'intval');
		$time = date('Y-m-d H:i:s',time());
		$this->assign('time',$time);
		$this->assign('id',$id);
		$this->assign('pid',$pid);
		$this->assign('type',$type);
		$this->assign('userid',$userid);
		if($type == 2){
			$this->display('firstreplay');die;
		}else if($type == 4){
			$this->display('secdreplay');die;
		}else{
			$url = 'http://59jiaju.com/manage/index.php/Admin/Weixiumsg/huifu/id/'.$id;
			Header("Location:{$url}");  die;
		}
	}
	//添加回复数据
	public function huifudata(){
		 @session_start();
		$wgcadmininfo = $_SESSION["wgcadmininfo"];
		$user_id = $wgcadmininfo['user_id'];
		$id = I('post.id',0,'intval');
		$pid = I('post.pid',0,'intval');
		$type = I('post.type',1,'intval');
		$rev_name = I('post.user_id',NULL);
		if(!empty($rev_name) || ($rev_name != 'null')){
			$rev_name = ','.$rev_name.',';
		}else{$rev_name = '';}
		$work_number = I('post.work_number','');
		$data = array(
		  'wx_id'  => $id,
		  'pid' => $pid,
		  'user_id' => $user_id,
		  'rev_name' => $rev_name,
		  'work_number' => $work_number,
		  'phone' => I('post.phone',''),
		  'areaphoto' => I('post.areaphoto',NULL), 
		  'play_time' => I('post.play_time',NULL), 
		  'look_time' => I('post.look_time',NULL), 
		  'pay_money' => I('post.pay_money','0'), 
		  'personal_ps' => I('post.personal_ps',NULL), 
		  'need_cai' => I('post.need_cai',NULL), 
		  'address' => I('post.address',''),
		  'type' => $type,
		  'deal' => I('post.deal',0,'intval'),
		  'ps' => I('post.ps',''),
		  'money' => I('post.money',''),
		  'addtime' => time()
		);
		$ids=M('weixiureply')->add($data);
		if($ids){
			//$url = 'http://59jiaju.com/manage/index.php/Admin/Weixiumsg/huifu/id/'.$id;
			//Header("Location:{$url}");  die;
			$this->redirect('Weixiumsg/huifu', array('id' => $id), 1, '回复成功...');die;
		}else{
			//$url = 'http://59jiaju.com/manage/index.php/Admin/Weixiumsg/addhuifu/id/'.$id.'/type/'.$type;
			//Header("Location:{$url}");  die;
			$this->redirect('Weixiumsg/addhuifu', array('id' => $id ,'type' => $type), 1, '回复失败...');die;
		}
		
	}
	//添加项目
	public function addproject(){
		$id = I('get.id',0,'intval');
		$timsType = time();
		$this->assign('id',$id);
		$this->assign('timsType',$timsType);
		$this->display('projectadd');
	}
	public function tt(){
		$wx_id = I('post.wx_id',12,'intval');
		$user_id = I('post.user_id','10000');
		$map = array(
			'weixiureply.user_id' => array('eq',$user_id),
			'weixiureply.rev_name' => array('like','%,'.$user_id.',%'),
			'_logic' => 'or'
		);
		$where = array(
			'wx_id' => $wx_id,
			'_complex' => $map,
		);
		$data = D('WeixiureplyView')->where($where)->order('type asc,pid asc')->select();
		$ret = $this->orderBypid($data);
		echo '<pre>';
		print_r($ret);
	}
	public function orderBypid($data,$pid=0){
		$returndata = array();
		foreach($data as $key=>$row){
			if($row['pid'] == $pid){
				$returndata[]=$row;
				$res = $this->orderBypid($data,$row['id']);
				if(!empty($res)){
					foreach($res as $k=>$v){
						$returndata[] = $v;
					}
				}
			}
		}
		return $returndata;
	}
}
?>