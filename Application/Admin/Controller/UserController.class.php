<?php
namespace Home\Controller;
use Think\Controller;

class UserController extends Controller {
	
	
	//查询用户头像
	public function index(){
		
		if(!IS_POST){die('404');}
		
		$uid =  I('post.uid');
		
		$member = M('member')->where(array('user_id'=>$uid))->field('userphoto')->find();
			
		if(!empty($member)){
			
			$array = array('data'=>$member,'code'=>200,'message'=>'加载完成');
		
			echo json_encode($array); exit;
		}else{
			$array = array('code'=>201,'message'=>'加载完成');
		
			echo json_encode($array); exit;
			
		}
			
		
    }
	
	//获取个人积分
    public function capital(){
		
		if(!IS_POST){die('404');}
		
		$user_id =  I('post.user_id');
		
		$capital = M('capital');
			
		//获取用户关系
		$where['user_id'] = array('eq',$user_id);
;
					
		$status = $capital->where($where) -> field('hasmoney') ->find();
					
		$array = array('status'=>200,'retData'=>$status['hasmoney']);
			
				
		echo json_encode($array); exit;
			
		
    }
	
	//更新扣取积分
	public function UpCapital(){
		
		if(!IS_POST){die('404');}
		
		$user_id =  I('post.user_id');
		
		$money =  I('post.capital');
		
		$capital = M('capital');
			
		//获取用户关系
		$where['user_id'] = array('eq',$user_id);

					
		if($capital->where($where) ->setDec('hasmoney',$money)){
			$array = array('status'=>200);
		}else{
			$array = array('status'=>202);
		}
					
				
		echo json_encode($array); exit;
	}
	
	
	//查询余额
	public function amount(){
		
		if(!IS_POST){die('404');}
		
		$uid =  I('post.uid');
		$type =  I('post.type');
		
		if(IS_POST){
			
			if($type == 'amount'){
				
			
				$amount = M('user')->where(array('uid'=>$uid))->field('amount,utype')->select();
				
				$array = array('data'=>$amount,'code'=>200,'message'=>'加载完成');
			
				echo json_encode($array); exit;
			}
			
		}else{
			die("404");
		}
    }
	
	//查询用户类型
	public function utype(){
		
		if(!IS_POST){die('404');}
		
		$uid =  I('post.uid');
		$type =  I('post.type');
		
		if(IS_POST){
			
			if($type == 'utype'){
				
			
				$utype = M('user')->where(array('uid'=>$uid))->field('utype')->select();
				
				$array = array('data'=>$utype,'code'=>200,'message'=>'加载完成');
			
				echo json_encode($array); exit;
			}
			
		}else{
			die("404");
		}
    }
	
	
	 
	 /**
	 * 充值成功-更新订单状态
	 * 状态参数：200成功，201失败，
	 * @param 杨水晶
	 * @pdate 2016-3-5
	 */
	 public function save_tags(){
		 
		if(!IS_POST){die('404');}
		
    	$uid 	=  I('post.uid',0,'intval');
		$amount =  I('post.amount');
		$tags 	=  I('post.tags');
		$type 	=  I('post.type');
		
		if($type != 'user_chong'){die('403');}
		
		
		$user = M('user')->where(array('uid'=>$uid))->find();
		if(empty($user)){
			die('404');
		}
		
		$data = array(
			'uid'		=>$uid,
			'tag_name'	=>'余额充值',
			'amount'	=>$amount,
			'tag'		=>$tags,
			'types'		=>'收入',
			'name' 		=>'余额充值',
			'shoukuan'	=>'57找',
			'status'	=>0,
			'type_f'	=>'+',
			'datetime'	=>time(),
		);
		
		if(M('user_tags')->add($data)){
			
			M('user')->where(array('uid'=>$uid))->setInc( 'amount',$amount);	
			$status = array('code'=>200,'message'=>'充值成功');
			
			echo json_encode($status);
			
		}else{
			$error = array('code'=>201,'message'=>'网络连接超时');
		
			echo json_encode($error);
			exit;
		}
	 }
	 
	 
	 //工价询价
	 public function xunjia(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header('Access-Control-Allow-Methods: GET, POST, PUT');
		if(!IS_POST){die('404');}
		$prj_id = I('prj_id',0,'intval');
		$_POST['prj_id'] = $prj_id;
		$id = M('xunjia')->add($_POST);
    	
		if($id){
			M('xunjia')->where(array('id'=>$id))->setField('addtime',time());
			$status = array('code'=>200,'message'=>'发布成功');
			
			echo json_encode($status);
			
		}else{
			$error = array('code'=>201,'message'=>'发布失败');
		
			echo json_encode($error);
			exit;
		}
	 }
	 
