<?php
//图库管理
namespace Admin\Controller;
use Think\Controller;
class GalleryController extends CommonController {
	//文件夹列表
    public function listss(){
		$User = M('gallery'); // 实例化User对象
		
		$tpid = I('tpid',0,'intval');
		
		$where['pid'] = array('eq',0);
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$where['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
			}
		}
		if($tpid >=1){
			$where['tpid'] = array('eq',$tpid);
		}
		
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,200);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($where)->order('addtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$this->assign('list',$list);// 赋值数据集
		$this->assign('count',$count);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
    }
	
	//图片列表
    public function lists(){
		$User = M('gallery'); // 实例化User对象
		
		$pid = I('pid',0,'intval');
		$where['pid'] = array('eq',$pid);
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,200);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($where)->order('addtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		
		//var_dump($list);
		$this->assign('pid',$pid);// 文件夹id
		$this->assign('list',$list);// 赋值数据集
		$this->assign('count',$count);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
    }
	
	//添加视图
	public function add(){
		$pid = I('pid',0,'intval');
		$this->assign('pid',$pid);// 文件夹id
		$this->display();
		
	}
	
	//删除视图
	public function del(){
		$id   = I('id');
		$type = I('type');
		$User = M('gallery'); // 实例化User对象
		
		//删除文件夹
		if($type == 'wj'){
			$pic = $User -> where(array('pid'=>$id))->find();
			if(!empty($pic)){
				
				$User -> where(array('pid'=>$id))->delete();
			}
			
			if($User -> delete($id)){
				
				$data = array(
					'status' => 1,
					'title'  => 'ok'
				);
			}
		}else{
			$data = array(
				'status' => -1,
				'title'  => 'on'
			);
		}
			
		//删除照片
		if($type == 'zp'){
			if($User -> delete($id)){
				$data = array(
					'status' => 1,
					'title'  => 'ok'
				);
			}else{
				$data = array(
					'status' => -1,
					'title'  => 'on'
				);
			}
		}
		
		$this->ajaxReturn($data,'json');
	}
	
	//上传图片
	public function uploads(){
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
		$HOST = 'http://'.$_SERVER['HTTP_HOST'];
		$pic  = $HOST.'/Uploads/'.$info["file"]['savepath'].$info["file"]['savename'];
		$data['content'] = $pic;
		$this->ajaxReturn($data);
	}
	
	//发布控制器
	public function addForm(){
		if(!IS_POST){die('404');}
		header("Content-type: text/html; charset=utf-8");
		$name    = I('name');   //标题	
		$path    = I('path');	//图片
		$pid     = I('pid');	//文件夹id
		
		if(empty($name)){
			$this->error('请输入图片名称');exit;
		}
		
		if(count($path)<1){
			$this->error('请输上传图片');exit;
		}
		
		foreach($path as $k){
			$data['name']    = $name;
			$data['path']    = $k;
			$data['pid']     = $pid;
			$data['addtime'] = time();
			M('gallery')->add($data);
			M('gallery') ->where(array('id'=>$pid))->setField('path',$k);
		}
		
		$this->success('上传成功！',U('Gallery/lists',array('pid'=>$pid))); 
		
		//$this->redirect('Gallery/lists');
	}
	
	//修改图片名称
	public function save(){
		header("Content-type: text/html; charset=utf-8");
	
		$id    = I('id',0,'intval');	//图片id
		$pid   = I('pid');	//操作标记
		$this->assign('pid',$pid);// 文件夹id
		$this->assign('id',$id);// 文件夹id
		
		$this->display();	
	}
	
	//批量修改图片名称和删除控制器
	public function saveForm(){
		if(!IS_POST){die('404');}
		header("Content-type: text/html; charset=utf-8");
		$name  = I('name'); //标题	
		$id    = I('id',0,'intval');	//图片id
		$pid   = I('pid');
		if($id < 1){
			$this->error('未勾选需要修改的照片？');exit;
		}
	
		
		if(M('gallery') ->where(array('id'=>$id))->setField('name',$name)){
			$this->success('修改成功！',U('Gallery/lists',array('pid'=>$pid))); 
		}else{
			$this->error('修改失败');exit;
		}
			
	}
	
	//创建文件夹
	public function addForms(){
		if(!IS_POST){die('404');}
		header("Content-type: text/html; charset=utf-8");
		$name    = I('name');   //标题	
		$tpid    = I('tpid');   //分类
		
		if(empty($name)){
			$this->error('请输入文件夹名称');exit;
		}
		
		$HOST = 'http://'.$_SERVER['HTTP_HOST'];
		$data['tpid']   = $tpid;
		$data['name']   = $name;
		$data['pid']    = 0;
		$data['path']    = $HOST.'/Public/images/Folder.png';
		$data['addtime'] = time();
		
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$data['fenxiaoshang_userid'] = $_SESSION['wgcadmininfo']['fenxiaoshang_userid'];
			}
		}
		
		$gallery = M('gallery')->add($data);
		
		if($gallery){
			$this->redirect('Gallery/listss');
		}else{
			$this->error('创建失败！');exit;
		}
		
		
	}
	
	
	
}