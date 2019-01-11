<?php
namespace Admin\Controller;
use Think\Controller;
class StatusController extends Controller {
	
	
	//查询用户头像
	public function index(){
		
		header("Content-type: text/html; charset=utf-8"); 
		$User = M('status'); // 实例化User对象
		$name = I('name');
		if(!empty($name)){
			$where['name'] = array('like',"%$name%");
		}
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,200);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($where)->order('id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$this->assign('list',$list);// 赋值数据集
		$this->assign('count',$count);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('name',$name);// 赋值分页输出
		$this->display();
    }
	
	public function del(){
		$status=M("status");
		$id=I("id");
		$info=$status->where(array('id'=>$id))->delete();
		if($info>0){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}
	public function add(){
		$status=M("status");
		$infos=1;
		$info=$status->max('types');
		$infos=$info+1;
		$this->assign("types",$infos);
		$this->display();
	}
	public function addinfo(){
		$date=I("post.");
		$status=M("status");
		$date['times']=time();
		$types=$date['types'];
		$a=$status->where(array('types'=>$types))->find();
		if($a){
			$msg['info']="该功能已存在请重新添加！";
		}else{
			$aa=$status->data($date)->add();
			if($aa){
				$msg['info']="添加成功！";
			}else{
				$msg['info']="添加失败！";
			}
		}
		 $this->ajaxReturn($msg);
	}
	public function update(){
		$status=M("status");
		$id=I("get.id");
		$date['status']=I("get.status");
		$a=$status->where(array('id'=>$id))->data($date)->save();
		if($a){
				$this->success('修改成功！');
			}else{
				$this->error('修改失败！');
			}
	}
}
