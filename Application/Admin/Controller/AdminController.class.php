<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller {
    public function login(){
		//渲染用户登录信息
		/*@session_start();
		$wgcadmininfo = $_SESSION['wgcadmininfo'];
		if(empty($wgcadmininfo) || !isset($wgcadmininfo)){
			$wgcadmininfo = $_COOKIE ['wgcadmininfo'];
			$wgcadmininfo =  unserialize($wgcadmininfo);
			if(!empty($wgcadmininfo['user_id']) && isset($wgcadmininfo['user_id'])){
				$_SESSION["wgcadmininfo"] = $wgcadmininfo;
			}
		}
		$this->assign('wgcadmininfo',$wgcadmininfo);*/
		$this->display();
    }
	public function logout(){
		@session_start();
		unset($_SESSION['wgcadmininfo']);
		//setcookie("wgcadmininfo", "", time()-3600);
		$this->redirect('Admin/login', array(), 2, '正在退出...');
	}
	
	//验证用户登陆信息
	public function checkuser(){
		if(!IS_POST){die('404');}
		header("Content-type: text/html; charset=utf-8");
		
		 
		$identifier = I('post.identifier',''); //账号
		$identifier = trim($identifier);
		
		//密码
		
		$credential = md5(I('post.credential'));
		
		$rememberme = I('post.rememberme',''); //保存cookie
		$storeid = I('post.storeid','0');
		
		//判断账号是否存在   
		$user_id = D('MemGongView')->where(array('user_name'=>$identifier))->field('user_id,fenxiaoshang,fenxiaoshang_name')->find();
		
		if(empty($user_id)){
			//$this->ajaxReturn(array('code'=>2,'message'=>'用户尚未申请成为合作客户！','data'=>array()), "json");die;
			echo "<script>alert('账号不存在!');window.location = \"".U('Admin/login')."\";</script>"; die;
		}
		//验证用户登录合法性
		$id = M('member')->where(array('user_name'=>$identifier,'password'=>$credential))->getField('user_id');
		
		
		
		if(empty($id) || ($id === false)){
			
			echo "<script>alert('密码错误！');window.location = \"".U('Admin/login')."\";</script>"; die;
		}
		
		$isadmin = M('member')->where(array('isadmin'=>1,'user_id'=>$id))->getField('isadmin');
		
		if($isadmin != 1){
			
			echo "<script>alert('抱歉，没有权限登录系统');window.location = \"".U('Admin/login')."\";</script>"; die;
		}
		
		//保存用户信息
		@session_start();
		$wgcadmininfo = M('member')->alias('m')->join('ecm_gongyingshang g ON m.user_id = g.user_id','LEFT')->join('ecm_role r ON m.roleid = r.id','LEFT')->field('m.user_id,m.roleid,m.user_name,m.kehu,m.fenxiaoshang_userid,m.userphoto,g.name,g.zhiwei,r.rolename,m.storeid')->where(array('m.user_id'=>$id))->find();
		$wgcadmininfo['fenxiaoshang_name'] = M('member')->where(array('user_id'=>$id))->getField('fenxiaoshang_name');
		$wgcadmininfo['fenxiaoshang_userid'] = M('member')->where(array('user_id'=>$id))->getField('fenxiaoshang_userid');
		//var_dump($wgcadmininfo);exit;
		$wgcadmininfo['credential'] = $pwd;
		$wgcadmininfo['rememberme'] = $rememberme;
		$_SESSION['wgcadmininfo'] = $wgcadmininfo;
		//设置cookie
		if(!empty($rememberme)){
			$uinfo = $_COOKIE ['wgcadmininfo'];
			$uinfo =  unserialize($uinfo);
			if(empty($uinfo['user_id']) || !isset($uinfo['user_id'])){
				$wgcadmininfo = serialize($wgcadmininfo);
				//setcookie("wgcadmininfo" , $wgcadmininfo,  time()+3600*24*3 ); //保存3天
			}
		}else{
			//setcookie("wgcadmininfo", "", time()-3600);
		}
		//$res = array('code'=> 1,'message'=>'登录成功！','data'=>array());
		echo "<script>alert('登录成功！');window.location = \"".U('Index/index')."\";</script>"; die;
		//$this->ajaxReturn($res, "json");die;
	}
}