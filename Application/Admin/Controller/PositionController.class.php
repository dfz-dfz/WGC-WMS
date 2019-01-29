<?php
//职位管理
namespace Admin\Controller;
use Think\Controller;
class PositionController extends CommonController {
	//职位列表
    public function index(){
		header("Content-type: text/html; charset=utf-8"); 
		
		$position = M('position'); // coupons
		$name = I('name');
		$type = I('type','');
		if(!empty($type)){
			$where['type'] = array('eq',"$type");
		}
		if(!empty($name)){
			$where['name'] = array('like',"%$name%");
		}
		$count      = $position->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $position->where($where)->order('id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('count',$count);// 赋值分页输出
		$this->assign('name',$name);// 赋值分页输出
		$this->display(); // 输出模板
    }
	//职位删除
	public function del(){
		$position=M("position");
		$id=I("id");
		$info=$position->where(array('id'=>$id))->delete();
		if($info>0){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}
	//职位修改
	public function update(){
		$position=M("position");
		$id=I("id");
		$info=$position->where(array('id'=>$id))->find();
		$this->assign("info",$info);
		$this->display();
	}
	//职位修改
	public function upinfo(){
		$position=M("position");
		$id=I("get.id");
		$date=I("post.");
		$a=$position->where(array('id'=>$id))->data($date)->save();
		if($a>0){
				$this->redirect('position/index','',1, '修改成功！页面跳转中。。。。');
			}else{
				$this->error('修改失败！');
			}
		
	}
	
	//职位添加页面显示
	public function add(){
		$this->display();
	}
	
	//职位添加
	public function addinfo(){
		$date=I("post.");
		$position=M("position");
		$aa=$position->data($date)->add();
		if($aa){
			$this->redirect('position/index','',1, '添加成功！页面跳转中。。。。');
		}else{
			$this->error('添加失败！');
		}
	}
} 