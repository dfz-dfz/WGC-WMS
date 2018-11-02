<?php
namespace Admin\Controller;
use Admin\Controller\InitController;
class CategoryController extends InitController {
    public function addcat(){
		@session_start();
		$wgcadmininfo = $_SESSION['wgcadmininfo'];
		$userid = $wgcadmininfo['user_id'];
		$getpid = I('get.pid',0,'intval');
		$dingjitree = $this->dingjitree();
		$this->assign('dingjitree',$dingjitree);
		if(IS_POST){
			$pid = I('post.pid','0');
			$catname = I('post.catname',NULL);
			$catname = trim($catname);
			$caticon = I('post.caticon',NULL);
			$m = I('post.ym',NULL);
			$c = I('post.yc',NULL);
			$a = I('post.ya',NULL);
			$display = I('post.display');
			if(empty($display) || !isset($display)){
				$display = 2;
			}else{
				$display = 1;
			}
			$orderlist = I('post.orderlist',0,'intval');
			//$rolelist = I('post.rolelist',NULL);
			$storeid = I('post.storeid','b65e2727ec76202a16d7fd77dfa8a2de');
			//同级栏目不能重名
			$rename = M('category')->where(array('catname'=>array('eq',$catname),'pid'=>$pid,'storeid'=>$storeid))->find();
			if(!empty($rename)){
				$data = array('code'=>4,'message'=>'栏目不能重名！');
				$this->ajaxReturn($data,'JSON');die;
			}else{
				$data = array(
					'pid' => $pid,
					'userid' => $userid,
					'catname' => $catname,
					'caticon' => $caticon,
					'm' => $m,
					'c' => $c,
					'a' => $a,
					'display' => $display,
					'orderlist' => $orderlist,
					//'rolelist' => $rolelist,
					'today' => date('Y.m.d',time()),
					'addtime' => time(),
					'storeid' => $storeid
				);
				$id = M('category')->add($data);
				if($id){
					$data = array('code'=>6,'message'=>'添加成功！');
					$this->ajaxReturn($data,'JSON');die;
				}else{
					$data = array('code'=>5,'message'=>'添加失败！');
					$this->ajaxReturn($data,'JSON');die;
				}
			}
		}else{
			$this->assign('getpid',$getpid);
			$this->display('addcat');
		}
		
    }
	//修改栏目
	public function editcat(){
		@session_start();
		$wgcadmininfo = $_SESSION['wgcadmininfo'];
		$userid = $wgcadmininfo['user_id'];
		if(IS_POST){
			$id = I('post.id','0');
			$pid = I('post.pid','0');
			$catname = I('post.catname',NULL);
			$catname = trim($catname);
			$caticon = I('post.caticon',NULL);
			$m = I('post.ym',NULL);
			$c = I('post.yc',NULL);
			$a = I('post.ya',NULL);
			$display = I('post.display');
			if(empty($display) || !isset($display)){
				$display = 2;
			}
			$orderlist = I('post.orderlist',0,'intval');
			//$rolelist = I('post.rolelist',NULL);
			$storeid = I('post.storeid','b65e2727ec76202a16d7fd77dfa8a2de');
			//同级栏目不能重名
			$rename = M('category')->where(array('catname'=>array('eq',$catname),'pid'=>$pid,'storeid'=>$storeid))->find();
			if(!empty($rename)){
				$data = array('code'=>7,'message'=>'栏目不能重名！');
				$this->ajaxReturn($data,'JSON');die;
			}else{
				$data = array(
					'pid' => $pid,
					'userid' => $userid,
					'catname' => $catname,
					'caticon' => $caticon,
					'm' => $m,
					'c' => $c,
					'a' => $a,
					'display' => $display,
					'orderlist' => $orderlist,
					//'rolelist' => $rolelist,
					'today' => date('Y.m.d',time()),
					'addtime' => time(),
					'storeid' => $storeid
				);
				$res = M('category')->where(array('id'=>$id))->setField($data);
				if($res){
					$data = array('code'=>9,'message'=>'修改成功！');
					$this->ajaxReturn($data,'JSON');die;
				}else{
					$data = array('code'=>8,'message'=>'修改失败或数据不受影响！');
					$this->ajaxReturn($data,'JSON');die;
				}
			}
		}else{
			$id = I('get.id');
			$dingjitree = $this->dingjitree();
			$this->assign('dingjitree',$dingjitree);
			//获取栏目信息
			$info = M('category')->where(array('id'=>$id))->find();
			$this->assign('info',$info);
			$this->display('editcat');
		}
		
	}
	//获取栏目列表
	public function getList($display=1){
		@session_start();
		$wgcadmininfo = $_SESSION["wgcadmininfo"];
		$storeid = $wgcadmininfo['storeid'];
		$catlist = array();
		if(empty($display)){
			$catlist = M('category')->field('id,pid,catname,caticon,m,c,a,orderlist')->where(array('storeid'=>$storeid))->select();
		}else{
			$catlist = M('category')->field('id,pid,catname,caticon,m,c,a,orderlist')->where(array('display'=>$display,'storeid'=>$storeid))->select();
		}
		
		if(!empty($catlist)){
			$catlist = $this->getTree($catlist,0,0);
		}
		return $catlist;
	}
	//获取栏目列表
	public function tree(){
		$catlist = $this->getList(null);
		$this->assign('catlist',$catlist);
		$this->display('tree');
	}
	//获取顶级栏目
	public function dingjitree(){
		@session_start();
		$wgcadmininfo = $_SESSION["wgcadmininfo"];
		$storeid = $wgcadmininfo['storeid'];
		$catlist = M('category')->field('id,catname')->where(array('storeid'=>$storeid,'pid'=>0))->select();
		return $catlist;
	}
	//删除指定栏目及其子栏目
	public function delcat(){
		$id = I('get.id');
		$res = $this->zigong($id);
		if($res){
			$this->redirect('Admin/Category/tree', array(), 1, '删除成功...');
		}else{
			$this->redirect('Admin/Category/tree', array(), 1, '删除失败...');
		}
	}
	//自宫
	public function zigong($id){
		//看看是否存在子栏目
		$ids = M('category')->where(array('pid'=>$id))->getField('id',true);
		if(!empty($ids)){
			foreach($ids as $key=>$val){
				$this->zigong($val);
			}
		}
		$res = M('category')->where(array('id'=>$id))->delete();
		return $res;
	}
	/**
	 * 无限极分类树 getTree($categories)
	 * @param array $data
	 * @param int $parent_id
	 * @param int $level
	 * @return array
	 */
	public function getTree($data = array(), $pid = 0, $level = 0)
	{
		$tree = array();
		if ($data && is_array($data)) {
			foreach ($data as $v) {
				if ($v['pid'] == $pid) {
					$tree[] = array(
						'id' => $v['id'],
						'pid' => $v['pid'],
						'level' => $level,
						'catname' => $v['catname'],
						'caticon' => $v['caticon'],
						'm' => $v['m'],
						'c' => $v['c'],
						'a' => $v['a'],
						'orderlist' => $v['orderlist'],
						'children' => $this->getTree($data, $v['id'], $level + 1),
					);
				}
			}
		}
		return $tree;
	}
}