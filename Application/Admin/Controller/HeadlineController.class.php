<?php
//头条管理
namespace Admin\Controller;
use Think\Controller;
class HeadlineController extends CommonController {
	//列表
    public function index(){
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
	
	//产品推荐列表
    public function index_cls(){
		header("Content-type: text/html; charset=utf-8"); 
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$where['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
			}
		}
		
		//$where['type'] = array('in','10,11,12,13,15,14');
		$User = M('chanpingtuijian'); // 实例化User对象
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
	
	//添加工程头条视图
	public function adds(){
       $this->display();
		
	}
	
	//编辑
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
  
  //编辑产品推荐
   public function bianji_cls(){
		header("Content-type: text/html; charset=utf-8"); 
	   $id=$_GET['id'];
	   $bianji_cls = M('chanpingtuijian')->where(array('id'=>$id))->getField('id , m_name , shopname , shopaddress , price , pic , content, describe');
	   if(empty($bianji_cls)){
		exit('404'); 
	   }
	  $this->assign('bianji_cls',$bianji_cls);
	  $this->display();
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
		$kehu     = I('kehu');     //分销商标识
		
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
			
			$this->redirect('Headline/index');
		}else{
			$this->error('发布失败');exit;
		}
	}
	
	//发布产品推荐
	public function addForms_cls(){
		header("Content-type: text/html; charset=utf-8"); 
		if(!IS_POST){die('404');}
		$m_name = I('m_name');	//产品名称
		$shopname = I('shopname');	//商家名称
		$shopaddress = I('shopaddress');	//商家地址
		$describe = I('describe');//描述
		$price = I('price');	//产品价格
		$type     = I('type');		//类型
		$laiyuan  = I('laiyuan');   //来源
		$content  = I('content');   //内容
		$province = I('province');  //省
		$city     = I('city');      //市
		$area     = I('area');     //区
		$kehu     = I('kehu');     //分销商标识
		if(empty($m_name)){
			$this->error('请输入产品名称');exit;
		}
		if(empty($shopname)){
			$this->error('请输入商家名称');exit;
		}
		if(empty($shopaddress)){
			$this->error('请输入商家地址');exit;
		}
		if(empty($price)){
			$this->error('请输入产品价格');exit;
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
		$data['m_name']  = $m_name;
		$data['shopname']  = $shopname;
		$data['shopaddress']  = $shopaddress;
		$data['price']  = $price;
		
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$data['fenxiaoshang_userid'] = $_SESSION['wgcadmininfo']['fenxiaoshang_userid'];
			}
		}

		$getId = M('chanpingtuijian')->add($data);
		if($getId){
			
			$this->redirect('Headline/index_cls');
		}else{
			$this->error('发布失败');exit;
		}
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
  
  //更新产品推荐编辑列表数据
  public function bianjis_cls(){
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
		
		$m_name = I('post.m_name'); 
		$shopname = I('post.shopname'); 
		$shopaddress = I('post.shopaddress'); 
		$price = I('post.price'); 
		$id    = I('post.id'); 
		$describe = I('post.describe');
		$content = I('post.content');
		$type = I('post.type');
		
		$data['m_name']    =  $m_name;
		$data['shopname']    =  $shopname;
		$data['shopaddress']    =  $shopaddress;
		$data['price']    =  $price;
		$data['content']  =  $content;
		$data['pic']      =  $pic;
		$data['describe'] =  $describe;
		$data['type']     =  $type;

	   $chanpingtuijian = M('chanpingtuijian')->where(array('id'=>$id))->save($data);
		
	  if($chanpingtuijian){
		    $this->success('数据更新成功'); 
	  }else{
		    $this->error('更新失败');exit;  
	  }  
	  
  }
  
	//删除头条
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
	
	//删除产品推荐
	public function del_cls(){
		header("Content-type: text/html; charset=utf-8"); 
		$id = I('id');
		if(M('chanpingtuijian') -> delete($id)){
			$data = array(
				'status' => 1,
				'title'  => 'ok'
			);
			$this->ajaxReturn($data,'json');
		}
	}
}