	 //工价询价列表
	 public function xunjia_list(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header('Access-Control-Allow-Methods: GET, POST, PUT');
		if(!IS_POST){die('404');}
		$page    = I('post.page',1,'intval');
		$userid = I('post.userid','0');
		$key     = I('post.key','');
		
		
		$where['userid'] = array('eq',$userid);
		
		if(empty($key)){
			$where['userid'] = array('like',"%{$userid}%");
		}else{
			$where['userid'] = array('like',"%{$userid}%");
			$where['title|unit|ps']   = array('like',"%$key%");
		}
		
		$xunjia = M('xunjia')->where($where)->limit(15)->page($page)->order('id desc')->select();
    	
		if(!empty($xunjia)){
			foreach($xunjia as $i => $y){
				$xunjia[$i]['addtime'] = date('Y-m-d H:i:s',$y['addtime']);
			}
			$status = array('code'=>200,'message'=>$xunjia);
			
			echo json_encode($status);
			
		}else{
			$error = array('code'=>201,'message'=>'暂无数据');
		
			echo json_encode($error);
			exit;
		}
	 }
	 
	 //工价询价列表--分享
	 public function xunjia_list_share(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header('Access-Control-Allow-Methods: GET, POST, PUT');
		if(!IS_POST){die('404');}
		
		$page    = I('post.page',1,'intval');
		$user_id = I('post.user_id','0');
		$key     = I('post.key','');
		$type     = I('post.type',0,'intval');
		
		$where['stype'] = array('eq',$type);
		
		if(empty($key)){
			$where['userid'] = array('like',"%{$user_id}%");
		}else{
			$where['userid'] = array('like',"%{$user_id}%");
			$where['title|unit|ps']   = array('like',"%$key%");
		}
		
		$xunjia = D('XunjiaShareView')->where($where)->limit(15)->page($page)->order('id desc')->select();
    	
		if(!empty($xunjia)){
			
			$status = array('code'=>200,'message'=>$xunjia);
			
			echo json_encode($status);
			exit;
		}else{
			$error = array('code'=>201,'message'=>'暂无数据');
		
			echo json_encode($error);
			exit;
		}
	 }
	 
	 //工价询价列表---app
	 public function xunjia_list_app(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header('Access-Control-Allow-Methods: GET, POST, PUT');
		if(!IS_POST){die('404');}
		$page   = I('page',1,'intval');
		$prj_id = I('prj_id',0,'intval');
		
		$where['prj_id'] = array('eq',$prj_id);
		
		$xunjia = M('xunjia')->where($where)->limit(15)->page($page)->order('id desc')->select();
    	
		if(!empty($xunjia)){
			foreach($xunjia as $i => $y){
				$xunjia[$i]['addtime'] = date('Y-m-d H:i:s',$y['addtime']);
			}
			$status = array('code'=>200,'message'=>$xunjia);
			
			echo json_encode($status);
			
		}else{
			$error = array('code'=>201,'message'=>'暂无数据');
		
			echo json_encode($error);
			exit;
		}
	 }
	 
	 
	 //工价询价列表---首页---搜索
	 public function xunjia_lists_key(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header('Access-Control-Allow-Methods: GET, POST, PUT');
		if(!IS_POST){die('404');}
		$key = I('key');
		
		$where['title'] = array("like","%$key%");
		$xunjia = M('xunjia')->where($where)->order('id desc')->select();
		
		if(!empty($xunjia)){
			foreach($xunjia as $i => $y){
				$xunjia[$i]['addtime'] = date('Y-m-d H:i:s',$y['addtime']);
			}
			$status = array('code'=>200,'message'=>$xunjia);
			
			echo json_encode($status);
			
		}else{
			$error = array('code'=>201,'message'=>'暂无数据');
		
			echo json_encode($error);
			exit;
		}
	 }
	 
