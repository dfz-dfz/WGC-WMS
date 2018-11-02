<?php
namespace Home\Controller;
use Think\Controller;
class UndexController extends Controller {
	
   public function index(){
    header("Content-type: text/html; charset=utf-8");
	    $User = M('advertisement'); // 实例化User对象
		$count      = $User->where('type=2')->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,200);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where('type=2')->order('times')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$this->assign('lists',$list);// 赋值数据集
		$this->assign('count',$count);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();   
     }
   
    //新闻列表
	public function lists(){
	  $this->display();  
	 }
	 
	 
   //微信公众新闻列表
   public  function content(){
	   header("Content-type: text/html; charset=utf-8");
	    $id  = I('id');
		$nam  = M('advertisement')->where(array('id'=>$id))->select();
		$this->assign('nam',$nam); 
	    $this->display();
   }
    
   // 微信公众号案例图片
  public function news(){
	  $id=I('id');
	  $ues = M('Gallery')->field('id ,path,name')->select();
	  $this->assign('ues',$ues);
	  $this->display();	
		
	}  
 
  
			
}
	
	
	
	
	
	
	
