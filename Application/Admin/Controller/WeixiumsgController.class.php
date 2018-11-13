<?php
namespace Admin\Controller;
use Think\Controller;
class WeixiumsgController extends CommonController{
    //维修列表    
	public function getList(){
		@session_start();
		$User = D('WeixiumsgView'); // 实例化User对象
		$wgcadmininfo = $_SESSION["wgcadmininfo"];
		$operator = $wgcadmininfo['user_id'];
		//$where = array();
		//$where['weitype'] = array(array('eq',5),array('eq',6), 'or') ;
		$where['operator']= array('like','%'.$operator.'%');
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			//$where['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$where['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
			}
		}
		
		$page = I('post.page',1,'intval');
		$nowpage = $page;
		$userid = '';
		//$list = M('weixiumsg')->alias('w')->join('ecm_gongyingshang g ON w.send_uid = g.user_id')->join('ecm_member m ON m.user_id = g.user_id')->field('w.*,g.name,m.user_name')->where($where)->order('w.id desc')->page($page,100)->select();
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User -> where($where) -> order('id desc')->limit($Page->firstRow.','.$Page->listRows) -> select();
		
		//echo "<pre>";
		//var_dump($list);
		//获取对应的项目名称
		foreach($list as $kk=>$xm){
			$p_id = $xm['p_id'];
			if($p_id >= 1){
				$list[$kk]['p_name'] = M('project')->where(array('prj_id'=>$p_id))->getField('prj_name');
			}
			//列出接收人，方便回复信息
			$rev_uid = $xm['rev_uid'];
			$rev_uid = trim($rev_uid,',');
			$rev_uids = explode(',',$rev_uid);
			//获取对应的接收人
			//$list[$kk]['rev_uids'] = $rev_uids;
			$rev_name = array();
			foreach($rev_uids as $x=>$y){
				$name = M('gongyingshang')->where(array('user_id'=>$y))->getField('name');
				$rev_name[$y]=$name;
				if(!isset($list[$kk]['userid']) || empty($list[$kk]['userid'])){
					$list[$kk]['userid'] = $y;
				}else{
					$list[$kk]['userid'] = "";
				}
			}
			//维修信息的发布者
			$fabuid = $list[$kk]['send_uid'];
			$fabuname = M('gongyingshang')->where(array('user_id'=>$fabuid))->getField('name');
			$rev_name[$fabuid] = $fabuname;
			
			$list[$kk]['rev_name'] = $rev_name;
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
			/*获取接收人*/
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
			/*获取处理人*/
			$operator = $row['operator'];
			$allnameoperator = '';
			if(!empty($operator) && ($operator != 'null')){
				$operator = trim($operator,',');
				
				$arr = explode(",",$operator);
				foreach($arr as $k=>$uid){
					$uid = trim($uid);
					$name = M('gongyingshang')->where(array('user_id'=>$uid))->getField('name');
					$name = trim($name);
					if(!empty($name)){
						$allnameoperator.= ','.$name;
					}
				}
				$allnameoperator = trim($allnameoperator,',');
				$list[$key]['allnameoperator'] = $allnameoperator;
			}else{
				$list[$key]['allnameoperator'] = '';
			}
			
		}
		
		//echo '<pre>';
		//print_r($list);die;
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('count',$count);
		$this->assign('all_count',$all_count);
		$this->assign('nowpage',$nowpage);
		$this->assign('pagecount',$pagecount);
		$this->display('weixiulist');
	}
	
	//删除
	public function deletes(){
		if(!IS_GET){die;}
		$id = I('get.id');
		$sql = M('weixiumsg')->where(array('id'=>$id))->delete();
		if($sql){
			$this->success('删除成功!');
		}else{
			$this->error('删除失败!');
		}
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
			$res = M('weixiumsg')->where(array('id'=>$id))->setField('rev_uid',substr(substr($rev_uid,0,-1),1));
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
	
		//添加处理人
		public function addlist(){
		$id = I('post.id',0,'intval'); 
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
			
			$res = M('weixiumsg')->where(array('id'=>$id))->setField('operator',substr(substr($rev_uid,0,-1),1));
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
	
	
	//添加处理人
		public function addlisty(){
		$id = I('post.id',0,'intval'); 
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
			$res = M('homedecoration')->where(array('id'=>$id))->setField('operator',$rev_uid);
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
	
	//添加处理人设计报价
		public function addlistye(){
		$id = I('post.id',0,'intval'); 
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
			$res = M('designoffer')->where(array('id'=>$id))->setField('operator',$rev_uid);
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
//
    //添加处理人工装
		public function addlistyy(){
		$id = I('post.id',0,'intval'); 
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
			$res = M('workdecoration')->where(array('id'=>$id))->setField('operator',$rev_uid);
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
//
	public function revlist(){
		$id = I('get.id',0,'intval');
		$this->assign('id',$id);
		$this->display('revlist');
	}
	public function listt(){
		//var_dump($_GET);
		$id=I('get.id',0,'intval');
		$this->assign('id',$id);
		$this->display('listt');
	}
	
	public function listty(){
		//var_dump($_GET);
		$id=I('get.id',0,'intval');
		$this->assign('id',$id);
		$this->display('listty');
	}
	//设计报价渲染
	public function listtye(){
		//var_dump($_GET);
		$id=I('get.id',0,'intval');
		$this->assign('id',$id);
		$this->display('listtye');
	}
	
	public function listtyy(){
		//var_dump($_GET);
		$id=I('get.id',0,'intval');
		$this->assign('id',$id);
		$this->display('listtyy');
	}
	
	//回复
	public function huifu(){
		$id = I('get.id',0,'intval');
		$userid = I('get.userid','0');
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
			$where['send_uid|rev_uid'] =array(array('eq',$userid),array('eq',$userid),'_multi'=>true);
			$huifu = D('WeixiutransferView')->where($where)->order('id asc')->select();
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
			$info['mans'] = $huifu;
			
		}
		//echo '<pre>';
		//print_r($info);die;
		$this->assign('userid',$userid);
		$this->assign('user_id',$user_id);
		$this->assign('info',$info);
		$this->display('huifu');
	}
	
	//回复
	public function addhuifu(){
		$id = I('get.id',0,'intval');
		$pid = I('get.pid',0,'intval');
		$rev_uid = I('get.rev_uid','0');
		$time = date('Y-m-d H:i:s',time());
		$this->assign('time',$time);
		$this->assign('id',$id);
		$this->assign('pid',$pid);
		$this->assign('rev_uid',$rev_uid);
		$this->display('addhuifu');
	}
	//添加回复数据
	public function huifudata(){
		 @session_start();
		$wgcadmininfo = $_SESSION["wgcadmininfo"];
		$user_id = $wgcadmininfo['user_id'];
		
		$weixiu_id = I('post.weixiu_id',0,'intval');
		$pid = I('post.pid',0,'intval');
		$send_uid = $user_id;
		$rev_uid = I('post.rev_uid','0');
		$content = I('post.content',NULL);
		$ps = I('post.ps',NULL);
		$tel = I('post.tel',NULL);
		$times = time();
		$address = I('post.address',NULL);
		$money = I('post.money',NULL);
		$evidence = I('post.evidence',NULL);
		
		$data = array(
		  'weixiu_id' => $weixiu_id,
		  'pid' => $pid,
		  'send_uid' => $send_uid,
		  'rev_uid' => $rev_uid,
		  'content' => $content,
		  'ps' => $ps,
		  'tel' => $tel,
		  'times' => $times,
		  'address' => $address,
		  'money' => $money,
		  'evidence' => $evidence
		);
		$ids=M('weixiutransfer')->add($data);
		if($ids){
			//$url = 'http://59jiaju.com/manage/index.php/Admin/Weixiumsg/huifu/id/'.$id;
			//Header("Location:{$url}");  die;
			$this->redirect('Weixiumsg/huifu', array('id' => $weixiu_id ,'userid' => $rev_uid), 1, '回复成功...');die;
		}else{
			//$url = 'http://59jiaju.com/manage/index.php/Admin/Weixiumsg/addhuifu/id/'.$id.'/type/'.$type;
			//Header("Location:{$url}");  die;
			$this->redirect('Weixiumsg/huifu', array('id' => $weixiu_id , 'userid' => $rev_uid), 1,'回复失败...');die;
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