<?php
namespace Admin\Controller;
use Admin\Controller\InitController;
class IndexController extends CommonController {
    public function index(){
		header("Content-type: text/html; charset=utf-8");
		@session_start();
		$wgcadmininfo = $_SESSION['wgcadmininfo'];//var_dump($wgcadmininfo['user_name']);exit;
		$Category = A('Admin/Category');
		$catlist = $Category->getList();
		//echo '<pre>';
		//print_r($wgcadmininfo);die;
		$this->assign('user_id',$wgcadmininfo['user_name']);
		$this->assign('catlist',$catlist);
		$this->assign('wgcadmininfo',$wgcadmininfo);
		$this->display();
    }
	
	//欢迎页面
	public function welcome(){
			//统计所有用户
			$fenxiaoshang_userid = $_SESSION['wgcadmininfo']['fenxiaoshang_userid'];
			$qbWehere['user_id'] = array('gt',4474);
			if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
				if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
					
					$qbWehere['fenxiaoshang_userid'] = array('eq',$fenxiaoshang_userid);
				}
			}
			$count = M('member')->where($qbWehere)->count();
			//统计今日用户
			$cur_date = strtotime(date('Ymd'));
			
			if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
				if($fenxiaoshang_userid > 0){
					$jinri = M('member')->where("regtime >= '{$cur_date}' and user_id >4474 and fenxiaoshang_userid = $fenxiaoshang_userid")->count();
				}else{
					$jinri = M('member')->where("regtime >= '{$cur_date}' and user_id >4474")->count();
				}
			}
			//统计昨日用户
			$zt_date = strtotime(date('Ymd',strtotime('-1 day')));
			if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
				if($fenxiaoshang_userid > 0){
					
					$zuori = M('member')->where("regtime >= '{$zt_date}' and user_id >4474 and fenxiaoshang_userid = $fenxiaoshang_userid")->count();
				}else{
					$zuori = M('member')->where("regtime >= '{$zt_date}' and user_id >4474")->count();
				}
			}
			
			//统计本周用户
			$bz_date = strtotime(date('Ymd',strtotime('-1 day')));
			
			if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
				if($fenxiaoshang_userid > 0){
					
					$benzhou = M('member')->where("regtime >= '{$bz_date}' and user_id >4474 and fenxiaoshang_userid = $fenxiaoshang_userid")->count();
				}else{
					$benzhou = M('member')->where("regtime >= '{$bz_date}' and user_id >4474")->count();
				}
			}
			//统计本月用户
			$by_date = strtotime(date('Ymd',strtotime('-1 month')));
			
			if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
				if($fenxiaoshang_userid > 0){
					$benyue = M('member')->where("regtime >= '{$by_date}' and user_id >4474 and fenxiaoshang_userid = $fenxiaoshang_userid")->count();
				}else{
					$benyue = M('member')->where("regtime >= '{$by_date}' and user_id >4474")->count();
				}
			}
			//统计客服人数
			$kfWehere['position_type'] = array('eq',1);
			
			if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
				if($fenxiaoshang_userid > 0){
					$kfWehere['fenxiaoshang_userid'] = array('eq',$fenxiaoshang_userid);
				}
			}
			$kf = M('member')->where($kfWehere)->count();
			
		$info = array(
			 '操作系统'=>PHP_OS,
			 '运行环境'=>$_SERVER["SERVER_SOFTWARE"],
			 'PHP运行方式'=>php_sapi_name(),
			 '系统版本'=>' [ <a href="javascript:;" target="_blank">查看最新版本</a> ]',
			 '上传附件限制'=>ini_get('upload_max_filesize'),
			 '执行时间限制'=>ini_get('max_execution_time').'秒',
			 '服务器时间'=>date("Y年n月j日 H:i:s"),
			 '北京时间'=>gmdate("Y年n月j日 H:i:s",time()+8*3600),
			 '服务器域名/IP'=>$_SERVER['SERVER_NAME'].' [ '.gethostbyname($_SERVER['SERVER_NAME']).' ]',
			 '剩余空间'=>round((disk_free_space(".")/(1024*1024)),2).'M',
			 'register_globals'=>get_cfg_var("register_globals")=="1" ? "ON" : "OFF",
			 'magic_quotes_gpc'=>(1===get_magic_quotes_gpc())?'YES':'NO',
			 'magic_quotes_runtime'=>(1===get_magic_quotes_runtime())?'YES':'NO',
		 );
		$this->assign('info',$info);
		$this->assign('count',$count);
		$this->assign('jinri',$jinri); 		//今日
		$this->assign('zuori',$zuori); 		//昨日
		$this->assign('benzhou',$benzhou); 	//获取本周
		$this->assign('benyue',$benyue); 	//获取本月
		$this->assign('kf',$kf);
		 
		 
		 
		   
		$this->display('welcome');
		
	}
	
		
	//欢迎页面
	public function user(){
			$type = I('id');
			//统计所有用户
			$qbWehere['user_id'] = array('GT',1473404044);
			$count = D('UserView')->where($qbWehere)->count();
			//统计今日用户
			if($type == 1){
				$cur_date = strtotime(date('Ymd'));
				$user = D('UserView')->where("regtime >= '{$cur_date}' and user_id >1473404044")->select();
				foreach($user as $k=>$v){
					$gongyingshang = M('gongyingshang')->where(array('user_id'=>$v['user_id']))->field('name','zhiwei')-> find();
					$user[$k]['name'] = $gongyingshang['name'];
					$user[$k]['zhiwei'] = $gongyingshang['zhiwei'];
				}
			}
			if($type == 2){
				//统计昨日用户
				$zt_date = strtotime(date('Ymd',strtotime('-1 day')));
				$user = D('UserView')->where("regtime >= '{$zt_date}' and user_id >1473404044")->select();
				foreach($user as $k=>$v){
					$gongyingshang = M('gongyingshang')->where(array('user_id'=>$v['user_id']))->field('name','zhiwei')-> find();
					$user[$k]['name'] = $gongyingshang['name'];
					$user[$k]['zhiwei'] = $gongyingshang['zhiwei'];
				}
			}
			if($type == 3){
				//统计本周用户
				$bz_date = strtotime(date('Ymd',strtotime('-1 day')));
				$user = D('UserView')->where("regtime >= '{$bz_date}' and user_id >1473404044")->select();
				foreach($user as $k=>$v){
					$gongyingshang = M('gongyingshang')->where(array('user_id'=>$v['user_id']))->field('name','zhiwei')-> find();
					$user[$k]['name'] = $gongyingshang['name'];
					$user[$k]['zhiwei'] = $gongyingshang['zhiwei'];
				}
			}
			if($type == 4){
				//统计本月用户
				$by_date = strtotime(date('Ymd',strtotime('-1 month')));
				$user = D('UserView')->where("regtime >= '{$by_date}' and user_id >1473404044")->select();
				foreach($user as $k=>$v){
					$gongyingshang = M('gongyingshang')->where(array('user_id'=>$v['user_id']))->field('name','zhiwei')-> find();
					$user[$k]['name'] = $gongyingshang['name'];
					$user[$k]['zhiwei'] = $gongyingshang['zhiwei'];
				}
			}
			
			if($type == 0){
				//统计全部用户
				
				$user = D('UserView')->where("user_id >1473404044")->select();
				foreach($user as $k=>$v){
					$gongyingshang = M('gongyingshang')->where(array('user_id'=>$v['user_id']))->field('name','zhiwei')-> find();
					$user[$k]['name'] = $gongyingshang['name'];
					$user[$k]['zhiwei'] = $gongyingshang['zhiwei'];
				}
			}
		 
		 $this->assign('user',$user);
		   
		$this->display();
		
	}
}