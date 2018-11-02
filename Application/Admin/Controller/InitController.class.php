<?php
namespace Admin\Controller;
use Think\Controller;
class InitController extends Controller {
    public function _initialize(){
		//用户登录状态筛选
       /* @session_start();
		$wgcadmininfo = $_SESSION["wgcadmininfo"];
		if(empty($wgcadmininfo) || !isset($wgcadmininfo)){
			$wgcadmininfo = $_COOKIE ['wgcadmininfo'];
			$wgcadmininfo =  unserialize($wgcadmininfo);
			if(empty($wgcadmininfo['user_id']) || !isset($wgcadmininfo['user_id'])){
				//当前访问的url
				$_SESSION["access_url"] = site_url();
				$this->redirect('Admin/login', array(), 1 , '请登录...');
			}else{
				$_SESSION["wgcadmininfo"] = $wgcadmininfo;
				$_SESSION["access_url"] = site_url();
				$this->assign('wgcadmininfo',$wgcadmininfo);
				//$this->redirect('Admin/login', array(), 2 , '请登录...');
			}
		}else{
			$this->assign('wgcadmininfo',$wgcadmininfo);
		}*/
		
		if(isset($_SESSION['wgcadmininfo'])||!empty($_SESSION['wgcadmininfo'])){
    		//当前访问的url
				
			//$this->redirect('Index/index');
 		}
    }
}
