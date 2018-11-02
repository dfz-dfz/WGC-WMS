<?php
  
//预约
namespace Admin\Controller;

use Think\Controller;

class MakeanappointmentController extends CommonController {
	
	//预约列表
    public function lists(){
		
	$jingy=M('jingy')->order('id desc')->select();
		//echo "<pre>";
		//var_dump($jingy);
	   $this->assign('jingy',$jingy);
	   $this->display();	
	}
	
	
	
	 /*
       // 删除列表用户	 
	   public function del(){
		   header("Content-type: text/html; charset=utf-8");
		   
		   if(!IS_GET){die('404');}
		   $id=$_GET['id'];
		   $model = M('jingy');
		   $res = $model->where(array('id'=>$id)) ->delete();
			if($res){
				
				 $this->success('删除成功'); 
			}else{
				$this->error('删除失败');exit;
			}			
		
	   }	
	*/



}





