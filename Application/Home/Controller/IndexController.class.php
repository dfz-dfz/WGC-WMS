<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		if($_SERVER['SERVER_NAME'] == 'admin.wgc2013.com' || $_SERVER['SERVER_NAME'] == 'wgcmanage.59jiaju.com'){
			header("Location: http://admin.wgc2013.com/index.php/Admin/Index/index.html"); 
		}
        $this->display();    
    }
	
		public function dh(){
			header("Content-type: text/html; charset=utf-8");
			$data['nam']=$_POST['username'];
			$data['mobli']=$_POST['userphone'];	
			$data['dizhi']=$_POST['useraddress'];
			$use=M('jingy')->add($data);
			if($use){
				 $this->success('预约成功、、注意查看手机信息'); 
				 
			  }else{
				$this->error('预约失败');exit;
			}
		
			//$this->redirect('Index/index');
			  session('use',$use);
		}
			
	public function MacDonald(){
		$this->display(); 
	}
	
	
	
	
	
	
	
	
	
}