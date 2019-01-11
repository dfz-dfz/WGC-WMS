<?php
//考勤管理
namespace Admin\Controller;
use Think\Controller;
class KaoqingController extends CommonController {
	
	//考勤
    public function index(){
		header("Content-type: text/html; charset=utf-8");
		$forinter = M('qiandaoforinter');
		
		//echo date('Y-m-01', time());
		//获取上一月开始日期
		$l = strtotime(date('Y-m-01', strtotime('-1 month')).' 00:00:00');
		//获取上一月结束日期
		$r = strtotime(date('Y-m-01', time()).' 00:00:00');
		if(!empty($_POST['time'])){
			$wtime=I("time");
			$wtimes=explode("~",$wtime);
			$l=strtotime($wtimes[0].' 00:00:00');
			$r=strtotime($wtimes[1].' 00:00:00');
			$this->assign('time',$wtime);// 赋值数据集
		}
		//$where['addtime'] = array('EGT',$l);
	   // $where['addtime'] = array('LT',$r);
	   $where['addtime'] = array(array('egt',$l), array('elt',$r));
		//$where['id'] = array('LT',1696);
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$where['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
			}
		}
		//$where['_logic'] = 'or';
		//内部考勤
		 $list = $forinter-> where($where)->order('id desc') -> field('id,uid,address,out_adress,UserPhoto,out_UserPhoto,content,out_content,to_date,in_time,out_time,times,addtime') ->select(); 
		
		
		foreach($list as $k=>$v){
			$user = M('gongyingshang') -> where(array('user_id'=>$v['uid'])) -> field('name,sex,zhiwei,mobile') -> find();
			$list[$k]['name']   = $user['name'];
			$list[$k]['sex']    = $user['sex'];
			$list[$k]['zhiwei'] = $user['zhiwei'];
			$list[$k]['mobile'] = $user['mobile'];
		}
		
		//项目考勤
		
		$qd = M('qiandao')-> where($where)->order('id desc') -> field('id,uid,address,out_adress,UserPhoto,out_UserPhoto,content,out_content,to_date,in_time,out_time,times,addtime') ->select();; 
		