	 //工价询价列表---首页---详情
	 public function xunjia_lists_content(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header('Access-Control-Allow-Methods: GET, POST, PUT');
		if(!IS_POST){die('404');}
		$id = I('id',0,'intval');
		$where['id'] = array("eq",$id);
		$xunjia = M('xunjia')->where($where)->find();
		$huifu = M('xunjia_huifu')->where(array('xid'=>$id))->order('id desc')->select();
		if(!empty($xunjia)){
			
			$xunjia['addtime'] = date('Y-m-d H:i:s',$xunjia['addtime']);
			$status = array('code'=>200,'message'=>$xunjia,'huifu'=>$huifu);
			echo json_encode($status);
			
		}else{
			$error = array('code'=>201,'message'=>'暂无数据');
			echo json_encode($error);
			exit;
		}
	 }
	 
	 //维修报价列表---首页---详情---回复
	 public function dataDetail(){
		header("Content-type: text/html; charset=utf8");
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header('Access-Control-Allow-Methods: GET, POST, PUT');
		if(!IS_POST){die('404');}
		$id = I('post.id',0,'intval');
		//当前人user_id
		$user_id = I('post.user_id','');
		
		//$user_id = '1473404053';
		//$id = 12;
		
		$info = M('weixiumsg')->where(array('id'=>$id))->find();
		
		$res = array();
		//分割多个图像字串
		$userPhoto=$info['userphoto'];
		if(!empty($userPhoto) && ($userPhoto != 'null')){
			$imgarr=explode(",",$userPhoto);
			$info['img']=$imgarr; 
		}else{
			$info['img']=array(); 
		}
		
		if(!empty($info)){
			$uinf = getuinf($info['send_uid']);
			$info['name'] = $uinf[0]['name'];
			$info['zhiwei'] = $uinf[0]['zhiwei'];
			$info['mobile'] = $uinf[0]['mobile'];
			$info['userphoto'] = $uinf[0]['userphoto'];
			$rev_uid = trim($info['rev_uid'],',');
			//$rev_uid = $info['rev_uid'];
			$all = M('gongyingshang')->where(array('user_id'=>array('in',$rev_uid)))->field('name')->order('user_id desc')->select();
			$allname = '';
			foreach($all as $k => $v){
				$allname.=$v['name'].',';
			}
			$allname = trim($allname,',');
			$info['allname'] = $allname;
			//回复信息是发布人的
			$hh_id = $info['id'].$user_id;
			
			$where = array();
			$where['weixiu_id'] = $info['id'];
			//$where['send_uid|rev_uid'] = array(array('eq',$user_id),array('eq',$user_id),'_multi'=>true);
			$huifu = M('xunjia_huifu')->where(array('xid'=>$id))->order('id desc')->select();
			
			
			
			$operatorId = substr(substr($info['operator'],0,strlen($info['operator'])-1),1);	
			$operator = M('gongyingshang')->where(array('user_id'=>$operatorId))->field('name')->find();
			$info['operatorName'] = $operator['name'];
			
			
			
			
			$info['mans'] = $huifu;
			$res['code'] = 200;
			$res['message'] = $info;
		}else{
			$res['code'] = 202;
			$res['message'] = '暂无数据';
		}
		
		//echo '<pre>';
		//print_r($res);die;
		$this->ajaxReturn($res, "json");
	 }
	 
	 //工价询价列表---首页---详情--回复
	 public function xunjia_huifu(){
		 header("Content-type: text/html; charset=utf-8");
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header('Access-Control-Allow-Methods: GET, POST, PUT');
		if(!IS_POST){die('404');}
		$user_id = I('user_id',0,'intval');
		$type    = I('type',1,'intval'); //type：1工价询价,type：2维修报价
		$user          = M('member')->where(array('user_id'=>$user_id))->field('userphoto')->find();
		$gongyingshang = M('gongyingshang')->where(array('user_id'=>$user_id))->field('name,zhiwei')->find();
		
		$_POST['username']  = $gongyingshang['name'];
		$_POST['gongzhong'] = $gongyingshang['zhiwei'];
		$_POST['userimg']   = $user['userphoto'];
		$_POST['type']      = $user['type'];
		$_POST['addtime']   = time();
		
		
		$xunjia = M('xunjia_huifu')->add($_POST);
		
		if($xunjia){
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			echo "<script type='text/javascript'>alert('回复失败！');window.location.href='".$_SERVER['HTTP_REFERER']."'</script>";
		}
	 }
	 
	 //工价询价列表---首页
	 public function xunjia_lists(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header('Access-Control-Allow-Methods: GET, POST, PUT');
		if(!IS_POST){die('404');}
		
		$page = I('page',1,'intval');
		
		$xunjia = M('xunjia')->limit(20)->page($page)->order('id desc')->select();
    	
		if(!empty($xunjia)){
			foreach($xunjia as $i => $y){
				$xunjia[$i]['addtime'] = date('Y-m-d H:i:s',$y['addtime']);
			}
			$status = array('code'=>200,'message'=>$xunjia);
			
			echo json_encode($status);
			
		}else{
			$error = array('code'=>201,'message'=>'暂无数据');
		
			echo json_encode($error);
			exit;
		}
	 }
	 
