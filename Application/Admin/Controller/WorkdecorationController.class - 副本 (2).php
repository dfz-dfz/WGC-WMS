<?php

//积分
namespace Admin\Controller;

use Think\Controller;

class WorkdecorationController extends CommonController {
	//工装列表
	public function getList(){
		@session_start();
		$wgcadmininfo = $_SESSION["wgcadmininfo"];
		$operator = $wgcadmininfo['user_id'];
		$where = array();
		$where['operator']= array('like','%'.$operator.'%');
		$page = I('get.page',1,'intval');
		$nowpage = $page;
		$userid = '';
		$data = M('ecm_workdecoration')->alias('w')->join('ecm_gongyingshang g ON w.send_uid = g.user_id')->join('ecm_member m ON m.user_id = g.user_id')->field('w.*,g.name,m.user_name')->where($where)->order('w.id desc')->page($page,100)->select();
	    if($page == 0){
			$page = 1;
		}
		/*$where = array();
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
		}*/
		//获取对应的项目名称
		foreach($data as $kk=>$xm){
		    $p_id = $xm['p_id'];
			if($p_id >= 1){
				$data [$kk]['p_name'] = M('project')->where(array('prj_id'=>$p_id))->getField('prj_name');
			}
			//列出接收人，方便回复信息
			$rev_name = $xm['rev_name'];
			$rev_name = trim($rev_name,',');
			$rev_uids = explode(',',$rev_name);
			//获取对应的接收人
			$rev_name = array();
			foreach($rev_uids as $x=>$y){
				$name = M('gongyingshang')->where(array('user_id'=>$y))->getField('name');
				$rev_name[$y]=$name;
				if(!isset($data[$kk]['userid']) || empty($data[$kk]['userid'])){
					$data[$kk]['userid'] = $y;
				}else{
					$data[$kk]['userid'] = "";
				}
			}
			//维修信息的发布者
			$fabuid = $data[$kk]['user_id'];
			$fabuname = M('gongyingshang')->where(array('user_id'=>$fabuid))->getField('name');
			$rev_name[$fabuid] = $fabuname;
			
			$data[$kk]['rev_names'] = $rev_name;
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
		foreach($data as $key=>$row){
			$allname = '';
			$rev_name = trim($row['rev_name'],',');
			$rev_name = explode(',',$rev_name);
			foreach($rev_name as $k=>$v){
				$name = D('MemGongyView')->where(array('member.user_id'=>$v))->getField('name');
				$allname .= $name.',';
			}
			$allname = trim($allname,',');
			$data[$key]['rev_name'] = $allname;
			
			/*获取处理人*/
			$operator = $row['operator'];
			$allnameoperator = '';
			if(!empty($operator) && ($operator != 'null')){
				$operator = trim($operator,',');
				$arr = explode(",",$operator);
				foreach($arr as $k=>$uid){
					$uid = trim($uid);
					$name = M('gongyingshang')->where(array('user_id'=>$uid))->getField('name');
					$name = trim($name);
					if(!empty($name)){
						$allnameoperator.= ','.$name;
					}
				}
				$allnameoperator = trim($allnameoperator,',');
				$data[$key]['allnameoperator'] = $allnameoperator;
			}else{
				$data[$key]['allnameoperator'] = '';
			}
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
	public function huifu(){
		$id = I('get.id',0,'intval');
		$userid = I('get.userid','0');
		@session_start();
		$wgcadmininfo = $_SESSION["wgcadmininfo"];
		$user_id = $wgcadmininfo['user_id'];
		
		//$id = 5;
		//$userid = '1473404053';
		$info = M('workdecoration')->where(array('id'=>$id))->find();
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
			$uinf = getuinf($info['user_id']);
			$info['name'] = $uinf[0]['name'];
			$info['zhiwei'] = $uinf[0]['zhiwei'];
			$info['mobile'] = $uinf[0]['mobile'];
			$info['userphoto'] = $uinf[0]['userphoto'];
			$rev_uid = trim($info['rev_name'],',');
			$all = M('gongyingshang')->where(array('user_id'=>array('in',$rev_uid)))->field('name')->order('user_id desc')->select();
			$allname = '';
			foreach($all as $k => $v){
				$allname.=$v['name'].',';
			}
			$allname = trim($allname,',');
			$info['allname'] = $allname;
			
			$where = array();
			$where['weixiu_id'] = $info['id'];
			$where['send_uid|rev_uid'] =array(array('eq',$userid),array('eq',$userid),'_multi'=>true);
			$huifu = D('GongzhunagtransferView')->where($where)->order('id asc')->select();
			if(!empty($huifu)){
				foreach($huifu as $k2=>$r2){
					$evidence = $huifu[$k2]['evidence'];
					if(!empty($evidence) && ($evidence != 'null')){
						$img=explode(",",$evidence);
						$huifu[$k2]['evidence']=$img; 
					}else{
						$huifu[$k2]['evidence']=array(); 
					}
				}
			}
			$info['mans'] = $huifu;
			
		}
		//echo '<pre>';
		//print_r($info);die;
		$this->assign('userid',$userid);
		$this->assign('user_id',$user_id);
		$this->assign('info',$info);
		$this->display('huifu');
	}
	//回复
	public function addhuifu(){
		$id = I('get.id',0,'intval');
		$pid = I('get.pid',0,'intval');
		$rev_uid = I('get.rev_uid','0');
		$time = date('Y-m-d H:i:s',time());
		$this->assign('time',$time);
		$this->assign('id',$id);
		$this->assign('pid',$pid);
		$this->assign('rev_uid',$rev_uid);
		$this->display('addhuifu');
	}
	//添加回复数据
	public function huifudata(){
		 @session_start();
		$wgcadmininfo = $_SESSION["wgcadmininfo"];
		$user_id = $wgcadmininfo['user_id'];
		
		$weixiu_id = I('post.weixiu_id',0,'intval');
		$pid = I('post.pid',0,'intval');
		$send_uid = $user_id;
		$rev_uid = I('post.rev_uid','0');
		$content = I('post.content',NULL);
		$ps = I('post.ps',NULL);
		$tel = I('post.tel',NULL);
		$times = time();
		$address = I('post.address',NULL);
		$money = I('post.money',NULL);
		$evidence = I('post.evidence',NULL);
		
		$data = array(
		  'weixiu_id' => $weixiu_id,
		  'pid' => $pid,
		  'send_uid' => $send_uid,
		  'rev_uid' => $rev_uid,
		  'content' => $content,
		  'ps' => $ps,
		  'tel' => $tel,
		  'times' => $times,
		  'address' => $address,
		  'money' => $money,
		  'evidence' => $evidence
		);
		$ids=M('gongzhunagtransfer')->add($data);
		if($ids){
			//$url = 'http://59jiaju.com/manage/index.php/Admin/Weixiumsg/huifu/id/'.$id;
			//Header("Location:{$url}");  die;
			$this->redirect('Workdecoration/huifu', array('id' => $weixiu_id ,'userid' => $rev_uid), 1, '回复成功...');die;
		}else{
			//$url = 'http://59jiaju.com/manage/index.php/Admin/Weixiumsg/addhuifu/id/'.$id.'/type/'.$type;
			//Header("Location:{$url}");  die;
			$this->redirect('Workdecoration/huifu', array('id' => $weixiu_id , 'userid' => $rev_uid), 1,'回复失败...');die;
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