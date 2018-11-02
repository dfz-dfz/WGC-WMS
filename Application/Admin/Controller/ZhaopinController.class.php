<?php
//招聘管理
namespace Admin\Controller;
use Think\Controller;
class ZhaopinController extends CommonController {
	//列表
    public function index(){
		header("Content-type: text/html; charset=utf-8"); 
		$User = M('recruit'); // 实例化User对象
		
		//条件
		$key 	= I('post.key');
		$type 	= I('post.type');
		
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$where['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
			}
		}else{
			//$where['fenxiaoshang_userid'] = array('eq',0);
		}
		if(IS_POST){
			
			$where['zhiwei|company_name'] = array('like',"%$key%");
			
			$count      = $User->where($where)->count();// 查询满足要求的总记录数
			$Page       = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数(25)
			$show       = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$list = $User->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		}else{
			$count      = $User->where($where)->count();// 查询满足要求的总记录数
			$Page       = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数(25)
			$show       = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$list = $User->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		}
		
		
		foreach($list as $k=>$v){
			
			$list[$k]['user_name'] = M('gongyingshang')-> where(array('user_id'=>$v['user_id']))->getfield('name');
			$list[$k]['userphoto'] = M('member')-> where(array('user_id'=>$v['user_id']))->getfield('userphoto');
			$list[$k]['photo'] = '';
			if(!empty($v['m_photo'])){
				$strarr = explode(",",$v['m_photo']); 
				foreach($strarr as $j=>$s){
					$list[$k]['photo'] .= "<a target='_blank' href='http://wgcapp.wgc2013.com/$s'><img style='width:30px;height:30px;float:left;margin:5px;' src='http://wgcapp.wgc2013.com/$s'/></a>";
				}
				
			}
			
			
		}
		
		
		
		$this->assign('list',$list);// 赋值数据集
		$this->assign('count',$count);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('key',$key);// 赋值分页输出
		$this->assign('type',$type);// 赋值分页输出
		$this->display();
    }
	
	
	//删除
	public function del(){
		header("Content-type: text/html; charset=utf-8"); 
		$id = I('id');
		
		header("Content-type: text/html; charset=utf-8"); 
		$id = I('id');
		if(M('recruit') -> delete($id)){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}
	
	
	
}