	  //工价询价列表---首页---删除
	 public function xunjia_lists_del(){
		header("Content-type: text/html; charset=utf-8");
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header('Access-Control-Allow-Methods: GET, POST, PUT');
		if(!IS_GET){die('404');}
		$userid = I('userid',0,'intval');
		$id     = I('id',0,'intval'); 
		
		$where['id']     = $id;
		$where['userid'] = $userid;
		
		$xunjia = M('xunjia')->where($where)->delete();
		
		if($xunjia){
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			echo "<script type='text/javascript'>alert('删除失败！');window.location.href='".$_SERVER['HTTP_REFERER']."'</script>";
		}
	 }
	 
	 //用户开通VIP会员 ---  设置记录
	 public function vip(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header('Access-Control-Allow-Methods: GET, POST, PUT');
		if(!IS_POST){die('404');}
		//获取用户姓名
		$name = M('gongyingshang')-> where(array('user_id'=>I('user_id')))->getField('name');
		if(empty($name)){
			$error = array('code'=>202,'message'=>'请先登陆');
			echo json_encode($error);
			exit;
		}
		
		$cycle = I('cycle',0,'intval');
		
		switch($cycle){
			case 1680:   //招聘用户
				$money = 1680;
			break;
			case 1980:   //企业专属版
				$money = 1980;
			break;
			case 15980:  //企业至尊版
				$money = 15980;
			break;
			case 19980:  //企业钻石版
				$money = 19980;
			break;
		}

		
		$data['user_id']  = I('user_id');
		$data['cycle']    = I('cycle');
		$data['username'] = $name;
		$data['money']    = $money;
		$data['addtime']  = time($data);

    	$vip = M('vip_record')->add($data);
		if($vip){
			
			$status = array('code'=>200);
			
			echo json_encode($status);
			
		}else{
			$error = array('code'=>201,'message'=>'下单失败');
		
			echo json_encode($error);
			exit;
		}
	 }
	 
	 //用户开通VIP会员记录 --- 获取记录
	 public function getVip(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header('Access-Control-Allow-Methods: GET, POST, PUT');
		if(!IS_POST){die('404');}
		
		$type    = I('type');
		$user_id = I('user_id',0,'intval');
		
		
    	if($type != 'vip'){die();}
		
		$vip = M('vip_record')->where(array('user_id'=>$user_id))->order('id desc')->find();
		if(!empty($vip)){
			$status = array('code'=>200,'message'=>$vip);
			
			echo json_encode($status);
			
		}else{
			$error = array('code'=>201,'message'=>'非法操作');
		
			echo json_encode($error);
			exit;
		}
	 }
	 
	 //集采价格 --- 获取记录
	 public function getJicai(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header('Access-Control-Allow-Methods: GET, POST, PUT');
		
		if(!IS_POST){die('404');}
		
		$id = I('id',0,'intval');
		
		$material = M('material')->where(array('id'=>$id))->find();
		if(!empty($material)){
			$status = array('code'=>200,'message'=>$material);
			
			echo json_encode($status);
			
		}else{
			$error = array('code'=>202,'message'=>'无数据');
		
			echo json_encode($error);
			exit;
		}
	 }
	 
	 //集采价格 --- 下单
	 public function setJicai(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header('Access-Control-Allow-Methods: GET, POST, PUT');
		
		if(!IS_POST){die('404');}
		
		$send_userid         = M('material')-> where(array('id'=>I('jid')))->getField('user_id');
		
		$fenxiaoshang_userid = M('member')-> where(array('user_id'=>$send_userid))->getField('fenxiaoshang_userid');
		
		$_POST['send_userid']         = $send_userid;
		$_POST['fenxiaoshang_userid'] = $fenxiaoshang_userid;
		$_POST['addtime']             = time();
		$_POST['user_id']             = I('userid');
		$_POST['tag']                 = getOrderId($prefix = 'WGC');
		
		$material = M('material_xiadan')->add($_POST);
		
		if($material){
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			echo "<script type='text/javascript'>alert('回复失败！');window.location.href='".$_SERVER['HTTP_REFERER']."'</script>";
		}
	 }
	 
