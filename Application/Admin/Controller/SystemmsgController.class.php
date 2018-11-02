<?php
namespace Admin\Controller;
use Think\Controller;
class SystemmsgController extends CommonController{
	//系统消息发送界面
	public function sendSysMsg(){
		@session_start();
		$wgcadmininfo = $_SESSION['wgcadmininfo'];
		//获取用户工种
		$list = M('gongyingshang')->distinct(true)->where(array('zhiwei'=>array(array('neq',''),array('exp','is not null'),'and')))->field('zhiwei')->select();
		$this->assign('list',$list);
		//获取项目列表
		$project = M('internal_management')->field('id,name')->select();
		$this->assign('project',$project);
		//print_r($wgcadmininfo);die;
		$userphoto = $wgcadmininfo['userphoto'];
		$userphoto ='http://jingyi.59jiaju.com/'.$userphoto ;
		$name = $wgcadmininfo['name'];
		$this->assign('userphoto',$userphoto);
		$this->assign('name',$name);
		$this->display('send');
	}
	public function replaySysMsg(){
		@session_start();
		$wgcadmininfo = $_SESSION['wgcadmininfo'];
		$name = $wgcadmininfo['name'];
		$id = I('get.id',0,'intval');
		$send_uid = I('get.send_uid',0,'intval');
		$page=I('post.page',1,'intval');
		//设计为已经读取状态
		M('systemmsg')->where(array('id'=>$id))->setField('status',1);
		//获取这一条信息的所有回复
		$list=D('SysreplayView')->where(array('sys_id'=>$id))->page($page,200)->order('id asc')->select();
		$this->assign('name',$name);
		$this->assign('list',$list);
		$this->assign('id',$id);
		$this->assign('send_uid',$send_uid);
		$this->display('replay');
	}
	//发送系统消息
	public function sysMsgAdd(){
		if(!IS_POST){die('404');}
		@session_start();
		$wgcadmininfo = $_SESSION['wgcadmininfo'];
		$send_uid = $wgcadmininfo['user_id'];
		$mtype = I('post.mtype','公告');
		$title = I('post.title','公告消息');
		if(empty($title) || ($title == 'null')){
			$title = '公告消息';
		}
		$gongzhong = I('post.gongzhong');
		$prj_id  = I('post.prj_id',0,'intval');
		$status  = I('post.status',0,'intval');
		$content = I('post.content',NULL);
		$content = html_entity_decode($content);
		$type    = I('post.type',0,'intval');
		$flag = true;
		$arr = array();
		
		
			
		
		
		if($type < 1){
			if($gongzhong == 0 ){
				//发送给所有APP用户
				$arr = M('member')->distinct(true)->where(array('token'=>array(array('neq',''),array('exp','is not null'),'and')))->getField('user_id',true);
			}else{
				//发送给相应工种APP用户
				$arr = D('MemGongyView')->distinct(true)->where(array('token'=>array(array('neq',''),array('exp','is not null'),'and'),'zhiwei'=>$gongzhong))->getField('user_id',true);
			}	
			//全局推送
			foreach($arr as $key=>$uid){
				$data = array(
					  'send_uid' 	=> $send_uid,
					  'rev_uid' 	=> $uid,
					  'mtype' 		=> $mtype,
					  'prj_id' 		=> 0,
					  'content' 	=> $content,
					  'title' 		=> $title,
					  'sendtime' 	=> time(),
					  'status' 		=> $status
				);
				
				$id = M('systemmsg')->add($data);
				if($id){}else{$flag = false;}
			}
			
		}else{ 
			//项目内部推送
			//发送给所有APP用户
			
			//$arr = M('member')->distinct(true)->where(array('token'=>array(array('neq',''),array('exp','is not null'),'and')))->getField('user_id',true);
			$arr=M('usertointernalmanagement')->where(array('intermid'=>$prj_id))->getField('user_id',true);
			foreach($arr as $key=>$uid){
				$data = array(
					  'send_uid' 	=> $send_uid,
					  'rev_uid' 	=> $uid,
					  'mtype' 		=> $mtype,
					  'prj_id' 		=> $prj_id,
					  'content' 	=> $content,
					  'title' 		=> $title,
					  'sendtime' 	=> time(),
					  'status' 		=> $status
				);
				$id = M('systemmsg')->add($data);
				if($id){}else{$flag = false;}
			}
			
		}
		$res = array();
		if($flag){
			$res['code'] = 200;
			$res['message'] = '消息已发送！';
		}else{
			$res['code'] = 202;
			$res['message'] = '发送失败！';
		}
		$this->ajaxReturn($res, "json");
	}
	//系统消息列表
	public function getList(){
		@session_start();
		$wgcadmininfo = $_SESSION['wgcadmininfo'];
		$send_uid = $wgcadmininfo['user_id'];
		$page = I('post.page',1,'intval');
		$list = D('SysMsgView')->where(array('send_uid'=>$send_uid))->order('status desc,id desc')->page($page,30)->select();
		foreach($list as $key=>$val){
			$name = M('gongyingshang')->where(array('user_id' =>$val['rev_uid'] ))->getField('name');
			$list[$key]['revname'] = $name;
		}
		//总页数
		$allpage = 1;
		$allrows = 0;
		$allrows = D('SysMsgView')->where(array('send_uid'=>$send_uid))->count();
		$r = $allrows/30;
		$allpage = ceil($r);
		$this->assign('allpage',$allpage);
		$this->assign('page',$page);
		$this->assign('list',$list);
		$this->display('sysmsglist');
	}
	

}