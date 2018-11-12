<?php
//工价管理
namespace Admin\Controller;
use Think\Controller;
class LaborpriceController extends CommonController {
	//工价列表
    public function index(){
		header("Content-type: text/html; charset=utf-8"); 
		$User = M('search'); // 实例化User对象
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$where['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
			}
		}
		$keyword = I('keyword');
		if(!empty($keyword)){
			$where['title|unit'] = array('like',"%{$keyword}%");
		}
		
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,200);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($where)->order('addtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$this->assign('list',$list);// 赋值数据集
		$this->assign('count',$count);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('keyword',$keyword);// 赋值分页输出
		$this->display();
    }
	
	//删除工价列表
    public function gongjia_del(){
		header("Content-type: text/html; charset=utf-8"); 
		$User = M('search'); // 实例化User对象
		
		$id = I('id');
		
		$del = $User->where(array('id'=>$id))->delete();
		
		if($del){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
    }
	
}