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
		@session_start();
		$wgcadmininfo = $_SESSION["wgcadmininfo"];
		$user_id = $wgcadmininfo['user_id'];
		//$id = 12;
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
			
			$where = array();
			$where['weixiu_id'] = $info['id'];
			$where['types'] = array('exp',' IN (0,1) ');
			
			$where2 = array();
			$where2['weixiu_id'] = $info['id'];
			$where2['types'] = array('exp',' IN (2,3) ');
			
			
			$huifu = D('WeixiuhandshakeView')->where($where)->order('hh_id asc,types asc,pid asc')->select();
			$huifu2 = D('WeixiuconfirmView')->where($where)->order('hh_id asc,types asc,pid asc')->select();
			//获取回话标识
			$hh_idarr1 = D('WeixiuhandshakeView')->distinct(true)->where($where)->getField('hh_id',true);
			$hh_idarr2 = D('WeixiuconfirmView')->distinct(true)->where($where2)->getField('hh_id',true);
			$hh_idarr = arraymerge($hh_idarr1,$hh_idarr2);
			
			if(!empty($huifu)){
				foreach($huifu as $k2=>$r2){
					$evidence = $huifu[$k2]['evidence'];
					if(!empty($evidence) && ($evidence != 'null')){
						$img=explode(",",$evidence);
						$huifu[$k2]['evidence']=$img; 
					}else{
						$huifu[$k2]['evidence']=array(); 
					}
				}
			}
			//合并两个回复
			if(!empty($huifu) && !empty($huifu2)){
				$ret = array_merge($huifu,$huifu2);
			}else if(!empty($huifu)){
				$ret = $huifu;
			}else if(!empty($huifu2)){
				$ret = $huifu2;
			}
			//以回话分组，
			$return = array();
			foreach($ret as $row){
				foreach($hh_idarr as $key=>$hh){
					if($row['hh_id'] == $hh){
						$return[$key][] = $row;
					}
				}
			}
			
			//回话里以类型分组，以父级id排序
			$huifuarr1 = array(0,1,2,3);
			foreach($return as $kv=>$vv){
				
				$returndata = array();
				foreach($vv as $vrow){
					foreach($huifuarr1 as $vkey=>$hh){
							if($vrow['types'] == $hh){
								$returndata[$vkey][] = $vrow;
							}
						}
				}
				foreach($returndata as $rkv=>$rvv){
					$rvv = my_sort($rvv,'id',SORT_ASC,SORT_NUMERIC);
					$returndata[$rkv] = $rvv;
				}
				//
				$return[$kv] = $returndata;
			}
			
			$info['mans'] = $return;
		}
		//echo '<pre>';
		//print_r($info);die;
		$this->assign('user_id',$user_id);
		$this->assign('info',$info);
		$this->display('huifu');
	}
	public function ttt(){
		$t = arraymerge($arr1=array(1,2,4),$arr2=array(1,2,3,4,5));
		echo '<pre>';
		print_r($t);die;
	}
	//回复
	public function addhuifu(){
		$id = I('get.id',0,'intval');
		$pid = I('get.pid',0,'intval');
		$types = I('get.types',0,'intval');
		$userid = I('get.userid',0,'intval');
		$huifunumber = I('get.huifunumber',0,'intval');
		$time = date('Y-m-d H:i:s',time());
		$this->assign('huifunumber',$huifunumber);
		$this->assign('time',$time);
		$this->assign('id',$id);
		$this->assign('pid',$pid);
		$this->assign('types',$types);
		$this->assign('userid',$userid);
		if(($types === 0) || ($types === 1)){
			if($huifunumber === 1){
				$this->display('secdreplay');die;
			}else{
				$this->display('firstreplay');die;
			}
			
		}else if(($types === 2) || ($types === 3)){
			$this->display('secdreplay');die;
		}
	}
	//添加回复数据
	public function huifudata(){
		 @session_start();
		$wgcadmininfo = $_SESSION["wgcadmininfo"];
		$user_id = $wgcadmininfo['user_id'];
		$id = I('post.id',0,'intval');
		$userid = I('post.user_id',0,'intval');
		$pid = I('post.pid',0,'intval');
		$types = I('post.types',1,'intval');
		$address = I('post.address',NULL);
		$money = I('post.money',NULL);
		$huifunumber = I('post.huifunumber',NULL);
		
		$hh_id =$id.$userid;
		$data = array(
		  'hh_id' => $hh_id,
		  'weixiu_id' => $id,
		  'pid' => $pid,
		  'user_id' => $user_id,
		  'times' => time(),
		  'address' => $address,
		  'huifunumber'=>$huifunumber,
		  'money' => $money,
		  'types' => $types
		);
		$ids=M('weixiuhandshake')->add($data);
		if($ids){
			//$url = 'http://59jiaju.com/manage/index.php/Admin/Weixiumsg/huifu/id/'.$id;
			//Header("Location:{$url}");  die;
			$this->redirect('Weixiumsg/huifu', array('id' => $id), 1, '回复成功...');die;
		}else{
			//$url = 'http://59jiaju.com/manage/index.php/Admin/Weixiumsg/addhuifu/id/'.$id.'/type/'.$type;
			//Header("Location:{$url}");  die;
			$this->redirect('Weixiumsg/huifu', array('id' => $id), 1,'回复失败...');die;
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