<?php
//工程案例管理
namespace Admin\Controller;
use Think\Controller;
class ProjectcaseController extends CommonController {
	//工程案例
	public function index(){  //1473404052
		header("Content-type: text/html; charset=utf-8"); 
		$User = M('advertisement'); // 实例化User对象
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$where['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
			}
		}
		//$where['type'] = array('eq',0);
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,200);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		
		$list = $User->where($where)->order('times desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('count',$count);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
    }
	
	//工程案例详情内容列表
	public  function listas(){
		header("Content-type: text/html; charset=utf-8"); 
		//var_dump($_GET);
		$id = $_GET['id'];
		$listas = M('advertisement')->where(array('id'=>$id))->select();
		$this->assign('listas',$listas);
		$this->display();
		
	}
	
	//编辑工程案例
   public function bianji(){
		header("Content-type: text/html; charset=utf-8"); 
	   $id=$_GET['id'];
	   $bianji = M('advertisement')->where(array('id'=>$id))->getField('id , title , pic , content, describe');
	   if(empty($bianji)){
		exit('404'); 
	   }
	  $this->assign('bianji',$bianji);
	  $this->display();
  }
  
  //更新新闻编辑列表数据
  public function bianjis(){
	  header("Content-type: text/html; charset=utf-8"); 
       $upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =    3145728000 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
		$upload->savePath  =     ''; // 设置附件上传（子）目录
		// 上传文件 
		$info   =   $upload->upload();
	
		if(!$info) {// 上传错误提示错误信息
			$this->error($upload->getError());exit;
		}
		    
          			
		$pic  = '/Uploads/'.$info["pic"]['savepath'].$info["pic"]['savename'];
		
		$title = I('post.title'); 
		$id    = I('post.id'); 
		$describe = I('post.describe');
		$content = I('post.content');
		$type = I('post.type');
		
		$data['title']    =  $title;
		$data['content']  =  $content;
		$data['pic']      =  $pic;
		$data['describe'] =  $describe;
		$data['type']     =  $type;

	   $advertisement = M('advertisement')->where(array('id'=>$id))->save($data);
		
	  if($advertisement){
		    $this->success('数据更新成功'); 
	  }else{
		    $this->error('更新失败');exit;  
	  }  
	  
  } 
  
  //发布工程案例
	public function addForm(){
		header("Content-type: text/html; charset=utf-8"); 
		if(!IS_POST){die('404');}
		header("Content-type: text/html; charset=utf-8");
		$title    = I('title');      //标题	
		$describe = I('describe');	//描述
		$type     = I('type');		//类型
		$content  = I('content');   //内容
		$kehu     = I('kehu');     
		if(empty($title)){
			$this->error('请输入广告标题');exit;
		}
		if(empty($describe)){
			$this->error('请输入广告描述');exit;
		}
		if(empty($content)){
			$this->error('请输入广告内容');exit;
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
		$data['title']    = $title;
		$data['content']  = $content;
		$data['pic']      = $pic;
		$data['describe'] = $describe;
		$data['type']     = $type;
		$data['kehu']     = $kehu;
		$data['times']    = time();

		$getId = M('advertisement')->add($data);
		
		if($getId){
			
			$this->redirect('Projectcase/index');
		}else{
			$this->error('发布失败');exit;
		}
	}
	
	//工程工程案例
	public function del(){
		header("Content-type: text/html; charset=utf-8"); 
		$id = I('id');
		if(M('advertisement') -> delete($id)){
			$data = array(
				'status' => 1,
				'title'  => 'ok'
			);
			$this->ajaxReturn($data,'json');
		}
	}
}