		foreach($qd as $k=>$v){
			$users = M('gongyingshang') -> where(array('user_id'=>$v['uid'])) -> field('name,sex,zhiwei,mobile') -> find();
			$qd[$k]['name']   = $users['name'];
			$qd[$k]['sex']    = $users['sex'];
			$qd[$k]['zhiwei'] = $users['zhiwei'];
			$qd[$k]['mobile'] = $users['mobile'];
		}
		session('xmqiandaolist',$qd);
		//echo "<pre>";
		session('qiandaolist',$list);
		//var_dump($qd);
		$this->assign('list',$list);// 赋值数据集
		$this->assign('qd',$qd);// 赋值数据集
		$this->display();
    }
	
	
	//报销
    public function baoxiao(){
		header("Content-type: text/html; charset=utf-8");
		$forinter = M('qingkuan');
		//echo date('Y-m-01', time());
		$type = I('type',1,'intval');
		
		
		
		$tl = date('Y-m-d', time());
		
		//获取上一月开始日期
		$t = getlastMonthDays($tl);
		$l = strtotime($t[0]);
		//var_dump(getMonth($tl));echo "<br>";
		//var_dump(getlastMonthDays($tl));echo "<br>";
		//var_dump(getNextMonthDays($tl));
		//获取上一月结束日期
		$rd = getMonth($tl);
		$r = strtotime($rd[0]);
		
		$where['type'] = array('eq',($type==1)?'报销':'请款');
		//$where['asktime'] = array('EGT',$l);
	    //$where['asktime'] = array('LT',$r);
		//$where['id'] = array('LT',1696);
		
		//$where['_logic'] = 'or';
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$where['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
			}
		}
		//内部考勤
		 $list = $forinter-> where($where)->order('id desc')  ->select(); 
		
		
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
			
			
		}
		
		//echo "<pre>";
		session('baoxiaolist',$list);
		//var_dump($qd);
		$this->assign('list',$list);// 赋值数据集
		$mb = ($type == 1)?'baoxiao':'qingkuan';
		
		
		$this->display($mb);
    }
	
	//请假
	public function qingjia(){
		header("Content-type: text/html; charset=utf-8");
		$forinter = M('leaves');
		//echo date('Y-m-01', time());
		//获取上一月开始日期
		$l = strtotime(date('Y-m-01', strtotime('-1 month')));
		
		//获取上一月结束日期
		$r = strtotime(date('Y-m-01', time()));
		
		$where['addtime'] = array('EGT',$l);
	    $where['addtime'] = array('LT',$r);
		$where['id'] = array('neq',81);
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$where['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
			}
		}
		//内部考勤
		 $list = $forinter-> where($where)->order('id desc') ->select(); 
		
		
		foreach($list as $k=>$v){
			$user = M('gongyingshang') -> where(array('user_id'=>$v['user_id'])) -> field('name,sex,zhiwei,mobile') -> find();
			$list[$k]['name']   = $user['name'];
			$list[$k]['sex']    = $user['sex'];
			$list[$k]['zhiwei'] = $user['zhiwei'];
			$list[$k]['mobile'] = $user['mobile'];
		}
		
		foreach($list as $k=>$v){
			$user = M('leavestu') -> where(array('leaveid'=>$v['id'])) -> field('deal') -> find();
			$list[$k]['deal']   = ($user['deal']==1)?'同意':'不同意';
			
		}
		
		//echo "<pre>";
		session('qjlist',$list);
		//var_dump($list);
		$this->assign('list',$list);// 赋值数据集
		$this->display();
    }
	
	
	//外出
	public function waichu(){
		header("Content-type: text/html; charset=utf-8");
		$go_out = M('go_out');
		//echo date('Y-m-01', time());
		//获取上一月开始日期
		$l = strtotime(date('Y-m-01', strtotime('-1 month')));
		
		//获取上一月结束日期
		$r = strtotime(date('Y-m-01', time()));
		
		$where['addtime'] = array('EGT',$l);
	    $where['addtime'] = array('LT',$r);
		$where['id'] = array('neq',81);
		if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
			if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
				$where['fenxiaoshang_userid'] = array('eq',$_SESSION['wgcadmininfo']['fenxiaoshang_userid']);
			}
		}
		//内部考勤
		 $list = $go_out-> where($where)->order('id desc') ->select(); 
		
		
		foreach($list as $k=>$v){
			$user = M('gongyingshang') -> where(array('user_id'=>$v['user_id'])) -> field('name,sex,zhiwei,mobile') -> find();
			$list[$k]['name']   = $user['name'];
			$list[$k]['sex']    = $user['sex'];
			$list[$k]['zhiwei'] = $user['zhiwei'];
			$list[$k]['mobile'] = $user['mobile'];
		}
		
		foreach($list as $k=>$v){
			$user = M('leavestu') -> where(array('leaveid'=>$v['id'])) -> field('deal') -> find();
			$list[$k]['deal']   = ($user['deal']==1)?'同意':'不同意';
			
		}
		
		//echo "<pre>";
		session('waichu',$list);
		//var_dump($list);
		$this->assign('list',$list);// 赋值数据集
		$this->display();
    }
	
	 //导出内部考勤
    public function export(){
    	import("ORG.Yufan.Excel");
    	
		$list = session('qiandaolist');
		
    	$row=array();
    	$row[0]=array('序号','姓名','性别','工种','手机','签到时间','签到日期','签到时间段','签到图片','签到地址','描述','签退时间段（时:分）','签退地址','签退图片','签退描述','添加时间');
		
    	$i=1;
		
    	foreach($list as $v){
    	        $row[$i]['i']             = $i;
    	        $row[$i]['name']          = $v['name'];
    	        $row[$i]['sex']           = $v['sex'];
    	        $row[$i]['zhiwei']        = $v['zhiwei'];
				$row[$i]['mobile']        = $v['mobile'];
				$row[$i]['times']         = $v['times'];
				$row[$i]['to_date']       = $v['to_date'];
				$row[$i]['in_time']       = $v['in_time'];
				//$row[$i]['UserPhoto']     = '<img src="http://wgcapp.59jiaju.com/'.$v['UserPhoto'].'">';
				
				if(!empty($v['userphoto'])){
					
					$arr = explode(",",$v['userphoto']);
					if(count($arr) > 1){
						
						foreach($arr as $k){
							$row[$i]['userphoto']     .= '[http://wgcapp.59jiaju.com/'.$k.']';
						}
					}else{
						$row[$i]['userphoto']     = 'http://wgcapp.59jiaju.com/'.$v['userphoto'];
					}
				}else{
					$row[$i]['userphoto']     = '';
				}
				
				$row[$i]['address']       = $v['address'];
				$row[$i]['content']       = $v['content'];
				$row[$i]['out_time']      = $v['out_time'];
				$row[$i]['out_adress']    = $v['out_adress'];
				$row[$i]['out_UserPhoto'] = $v['out_UserPhoto'];
				$row[$i]['out_content']   = $v['out_content'];
				
				
    	        $row[$i]['addtime'] = date("Y-m-d H:i:s",$v['addtime']);
    	        $i++;
    	}
    	
    	$xls = new \Excel_XML('UTF-8', false, 'datalist');
    	$xls->addArray($row);
    	$xls->generateXML('nb'.date('Y-m-01', strtotime('-1 month')),'考勤');
    }
	
	//导出项目考勤
    public function exports(){
    	import("ORG.Yufan.Excel");
    	
		$list = session('qiandaolist');
		
    	$row=array();
    	$row[0]=array('序号','姓名','性别','工种','手机','签到时间','签到日期','签到时间段','签到图片','签到地址','描述','签退时间段（时:分）','签退地址','签退图片','签退描述','添加时间');
		
    	$i=1;
		
    	foreach($list as $v){
    	        $row[$i]['i']             = $i;
    	        $row[$i]['name']          = $v['name'];
    	        $row[$i]['sex']           = $v['sex'];
    	        $row[$i]['zhiwei']        = $v['zhiwei'];
				$row[$i]['mobile']        = $v['mobile'];
				$row[$i]['times']         = $v['times'];
				$row[$i]['to_date']       = $v['to_date'];
				$row[$i]['in_time']       = $v['in_time'];
				//$row[$i]['UserPhoto']     = '<img src="http://wgcapp.59jiaju.com/'.$v['UserPhoto'].'">';
				
				if(!empty($v['userphoto'])){
					
					$arr = explode(",",$v['userphoto']);
					if(count($arr) > 1){
						
						foreach($arr as $k){
							$row[$i]['userphoto']     .= '[http://wgcapp.59jiaju.com/'.$k.']';
						}
					}else{
						$row[$i]['userphoto']     = 'http://wgcapp.59jiaju.com/'.$v['userphoto'];
					}
				}else{
					$row[$i]['userphoto']     = '';
				}
				
				$row[$i]['address']       = $v['address'];
				$row[$i]['content']       = $v['content'];
				$row[$i]['out_time']      = $v['out_time'];
				$row[$i]['out_adress']    = $v['out_adress'];
				$row[$i]['out_UserPhoto'] = $v['out_UserPhoto'];
				$row[$i]['out_content']   = $v['out_content'];
				
				
    	        $row[$i]['addtime'] = date("Y-m-d H:i:s",$v['addtime']);
    	        $i++;
    	}
    	
    	$xls = new \Excel_XML('UTF-8', false, 'datalist');
    	$xls->addArray($row);
    	$xls->generateXML('xm'.date('Y-m-01', strtotime('-1 month')),'考勤');
    }
	
	 //导出请假考勤
    public function exportqj(){
    	import("ORG.Yufan.Excel");
    	
		$list = session('qjlist');
		
    	$row=array();
    	$row[0]=array('序号','姓名','性别','工种','手机','开始时间','结束时间','描述','总天数','申请时间');
		
    	$i=1;
		
    	foreach($list as $v){
    	        $row[$i]['i']             = $i;
    	        $row[$i]['name']          = $v['name'];
    	        $row[$i]['sex']           = $v['sex'];
    	        $row[$i]['zhiwei']        = $v['zhiwei'];
				$row[$i]['mobile']        = $v['mobile'];
				$row[$i]['gotime']         = $v['gotime'];
				$row[$i]['baktime']       = $v['baktime'];
				$row[$i]['content']       = $v['content'];
				$row[$i]['days']          = $v['days'];
				$row[$i]['addtime']       = date("Y-m-d H:i:s",$v['addtime']);
				//$row[$i]['ty']            = $v['deal'];
				
    	        $i++;
    	}
    	
    	$xls = new \Excel_XML('UTF-8', false, 'datalist');
    	$xls->addArray($row);
    	$xls->generateXML('qj'.date('Y-m-01', strtotime('-1 month')),'考勤');
    }
	
	 //导出外出考勤
    public function exportwc(){
    	import("ORG.Yufan.Excel");
    	
		$list = session('waichu');
		
    	$row=array();
    	$row[0]=array('序号','姓名','性别','工种','手机','开始时间','结束时间','描述','申请时间');
		
    	$i=1;
		
    	foreach($list as $v){
    	        $row[$i]['i']             = $i;
    	        $row[$i]['name']          = $v['name'];
    	        $row[$i]['sex']           = $v['sex'];
    	        $row[$i]['zhiwei']        = $v['zhiwei'];
				$row[$i]['mobile']        = $v['mobile'];
				$row[$i]['gotime']        = $v['out_time'];
				$row[$i]['baktime']       = $v['in_time'];
				$row[$i]['content']       = $v['content'];
				$row[$i]['addtime']       = date("Y-m-d H:i:s",$v['addtime']);
				//$row[$i]['ty']            = $v['deal'];
				
    	        $i++;
    	}
    	
    	$xls = new \Excel_XML('UTF-8', false, 'datalist');
    	$xls->addArray($row);
    	$xls->generateXML('wc'.date('Y-m-01', strtotime('-1 month')),'考勤');
    }
	
	
	 //导出报销-请款
    public function export_bx(){
    	import("ORG.Yufan.Excel");
    	
		$list = session('baoxiaolist');
		
    	$row=array();
    	$row[0]=array('序号','姓名','性别','工种','手机','金额','说明','接收人','状态','附件','提交时间');
		
    	$i=1;
		
    	foreach($list as $v){
    	        $row[$i]['i']             = $i;
    	        $row[$i]['name']          = $v['name'];
    	        $row[$i]['sex']           = $v['sex'];
    	        $row[$i]['zhiwei']        = $v['zhiwei'];
				$row[$i]['mobile']        = $v['mobile'];
				$row[$i]['gotime']        = $v['money'].'元';
				$row[$i]['baktime']       = $v['content'];
				$row[$i]['content']       = $v['pic'];
				
				$w['user_id'] = array('in',trim($v['rev_uid'],','));
				$rev = M('gongyingshang') -> where($w) -> field('name') -> select();
				$row[$i]['rev_uid'] = '';
				foreach($rev as $d=>$ws){
					$row[$i]['rev_uid'] .= $ws['name'].'-';
				}
				
				$row[$i]['rev_uid'] = trim($row[$i]['rev_uid'],'-');
				$row[$i]['status']       = '已审批';
				$row[$i]['addtime']       = date("Y-m-d H:i:s",$v['asktime']);
				//$row[$i]['ty']            = $v['deal'];
				
    	        $i++;
    	}
    	
    	$xls = new \Excel_XML('UTF-8', false, 'datalist');
    	$xls->addArray($row);
    	$xls->generateXML('bx'.date('Y-m-01', strtotime('-1 month')),'报销');
    }
	
}