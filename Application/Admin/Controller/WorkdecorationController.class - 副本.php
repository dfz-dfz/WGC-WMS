<?php

//积分
namespace Admin\Controller;

use Think\Controller;

class WorkdecorationController extends CommonController{
	//家装列表
	public function getList(){
		$page = I('get.page',1,'intval');
		if($page == 0){
			$page = 1;
		}
		$where = array();
		$keyword = I('get.keyword',NULL);
		if(!empty($keyword) && ($keyword !== 'null')){
			$where['autoaddress'] = array(array('like','%'.$keyword.'%'),array('exp','is not null'),'and');
			$where['address'] = array(array('like','%'.$keyword.'%'),array('exp','is not null'),'and');
			$where['budget'] = array(array('like','%'.$keyword.'%'),array('exp','is not null'),'and');
			$where['jobsize'] = array(array('like','%'.$keyword.'%'),array('exp','is not null'),'and');
			$where['_logic'] = 'or';
		}
		$data = array();
		$rowcount = 0;
		if(!empty($where)){
			$rowcount = D('WorkdecorationView')->where($where)->count();
			//页码计算
			$pagecount = ceil($rowcount/20);
			if(($page >= $pagecount) && ($pagecount != 0)){
				$page = $pagecount;
				$_POST['page'] = $page;
			}
			$data = D('WorkdecorationView')->where($where)->page($page,20)->order('id desc')->select();
			$count = count($data);
			$all_count = D('WorkdecorationView')->where($where)->count();
		}else{
			$rowcount = D('WorkdecorationView')->count();
			//页码计算
			$pagecount = ceil($rowcount/20);
			if(($page >= $pagecount) && ($pagecount != 0)){
				$page = $pagecount;
				$_POST['page'] = $page;
			}
			$data = D('WorkdecorationView')->page($page,20)->order('id desc')->select();
			$count = count($data);
			$all_count = D('WorkdecorationView')->count();
		}
		//获取接受人名字
		$allname = '';
		foreach($data as $key=>$row){
			$rev_name = trim($row['rev_name'],',');
			$rev_name = explode(',',$rev_name);
			foreach($rev_name as $k=>$v){
				$name = D('MemGongyView')->where(array('member.user_id'=>$v))->getField('name');
				$allname .= $name.',';
			}
			$allname = trim($allname,',');
			$data[$key]['rev_name'] = $allname;
		}
		
		$this->assign('count',$count);
		$this->assign('all_count',$all_count);
		$this->assign('pagecount',$pagecount);
		$this->assign('page',$page);
		$this->assign('list',$data);
	    $this->display('list');
	}
	public function revlist(){
		$id = I('get.id',0,'intval');
		$this->assign('id',$id);
		$this->display('revlist');
	}
	//设置接受人
	public function setRevname(){
		if(!IS_POST){die('404');}
		$id = I('post.id',0,'intval');
		$mobile = I('post.mobile',NULL);
		$mobile = trim($mobile,',');
		if($id && $mobile){
			if($mobile !== 'null'){
				$rev_name = M('workdecoration')->where(array('id'=>$id))->getField('rev_name',$rev_name);
				$mobile = explode(',',$mobile);
				foreach($mobile as $key=>$user_name){
					$user_id = D('MemGongyView')->where(array('user_name'=>$user_name))->getField('user_id');
					if(empty($rev_name) && !empty($user_id)){
						$rev_name = ','.$user_id.',';
						//设置回复权限
						$d = array(
							'workid' => $id,
							'user_id' => $user_id,
							'powers' => 0
						);
						M('workdecorationpower')->add($d);
					}else if(!empty($user_id)){
						$rev_name .=$user_id.',';
					}else{
						$rev_name = NULL;
					}
				}
				
				M('workdecoration')->where(array('id'=>$id))->setField('rev_name',$rev_name);
				$res = array(
					'code' => 200,
					'message' => '设置成功！'
				);
				$this->ajaxReturn($res,'json');
			}else{
				$res = array(
					'code' => 202,
					'message' => '接收人不能为空！'
				);
				$this->ajaxReturn($res,'json');
			}
		}else{
			$res = array(
				'code' => 202,
				'message' => '参数非法！'
			);
			$this->ajaxReturn($res,'json');
		}
	}
	//赋予权限
	public function setpower(){
		$workid = I('post.workid',0,'intval');
		$user_id = I('post.user_id','0');
		$ret = M('workdecorationpower')->where(array('workid'=>$workid,'user_id'=>$user_id))->setField('powers',1);
		if($ret === false){
			$res = array(
				'code' => 202,
				'message' => '设置失败！'
			);
			$this->ajaxReturn($res,'json');
		}else{
			$res = array(
				'code' => 200,
				'message' => '设置成功！'
			);
			$this->ajaxReturn($res,'json');
		}
	}
	//详情
	public function getDetail(){
		 @session_start();
		$wgcadmininfo = $_SESSION["wgcadmininfo"];
		$userid = $wgcadmininfo['user_id'];
		$id = I('get.id',0,'intval');
		$info = D('WorkdecorationView')->where(array('id'=>$id))->find();
		if(!empty($info)){
			$rev_name = M('workdecoration')->where(array('id'=>$id))->getField('rev_name',$rev_name);
			$rev_name = trim($rev_name,',');
			$rev_name = explode(',',$rev_name);
			$allname = '';
			foreach($rev_name as $key=>$user_id){
				$name = D('MemGongyView')->where(array('user_id'=>$user_id))->getField('name');
				$name = trim($name);
				if(!empty($name)){
					$allname .= ','.$name;
				}
			}
			$info['rev_name'] = $allname;
			
			//回复列表
			$data = D('WorkdecorationreplyView')->where(array('jz_id'=>$info['id']))->order('id asc')->select();
			//按回话id分类回复
			$hh_idarr = D('WorkdecorationreplyView')->distinct(true)->where(array('jz_id'=>$info['id']))->getField('hh_id',true);
			$mans = array();
			foreach($hh_idarr as $hk=>$hh_id){
				foreach($data as $k=>$r){
					if($hh_id === $r['hh_id']){
						$mans[$hk][]=$r;
					}
				}
				$mans[$hk] = $this->orderBypid($mans[$hk]);
			}
			//echo '<pre>';
			//print_r($mans);
			//echo '</pre>';die;
			$this->assign('userid',$userid);
			$this->assign('allman',$mans);
			$this->assign('info',$info);
			$this->display('info');
		}else{
			echo '暂无数据！';
		}
	}
	//家装回复
	//回复
	public function addhuifu(){
		$id = I('get.gzid',0,'intval');
		$pid = I('get.pid',0,'intval');
		$userid = I('get.userid',0,'intval');
		$time = date('Y-m-d H:i:s',time());
		$this->assign('time',$time);
		$this->assign('gzid',$id);
		$this->assign('pid',$pid);
		$this->assign('userid',$userid);
		$this->display('addhuifu');
	}
	//添加回复数据
	public function huifudata(){
		 @session_start();
		$wgcadmininfo = $_SESSION["wgcadmininfo"];
		$user_id = $wgcadmininfo['user_id'];
		$gzid = I('post.gzid',0,'intval');
		$pid = I('post.pid',0,'intval');
		$userid = I('post.userid','0');
		$content = I('post.content',NULL);
		$img = I('post.img',NULL);
		$hh_id = $gzid.$userid;
		$data = array(
		  'pid' => $pid,
		  'jz_id' => $gzid,
		  'hh_id' => $hh_id,
		  'user_id' => $user_id,
		  'img' => $img,
		  'content' => $content,
		  'addtime' => time()
		);
		$ids=M('jiazhreply')->add($data);
		if($ids){
			$this->redirect('Workdecoration/getDetail', array('id' => $gzid), 1, '回复成功...');die;
		}else{
			$this->redirect('Workdecoration/addhuifu', array('gzid' => $gzid ,'pid' => $pid ,'userid' => $userid), 1, '回复失败...');die;
		}
	}
	//根据父级id升序排列
	public function orderBypid($data,$pid=0){
		$returndata = array();
		foreach($data as $key=>$row){
			if($row['pid'] == $pid){
				$returndata[]=$row;
				$res = $this->orderBypid($data,$row['id']);
				if(!empty($res)){
					foreach($res as $k=>$v){
						$returndata[] = $v;
					}
				}
			}
		}
		return $returndata;
	}
}
