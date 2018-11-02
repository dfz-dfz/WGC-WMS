<?php
namespace Admin\Controller;
use Admin\Controller\InitController;
class MaillistController extends CommonController {

    public function index(){
		header("Content-type: text/html; charset=utf-8");
		//统计所有用户
		$wehere['user_id'] = array('GT',1473404044);
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$wehere['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
			}
		}
		//$info = D('MaillistView')->where($wehere) -> order('regtime desc')->select();
		
		$User = D('MaillistView'); // 实例化User对象
		$count      = $User->where($wehere)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,15);	// 实例化分页类 传入总记录数和每页显示的记录数(25)
		
		
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($wehere)->order('regtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
	
		$this->assign('page',$show);// 赋值分页输出
		
		$this->assign('info',$list);
		$this->assign('count',$count);
		
		$this->display();
    }
	
	//欢迎页面
	public function beizhu(){
		$user_id = I('id');
	
		$this->assign('user_id',$user_id);   
		$this->display();
		
	}
	
	//欢迎页面
	public function SaveBeizhu(){
		$user_id = I('user_id');
		$content = I('content');
		
		//修改用户备注
		$wehere['user_id'] = array('eq',$user_id);
		$save =M('gongyingshang') -> where($wehere) ->setField('beizhu',$content);
		//var_dump($save);
		 if($save){ 
			$this -> redirect('Maillist/index');
		}else{
			
		}
	}
	
	
	 //详情 
	 public function xiangq(){ 
		$select=M('gongyingshang')->select();
		//var_dump($select);
		$this->assign('select',$select);
		$this->display();
	}

	function content(){
	$this->display();
	}

	//系统
	public function name(){
		$this-> name();
		$this-> value();
		$this-> this();
		$this-> thisname();
	}
}