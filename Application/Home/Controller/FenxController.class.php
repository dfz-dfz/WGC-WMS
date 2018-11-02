<?php
namespace Home\Controller;
use Think\Controller;
class FenxController extends Controller {
	
	//分享页面
	public function fenx(){
	  header('Content-Type: text/html; charset="utf-8"');
	     $id=I('id');
	     $user= M('advertisement')->where(array('id'=>$id))->find();
		 if(empty($user)){
			exit('404');
		}
		
		$this->assign('user',$user);
		$this->display(); 
	   
	}
	
	//安卓和苹果下载页面
	
	 public function center(){
	  $this->display();
	 
	}
		
}
	
	
	
	
	
	
	
