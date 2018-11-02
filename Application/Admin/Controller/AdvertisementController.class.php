<?php
//广告管理
namespace Admin\Controller;
use Think\Controller;
class AdvertisementController extends CommonController {
	//内部广告
    public function lists(){
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
	
	//工价列表
    public function gongjia(){
		header("Content-type: text/html; charset=utf-8"); 
		$User = M('search'); // 实例化User对象
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$where['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
			}
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
	
	//删除工价列表
    public function gongjia_del(){
		header("Content-type: text/html; charset=utf-8"); 
		$User = M('search'); // 实例化User对象
		
		$id = I('id');
		
		$del = $User->where(array('id'=>$id))->delete();
		
		if($del){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
    }
	
	//工程案例
	public function news(){  //1473404052
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
	
	//工程头条
	public function toutiao(){ 
		header("Content-type: text/html; charset=utf-8"); 
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$where['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
			}
		}
		
		//$where['type'] = array('in','10,11,12,13,15,14');
		$User = M('advertisement'); // 实例化User对象
		$count    = $User->where($where)->count();// 查询满足要求的总记录数
		$Page     = new \Think\Page($count,200);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show     = $Page->show();// 分页显示输出
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
	
//添加工程头条视图
	public function adds(){
       $this->display();
		
	}
	
	//微信公众号新闻 
	public function addss(){
      $this->display();
		
	}
	
	//添加广告视图
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
			
			$this->redirect('Advertisement/listS');
		}else{
			$this->error('发布失败');exit;
		}
	}
	
	//发布工程头条
	public function addForms(){
		header("Content-type: text/html; charset=utf-8"); 
		if(!IS_POST){die('404');}
		$title    = I('title');      //标题	
		$describe = I('describe');	//描述
		$type     = I('type');		//类型
		$laiyuan  = I('laiyuan');   //来源
		$content  = I('content');   //内容
		$province = I('province');  //省
		$city     = I('city');      //市
		$area     = I('area');     //区
		$kehu     = I('kehu');     //区
		
		if(empty($title)){
			$this->error('请输入标题');exit;
		}
		if(empty($describe)){
			$this->error('请输入描述');exit;
		}
		if(empty($content)){
			$this->error('请输入内容');exit;
		}
		
		if(empty($area)){
			$this->error('请选择城市');exit;
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
		
		$data['laiyuan']  = $laiyuan;
		$data['province'] = $province;
		$data['city']     = $city;
		$data['district'] = $area;
		$data['kehu'] = $kehu;
		
		$data['times']    = time();
		
		
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$data['fenxiaoshang_userid'] = $_SESSION['wgcadmininfo']['fenxiaoshang_userid'];
			}
		}

		$getId = M('advertisement')->add($data);
		
		if($getId){
			
			$this->redirect('Advertisement/toutiao');
		}else{
			$this->error('发布失败');exit;
		}
	}
	
	
	//发布新微信公众号
	public function addFormss(){
		header("Content-type: text/html; charset=utf-8"); 
		if(!IS_POST){die('404');}
		header("Content-type: text/html; charset=utf-8");
		$title    = I('title');      //标题	
		$describe = I('describe');	//描述
		$type     = I('type');		//类型
		$content  = I('content');   //内容
		$kehu     = I('kehu');
		if(empty($title)){
			$this->error('请输入标题');exit;
		}
		if(empty($describe)){
			$this->error('请输入描述');exit;
		}
		if(empty($content)){
			$this->error('请输入内容');exit;
		}
		if(empty($type )){
			$this->error('请选择类型');exit;
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
		$data['kehu']     = $kehu;
		
		$getId = M('advertisement')->add($data);
		
		if($getId){
			
		    $this->redirect('Publisignal/listss');
		}else{
			$this->error('发布失败');exit;
		}
	}
	
	
	public function newss(){
		header("Content-type: text/html; charset=utf-8");
		$use=M('advertisement')->where('type=0')->order('times')->select();
		$this->assign('use',$use);
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
	
   //新闻编辑列表
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
    
   //通讯客服聊天
  public function chat_list(){
	  var_dump($_POST); 
	 $this->display();
  }
	 
   //通讯录列表 
  public function message_list(){
	  
     $this->display();  
  }	
}