	 //集采价格 --- 删除下单
	 public function DelJicai(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header('Access-Control-Allow-Methods: GET, POST, PUT');
		
		if(!IS_GET){die('404');}
		$id = I('id',1,'intval');
		$user_id  = I('user_id',0,'intval');
		
		$material_xiadan = M('material_xiadan')-> where(array('id'=>$id,'user_id'=>$user_id))->delete();
		
		if($material_xiadan){
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			echo "<script type='text/javascript'>alert('删除失败！');window.location.href='".$_SERVER['HTTP_REFERER']."'</script>";
		}
	 }
	 
	 //集采价格 --- 下单列表
	 public function getJicaiList(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header('Access-Control-Allow-Methods: GET, POST, PUT');
		
		if(!IS_POST){die('404');}
		$page = I('page',1,'intval');
		$key  = I('key');
		$user_id  = I('user_id',0,'intval');
		
		if(!empty($key)){
			$where['tag'] = array('like',"%$key%");
		}
		$where['user_id'] = array('eq',$user_id);
		
		$material = M('material_xiadan')->where($where)->limit(20)->page($page)->order('id desc')->select();
		
		if(!empty($material)){
			foreach($material as $k=>$v){
				$materials = M('material')->where(array('id'=>$v['jid']))->field('m_photo,office_name,m_name,address,brand')->find();
				$material[$k]['m_photo'] = $materials['m_photo'];
				$material[$k]['office_name'] = $materials['office_name'];
				$material[$k]['m_name'] = $materials['m_name'];
				$material[$k]['address'] = $materials['address'];
				$material[$k]['brand'] = $materials['brand'];
			}
			
			$res['code'] = 200;
			$res['message'] = $material;
		}else{
			$res['code'] = 202;
			$res['message'] = '暂无数据';
		}
		$this->ajaxReturn($res, "json");
		
	 }
	 
	 //推荐和取消工人
	public  function pai(){
		header("Content-type: text/html; charset=utf-8"); 
		$id       = I('id');
		$pai      = I('pai');
		$userid   = I('userid');
		$postion   = I('postion');
		
		$arr = array(
			'1' => '施工队长',
			'2' => '水电工长',
			'3' => '空调安装工长',
			'4' => '空调安装工',
			'5' => '泥水工',
			'6' => '水电工',
			'7' => '电焊工',
			'8' => '家具安装工',
			'9' => '木工',
			'10' => '扇灰工',
			'11' => '保洁工',
			'12' => '杂工',
			'13' => '设计师',
			'14' => '预算员',
			'15' => '其它',
			'16' => '维修工',
			'17' => '网络维修',
			'18' => '实习预结算员',
			'19' => '室内设计师',
			'20' => '工程经理',
			'21' => '机电工程师',
			'22' => '暖通设计师',
			'23' => '采购经理',
			'24' => '文案',
			'25' => '平面设计',
			'26' => '效果图设计师',
			'27' => '客服专员',
			'28' => '行政助理',
			'29' => '软件销售经理',
			'30' => '业务员',
			'31' => '项目经理',
			'32' => '水电维修',
			'33' => '空调维修',
			'34' => '装饰维修',
			'35' => '设备维修',
			'36' => '分销商',
			'37' => '工匠',
			'38' => '公司',
			'39' => '材料商',
			'40' => '前端开发',
			'41' => '后端开发',
		);
		
		$member = M('member') -> where(array('user_id'=>$userid)) ->setField('postion',$postion);
			
		if(!$member){
			
			$data['status']  = -1;
			$data['content'] = '操作失败！';
			$this->ajaxReturn($data);
		}
		M('gongyingshang') -> where(array('user_id'=>$userid)) ->setField('zhiwei',$arr[$postion]);
		
		$member = M('member')->where(array('user_id'=>$id))->setField('pai',$pai);
		
		if($member){
			//获取推送id    //发送消息提醒
			//$extra="I('post.this_username') 推荐了 I('post.tj_username')，系统消息请勿回复。"; 
			
			//$power     = explode(',',I('post.js_userid'));
			//$extra1   = '{"content":"'.$extra.'","extra":"1473403924"}';
			//messageSystem($power,$extra1);
			
			$data['status']  = 1;
			$data['content'] = '操作成功!';
			$this->ajaxReturn($data);
		}else{
			$data['status']  = -1;
			$data['content'] = '操作失败！';
			$this->ajaxReturn($data);
		}	
		
	}
}