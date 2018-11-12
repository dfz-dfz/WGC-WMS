<?php
//广告管理
namespace Admin\Controller;
use Think\Controller;
class AdController extends CommonController {
	//内部广告
    public function index(){
		header("Content-type: text/html; charset=utf-8"); 
		$User = M('advertisement'); // 实例化User对象
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$where['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
			}
		}
		$where['type'] = array('eq',1);
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
	
	//添加广告视图
	public function add(){
		header("Content-type: text/html; charset=utf-8"); 
	 //echo $_SERVER['HTTP_REFERER'];
		$type =I('type');
		$this->assign('type',$type);
		$this->display();
		
	}
	
	//发布公告
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
			
			$this->redirect('Ad/index');
		}else{
			$this->error('发布失败');exit;
		}
	}
	
	//删除广告
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