<?php
//材料商管理
namespace Admin\Controller;
use Think\Controller;
class CailiaoshangController extends CommonController {
	//列表
    public function index(){
		header("Content-type: text/html; charset=utf-8"); 
		$User = D('CaiLiaoShangView'); // 实例化User对象
		
		//条件
		$key 	= I('post.key');
		$type 	= I('post.type');
		
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$where['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
			}
		}
		
		if(IS_POST){
			if($type == 1){
				$where['cname'] = array('like',"%$key%");
			}else if($type == 2){
				$where['office_name'] = array('like',"%$key%");
			}else if($type == 3){
				$where['title'] = array('like',"%$key%");
			}else if($type == 4){
				$where['mobile'] = array('like',"%$key%");
			}
			//office_name|cname|title
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
		
		
		
		
		
		$this->assign('list',$list);// 赋值数据集
		$this->assign('count',$count);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('key',$key);// 赋值分页输出
		$this->assign('type',$type);// 赋值分页输出
		$this->display();
    }
	
	//材料商申请列表
    public function cailiaoshang(){
		header("Content-type: text/html; charset=utf-8"); 
		$User = M('cailiaoshangshenqing'); // 实例化User对象
		
		//条件
		$key 	= I('post.key');
		$type 	= I('post.type');
		$where['types'] = array('eq',1);
		if(IS_POST){
			if($type == 1){
				$where['name'] = array('like',"%$key%");
			}else if($type == 2){
				$where['cailiaomingcheng'] = array('like',"%$key%");
			}else if($type == 3){
				$where['zhiwu'] = array('like',"%$key%");
			}else if($type == 4){
				$where['tel'] = array('like',"%$key%");
			}
			//office_name|cname|title
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
			$list = $User->order('id desc')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
		}
		
		
		
		
		
		$this->assign('list',$list);// 赋值数据集
		$this->assign('count',$count);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('key',$key);// 赋值分页输出
		$this->assign('type',$type);// 赋值分页输出
		$this->display();
    }
	
	//装饰企业集采报名
    public function jicaibaoming(){
		header("Content-type: text/html; charset=utf-8"); 
		$User = M('cailiaoshangshenqing'); // 实例化User对象
		
		//条件
		$key 	= I('post.key');
		$type 	= I('post.type');
		$where['types'] = array('eq',2);
		if(IS_POST){
			if($type == 1){
				$where['name'] = array('like',"%$key%");
			}else if($type == 2){
				$where['cailiaomingcheng'] = array('like',"%$key%");
			}else if($type == 3){
				$where['zhiwu'] = array('like',"%$key%");
			}else if($type == 4){
				$where['tel'] = array('like',"%$key%");
			}
			//office_name|cname|title
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
			$list = $User->order('id desc')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
		}
		
		
		
		
		
		$this->assign('list',$list);// 赋值数据集
		$this->assign('count',$count);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('key',$key);// 赋值分页输出
		$this->assign('type',$type);// 赋值分页输出
		$this->display();
    }
	
	
	//编辑视图
	public function add(){
		header("Content-type: text/html; charset=utf-8"); 
		$User = D('CaiLiaoShangView'); // 实例化User对象
		$id = I('id');
		$k = $User -> where(array('id'=>$id)) -> find();
		
	
		$this->assign('v',$k);
		$this->display();
		
	}
	
	//删除
	public function del(){
		header("Content-type: text/html; charset=utf-8"); 
		$id = I('id');
		if(M('cailiaoshang_mianpian') -> delete($id)){
			$data = array(
				'status' => 1,
				'title'  => 'ok'
			);
			$this->ajaxReturn($data,'json');
		}
	}
	
	
	//删除材料商
	public function clsdel(){
		header("Content-type: text/html; charset=utf-8"); 
		$id = I('id');
		if(M('cailiaoshang_mianpian') -> delete($id)){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}
	
	//删除材料商合作申请
	public function cl_del(){
		header("Content-type: text/html; charset=utf-8"); 
		$id = I('id');
		if(M('cailiaoshangshenqing') -> delete($id)){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}
	
	//编辑控制器
	public function addForm(){
		
		header("Content-type: text/html; charset=utf-8"); 
		if(!IS_POST){die('404');}
		
		$id       = I('id');      //标题	
		$name     = I('name');      //标题	
	
		
		if(empty($name)){
			$this->error('请输入姓名');exit;
		}
		

		$getId = M('cailiaoshang_mianpian')->save($_POST);
		
		if($getId){
			header('Location:'.U('Cailiaoshang/add',array('reload'=>'ok')).'');
		}else{
			$this->error('编辑失败');exit;
		}
	}
	
	
	
	
	
}