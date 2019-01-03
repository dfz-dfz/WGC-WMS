<?php
//用户管理
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController {
	//列表
    public function index(){
		header("Content-type: text/html; charset=utf-8"); 
		
		$User = D('MemGongyView'); // 实例化User对象
		$keyword = '';
		$type    = I('type');
		$action_name = I('action_name');
		
		if($_POST){
			$keyword = $_POST["keyword"];
			$where['name|user_name|type'] = array('like',"%$keyword%");
		}else{
			$where['name'] = array('neq','');
		}
		
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$where['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
			}
		}
		if($type == 1){
			$where['type'] = array('eq','百胜');
		}else if($type == 2){
			$where['type'] = array('eq','汉堡王');
		}else if($type == 3){
			$where['type'] = array('eq','麦当劳');
		}else if($type == 4){
			$where['type'] = array('eq','太平洋咖啡');
		}
		
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($where)->order('user_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
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
			
	  
		foreach($list as $k=>$v){ 
			if($v['postion'] == '' || $v['postion'] == null || $v['postion'] < 1){
				$list[$k]['postion'] = '<a href="'.U('User/userCateSave',array('id'=>$v['user_id'],'u'=>1)).'" style="color:red;font-size:0.75rem">未设置</a>';
			}else{
				$list[$k]['postion'] = '<a href="'.U('User/userCateSave',array('id'=>$v['user_id'],'u'=>1)).'" style="font-size:0.75rem">'.$arr[$v['postion']].'</a>';
			}
			
			if($v['type'] == ''){
				$list[$k]['type'] = '<a href="'.U('User/userCateSave',array('id'=>$v['user_id'],'u'=>2)).'" style="color:red;font-size:0.75rem">未分类</a>';
			}else{
				$list[$k]['type'] = '<a href="'.U('User/userCateSave',array('id'=>$v['user_id'],'u'=>2)).'" style="font-size:0.75rem">'.$v['type'].'</a>';
			}
			
			$list[$k]['jifen'] = M('capital')->where(array('user_id'=>$v['user_id']))->getField('hasmoney');
			
			//推荐
			$list[$k]['pais'] = $v['pai'];
			if($v['pai'] == 0){
				$list[$k]['pai'] = '<a style="text-decoration:none" onClick="article_start(this,'.$v['user_id'].')" href="javascript:;" title="设置推荐工人"><i class="Hui-iconfont">&#xe603;</i></a>';
			}else{
				$list[$k]['pai'] = '<a style="text-decoration:none" onClick="article_stop(this,'.$v['user_id'].')" href="javascript:;" title="取消推荐工人"><i class="Hui-iconfont">&#xe6de;</i></a>';
			}
		}
		
		$this->assign('keyword',$keyword);// 赋值数据集
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('count',$count);// 赋值分页输出
		$this->assign('action_name',$action_name);// 赋值分页输出
		if($_POST){
			$this->display($action_name); // 输出模板
		}else{
			$this->display(); // 输出模板
		}
    }
	
	//添加用户
	public function user_add(){
		header("Content-type: text/html; charset=utf-8");
		
		$this->display();
	}
	
	//用户详情 
	  public function user_show(){
		 
		  $id = I('id');
		  $list = D('UserView') -> where(array('user_id'=>$id)) -> find();
		   //var_dump($list);
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
			
				$postion = $list['postion'];
				$list['postion'] = $arr[$postion];
			
			
			$this->assign('list',$list);
			$this->display();  
	  }
	  
	//获取积分用户ID
	public function yue(){
		header("Content-type: text/html; charset=utf-8"); 
	    $user_id=$_GET['user_id'];
	    $user = M('member')->where(array('user_id' => $user_id))->getField('user_id');
	
		if(empty($user)){
			exit('404');
		}
	    $this->assign('id',$user);
	    $this->display();
	}
	
	//余额修改
	public function yues(){
		header("Content-type: text/html; charset=utf-8"); 
	    $jifen   = I('post.jifen',0,'intval');
		$user_id = I('post.user_id',0,'intval');
		if(empty($jifen )){
			$this->error('请输入数据');exit;
		}
		
	   $member = M('member')->where(array('user_id'=>$user_id))->setField('balance',$jifen); 
      
		if($member){  
		    $this->success('修改成功','../User/index',2);
		}else{
			$this->error('修改失败');exit;
		}
	} 
	//获取积分用户ID
	public function jifen(){
		header("Content-type: text/html; charset=utf-8"); 
	    $user_id=$_GET['user_id'];
	    $user = M('member')->where(array('user_id' => $user_id))->getField('user_id');
	
		if(empty($user)){
			exit('404');
		}
	    $this->assign('id',$user);
	    $this->display();
	}
	
	//积分修改
	public function jifens(){
		header("Content-type: text/html; charset=utf-8"); 
	    $jifen   = I('post.jifen',0,'intval');
		$user_id = I('post.user_id',0,'intval');
		if(empty($jifen)){
			$this->error('请输入数据');exit;
		}
		//判断是否存在
		$capital = M('capital')->where(array('user_id'=>$user_id))->find();
		if(empty($capital)){
			$member = M('capital')->add(array('user_id'=>$user_id,'hasmoney'=>$jifen,'last_time'=>time()));
		}else{
			$member = M('capital')->where(array('user_id'=>$user_id))->setField('hasmoney',$jifen);
		}
	    
      
		if($member){  
		    $this->success('修改成功','../User/index',2);
		}else{
			$this->error('修改失败');exit;
		}
	} 
	
	//修改用户类别
	public function userCateSave(){
		header("Content-type: text/html; charset=utf-8"); 
		$this->assign('u',$_GET['u']);// 赋值分页输出
		$this->assign('id',$_GET['id']);// 赋值分页输出
		
		$this->display(); // 输出模板
	}
	
	//修改用户类别表单处理控制器
	public function userCateSaveS(){
		header("Content-type: text/html; charset=utf-8"); 
		$postion  = $_POST['postion'];
		$type     = $_POST['type'];
		$user_id  = $_POST['user_id'];
		$u        = $_POST['u'];
		
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
		
		
			if($u == 1){ //更改职位
				
				if($postion < 1 || $postion == ''){
					echo "<script>alert('职位不能为空');history.go(-1);</script>";  exit;
				}
				
				$member = M('member') -> where(array('user_id'=>$user_id)) ->setField('postion',$postion);
				
				if($member){
					M('gongyingshang') -> where(array('user_id'=>$user_id)) ->setField('zhiwei',$arr[$postion]);
					echo "<script>alert('修改成功');window.location.href='".U('User/index')."'</script>";  
					
				}else{
					echo "<script>alert('修改失败');history.go(-1);</script>";  exit;
				}
			}else if($u == 2){  //更改分类
				
				if($type < 0 || $type == ''){
					echo "<script>alert('分类不能为空');history.go(-1);</script>";  exit;
				}
				
				$gys = M('member') -> where(array('user_id'=>$user_id)) ->setField('type',$type);
				
				if($gys){
					
					echo "<script>alert('修改成功');window.location.href='".U('User/index')."'</script>";  
					
				}else{
					echo "<script>alert('修改失败');history.go(-1);</script>";  exit;
				}
			}
		
		
	}
	
	//编辑用户资料视图
	public function bianji_user(){
		$user_id = I('id');
		
		$list = D('UserView')->where(array('user_id'=>$user_id))->find();
		
		$this->assign('list',$list);// 赋值数据集
		$this->display(); // 输出模板
	}
	
	/**
	 * 编辑用户资料
	 * 状态参数：200成功，202失败，
	 * @param yang
	 * @pdate 2016-3-5
	 */
	
    public function user_edit()
    {
    	if(!IS_POST){die('404');}
		
		$User = M('member');
    	$user_id =  I('post.user_id');
		$is_member = M('member')->where(array('user_id'=>$user_id))->find();
		if(empty($is_member)){
			$data = array('code'=>203,'message'=>'用户不存在');
			echo json_encode($data);
			exit;
		}
		
		$zwarr = array(
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
		
		
		$data3 = array();
		$email = I('post.email',NULL);
		$gys_category = I('post.gys_category',NULL);
		$business_license = I('post.business_license',NULL);
		$store_img = I('post.store_img',NULL);
		$business_scope = I('post.business_scope',NULL);
		$shop_name = I('post.shop_name',NULL);
		$sex = I('post.sex',NULL);
		$gy_type =  I('post.gy_type',NULL);
		$gys_name = I('post.gys_name',NULL);
		$pp_name = I('post.pp_name',NULL);
		$cl_name = I('post.cl_name',NULL);
		$adds = I('post.adds',NULL);
		$name = I('post.name',NULL);
		$nianling = I('post.nianling',NULL);
		$bumen = I('post.bumen',NULL);
		$zhiwei = $zwarr[I('post.zhiwei',NULL)-1];
		$huji = I('post.huji',NULL);
		$shenfenzheng = I('post.shenfenzheng',NULL);
		$gz_jingyan = I('post.gz_jingyan',NULL);
		$mobile = I('post.mobile',NULL);
		$xinzi = I('post.xinzi',NULL);
		$skill = I('post.skill',NULL);
		$url = I('post.url',NULL);
		$intension = I('post.intension',NULL);
		
		$data3['kname'] = I('post.kname',NULL);
		$data3['kahao'] = I('post.kahao',NULL);
		
		if(!empty($email)){
			$data3['email'] = $email;
		}
		if(!empty($gys_category)){
			$data3['gys_category'] = $gys_category;
		}
		if(!empty($business_license)){
			$data3['business_license'] = $business_license;
		}
		if(!empty($store_img)){
			$data3['store_img'] = $store_img;
		}
		if(!empty($business_scope)){
			$data3['business_scope'] = $business_scope;
		}
		if(!empty($sex)){
			$data3['sex'] = $sex;
		}
		if(!empty($gy_type)){
			$data3['gy_type'] = $gy_type;
		}
		if(!empty($gys_name)){
			$data3['gys_name'] = $gys_name;
		}
		if(!empty($pp_name)){
			$data3['pp_name'] = $pp_name;
		}
		if(!empty($cl_name)){
			$data3['cl_name'] = $cl_name;
		}
		if(!empty($adds)){
			$data3['adds'] = $adds;
		}
		if(!empty($name)){
			$data3['name'] = $name;
		}
		if(!empty($nianling)){
			$data3['nianling'] = $nianling;
		}
		if(!empty($bumen)){
			$data3['bumen'] = $bumen;
		}
		if(!empty($zhiwei)){
			$data3['zhiwei'] = $zhiwei;
			
		}
		
		if(!empty($huji)){
			$data3['huji'] = $huji;
		}
		if(!empty($shenfenzheng)){
			$data3['shenfenzheng'] = $shenfenzheng;
		}
		if(!empty($gz_jingyan)){
			$data3['gz_jingyan'] = $gz_jingyan;
		}
		if(!empty($mobile)){
			$data3['mobile'] = $mobile;
		}
		if(!empty($xinzi)){
			$data3['xinzi'] = $xinzi;
		}
		if(!empty($skill)){
			$data3['skill'] = $skill;
		}
		if(!empty($url)){
			$data3['url'] = $url;
		}
		if(!empty($intension)){
			$data3['intension'] = $intension;
		}
		if(empty($data3)){
			$data = array('code'=>204,'message'=>'不能清空用户数据');
			echo json_encode($data);
			exit;
		}
		if(M('gongyingshang')->where(array('user_id'=>$user_id))->save($data3)){
			M('member')->where(array('user_id'=>$user_id))->setField('postion',I('post.zhiwei',NULL));
			$d=array();
			$education = I('post.education',NULL);
			$graduate = I('post.graduate',NULL);
			$shenfen = I('post.shenfen',NULL);
			if(is_numeric($shenfen)){
				switch($shenfen){
					case 1:
						$d['shenfen']=$shenfen;
						$d['shenfentype']=0;
						break;
					case 2:
						$d['shenfen']=$shenfen;
						$d['shenfentype']=2;
						break;
					case 3:
						$d['shenfen']=$shenfen;
						$d['shenfentype']=2;
						break;
				}
				 
			}
			
			if(($education != 'null') && !empty($education)){
				$d['education']=$education;
			}
			if(($graduate != 'null') && !empty($graduate)){
				$d['graduate']=$graduate;
			}
			
			//if(!empty($d)){
				//更新作品案例
				$content = I('content');
		
				M('member')->where(array('user_id'=>$user_id))->setField($d);
				M('member')->where(array('user_id'=>$user_id))->setField('content',$content);
			//}
			
			$this->success('编辑成功', U('User/index'));
		}else{
			$this->error('编辑失败');
			
			
			} 
    }
	
	//编辑用户头像视图
	public function bianji_photo(){
		$user_id = I('id');
		
		$list = D('UserView')->where(array('user_id'=>$user_id))->find();
		
		$this->assign('list',$list);// 赋值数据集
		$this->display(); // 输出模板
	}
	
	//编辑用户密码视图
	public function password_user(){
		$user_id = I('id');
		
		
		$this->assign('user_id',$user_id);// 赋值数据集
		$this->display(); // 输出模板
	}
	
	//用户密码修改
	public function changePassword(){
		if(!IS_POST){die('404');}
		$userid   = I('post.userid');
		$password = I('post.password');
		
		if(!empty($password) && isset($password) && !empty($userid) && isset($userid)){
			$password=MD5($password);
			$ret=M('member')->where(array('user_id'=>$userid))->setField('password',$password);
			if($ret === false){
				
				$this->error('密码修改出错');
			}else{
			
				$this->success('密码修改成功', U('User/index'));
			}
		}else{
			
			$this->error('输入不能为空！');
		}	
	}
	
	
	//编辑设置分销商 
	public function bianji_fxs(){
		$this->assign('user_id',I('id',0,'intval'));// 赋值数据集
		$this->display();
		
	}
	
	/**
	 * 编辑分销商用户资料
	 * 状态参数：200成功，202失败，
	 * @param yang
	 * @pdate 2016-3-5
	 */
	
    public function user_edit_fxs()
    {
    	if(!IS_POST){die('404');}
		
		$User = M('member');
    	$user_id =  I('post.user_id');
		$is_member = M('member')->where(array('user_id'=>$user_id))->find();
		if(empty($is_member)){
			$this->error('用户不存在');
		}
		
		if($User -> where(array('user_id'=>$user_id)) -> data($_POST) -> save()){
			$User -> where(array('user_id'=>$user_id)) -> setField('kehu',I('fenxiaoshang_name'));
			$this->success('设置成功', U('User/index'));
		}else{
			$this->error('设置失败');
		}
		
	}
	
	/**
	 * 取消分销商用户权限
	 * 状态参数：200成功，202失败，
	 * @param yang
	 * @pdate 2016-3-5
	 */
	
    public function bianji_fxs_quxiao()
    {
    	if(!IS_GET){die('404');}
		
		$User = M('member');
    	$user_id =  I('id');
		$data['fenxiaoshang']        = 0;
		$data['postion']             = 12;
		$data['fenxiaoshang_time']   = '';
		$data['isadmin']             = 0;
		$data['fenxiaoshang_name']   = '';
		$data['kehu']                = '微工程';
		$data['fenxiaoshang_userid'] = '';
		
		$is_member = M('member')->where(array('user_id'=>$user_id))->find();
		if(empty($is_member)){
			$this->error('用户不存在');
		}
		
		if($User -> where(array('user_id'=>$user_id)) -> data($data) -> save()){
			$this->success('操作成功');
		}else{
			$this->error('设置失败');
		}
		
	}
	
	//推荐和取消工人
	public  function pai(){
		header("Content-type: text/html; charset=utf-8"); 
		$id     = I('id');
		$pai    = I('pai');
		$member = M('member')->where(array('user_id'=>$id))->setField('pai',$pai);
		
		if($member){
			
			//获取推送id    //发送消息提醒
			$extra=($pai==1)?'系统已把您设为推荐工人，系统消息请勿回复。':'系统已把您从推荐工人移除，系统消息请勿回复。'; 
			
			$power     = explode(',',I('post.id'));
			$extra1   = '{"content":"'.$extra.'","extra":"1473403924"}';
			messageSystem($power,$extra1);
			
			$data['status']  = 1;
			$data['content'] = '操作成功!';
			$this->ajaxReturn($data);
		}else{
			$data['status']  = -1;
			$data['content'] = '操作失败！';
			$this->ajaxReturn($data);
		}	
		
	}
	
	//会员用户列表
	public function userVip(){
		header("Content-type: text/html; charset=utf-8"); 
		
		$User    = D('MemGongyView'); // 实例化User对象	$keyword = '';
		$type    = I('type');
		
		
		$where['name']    = array('neq','');
		$where['is_user'] = array('eq',2);
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$where['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
			}
		}
		
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($where)->order('user_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
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
			
	  
		foreach($list as $k=>$v){ 
			if($v['postion'] == '' || $v['postion'] == null || $v['postion'] < 1){
				$list[$k]['postion'] = '<a href="'.U('User/userCateSave',array('id'=>$v['user_id'],'u'=>1)).'" style="color:red;font-size:0.75rem">未设置</a>';
			}else{
				$list[$k]['postion'] = '<a href="'.U('User/userCateSave',array('id'=>$v['user_id'],'u'=>1)).'" style="font-size:0.75rem">'.$arr[$v['postion']].'</a>';
			}
			
			if($v['type'] == ''){
				$list[$k]['type'] = '<a href="'.U('User/userCateSave',array('id'=>$v['user_id'],'u'=>2)).'" style="color:red;font-size:0.75rem">未分类</a>';
			}else{
				$list[$k]['type'] = '<a href="'.U('User/userCateSave',array('id'=>$v['user_id'],'u'=>2)).'" style="font-size:0.75rem">'.$v['type'].'</a>';
			}
			
		}
			
		$this->assign('keyword',$keyword);// 赋值数据集
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('count',$count);// 赋值分页输出
		$this->display(); // 输出模板
	}
	//设置vip用户
	public  function is_user(){
		header("Content-type: text/html; charset=utf-8"); 
		$id     = I('id');
		$is_user    = I('is_user');
		$member = M('member')->where(array('user_id'=>$id))->setField('is_user',$is_user);
		
		if($member){
			
			//获取推送id    //发送消息提醒
			$extra = ($is_user==1)?'系统已通过您vip会员特权申请，请勿回复。':'系统已通过您vip会员特权申请，系统消息请勿回复。'; 
			
			$power     = explode(',',I('post.id'));
			$extra1   = '{"content":"'.$extra.'","extra":"1473403924"}';
			messageSystem($power,$extra1);
			
			$data['status']  = 1;
			$data['content'] = '操作成功!';
			$this->ajaxReturn($data);
			
		}else{
			$data['status']  = -1;
			$data['content'] = '操作失败！';
			$this->ajaxReturn($data);
		}	
		
	}
	
	//推荐用户列表
	public function tuijian(){
		header("Content-type: text/html; charset=utf-8"); 
		
		$User = D('MemGongyView'); // 实例化User对象
		$keyword = '';
		$type    = I('type');
		$action_name = I('action_name');
		if($_POST){
			$keyword = $_POST["keyword"];
			$where['name|user_name|type'] = array('like',"%$keyword%");
		}else{
			$where['name'] = array('neq','');
		}
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$where['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
			}
		}
		if($type == 1){
			$where['type'] = array('eq','百胜');
		}else if($type == 2){
			$where['type'] = array('eq','汉堡王');
		}else if($type == 3){
			$where['type'] = array('eq','麦当劳');
		}else if($type == 4){
			$where['type'] = array('eq','太平洋咖啡');
		}
		$where['pai'] = array('eq',1);
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($where)->order('user_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
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
			
	  
		foreach($list as $k=>$v){ 
			if($v['postion'] == '' || $v['postion'] == null || $v['postion'] < 1){
				$list[$k]['postion'] = '<a href="'.U('User/userCateSave',array('id'=>$v['user_id'],'u'=>1)).'" style="color:red;font-size:0.75rem">未设置</a>';
			}else{
				$list[$k]['postion'] = '<a href="'.U('User/userCateSave',array('id'=>$v['user_id'],'u'=>1)).'" style="font-size:0.75rem">'.$arr[$v['postion']].'</a>';
			}
			
			if($v['type'] == ''){
				$list[$k]['type'] = '<a href="'.U('User/userCateSave',array('id'=>$v['user_id'],'u'=>2)).'" style="color:red;font-size:0.75rem">未分类</a>';
			}else{
				$list[$k]['type'] = '<a href="'.U('User/userCateSave',array('id'=>$v['user_id'],'u'=>2)).'" style="font-size:0.75rem">'.$v['type'].'</a>';
			}
			
			//推荐
			$list[$k]['pais'] = $v['pai'];
			if($v['pai'] == 0){
				$list[$k]['pai'] = '<a style="text-decoration:none" onClick="article_start(this,'.$v['user_id'].')" href="javascript:;" title="设置推荐工人"><i class="Hui-iconfont">&#xe603;</i></a>';
			}else{
				$list[$k]['pai'] = '<a style="text-decoration:none" onClick="article_stop(this,'.$v['user_id'].')" href="javascript:;" title="取消推荐工人"><i class="Hui-iconfont">&#xe6de;</i></a>';
			}
		}
		
		
		 
		// echo "<pre>";
		// var_dump($list);exit;
		 
		$this->assign('keyword',$keyword);// 赋值数据集
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('count',$count);// 赋值分页输出
		$this->assign('action_name',$action_name);// 赋值分页输出
		if($_POST){
			$this->display($action_name); // 输出模板
		}else{
			$this->display(); // 输出模板
		}
	}
	
} 