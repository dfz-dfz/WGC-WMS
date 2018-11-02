<?php
namespace Admin\Controller;
use Think\Controller;
class BaojiaController extends CommonController {
	
	//维修报价
    public function baojia(){
		header("Content-type: text/html; charset=utf-8");
		
		$this->display();
    }
	
	//主材定价
    public function zhucai(){
		header("Content-type: text/html; charset=utf-8");
		
		$this->display();
    }
	
	//辅材定价
    public function fucai(){
		header("Content-type: text/html; charset=utf-8");
		
		$this->display();
    }
	
	//材料采购
    public function cailiaocaigou(){
		header("Content-type: text/html; charset=utf-8");
		
		$this->display();
    }
	
	//业务信息
    public function yewuxinxi(){
		header("Content-type: text/html; charset=utf-8");
		
		$this->display();
    }
	
	//维修项目
    public function weixiuxiangmu(){
		header("Content-type: text/html; charset=utf-8");
		
		$this->display();
    }
	
	//设计分包
    public function shejifenbao(){
		header("Content-type: text/html; charset=utf-8");
		
		$this->display();
    }
	
	//材料推广
    public function cailiaotuiguang(){
		header("Content-type: text/html; charset=utf-8");
		
		$this->display();
    }
}