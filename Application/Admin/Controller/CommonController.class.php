<?php

namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function _initialize(){
    	
    	if(!isset($_SESSION['wgcadmininfo'])||empty($_SESSION['wgcadmininfo'])){
    		//当前访问的url
				
			$this->redirect('Admin/login', array(), 1 , '请登录...');
 		}
    }
	
}
