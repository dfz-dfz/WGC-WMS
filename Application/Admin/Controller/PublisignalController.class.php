<?php
namespace Admin\Controller;
use Admin\Controller\InitController;
class PublisignalController extends CommonController {
	
	//公众号案例
 public function listss(){
	$where['type'] = array('in','2,3,4,5,6,7,8');
	$User = M('advertisement'); // 实例化User对象
	$count = $User->where($where)->count();// 查询满足要求的总记录数
	$Page  = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
	$show  = $Page->show();// 分页显示输出
	// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
	
	$list = $User->where($where)->order('times desc')->limit($Page->firstRow.','.$Page->listRows)->select();
	//echo "<pre>";
	//var_dump($list);exit;
	$this->assign('list',$list);  // 赋值数据集
	$this->assign('count',$count);// 赋值数据集
	$this->assign('page',$show);  // 赋值分页输出
	 $this->display();
	}
	
   //微信公众号案例
   public function news(){
	  $where['type'] = array('in','2,3,4,5,6,7,8');
	$User = M('advertisement'); // 实例化User对象
	$count = $User->where($where)->count();// 查询满足要求的总记录数
	$Page  = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
	$show  = $Page->show();// 分页显示输出
	// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
	
	$list = $User->where($where)->order('times desc')->limit($Page->firstRow.','.$Page->listRows)->select();
	if(empty($list)){
	  exit('404');
	}
	$this->assign('list',$list);  // 赋值数据集
	$this->assign('count',$count);// 赋值数据集
	$this->assign('page',$show);  // 赋值分页输出
	 $this->display(); 
     $this->display();
   }
	
 //删除列表  
	
 public function del(){
		
  $this->display();
	
	}
	
	
   
   
   
   
   
   
   
   
	
}