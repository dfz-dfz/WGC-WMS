<?php
//管理工具
namespace Admin\Controller;
use Think\Controller;
class XiangmuController extends CommonController {
	//项目管理
    public function xiangmu(){
		header("Content-type: text/html; charset=utf-8"); 
		$User = M('project'); // 实例化User对象
		
		//条件
		$key = I('post.key');
		if(IS_POST){
			$where['ptype'] = array('eq',1);
			$where['prj_name'] = array('like',"%$key%");
		}else{
			$where['ptype'] = array('eq',1);
		}
		
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			$where['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
		}
		
		
		//$where['fenxiaoshang_userid'] = array('eq',['fenxiaoshang_name']);
		
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($where)->order('prj_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		//获取创建人姓名
		foreach($list as $k=>$y){
			$list[$k]['uname'] = M('gongyingshang')->where(array('user_id'=>$y['user_id']))->getField('name');
			$list[$k]['status'] = $y['status']==2?'<span class="label label-success radius">进行中</span>':'<i style="color:red;">已完成</i>';
		}
		$this->assign('list',$list);// 赋值数据集
		$this->assign('count',$count);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('key',$key);// 赋值分页输出
		$this->display();
    }
	
	//维修管理
	public function weixiu(){  //1473404052
		header("Content-type: text/html; charset=utf-8"); 
		$User = M('project'); // 实例化User对象
		
		//条件
		$key = I('post.key');
		if(IS_POST){
			$where['ptype'] = array('eq',2);
			$where['prj_name'] = array('like',"%$key%");
		}else{
			$where['ptype'] = array('eq',2);
		}
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			$where['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
		}
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($where)->order('prj_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		//获取创建人姓名
		foreach($list as $k=>$y){
			$list[$k]['uname'] = M('gongyingshang')->where(array('user_id'=>$y['user_id']))->getField('name');
			$list[$k]['status'] = $y['status']==2?'<span class="label label-success radius">进行中</span>':'<i style="color:red;">已完成</i>';
		}
		$this->assign('list',$list);// 赋值数据集
		$this->assign('count',$count);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('key',$key);// 赋值分页输出
		$this->display();
    }
	
	//内部管理
	public function neibu(){  //1473404052
		header("Content-type: text/html; charset=utf-8"); 
		$User = M('internal_management'); // 实例化User对象
		
		
		//条件
		$key = I('post.key');
		if(IS_POST){
			$where['mtype'] = array('eq',1);
			$where['name'] = array('like',"%$key%");
		}else{
			$where['mtype'] = array('eq',1);
		}
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			$where['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
		}
		
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		//获取创建人姓名
		foreach($list as $k=>$y){
			$list[$k]['uname'] = M('gongyingshang')->where(array('user_id'=>$y['user_id']))->getField('name');
			$list[$k]['status'] = $y['status']==2?'<span class="label label-success radius">进行中</span>':'<i style="color:red;">已完成</i>';
		}
		$this->assign('list',$list);// 赋值数据集
		$this->assign('count',$count);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('key',$key);// 赋值分页输出
		$this->display();
    }
	
	//编辑内部视图
	public function neibu_bianji(){  //1473404052
		header("Content-type: text/html; charset=utf-8"); 
		$id = I('id');
		$User = M('internal_management'); // 实例化User对象
		
		$list = $User->where('id='.$id.'')->find();
		$this->assign('list',$list);// 赋值数据集
		$this->display();
    }
	//编辑内部控制器
	public function neibu_saveForm(){  //1473404052
		header("Content-type: text/html; charset=utf-8"); 
		$id  = I('id'); 
		$User = M('internal_management'); // 实例化User对象
		
		
		$list = $User->where('id='.$id.'')->setField('name',I('name'));
		
		if($list){
			$this->redirect("Xiangmu/neibu");
			//header('Loction:');
		}else{
			$this->error('修改失败');exit;
		}
		
    }
	//编辑项目视图
	public function bianji(){  //1473404052
		header("Content-type: text/html; charset=utf-8"); 
		$id = I('id');
		$kzq = I('kzq');
		$User = M('project'); // 实例化User对象
		
		$list = $User->where('prj_id='.$id.'')->find();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('kzq',$kzq);
		$this->display();
    }
	
	
	//编辑项目控制器
	public function saveForm(){  //1473404052
		header("Content-type: text/html; charset=utf-8"); 
		$id  = I('prj_id'); 
		$kzq  = I('kzq'); 
		$User = M('project'); // 实例化User对象
		//var_dump($id);exit;
		$data['prj_name'] = I('prj_name');
		$data['start_time'] = I('start_time');
		$data['expire_time'] = I('expire_time');
		$data['status'] = I('status');
		$list = $User->where('prj_id='.$id.'')->data($data)->save();
		
		if($list){
			$this->redirect("Xiangmu/{$kzq}");
			//header('Loction:');
		}else{
			$this->error('修改失败');exit;
		}
		
    }
	
	//项目管理-签到
	public function xiangmu_qiandao(){
		if(!IS_GET){die('404');}
		$User = M('qiandao');// 实例化User对象
		$kid = I('kid');
		
		$where['kid'] = array('eq',$kid);
		
		
		
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($where)->order('addtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		foreach($list as $k=>$v){
			//获取项目创建人
			$project = M('project')->where(array('prj_id'=>$v['kid'])) -> find(); // 实例化User对象
			$gongyingshang = M('gongyingshang')->where(array('user_id'=>$project['user_id'])) -> find(); // 实例化User对象
			$list[$k]['prj_name'] = $project['prj_name'];
			$list[$k]['prj_id'] = $project['prj_id'];
			$list[$k]['addtime'] = date('Y-m-d',$v['addtime']);
			$list[$k]['uname'] = $gongyingshang['name'];
			//获取签到人
			$list[$k]['jsr'] = M('gongyingshang')->where(array('user_id'=>$v['uid'])) -> getField('name'); // 实例化User对象
		
			//获取接收人
			$list[$k]['username'] = '';
			$uw['user_id'] = array('in',trim($v['power'],','));
			
			$us = M('gongyingshang')->where($uw) ->field('name') -> select(); // 实例化User对象
			foreach($us as $j=>$b){
				$list[$k]['username'] .= $b['name'].",";
			}
			$list[$k]['username'] = trim($list[$k]['username'],',');
		}
		
		$this->assign('count',$count);// 赋值数据集
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
		
		
	}
	
	//内部管理-通知
	public function neibu_tongzhi(){
		if(!IS_GET){die('404');}
		$User = M('notify');// 实例化User对象
		$kid = I('kid');
		
		$where['intermid'] = array('eq',$kid);
		
		
		
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($where)->order('addtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
	
		foreach($list as $k=>$v){
			//获取项目创建人
			
			$gongyingshang = M('gongyingshang')->where(array('user_id'=>$v['user_id'])) ->field('name') -> find(); // 实例化User对象
			$member        = M('member')->where(array('user_id'=>$v['user_id'])) ->field('userphoto') -> find(); // 实例化User对象
			
			$list[$k]['addtime'] 	= date('Y-m-d H:i:s',$v['addtime']);
			$list[$k]['uname'] 		= $gongyingshang['name'];
			$list[$k]['userphoto'] 	= $member['userphoto'];
			//获取签到人
			$list[$k]['jsr'] = M('gongyingshang')->where(array('user_id'=>$v['uid'])) -> getField('name'); // 实例化User对象
			//分割图片
			$list[$k]['pic']='';
			$img = trim($v['img'],',');
			if(!empty($img)){
				$arr=explode(",",$img);
				foreach($arr as $g=>$s){
					$list[$k]['pic'] .= "<a title='点击查看图片' href='http://wgcapp.59jiaju.com".$s."' target='_blank'><img src='http://wgcapp.59jiaju.com".$s."' style='margin:5px;width:80px;height:80px;'/></a>";
				}
				
			}
			
		}
		
		
		$this->assign('count',$count);// 赋值数据集
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
		
		
	}
	
	//内部管理--删除-通知
	public function nebu_tongzhi_del(){
		if(!IS_GET){die('404');}
		$User  = M('notify');
		$id = I('get.id',0,'intval');
		
		$url = I('server.HTTP_REFERER'); //$_SERVER['HTTP_REFERER']
		
		//条件
		
		$where['id']   = array('eq',$id);
		if($User->where($where)->delete()){
			 $this->success('删除成功', $url);
		}else{
			$this->error('删除失败！');
		}
		
		
	}
	
	//内部管理-签到
	public function neibu_qiandao(){
		if(!IS_GET){die('404');}
		$User = M('qiandaoforinter');// 实例化User对象
		$kid = I('kid');
		
		$where['kid'] = array('eq',$kid);
		
		
		
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($where)->order('addtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		foreach($list as $k=>$v){
			//获取项目创建人
			$project = M('project')->where(array('prj_id'=>$v['kid'])) -> find(); // 实例化User对象
			$gongyingshang = M('gongyingshang')->where(array('user_id'=>$project['user_id'])) -> find(); // 实例化User对象
			$list[$k]['prj_name'] = $project['prj_name'];
			$list[$k]['prj_id'] = $project['prj_id'];
			$list[$k]['addtime'] = date('Y-m-d',$v['addtime']);
			$list[$k]['uname'] = $gongyingshang['name'];
			//获取签到人
			$list[$k]['jsr'] = M('gongyingshang')->where(array('user_id'=>$v['uid'])) -> getField('name'); // 实例化User对象
		
			//获取接收人
			$list[$k]['username'] = '';
			$uw['user_id'] = array('in',trim($v['power'],','));
			
			$us = M('gongyingshang')->where($uw) ->field('name') -> select(); // 实例化User对象
			foreach($us as $j=>$b){
				$list[$k]['username'] .= $b['name'].",";
			}
			$list[$k]['username'] = trim($list[$k]['username'],',');
		}
		
		$this->assign('count',$count);// 赋值数据集
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
		
		
	}
	//内部管理--删除-签到
	public function nebu_qiandao_del(){
		if(!IS_GET){die('404');}
		$User  = M('qiandaoforinter');
		$id = I('get.id',0,'intval');
		
		$url = I('server.HTTP_REFERER'); //$_SERVER['HTTP_REFERER']
		
		//条件
		
		$where['id']   = array('eq',$id);
		if($User->where($where)->delete()){
			 $this->success('删除成功', $url);
		}else{
			$this->error('删除失败！');
		}
		
		
	}
	
	//内部管理--报销-请款-列表
    public function neibu_baoxiao(){
		header("Content-type: text/html; charset=utf-8");
		$forinter = M('qingkuan');
	
		$type = I('type',1,'intval');
		$kid = I('kid',0,'intval');
		
		
		
		
		$where['type'] = array('eq',($type==1)?'报销':'请款');
		$where['p_id'] = array('eq',$kid);
		
		//内部考勤
		
		 
		$count      = $forinter->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $forinter->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		
		foreach($list as $k=>$v){
			$user = M('gongyingshang') -> where(array('user_id'=>$v['ask_uid'])) -> field('name,sex,zhiwei,mobile') -> find();
			$list[$k]['name']   = $user['name'];
			$list[$k]['sex']    = $user['sex'];
			$list[$k]['zhiwei'] = $user['zhiwei'];
			$list[$k]['mobile'] = $user['mobile'];
			$w['user_id'] = array('in',trim($v['rev_uid'],','));
			$rev = M('gongyingshang') -> where($w) -> field('name') -> select();
			$list[$k]['rev_uid'] = '';
			foreach($rev as $d=>$w){
				$list[$k]['rev_uid'] .= $w['name'].'-';
			}
			$list[$k]['rev_uid'] = trim($list[$k]['rev_uid'],'-');
			$list[$k]['pic']    = "";
			if(!empty($v['pic'])){
				$pic = explode(',',$v['pic']);
				if(count($pic)>1){
					
					foreach($pic as $a){
						$list[$k]['pic'] .= "<a href='http://wgcapp.59jiaju.com{$a}' target='_blank'> <img style='width:32px;height:32px;margin:3px' src='http://wgcapp.59jiaju.com{$a}'/></a>";
					}
					
				}else{
					$list[$k]['pic'] .= "<a href='http://wgcapp.59jiaju.com{$v['pic']}' target='_blank'> <img style='width:32px;height:32px;margin:3px' src='http://wgcapp.59jiaju.com{$v['pic']}'/></a>";
				}
				
			}
			
			//审批结果
			
			$leavestu = M('leavestu') -> where(array('leaveid'=>$v['id'])) -> field('deal') -> find();
			$list[$k]['deal']   = ($leavestu['deal']==1)?'同意':'未处理';
		}
	
		$mb = ($type == 1)?'neibu_baoxiao':'neibu_qingkuan';
		
		$this->assign('count',$count);// 赋值数据集
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display($mb);
    }
	
	//内部管理--外出-列表
	public function neibu_waichu(){
		header("Content-type: text/html; charset=utf-8");
		$go_out = M('go_out');
	
		$kid = I('kid',0,'intval');
		
		$where['intermid'] = array('eq',$kid);
		
		
		//内部考勤
		$count      = $go_out->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $go_out->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		
		
		foreach($list as $k=>$v){
			$user = M('gongyingshang') -> where(array('user_id'=>$v['user_id'])) -> field('name,sex,zhiwei,mobile') -> find();
			$list[$k]['name']   = $user['name'];
			$list[$k]['sex']    = $user['sex'];
			$list[$k]['zhiwei'] = $user['zhiwei'];
			$list[$k]['mobile'] = $user['mobile'];
			
			//获取接收人
			$list[$k]['username'] = '';
			$uw['user_id'] = array('in',trim($v['rev_id'],','));
			
			$us = M('gongyingshang')->where($uw) ->field('name') -> select(); // 实例化User对象
			foreach($us as $j=>$b){
				$list[$k]['username'] .= $b['name'].",";
			}
			$list[$k]['username'] = trim($list[$k]['username'],',');
			
			//分割图片
			$list[$k]['pic']='';
			$img = trim($v['img'],',');
			if(!empty($img)){
				$arr=explode(",",$img);
				foreach($arr as $g=>$s){
					$list[$k]['pic'] .= "<a title='点击查看图片' href='http://wgcapp.59jiaju.com".$s."' target='_blank'><img src='http://wgcapp.59jiaju.com".$s."' style='margin:5px;width:32px;height:32px;'/></a>";
				}
				
			}
			
			//审批结果
			
			$leavestu = M('leavestu') -> where(array('leaveid'=>$v['id'])) -> field('deal') -> find();
			$list[$k]['deal']   = ($leavestu['deal']==1)?'同意':'未处理';
		}
		
		
		
		
		$this->assign('count',$count);// 赋值数据集
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
    }
	
	//内部管理--请假-列表
	public function neibu_qingjia(){
		header("Content-type: text/html; charset=utf-8");
		$forinter = M('leaves');
		
		$kid = I('kid',0,'intval');
		
		$where['intermid'] = array('eq',$kid);
		
		
		//内部考勤
		$count      = $forinter->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $forinter->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		
		foreach($list as $k=>$v){
			$user = M('gongyingshang') -> where(array('user_id'=>$v['user_id'])) -> field('name,sex,zhiwei,mobile') -> find();
			$list[$k]['name']   = $user['name'];
			$list[$k]['sex']    = $user['sex'];
			$list[$k]['zhiwei'] = $user['zhiwei'];
			$list[$k]['mobile'] = $user['mobile'];
			
			//获取接收人
			$list[$k]['username'] = '';
			$uw['user_id'] = array('in',trim($v['rev_id'],','));
			
			$us = M('gongyingshang')->where($uw) ->field('name') -> select(); // 实例化User对象
			foreach($us as $j=>$b){
				$list[$k]['username'] .= $b['name'].",";
			}
			$list[$k]['username'] = trim($list[$k]['username'],',');
			
			//分割图片
			$list[$k]['pic']='';
			$img = trim($v['img'],',');
			if(!empty($img)){
				$arr=explode(",",$img);
				foreach($arr as $g=>$s){
					$list[$k]['pic'] .= "<a title='点击查看图片' href='http://wgcapp.59jiaju.com".$s."' target='_blank'><img src='http://wgcapp.59jiaju.com".$s."' style='margin:5px;width:32px;height:32px;'/></a>";
				}
				
			}
			
			
			//审批结果
			
			$leavestu = M('leavestu') -> where(array('leaveid'=>$v['id'])) -> field('deal') -> find();
			$list[$k]['deal']   = ($leavestu['deal']==1)?'同意':'未处理';
		}
		
		
		
		$this->assign('count',$count);// 赋值数据集
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
    }
	
	//内部管理-采购
	public function neibu_caigou(){
		if(!IS_GET){die('404');}
		$User = M('Purchasei');
		$p_id=I('get.kid',0,'intval');
		
		
		
		//查询条件
		
		$where['p_id'] = array('eq',$p_id);
		//$where['type'] = array('eq',$type);
		
		
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		foreach($list as $k=>$v){
			//获取项目创建人
			$project = M('project')->where(array('prj_id'=>$v['p_id'])) -> find(); // 实例化User对象
			$gongyingshang = M('gongyingshang')->where(array('user_id'=>$project['user_id'])) -> find(); // 实例化User对象
			$list[$k]['prj_name'] = $project['prj_name'];
			$list[$k]['prj_id'] = $project['prj_id'];
			$list[$k]['addtime'] = date('Y-m-d H:i:s',$v['addtime']);
			$list[$k]['uname'] = $gongyingshang['name'];
			//获取发布人
			$list[$k]['jsr'] = M('gongyingshang')->where(array('user_id'=>$v['user_id'])) -> getField('name'); // 实例化User对象
		
			//获取接收人
			$list[$k]['username'] = '';
			$uw['user_id'] = array('in',trim($v['rev_uid'],','));
			
			$us = M('gongyingshang')->where($uw) ->field('name') -> select(); // 实例化User对象
			foreach($us as $j=>$b){
				$list[$k]['username'] .= $b['name'].",";
			}
			$list[$k]['username'] = trim($list[$k]['username'],',');
			
		}
		
		
		
		
		$this->assign('count',$count);// 赋值数据集
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板*/
		
	}
	
	
	//内部管理-采购--详情
	public function neibu_caigou_content(){
		if(!IS_GET){die('404');}
		$User = M('Purchasei');
		
		
		$kid     = I('id',0,'intval');
		
		//查询条件
		$list = $User->where(array('id'=>$kid))->find();
		
		//获取项目创建人
		$project = M('project')->where(array('prj_id'=>$list['p_id'])) -> find(); // 实例化User对象
		$gongyingshang = M('gongyingshang')->where(array('user_id'=>$project['user_id'])) -> find(); // 实例化User对象
		$list['prj_name'] = $project['prj_name'];
		$list['prj_id'] = $project['prj_id'];
		$list['addtime'] = date('Y-m-d H:i:s',$list['addtime']);
		$list['uname'] = $gongyingshang['name'];
		//获取发布人
		$list['jsr'] = M('gongyingshang')->where(array('user_id'=>$list['ask_uid'])) -> getField('name'); // 实例化User对象
	
		//获取接收人
		$list['user_name'] = '';
		$uw['user_id'] = array('in',trim($list['rev_uid'],','));
		
		$us = M('gongyingshang')->where($uw) ->field('name') -> select(); // 实例化User对象
		foreach($us as $j=>$b){
			$list['user_name'] .= $b['name'].",";
		}
		$list['user_name'] = trim($list['user_name'],',');
		
		//分割图片
		$list['Photo']='';
		$UserPhoto = trim($list['pic'],',');
		if(!empty($UserPhoto)){
			
			$arr=explode(",",$list['pic']);
			foreach($arr as $g=>$s){
				$list['Photo'] .= "<a title='点击查看图片' href='http://wgcapp.59jiaju.com".$s."' target='_blank'><img src='http://wgcapp.59jiaju.com".$s."' style='border:1px solid #999;margin:5px;width:120px;height:120px;'/></a>";
			}
			
		}else{
			$list['Photo']='暂无图片';
		}
		
		
		
		
		
		
		//获取对应语音信息
		
		/*$list['vo_path']='';
		$list['vo_addtime']='';
		$ret = $us = M('voice')->where(array('f_id'=>$list['id'])) ->order('id desc')->field('v_path,addtime')->select(); // 实例化User对象;
		foreach($ret as $k=>$v){
			$list['vo_path']    = $v['v_path'];
			$list['vo_addtime'] = $v['addtime'];
		}*/
		
		//获取回复
		$retData=M('replypurchase')->where(array('pu_id'=>$kid))->order('id desc')->select();
		
		foreach($retData as $k=>$v){
			
			//获取回复人
			$huser = M('gongyingshang')->where(array('user_id'=>$v['u_id']))->field('name') -> find(); // 实例化User对象
			$member = M('member')->where(array('user_id'=>$v['u_id']))->field('userphoto') -> find(); // 实例化User对象
			
			$retData[$k]['name']      	= $huser['name'];
			$retData[$k]['userphoto'] 	= $member['userphoto'];
			//分割图片
			$retData[$k]['pic']='';
			$UserPhoto = trim($v['reply_photo'],',');
			if(!empty($UserPhoto)){
				
				$arr=explode(",",$v['reply_photo']);
				foreach($arr as $g=>$s){
					$retData[$k]['pic'] .= "<a title='点击查看图片' href='http://wgcapp.59jiaju.com".$s."' target='_blank'><img src='http://wgcapp.59jiaju.com".$s."' style='margin:5px;width:120px;height:120px;'/></a>";
				}
				
			}
		}
		
		
		$this->assign('retData',$retData);// 赋值数据集
		$this->assign('list',$list);// 赋值数据集
		$this->display(); // 输出模板*/
		
	}
	
	//内部管理--删除-通知
	public function nebu_caigou_del(){
		if(!IS_GET){die('404');}
		$User  = M('Purchasei');
		$id = I('get.id',0,'intval');
		
		$url = I('server.HTTP_REFERER'); //$_SERVER['HTTP_REFERER']
		
		//条件
		
		$where['id']   = array('eq',$id);
		if($User->where($where)->delete()){
			 $this->success('删除成功', $url);
		}else{
			$this->error('删除失败！');
		}
		
		
	}
	
	
	//内部管理--工作汇报-列表
	public function neibu_gongzuohuibao(){
		header("Content-type: text/html; charset=utf-8");
		$forinter = M('internal_reporting');
		
		$kid = I('kid',0,'intval');
		
		$where['p_id'] = array('eq',$kid);
		
		
		//内部考勤
		$count      = $forinter->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $forinter->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		
		foreach($list as $k=>$v){
			//获取项目创建人
			$project = M('internal_management')->where(array('id'=>$v['p_id'])) -> find(); // 实例化User对象
		
			$gongyingshang = M('gongyingshang')->where(array('user_id'=>$project['user_id'])) -> find(); // 实例化User对象
			$list[$k]['name'] = $project['name'];
			$list[$k]['prj_id'] = $project['id'];
			$list[$k]['addtime'] = date('Y-m-d H:i:s',$v['addtime']);
			$list[$k]['uname'] = $gongyingshang['name'];
			//获取签到人
			$list[$k]['jsr'] = M('gongyingshang')->where(array('user_id'=>$v['user_id'])) -> getField('name'); // 实例化User对象
		
			//获取接收人
			$list[$k]['username'] = '';
			$uw['user_id'] = array('in',trim($v['cell_username'],','));
			
			$us = M('gongyingshang')->where($uw) ->field('name') -> select(); // 实例化User对象
			foreach($us as $j=>$b){
				$list[$k]['username'] .= $b['name'].",";
			}
			$list[$k]['username'] = trim($list[$k]['username'],',');
			
			
			//分割图片
			$list[$k]['pic']='';
			$img = trim($v['pic'],',');
			if(!empty($img)){
				$arr=explode(",",$img);
				foreach($arr as $g=>$s){
					$list[$k]['pic'] .= "<a title='点击查看图片' href='http://wgcapp.59jiaju.com".$s."' target='_blank'><img src='http://wgcapp.59jiaju.com".$s."' style='margin:5px;width:80px;height:50px;'/></a>";
				}
				
			}
		
			
			
		}
		
		
		
		$this->assign('count',$count);// 赋值数据集
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
    }
	
	//内部管理--成员-列表
	public function neibu_user(){
		header("Content-type: text/html; charset=utf-8");
		$forinter = M('usertointernalmanagement');
		
		$kid = I('kid',0,'intval');
		
		$where['intermid'] = array('eq',$kid);
		
		//内部考勤
		$count      = $forinter->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $forinter->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->group('user_id')->select();
		
		
		foreach($list as $k=>$v){
			
		
			$member = M('member')->where(array('user_id'=>$v['user_id'])) ->field('user_name,email,userphoto') -> find(); // 实例化User对象
			$gongyingshang = M('gongyingshang')->where(array('user_id'=>$v['user_id'])) ->field('name,zhiwei') -> find(); // 实例化User对象
			$list[$k]['user_name'] = $member['user_name'];
			$list[$k]['email'] = $member['email'];
			$list[$k]['userphoto'] = $member['userphoto'];
			
			$list[$k]['name'] = $gongyingshang['name'];
			$list[$k]['zhiwei'] = (empty($gongyingshang['zhiwei']))?'未设置':$gongyingshang['zhiwei'];
			//$list[$k]['addtime'] = date('Y-m-d H:i:s',$v['addtime']);
			
			
		}
		
		//获取群主
		$new_id = M('internal_management') -> where(array('id'=>$kid)) -> find();
		
		$this->assign('new_id',$new_id);// 赋值数据集
		$this->assign('count',$count);// 赋值数据集
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
    }
	
	//内部管理--删除-工作汇报
	public function nebu_gongzuohuibao_del(){
		if(!IS_GET){die('404');}
		$User  = M('internal_reporting');
		$id = I('get.id',0,'intval');
		
		$url = I('server.HTTP_REFERER'); //$_SERVER['HTTP_REFERER']
		
		//条件
		
		$where['id']   = array('eq',$id);
		if($User->where($where)->delete()){
			 $this->success('删除成功', $url);
		}else{
			$this->error('删除失败！');
		}
	}
	
	
	//内部管理--删除-群成员
	public function nebu_user_del(){
		if(!IS_GET){die('404');}
		$User  = M('usertointernalmanagement');
		
		
		$group_id  = I('get.group_id',0,'intval');  //群id
		$user_id  = I('get.user_id',0,'intval');	//用户id
		$intermid  = I('get.intermid',0,'intval');	//用户id
	
		//移除融云群用户
		$rongRes = rongCloud_del_user($user_id,$group_id);
		if($rongRes){
			$url = I('server.HTTP_REFERER'); //$_SERVER['HTTP_REFERER']
			//条件
			$where['intermid']   = array('eq',$intermid);
			$where['user_id']   = array('eq',$user_id);
			if($User->where($where)->delete()){
				 $this->success('移除成功', $url);
			}else{
				$this->error('移除成员失败！');
			}
		}else{
			$this->error('移除成员失败！');
		}
		
	}
	
	//内部管理--删除-整个部门
	public function nebu_del(){
		if(!IS_GET){die('404');}
		$internal_management       = M('internal_management');
		$usertointernalmanagement  = M('usertointernalmanagement');
		
		$intermid  = I('get.intermid',0,'intval');	//项目id
	
		//获取群id
		$internal = $internal_management -> where(array('id'=>$intermid)) -> find();
		
		$group_id = $internal['group_id'];  //群id
		$user_id  = $internal['user_id'];	//用户id
		
		if($group_id < 1){
			$url = I('server.HTTP_REFERER'); //$_SERVER['HTTP_REFERER']
			//条件
			$where['intermid']   = array('eq',$intermid);
			$where['user_id']   = array('eq',$user_id);
			
			if($internal_management->where(array('id'=>$intermid))->delete()){
				
				$usertointernalmanagement->where(array('intermid'=>$intermid))->delete();
				 $this->success('删除成功', $url);
			}else{
				$this->error('删除失败！');
			}
		}else{
		
			//移除融云群用户
			$rongRes = rongCloud_groupDismiss($user_id,$group_id);
		
			if($rongRes){
				$url = I('server.HTTP_REFERER'); //$_SERVER['HTTP_REFERER']
				//条件
				$where['intermid']   = array('eq',$intermid);
				$where['user_id']   = array('eq',$user_id);
				
				if($usertointernalmanagement->where(array('intermid'=>$intermid))->delete()){
					$internal_management->where(array('id'=>$intermid))->delete();
					 $this->success('删除成功', $url);
				}else{
					$this->error('删除失败！');
				}
			}else{
				$this->error('删除失败！');
			}
		}
		
	}
	
	
	//项目管理--成员-列表
	public function xiangmu_user(){
		header("Content-type: text/html; charset=utf-8");
		$forinter = M('usertoproj');
		
		$kid = I('kid',0,'intval');
		
		$where['p_id'] = array('eq',$kid);
		
		//内部考勤
		$count      = $forinter->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $forinter->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->group('user_id')->select();
		
		
		foreach($list as $k=>$v){
			
		
			$member = M('member')->where(array('user_id'=>$v['user_id'])) ->field('user_name,email,userphoto') -> find(); // 实例化User对象
			$gongyingshang = M('gongyingshang')->where(array('user_id'=>$v['user_id'])) ->field('name,zhiwei') -> find(); // 实例化User对象
			$list[$k]['user_name'] = $member['user_name'];
			$list[$k]['email'] = $member['email'];
			$list[$k]['userphoto'] = $member['userphoto'];
			
			$list[$k]['name'] = $gongyingshang['name'];
			$list[$k]['zhiwei'] = (empty($gongyingshang['zhiwei']))?'未设置':$gongyingshang['zhiwei'];
			//$list[$k]['addtime'] = date('Y-m-d H:i:s',$v['addtime']);
			
			
		}
		
		//获取群主
		$new_id = M('project') -> where(array('prj_id'=>$kid)) -> find();
		
		$this->assign('new_id',$new_id);// 赋值数据集
		$this->assign('count',$count);// 赋值数据集
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
    }
	
	
	//项目管理--删除-群成员
	public function xiangmu_user_del(){
		if(!IS_GET){die('404');}
		$User  = M('usertoproj');
		
		
		$group_id  = I('get.group_id',0,'intval');  //群id
		$user_id  = I('get.user_id',0,'intval');	//用户id
		$p_id  = I('get.p_id',0,'intval');	//用户id

		//移除融云群用户
		$rongRes = rongCloud_del_user($user_id,$group_id);
		if($rongRes){
			$url = I('server.HTTP_REFERER'); //$_SERVER['HTTP_REFERER']
			//条件
			$where['p_id']   = array('eq',$p_id);
			$where['user_id']   = array('eq',$user_id);
			if($User->where($where)->delete()){
				 $this->success('移除成功', $url);
			}else{
				$this->error('移除成员失败！');
			}
		}else{
			$this->error('移除成员失败！');
		}
		
	}
	
	//项目管理--替换群主
	public function xiangmu_user_qz(){
		if(!IS_GET){die('404');}
		$User  = M('project');
		
		
		$group_id  = I('get.group_id',0,'intval');  //群id
		$user_id  = I('get.user_id',0,'intval');	//用户id
		$p_id  = I('get.p_id',0,'intval');	//用户id

		
		
		$url = I('server.HTTP_REFERER'); //$_SERVER['HTTP_REFERER']
		//条件
		$where['prj_id']   	 = array('eq',$p_id);
		$where['group_id']   = array('eq',$group_id);
		if($User->where($where)->setField('user_id',$user_id)){
			 $this->success('设置成功', $url);
		}else{
			$this->error('设置失败！');
		}
		
		
	}
	
	//内部管理--替换群主
	public function neibu_user_qz(){
		if(!IS_GET){die('404');}
		$User  = M('internal_management');
		
		
		$group_id  = I('get.group_id',0,'intval');  //群id
		$user_id  = I('get.user_id',0,'intval');	//用户id
		$intermid  = I('get.intermid',0,'intval');	//用户id

		
		//var_dump($_GET);exit;
		$url = I('server.HTTP_REFERER'); //$_SERVER['HTTP_REFERER']
		//条件
		$where['id']   	 	= array('eq',$intermid);
		$where['group_id']   = array('eq',$group_id);
		if($User->where($where)->setField('user_id',$user_id)){
			 $this->success('设置成功', $url);
		}else{
			$this->error('设置失败！');
		}
		
		
	}
	
	
	
	//项目管理--删除-整个部门
	public function xiangmu_del(){
		if(!IS_GET){die('404');}
		$project     = M('project');
		$usertoproj  = M('usertoproj');
		
		$prj_id  = I('get.prj_id',0,'intval');	//项目id
	
		//获取群id
		$internal = $project -> where(array('prj_id'=>$prj_id)) -> find();
		
		$group_id = $internal['group_id'];  //群id
		$user_id  = $internal['user_id'];	//用户id
		
		
		if($group_id < 1){
			$url = I('server.HTTP_REFERER'); //$_SERVER['HTTP_REFERER']
			//条件
			$where['p_id']      = array('eq',$p_id);
			$where['user_id']   = array('eq',$user_id);
			
			if($project->where(array('prj_id'=>$prj_id))->delete()){
				
				$usertoproj->where($where)->delete();
				 $this->success('删除成功', $url);
			}else{
				$this->error('删除失败！');
			}
		}else{
		
			//移除融云群用户
			$rongRes = rongCloud_groupDismiss($user_id,$group_id);
		
			if($rongRes){
				$url = I('server.HTTP_REFERER'); //$_SERVER['HTTP_REFERER']
				//条件
				$where['p_id']      = array('eq',$p_id);
				$where['user_id']   = array('eq',$user_id);
				
				if($project->where(array('prj_id'=>$prj_id))->delete()){
					$usertoproj->where($where)->delete();
					$this->success('删除成功', $url);
				}else{
					$this->error('删除失败！');
				}
			}else{
				$this->error('删除失败！');
			}
		}
		
	}
	
	
	//	//项目管理-进度列表
	public function xiangmu_jindu(){
		
		if(!IS_GET){die('404');}
		
		$User = M('huibao');
		
			
		$kid     	= I('kid',0,'intval');
		$type     	= I('type',0,'intval');
		
		if($type == 1){
			$types = '进度';
		}else if($type == 2){
			$types = '质检';
		}else if($type == 3){
			$types = '安训';
		}else if($type == 4){
			$types = '安检';
		}else if($type == 5){
			$types = '任务';
		}
		
		//查询条件
		
		$where['kid'] = array('eq',$kid);
		$where['types'] = array('eq',$type);
		
		
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		
		
		foreach($list as $k=>$v){
			//获取项目创建人
			$project = M('project')->where(array('prj_id'=>$v['kid'])) -> find(); // 实例化User对象
			$gongyingshang = M('gongyingshang')->where(array('user_id'=>$project['user_id'])) -> find(); // 实例化User对象
			$list[$k]['prj_name'] = $project['prj_name'];
			$list[$k]['prj_id'] = $project['prj_id'];
			$list[$k]['addtime'] = date('Y-m-d H:i:s',$v['addtime']);
			$list[$k]['uname'] = $gongyingshang['name'];
			//获取签到人
			$list[$k]['jsr'] = M('gongyingshang')->where(array('user_id'=>$v['uid'])) -> getField('name'); // 实例化User对象
		
			//获取接收人
			$list[$k]['username'] = '';
			$uw['user_id'] = array('in',trim($v['cell_username'],','));
			
			$us = M('gongyingshang')->where($uw) ->field('name') -> select(); // 实例化User对象
			foreach($us as $j=>$b){
				$list[$k]['username'] .= $b['name'].",";
			}
			$list[$k]['username'] = trim($list[$k]['username'],',');
			
			//分割图片
			/*$list[$k]['UserPhoto']='';
			$UserPhoto = trim($v['UserPhoto'],',');
			if(!empty($UserPhoto)){
				$arr=explode(",",$v['UserPhoto']);
				foreach($arr as $g=>$s){
					$list[$k]['UserPhoto'] .= "<a title='点击查看图片' href='http://wgcapp.59jiaju.com".$s."' target='_blank'><img src='http://wgcapp.59jiaju.com".$s."' style='margin:5px;width:32px;height:32px;'/></a>";
				}
				
			}*/
			
		}
		
		$this->assign('types',$types);// 赋值数据集
		$this->assign('count',$count);// 赋值数据集
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板*/
		
		
	}
	
	//项目管理-审批列表
	public function xiangmu_qingkuan(){
		if(!IS_GET){die('404');}
		
		$User = M('shenpi');
		$types   = I('type');
		$kid     = I('kid',0,'intval');
		if($types == 1){
			$type   = '请款';
		}else if($types == 2){
			$type   = '审批';
		}

		
		//查询条件
		
		$where['p_id'] = array('eq',$kid);
		$where['type'] = array('eq',$type);
		
		
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		foreach($list as $k=>$v){
			//获取项目创建人
			$project = M('project')->where(array('prj_id'=>$v['p_id'])) -> find(); // 实例化User对象
			$gongyingshang = M('gongyingshang')->where(array('user_id'=>$project['user_id'])) -> find(); // 实例化User对象
			$list[$k]['prj_name'] = $project['prj_name'];
			$list[$k]['prj_id'] = $project['prj_id'];
			$list[$k]['addtime'] = date('Y-m-d H:i:s',$v['asktime']);
			$list[$k]['uname'] = $gongyingshang['name'];
			//获取发布人
			$list[$k]['jsr'] = M('gongyingshang')->where(array('user_id'=>$v['ask_uid'])) -> getField('name'); // 实例化User对象
		
			//获取接收人
			$list[$k]['username'] = '';
			$uw['user_id'] = array('in',trim($v['rev_uid'],','));
			
			$us = M('gongyingshang')->where($uw) ->field('name') -> select(); // 实例化User对象
			foreach($us as $j=>$b){
				$list[$k]['username'] .= $b['name'].",";
			}
			$list[$k]['username'] = trim($list[$k]['username'],',');
			
			//分割图片
			/*$list[$k]['UserPhoto']='';
			$UserPhoto = trim($v['UserPhoto'],',');
			if(!empty($UserPhoto)){
				$arr=explode(",",$v['UserPhoto']);
				foreach($arr as $g=>$s){
					$list[$k]['UserPhoto'] .= "<a title='点击查看图片' href='http://wgcapp.59jiaju.com".$s."' target='_blank'><img src='http://wgcapp.59jiaju.com".$s."' style='margin:5px;width:32px;height:32px;'/></a>";
				}
				
			}*/
			
		}
		
		
		$this->assign('type',$type);// 赋值数据集
		$this->assign('count',$count);// 赋值数据集
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板*/
		
	}
	
	//项目管理-材料申购
	public function xiangmu_cailiaoshengou(){
		if(!IS_GET){die('404');}
		$User = M('purchase');
		$p_id=I('get.kid',0,'intval');
		
		
		
		//查询条件
		
		$where['p_id'] = array('eq',$p_id);
		//$where['type'] = array('eq',$type);
		
		
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		foreach($list as $k=>$v){
			//获取项目创建人
			$project = M('project')->where(array('prj_id'=>$v['p_id'])) -> find(); // 实例化User对象
			$gongyingshang = M('gongyingshang')->where(array('user_id'=>$project['user_id'])) -> find(); // 实例化User对象
			$list[$k]['prj_name'] = $project['prj_name'];
			$list[$k]['prj_id'] = $project['prj_id'];
			$list[$k]['addtime'] = date('Y-m-d H:i:s',$v['addtime']);
			$list[$k]['uname'] = $gongyingshang['name'];
			//获取发布人
			$list[$k]['jsr'] = M('gongyingshang')->where(array('user_id'=>$v['user_id'])) -> getField('name'); // 实例化User对象
		
			//获取接收人
			$list[$k]['username'] = '';
			$uw['user_id'] = array('in',trim($v['rev_uid'],','));
			
			$us = M('gongyingshang')->where($uw) ->field('name') -> select(); // 实例化User对象
			foreach($us as $j=>$b){
				$list[$k]['username'] .= $b['name'].",";
			}
			$list[$k]['username'] = trim($list[$k]['username'],',');
			
		}
		
		
		
		
		$this->assign('count',$count);// 赋值数据集
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板*/
		
	}
	
	//项目管理---验收列表
	public function xiangmu_baoyan(){
		if(!IS_GET){die('404');}
		$User = M('checkprj');
		$p_id=I('get.kid',0,'intval');
		
		
		
		//查询条件
		
		$where['p_id'] = array('eq',$p_id);
		//$where['type'] = array('eq',$type);
		
		
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		foreach($list as $k=>$v){
			//获取项目创建人
			$project = M('project')->where(array('prj_id'=>$v['p_id'])) -> find(); // 实例化User对象
			$gongyingshang = M('gongyingshang')->where(array('user_id'=>$project['user_id'])) -> find(); // 实例化User对象
			$list[$k]['prj_name'] = $project['prj_name'];
			$list[$k]['prj_id'] = $project['prj_id'];
			$list[$k]['addtime'] = date('Y-m-d H:i:s',$v['addtime']);
			$list[$k]['uname'] = $gongyingshang['name'];
			//获取发布人
			$list[$k]['jsr'] = M('gongyingshang')->where(array('user_id'=>$v['user_id'])) -> getField('name'); // 实例化User对象
		
			//获取接收人
			$list[$k]['username'] = '';
			$uw['user_id'] = array('in',trim($v['rev_uid'],','));
			
			$us = M('gongyingshang')->where($uw) ->field('name') -> select(); // 实例化User对象
			foreach($us as $j=>$b){
				$list[$k]['username'] .= $b['name'].",";
			}
			$list[$k]['username'] = trim($list[$k]['username'],',');
			
		}
		
		
		
		
		$this->assign('count',$count);// 赋值数据集
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板*/
	}
	
	//项目管理---招聘列表
	public function xiangmu_zhaopin(){
		if(!IS_GET){die('404');}
		$User = M('recruit');
		$p_id  = I('get.kid');
		$gtype = I('get.gtype',0,'intval');
		
		
		//查询条件
		
		$where['prj_id']  = array('eq',$p_id);
		$where['gtype']   = array('eq',$gtype);
		
		
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		foreach($list as $k=>$v){
			//获取项目创建人
			$project = M('project')->where(array('prj_id'=>$v['prj_id'])) -> find(); // 实例化User对象
			$gongyingshang = M('gongyingshang')->where(array('user_id'=>$project['user_id'])) -> find(); // 实例化User对象
			$list[$k]['prj_name'] = $project['prj_name'];
			$list[$k]['prj_id'] = $project['prj_id'];
			$list[$k]['addtime'] = date('Y-m-d H:i:s',$v['addtime']);
			$list[$k]['uname'] = $gongyingshang['name'];
			//获取发布人
			$list[$k]['jsr'] = M('gongyingshang')->where(array('user_id'=>$v['user_id'])) -> getField('name'); // 实例化User对象
		
		}
		
		
		
		
		$this->assign('count',$count);// 赋值数据集
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板*/
	}
	
	
	//项目管理---招工列表
	public function xiangmu_zhaogong(){
		if(!IS_GET){die('404');}
		$User  = M('qiuzhi');
		$p_id  = I('get.kid');
		$gtype = I('get.gtype',0,'intval');
		$type  = I('get.type',0,'intval');
		
		
		//查询条件
		
		$where['prj_id']  = array('eq',$p_id);
		$where['type']   = array('eq',$type);
		
		
		$count      = $User->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$arr = array(
					'施工队长',
					'水电工长',
					'空调安装工长',
					'空调安装工',
					'泥水工',
					'水电工',
					'电焊工',
					'家具安装工',
					'木工',
					'扇灰工',
					'保洁工',
					'杂工',
					'设计师',
					'预算员',
					'其它',
					'维修工',
					'网络维修',
		);
		
		foreach($list as $k=>$v){
			//获取项目创建人
			$project = M('project')->where(array('prj_id'=>$v['prj_id'])) -> find(); // 实例化User对象
			$gongyingshang = M('gongyingshang')->where(array('user_id'=>$project['user_id'])) -> find(); // 实例化User对象
			$list[$k]['prj_name'] = $project['prj_name'];
			$list[$k]['prj_id'] = $project['prj_id'];
			$list[$k]['addtime'] = date('Y-m-d H:i:s',$v['addtime']);
			$list[$k]['uname'] = $gongyingshang['name'];
			$list[$k]['jobtype'] = $arr[$v['jobtype']+1];
			
			//获取发布人
			$list[$k]['jsr'] = M('gongyingshang')->where(array('user_id'=>$v['user_id'])) -> getField('name'); // 实例化User对象
		
		}
		
		
		
		
		$this->assign('count',$count);// 赋值数据集
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板*/
	}
	
	//项目管理--删除-招工列表
	public function xiangmu_zhaogong_del(){
		if(!IS_GET){die('404');}
		$User  = M('qiuzhi');
		$id = I('get.id',0,'intval');
		
		$url = I('server.HTTP_REFERER'); //$_SERVER['HTTP_REFERER']
		
		//条件
		
		$where['id']   = array('eq',$id);
		if($User->where($where)->delete()){
			 $this->success('删除成功', $url);
		}else{
			$this->error('删除失败！');
		}
		
		
	}
	
	
	
	//项目管理-材料申购--详情
	public function xiangmu_cailiaoshengou_content(){
		if(!IS_GET){die('404');}
		$User = M('purchase');
		
		
		$kid     = I('id',0,'intval');
		
		//查询条件
		$list = $User->where(array('id'=>$kid))->find();
		
		//获取项目创建人
		$project = M('project')->where(array('prj_id'=>$list['p_id'])) -> find(); // 实例化User对象
		$gongyingshang = M('gongyingshang')->where(array('user_id'=>$project['user_id'])) -> find(); // 实例化User对象
		$list['prj_name'] = $project['prj_name'];
		$list['prj_id'] = $project['prj_id'];
		$list['addtime'] = date('Y-m-d H:i:s',$list['addtime']);
		$list['uname'] = $gongyingshang['name'];
		//获取发布人
		$list['jsr'] = M('gongyingshang')->where(array('user_id'=>$list['ask_uid'])) -> getField('name'); // 实例化User对象
	
		//获取接收人
		$list['user_name'] = '';
		$uw['user_id'] = array('in',trim($list['rev_uid'],','));
		
		$us = M('gongyingshang')->where($uw) ->field('name') -> select(); // 实例化User对象
		foreach($us as $j=>$b){
			$list['user_name'] .= $b['name'].",";
		}
		$list['user_name'] = trim($list['user_name'],',');
		
		//分割图片
		$list['Photo']='';
		$UserPhoto = trim($list['pic'],',');
		if(!empty($UserPhoto)){
			
			$arr=explode(",",$list['pic']);
			foreach($arr as $g=>$s){
				$list['Photo'] .= "<a title='点击查看图片' href='http://wgcapp.59jiaju.com".$s."' target='_blank'><img src='http://wgcapp.59jiaju.com".$s."' style='border:1px solid #999;margin:5px;width:120px;height:120px;'/></a>";
			}
			
		}else{
			$list['Photo']='暂无图片';
		}
		
		
		
		
		
		
		//获取对应语音信息
		
		/*$list['vo_path']='';
		$list['vo_addtime']='';
		$ret = $us = M('voice')->where(array('f_id'=>$list['id'])) ->order('id desc')->field('v_path,addtime')->select(); // 实例化User对象;
		foreach($ret as $k=>$v){
			$list['vo_path']    = $v['v_path'];
			$list['vo_addtime'] = $v['addtime'];
		}*/
		
		//获取回复
		$retData=M('replypurchase')->where(array('pu_id'=>$kid))->order('id desc')->select();
		
		foreach($retData as $k=>$v){
			
			//获取回复人
			$huser = M('gongyingshang')->where(array('user_id'=>$v['u_id']))->field('name') -> find(); // 实例化User对象
			$member = M('member')->where(array('user_id'=>$v['u_id']))->field('userphoto') -> find(); // 实例化User对象
			
			$retData[$k]['name']      	= $huser['name'];
			$retData[$k]['userphoto'] 	= $member['userphoto'];
			//分割图片
			$retData[$k]['pic']='';
			$UserPhoto = trim($v['reply_photo'],',');
			if(!empty($UserPhoto)){
				
				$arr=explode(",",$v['reply_photo']);
				foreach($arr as $g=>$s){
					$retData[$k]['pic'] .= "<a title='点击查看图片' href='http://wgcapp.59jiaju.com".$s."' target='_blank'><img src='http://wgcapp.59jiaju.com".$s."' style='margin:5px;width:120px;height:120px;'/></a>";
				}
				
			}
		}
		
		
		$this->assign('retData',$retData);// 赋值数据集
		$this->assign('list',$list);// 赋值数据集
		$this->display(); // 输出模板*/
		
	}
	
	//	//项目管理-招聘详情
	public function xiangmu_zhaopin_content(){
		
		if(!IS_GET){die('404');}
		
		
		$kid     = I('id',0,'intval');
		
		//查询条件
		$list = M('recruit')->where(array('id'=>$kid))->find();
		
		
		
		
		//获取项目创建人
		$project = M('project')->where(array('prj_id'=>$list['prj_id'])) -> find(); // 实例化User对象
		$gongyingshang = M('gongyingshang')->where(array('user_id'=>$project['user_id'])) -> find(); // 实例化User对象
		$list['prj_name'] = $project['prj_name'];
		$list['prj_id'] = $project['prj_id'];
		$list['addtime'] = date('Y-m-d H:i:s',$list['addtime']);
		$list['uname'] = $gongyingshang['name'];
		//获取发布人
		$list['jsr'] = M('gongyingshang')->where(array('user_id'=>$list['user_id'])) -> getField('name'); // 实例化User对象
	
		//var_dump($retData);
		$this->assign('retData',$retData);// 赋值数据集
		$this->assign('list',$list);// 赋值数据集
		$this->display(); // 输出模板*/
		
		
	}
	
	//	//项目管理-招工详情
	public function xiangmu_zhaogong_content(){
		
		if(!IS_GET){die('404');}
		
		
		$id     = I('id',0,'intval');
		
		//查询条件
		$list = M('qiuzhi')->where(array('id'=>$id))->find();
		
		
		$arr = array(
					'施工队长',
					'水电工长',
					'空调安装工长',
					'空调安装工',
					'泥水工',
					'水电工',
					'电焊工',
					'家具安装工',
					'木工',
					'扇灰工',
					'保洁工',
					'杂工',
					'设计师',
					'预算员',
					'其它',
					'维修工',
					'网络维修',
		);
		
		//获取项目创建人
		$project = M('project')->where(array('prj_id'=>$list['prj_id'])) -> find(); // 实例化User对象
		$gongyingshang = M('gongyingshang')->where(array('user_id'=>$project['user_id'])) -> find(); // 实例化User对象
		$list['prj_name'] = $project['prj_name'];
		$list['prj_id'] = $project['prj_id'];
		$list['jobtype'] = $arr[$list['jobtype']+1];
		$list['addtime'] = date('Y-m-d H:i:s',$list['addtime']);
		$list['uname'] = $gongyingshang['name'];
		//获取发布人
		$list['jsr'] = M('gongyingshang')->where(array('user_id'=>$list['user_id'])) -> getField('name'); // 实例化User对象
	
		//var_dump($retData);
		$this->assign('retData',$retData);// 赋值数据集
		$this->assign('list',$list);// 赋值数据集
		$this->display(); // 输出模板*/
		
		
	}
	
	//	//项目管理-隐蔽报验详情
	public function xiangmu_baoyan_content(){
		
		if(!IS_GET){die('404');}
		
		
		$kid     = I('id',0,'intval');
		
		//查询条件
		$list = M('checkprj')->where(array('id'=>$kid))->find();
		
		
		
		
		//获取项目创建人
		$project = M('project')->where(array('prj_id'=>$list['p_id'])) -> find(); // 实例化User对象
		$gongyingshang = M('gongyingshang')->where(array('user_id'=>$project['user_id'])) -> find(); // 实例化User对象
		$list['prj_name'] = $project['prj_name'];
		$list['prj_id'] = $project['prj_id'];
		$list['addtime'] = date('Y-m-d H:i:s',$list['addtime']);
		$list['uname'] = $gongyingshang['name'];
		
		//获取发布人
		$list['jsr'] = M('gongyingshang')->where(array('user_id'=>$list['user_id'])) -> getField('name'); // 实例化User对象
	
		//获取接收人
		$list['user_name'] = '';
		$uw['user_id'] = array('in',trim($list['rev_uid'],','));
		
		$us = M('gongyingshang')->where($uw) ->field('name') -> select(); // 实例化User对象
		foreach($us as $j=>$b){
			$list['user_name'] .= $b['name'].",";
		}
		
		$list['user_name'] = trim($list['user_name'],',');
		
		//分割图片
		$list['Photo']='';
		$UserPhoto = trim($list['photo'],',');
		if(!empty($UserPhoto)){
			
			$arr=explode(",",$list['photo']);
			foreach($arr as $g=>$s){
				$list['Photo'] .= "<a title='点击查看图片' href='http://wgcapp.59jiaju.com".$s."' target='_blank'><img src='http://wgcapp.59jiaju.com".$s."' style='margin:5px;width:120px;height:120px;'/></a>";
			}
			
		}else{
			$list['Photo']='暂无图片';
		}
		
		
		
		
		
		
		//获取对应语音信息
		
		$list['vo_path']='';
		$list['vo_addtime']='';
		$ret = $us = M('voice')->where(array('f_id'=>$list['id'])) ->order('id desc')->field('v_path,addtime')->select(); // 实例化User对象;
		
		foreach($ret as $k=>$v){
			$list['vo_path']    = $v['v_path'];
			$list['vo_addtime'] = $v['addtime'];
		}
		
		//获取回复
		 //M('replypurchase')->where(array('u_id'=>'1473404661'))->setField('u_id','1473404101');
		$retData  = M('replycheck')->where(array('check_id'=>$list['id']))->select();
		
		//var_dump($retData);
		foreach($retData as $k=>$v){
			
			//获取回复人
			$huser = M('gongyingshang')->where(array('user_id'=>$v['u_id']))->field('name') -> find(); // 实例化User对象
			$member = M('member')->where(array('user_id'=>$v['u_id']))->field('userphoto') -> find(); // 实例化User对象
			
			$retData[$k]['name']      	= $huser['name'];
			$retData[$k]['userphoto'] 	= $member['userphoto'];
			//分割图片
			$retData[$k]['pic']='';
			$UserPhoto = trim($v['reply_photo'],',');
			if(!empty($UserPhoto)){
				
				$arr=explode(",",$v['reply_photo']);
				foreach($arr as $g=>$s){
					$retData[$k]['pic'] .= "<a title='点击查看图片' href='http://wgcapp.59jiaju.com".$s."' target='_blank'><img src='http://wgcapp.59jiaju.com".$s."' style='margin:5px;width:120px;height:120px;'/></a>";
				}
				
			}
		}
		
		//var_dump($retData);
		$this->assign('retData',$retData);// 赋值数据集
		$this->assign('list',$list);// 赋值数据集
		$this->display(); // 输出模板*/
		
		
	}
	
	//	//项目管理-进度详情
	public function xiangmu_cate_content(){
		
		if(!IS_GET){die('404');}
		
		
		$kid     = I('id',0,'intval');
		
		//查询条件
		$list = M('huibao')->where(array('id'=>$kid))->find();
		
		
		//var_dump($list);
		
		//获取项目创建人
		$project = M('project')->where(array('prj_id'=>$list['kid'])) -> find(); // 实例化User对象
		$gongyingshang = M('gongyingshang')->where(array('user_id'=>$project['user_id'])) -> find(); // 实例化User对象
		$list['prj_name'] = $project['prj_name'];
		$list['prj_id'] = $project['prj_id'];
		$list['addtime'] = date('Y-m-d H:i:s',$list['addtime']);
		$list['uname'] = $gongyingshang['name'];
		//获取发布人
		$list['jsr'] = M('gongyingshang')->where(array('user_id'=>$list['uid'])) -> getField('name'); // 实例化User对象
	
		//获取接收人
		$list['user_name'] = '';
		$uw['user_id'] = array('in',trim($list['cell_username'],','));
		
		$us = M('gongyingshang')->where($uw) ->field('name') -> select(); // 实例化User对象
		foreach($us as $j=>$b){
			$list['user_name'] .= $b['name'].",";
		}
		$list['user_name'] = trim($list['user_name'],',');
		
		//分割图片
		$list['Photo']='';
		$UserPhoto = trim($list['UserPhoto'],',');
		if(!empty($UserPhoto)){
			
			$arr=explode(",",$list['UserPhoto']);
			foreach($arr as $g=>$s){
				$list['Photo'] .= "<a title='点击查看图片' href='http://wgcapp.59jiaju.com".$s."' target='_blank'><img src='http://wgcapp.59jiaju.com".$s."' style='margin:5px;width:120px;height:120px;'/></a>";
			}
			
		}else{
			$list['Photo']='暂无图片';
		}
		
		
		
		
		
		
		//获取对应语音信息
		
		$list['vo_path']='';
		$list['vo_addtime']='';
		$ret = $us = M('voice')->where(array('f_id'=>$list['id'])) ->order('id desc')->field('v_path,addtime')->select(); // 实例化User对象;
		foreach($ret as $k=>$v){
			$list['vo_path']    = $v['v_path'];
			$list['vo_addtime'] = $v['addtime'];
		}
		
		//获取回复
		$f_type  = M('reply')->where(array('f_id'=>$list['id']))->getField('f_type');
		$retData = getHfList($list['id'],$f_type);
		
		if(!empty($retData)){
			
			foreach($retData as $k=>$v){
				$pic = count($v['pic']);
				if($pic>=1){
					$retData[$k]['pic'] = '';
					foreach($arrp as $g=>$s){
						$retData[$k]['pic'] .= "<a title='点击查看图片' href='http://wgcapp.59jiaju.com".$s."' target='_blank'><img src='http://wgcapp.59jiaju.com".$s."' style='margin:5px;width:120px;height:120px;'/></a>";
					}
				}
				
				
			}
			
		}
		//var_dump($retData);
		$this->assign('retData',$retData);// 赋值数据集
		$this->assign('list',$list);// 赋值数据集
		$this->display(); // 输出模板*/
		
		
	}
	
	
	//	//项目管理-请款详情
	public function xiangmu_qingkuan_content(){
		
		if(!IS_GET){die('404');}
		
		
		$kid     = I('id',0,'intval');
		
		//查询条件
		$list = M('shenpi')->where(array('id'=>$kid))->find();
		
		//获取项目创建人
		$project = M('project')->where(array('prj_id'=>$list['p_id'])) -> find(); // 实例化User对象
		$gongyingshang = M('gongyingshang')->where(array('user_id'=>$project['user_id'])) -> find(); // 实例化User对象
		$list['prj_name'] = $project['prj_name'];
		$list['prj_id'] = $project['prj_id'];
		$list['addtime'] = date('Y-m-d H:i:s',$list['asktime']);
		$list['uname'] = $gongyingshang['name'];
		//获取发布人
		$list['jsr'] = M('gongyingshang')->where(array('user_id'=>$list['ask_uid'])) -> getField('name'); // 实例化User对象
	
		//获取接收人
		$list['user_name'] = '';
		$uw['user_id'] = array('in',trim($list['rev_uid'],','));
		
		$us = M('gongyingshang')->where($uw) ->field('name') -> select(); // 实例化User对象
		foreach($us as $j=>$b){
			$list['user_name'] .= $b['name'].",";
		}
		$list['user_name'] = trim($list['user_name'],',');
		
		//分割图片
		$list['Photo']='';
		$UserPhoto = trim($list['pic'],',');
		if(!empty($UserPhoto)){
			
			$arr=explode(",",$list['pic']);
			foreach($arr as $g=>$s){
				$list['Photo'] .= "<a title='点击查看图片' href='http://wgcapp.59jiaju.com".$s."' target='_blank'><img src='http://wgcapp.59jiaju.com".$s."' style='border:1px solid #999;margin:5px;width:120px;height:120px;'/></a>";
			}
			
		}else{
			$list['Photo']='暂无图片';
		}
		
		
		
		
		
		
		//获取对应语音信息
		
		/*$list['vo_path']='';
		$list['vo_addtime']='';
		$ret = $us = M('voice')->where(array('f_id'=>$list['id'])) ->order('id desc')->field('v_path,addtime')->select(); // 实例化User对象;
		foreach($ret as $k=>$v){
			$list['vo_path']    = $v['v_path'];
			$list['vo_addtime'] = $v['addtime'];
		}*/
		
		//获取回复
		$retData=M('shenpistu')->where(array('sid'=>$kid))->order('id desc')->select();
		
		
		$this->assign('retData',$retData);// 赋值数据集
		$this->assign('list',$list);// 赋值数据集
		$this->display(); // 输出模板*/
		
		
	}
	
	
}