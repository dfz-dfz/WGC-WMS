<?php

//积分
namespace Admin\Controller;

use Think\Controller;

class SysreplayController extends CommonController {
	//回复
	public function Replay(){
		if(!IS_POST){die('404');}
		$sys_id = I('post.sys_id','0');
		$userid = I('post.userid','0');
		$content = I('post.content',NULL);
		$pic = I('post.pic',NULL);
		
		$data=array(
			'sys_id'=> $sys_id,
			'userid'=> $userid,
			'content'=> $content,
			'pic'=> $pic,
			'addtime'=>time()
		);
		$id=M('sysreplay')->add($data);
		if($id){
			$res=array();
			$res["code"]=200;
			$res["message"]=$content;
			echo json_encode($res);die;
		}else{
			$res=array();
			$res["code"]=202;
			$res["message"]='回复出错！';
			echo json_encode($res);die;
		}
	}
	//获取用户对应的所有评论（项目、用户）
	public function getAllList(){
		if(!IS_POST){die('404');}
		$where=array(
			'act_id'=> I('post.user_id'),
			'ptype'=>I('post.ptype')
			
		);
		$page=I('post.page',1,'intval');
		$list=D('DiscussView')->where($where)->page($page,P_COUNT)->order('id desc')->select();
		//获取评论项目名称
		$ptype=I('post.ptype',1,'intval');
		switch($ptype){
			case 1:
				foreach($list as $key=>$row){
					$pname=M('project')->where(array('prj_id'=>$row['pas_id']))->getField('prj_name');
					$list[$key]['pname']=$pname;
				}
				break;
			default:
				foreach($list as $key=>$row){
					//切割图片
					$pic=$row['pic'];
					if(!empty($pic)){
						$imgarr=explode(",",$pic);
						$list[$key]['pic']=$imgarr; 
					}else{
						$list[$key]['pic']=array(); 
					}
					//获取评论人的姓名、职位、头像 
					$pas_id=$row['pas_id'];
					$uinfo=getuinf($pas_id);
					$list[$key]['p_userphoto']=$uinfo[0]['userphoto'];
					$list[$key]['p_name']=$uinfo[0]['name'];
					$list[$key]['p_zhiwei']=$uinfo[0]['zhiwei'];
					$pname=M('gongyingshang')->where(array('user_id'=>$row['act_id']))->getField('name');
					$list[$key]['pname']=$pname;
				}
				break;
		}
		if(!empty($list)){
			$res=array();
			$res["code"]=200;
			$res["message"]=$list;
			echo json_encode($res);die;
		}else{
			$res=array();
			$res["code"]=202;
			$res["message"]='暂无评论';
			echo json_encode($res);die;
		}	
	}
	//获取评论列表
	public function getList(){
		if(!IS_POST){die('404');}
		$where=array(
			'sys_id'=> I('post.sys_id','0')
		);
		$page=I('post.page',1,'intval');
		$list=D('SysreplayView')->where($where)->page($page,P_COUNT)->order('id desc')->select();
		if(!empty($list)){
			$res=array();
			$res["code"]=200;
			$res["message"]=$list;
			echo json_encode($res);die;
		}else{
			$res=array();
			$res["code"]=202;
			$res["message"]='暂无回复';
			echo json_encode($res);die;
		}	
	}
}
