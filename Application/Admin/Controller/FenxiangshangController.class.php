<?php
//分销商管理
namespace Admin\Controller;
use Think\Controller;
class FenxiangshangController extends CommonController {
	
	
	//分销商列表
	public function listss(){
		header("Content-type: text/html; charset=utf-8"); 
		
		$User = D('MemGongyView'); // 实例化User对象
		$keyword         = '';
		$type            = I('type');
		
		
		if($_POST){
			$keyword = $_POST["keyword"];
			$where['name|user_name|type'] = array('like',"%$keyword%");
		}else{
			$where['name'] = array('neq','');
		}
		
		$where['fenxiaoshang'] = array('eq',1);
		
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
				$list[$k]['postion'] = '<a href="'.U('Advertisement/userCateSave',array('id'=>$v['user_id'],'u'=>1)).'" style="color:red;font-size:0.75rem">未设置</a>';
			}else{
				$list[$k]['postion'] = '<a href="'.U('Advertisement/userCateSave',array('id'=>$v['user_id'],'u'=>1)).'" style="font-size:0.75rem">'.$arr[$v['postion']].'</a>';
			}
			
			if($v['type'] == ''){
				$list[$k]['type'] = '<a href="'.U('Advertisement/userCateSave',array('id'=>$v['user_id'],'u'=>2)).'" style="color:red;font-size:0.75rem">未分类</a>';
			}else{
				$list[$k]['type'] = '<a href="'.U('Advertisement/userCateSave',array('id'=>$v['user_id'],'u'=>2)).'" style="font-size:0.75rem">'.$v['type'].'</a>';
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
		$this->display(); // 输出模板
	}
	
	//添加分销商视图
	public function add(){
		header("Content-type: text/html; charset=utf-8"); 
	 //echo $_SERVER['HTTP_REFERER'];
		$type =I('type');
		$this->assign('type',$type);
		$this->display();
		
	}

	
	//取消分销商权限
	public function del(){
		header("Content-type: text/html; charset=utf-8"); exit;
		$id = I('id');
		if(M('advertisement') -> delete($id)){
			$data = array(
				'status' => 1,
				'title'  => 'ok'
			);
			$this->ajaxReturn($data,'json');
		}
	}
	
	//添加分销商控制器
	public function addForm(){
		header("Content-type: text/html; charset=utf-8"); 
		if(!IS_POST){die('404');}
		$title    = I('title');      //标题	
		$describe = I('describe');	//描述
		$type     = I('type');		//类型
		$content  = I('content');   //内容
		
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
		$data['times']    = time();

		$getId = M('advertisement')->add($data);
		
		if($getId){
			
			$this->redirect('Advertisement/listS');
		}else{
			$this->error('发布失败');exit;
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
	
	
	
}