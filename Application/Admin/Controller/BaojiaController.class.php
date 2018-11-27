<?php
namespace Admin\Controller;
use Think\Controller;
class BaojiaController extends CommonController {
	
	//维修报价
    public function baojia(){
		header("Content-type: text/html; charset=utf-8");
		header("Content-type: text/html; charset=utf-8"); 
		$User = M('weixiumsg'); // 实例化User对象
		
		$key = I('key');
		
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$where['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
			}
		}
		if(!empty($key)){
			$where['weixiu_price|office_name'] = array('like',"%$key%");
		}
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,50);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		foreach($list as $k=>$v){
			$list[$k]['UserPhoto']  = explode(',',$v['UserPhoto']);
		}
		
		$this->assign('list',$list);// 赋值数据集
		$this->assign('key',$key);// 赋值数据集
		$this->assign('count',$count);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
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
		header("Content-type: text/html; charset=utf-8"); 
		$User = M('material'); // 实例化User对象
		
		$key = I('key');
		
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$where['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
			}
		}
		if(!empty($key)){
			$where['brand|m_name|office_name'] = array('like',"%$key%");
		}
		$where['cai_type'] = array('eq',2);
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,50);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		foreach($list as $k=>$v){
			$list[$k]['m_photo']  = explode(',',$v['m_photo']);
		}
		
		$this->assign('list',$list);// 赋值数据集
		$this->assign('key',$key);// 赋值数据集
		$this->assign('count',$count);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
    }
	
	//无活找工
    public function wuhuozhaogong(){
		header("Content-type: text/html; charset=utf-8");
		header("Content-type: text/html; charset=utf-8"); 
		$User = M('qiuzhi'); // 实例化User对象
		
		$key = I('key');
		
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$where['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
			}
		}
		if(!empty($key)){
			$where['office_name|title|name'] = array('like',"%$key%");
		}
		$where['type'] = array('eq',1);
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,50);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		foreach($list as $k => $v){
			$list[$k]['postion'] = getJobtye($v['jobtype']);
		}
		
		
		$this->assign('list',$list);// 赋值数据集
		$this->assign('key',$key);// 赋值数据集
		$this->assign('count',$count);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
    }
	//招工
    public function zhaogong(){
		header("Content-type: text/html; charset=utf-8");
		header("Content-type: text/html; charset=utf-8"); 
		$User = M('qiuzhi'); // 实例化User对象
		
		$key = I('key');
		
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$where['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
			}
		}
		if(!empty($key)){
			$where['office_name|title|name'] = array('like',"%$key%");
		}
		$where['type'] = array('eq',2);
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,50);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		foreach($list as $k => $v){
			$list[$k]['postion'] = getJobtye($v['jobtype']);
		}
		
		
		$this->assign('list',$list);// 赋值数据集
		$this->assign('key',$key);// 赋值数据集
		$this->assign('count',$count);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
    }
	
	//项目分包
    public function xiangmufenbao(){
		header("Content-type: text/html; charset=utf-8");
		header("Content-type: text/html; charset=utf-8"); 
		$User = M('fenbaomsg'); // 实例化User对象
		
		$key = I('key');
		
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$where['kehu'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_name']);
			}
		}
		if(!empty($key)){
			$where['office_name|title|name'] = array('like',"%$key%");
		}
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,50);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		
		
		
		$this->assign('list',$list);// 赋值数据集
		$this->assign('key',$key);// 赋值数据集
		$this->assign('count',$count);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
    }
	
	//查找材料
    public function cailiaoxunjia(){
		header("Content-type: text/html; charset=utf-8");
		header("Content-type: text/html; charset=utf-8"); 
		$User = M('material'); // 实例化User对象
		
		$key = I('key');
		
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$where['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
			}
		}
		if(!empty($key)){
			$where['brand|m_name|office_name'] = array('like',"%$key%");
		}
		$where['cai_type'] = array('eq',1);
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,50);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		foreach($list as $k=>$v){
			$list[$k]['m_photo']  = explode(',',$v['m_photo']);
		}
		
		$this->assign('list',$list);// 赋值数据集
		$this->assign('key',$key);// 赋值数据集
		$this->assign('count',$count);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
    }
}