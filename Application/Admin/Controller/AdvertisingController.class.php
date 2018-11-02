<?php
//广告管理
namespace Admin\Controller;
use Think\Controller;
class AdvertisingController extends CommonController {
	//广告列表
    public function index(){
		header("Content-type: text/html; charset=utf-8"); 
		$User = M('advertising'); // 实例化User对象
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$where['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
			}
		}
		
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$this->assign('list',$list);// 赋值数据集
		$this->assign('count',$count);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
    }
	
	//添加广告视图
	public function add(){
		header("Content-type: text/html; charset=utf-8"); 
		$this->display();
		
	}

	//添加广告视图
	public function del(){
		header("Content-type: text/html; charset=utf-8"); 
		$id      = I('id',0,'intval');
		$userid  = $_SESSION['wgcadmininfo']['user_id'];
		if(M('advertising')->where(array('id'=>$id,'userid'=>$userid)) -> delete($id)){
			$this->redirect('Advertising/index');
		}else{
			$this->error('删除失败');
		}
	}
	
	//编辑广告状态
	public function setStatus(){
		header("Content-type: text/html; charset=utf-8"); 
		$id      = I('id',0,'intval');
		$userid  = $_SESSION['wgcadmininfo']['user_id'];
		$show    = I('show',1,'intval');
		if(M('advertising')->where(array('id'=>$id,'userid'=>$userid)) -> setField('show',$show)){
			$this->redirect('Advertising/index');
		}else{
			$this->error('更改失败');
		}
	}
	
	//发布广告
	public function addForm(){
		header("Content-type: text/html; charset=utf-8"); 
		if(!IS_POST){die('404');}
		header("Content-type: text/html; charset=utf-8");
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$_POST['fenxiaoshang_userid']    = $_SESSION['wgcadmininfo']['fenxiaoshang_userid'];
			}
		}
		
		if($_FILES['pic']['name'] == ''){
			$this->error('请上传广告图');exit;
		}
		
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =    314572800 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
		$upload->savePath  =     ''; // 设置附件上传（子）目录
		// 上传文件 
		$info   =   $upload->upload();
		
		if(!$info) {// 上传错误提示错误信息
			$this->error($upload->getError());exit;
		}
		                                                          
		$pic  = '/Uploads/'.$info["pic"]['savepath'].$info["pic"]['savename'];
		
		$_POST['addtime']     = time();
		$_POST['pic']         = $pic;
		$_POST['company_url'] = 'http://'.I('company_url');
		$_POST['userid']  = $_SESSION['wgcadmininfo']['user_id'];

		$getId = M('advertising')->add($_POST);
		
		if($getId){
			
			$this->redirect('Advertising/index');
		}else{
			$this->error('添加失败');exit;
		}
	}
	
}