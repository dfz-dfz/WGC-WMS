<?php
namespace Admin\Controller;
use Admin\Controller\InitController;
class InstantmsgController extends CommonController {
    public function getList(){
    	$this->display('list');
    }
	public function searchman(){
		$this->display('searchman');
	}
	public function userone(){
		//获取登录用户的token
		$mobile = I('get.mobile',NULL);
		$mobile = trim($mobile);
		@session_start();
		$wgcadmininfo = $_SESSION['wgcadmininfo'];
		$user_ids = $wgcadmininfo['user_id'];
		$info = getuinf($user_ids);
		$token = $info[0]['token'];
		$appkey = '4z3hlwrv4bbht';
		$this->assign('appkey',$appkey);
		$this->assign('token',$token);
		
		if(!empty($mobile)){
			$user_id = M('member')->where(array('user_name'=>$mobile))->getField('user_id');
			$this->assign('userid',$user_id);
			$this->display('userone');die;
		}else{
			$this->assign('userid','');
			$this->display('userone');die;
			//$this->display('emptytmp');die;
		}
	}
	public function usertwo(){
		$this->display('usertwo');
	}
	public function getuserid(){
		$mobile = I('post.mobile',NULL);
		$mobile = trim($mobile);
		if(!empty($mobile)){
			$user_id = M('member')->where(array('user_name'=>$mobile))->getField('user_id');
			$res = array('userid'=>$user_id);
			$this->ajaxReturn($res, "json");
		}else{
			$res = array('userid'=>'');
			$this->ajaxReturn($res, "json");
		}
		
	}
}
?>