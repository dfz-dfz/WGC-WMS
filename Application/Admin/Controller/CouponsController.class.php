<?php
//优惠券管理
namespace Admin\Controller;
use Think\Controller;
class CouponsController extends CommonController {
	//优惠券列表
    public function index(){
		header("Content-type: text/html; charset=utf-8"); 
		
		$Coupons = M('coupons'); // coupons
		$company = I('company');
		if(!empty($company)){
			$where['company'] = array('like',"%$company%");
		}
		$count      = $Coupons->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Coupons->field('ecm_coupons.*,ecm_member.user_name')->join('ecm_member ON ecm_coupons.userid = ecm_member.user_id','left')->where($where)->order('id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('count',$count);// 赋值分页输出
		$this->assign('company',$company);// 赋值分页输出
		$this->display(); // 输出模板
    }
	//优惠券删除
	public function del(){
		$coupons=M("coupons");
		$id=I("id");
		$info=$coupons->where(array('id'=>$id))->delete();
		if($info>0){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}
	//优惠券修改
	public function update(){
		$coupons=M("coupons");
		$id=I("id");
		$info=$coupons->field('ecm_coupons.*,ecm_member.user_name')->join('ecm_member ON ecm_coupons.userid = ecm_member.user_id','left')->where(array('id'=>$id))->find();
		$this->assign("info",$info);
		$this->display();
	}
	//优惠券修改
	public function upinfo(){
		$coupons=M("coupons");
		$id=I("get.id");
		$date=I("post.");
		$a=$coupons->where(array('id'=>$id))->data($date)->save();
		if($a>0){
				$this->redirect('Coupons/index','', 5, '修改成功！页面跳转中。。。。');
			}else{
				$this->error('修改失败！');
			}
		
	}
	
	//优惠券设置列表
	public function options(){
		$info=M("couset")->where(array("type"=>1))->find();
		$this->assign("info",$info);
		$this->display();
	}
	
	//优惠券设置
	public function optionset(){
		$couset=M("couset");
		$date=I("post.");
		$id=I("get.id");
		$a=$couset->where(array('id'=>$id))->data($date)->save();
		if(!empty($a)){
				$this->redirect('Coupons/index','', 5, '设置成功！页面跳转中。。。。');
			}else{
				$this->error('设置失败！');
			}
	}
	
	//资源扣费设置列表
	public function ziyuan(){
		$info=M("couset")->where(array("type"=>2))->find();
		$this->assign("info",$info);
		$this->display();
	}
	
	//资源扣费设置
	public function ziyuanset(){
		$couset=M("couset");
		$date=I("post.");
		$id=I("get.id");
		$a=$couset->where(array('id'=>$id))->data($date)->save();
		if(!empty($a)){
				$this->redirect('Coupons/index','', 5, '设置成功！页面跳转中。。。。');
			}else{
				$this->error('设置失败！');
			}
	}
	
	
	//优惠券用户资质审核列表
	public function usershenhe(){
		$userrz = M('userrz'); // coupons
		$name = I('name');
		if(!empty($name)){
			$where['name'] = array('like',"%$name%");
		}
		/*$where['status'] = array('neq',"1");*/
		$count      = $userrz->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $userrz->where($where)->order('id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
		foreach($list as $k=>$v){
			$list[$k]['photo']  = explode(',',$v['photo']);
		}
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('count',$count);// 赋值分页输出
		$this->assign('name',$name);// 赋值分页输出
		$this->display(); // 输出模板					
	}
	
	//优惠券用户资质审核通过
	public function userrzup(){
	$date=I("get.");
	$info=M("userrz")->setField($date);
		if(!empty($info)){
			$this->success('审批成功！');
		}else{
			$this->error('审批失败！');
		}
	
	}
	
	//优惠券公司资质审核列表
	public function companyshenhe(){
		$companyrz = M('companyrz'); // coupons
		$name = I('name');
		if(!empty($name)){
			$where['name'] = array('like',"%$name%");
		}
		/*$where['status'] = array('neq',"1");*/
		$count      = $companyrz->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $companyrz->where($where)->order('id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
		foreach($list as $k=>$v){
			$list[$k]['photo']  = explode(',',$v['photo']);
		}
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('count',$count);// 赋值分页输出
		$this->assign('name',$name);// 赋值分页输出
		$this->display(); // 输出模板					
	}
	
	//优惠券公司资质审核图片列表
	public function comphoto(){
		$companyrz = M('companyrz');
		$id=I("get.id");
		$list = $companyrz->where(array("id"=>$id))->find();
		$this->assign('list',$list);// 赋值数据集
		$this->display(); // 输出模板					
	}
	
	//优惠券公司资质审核通过
	public function companyrzup(){
	$date=I("get.");
	$info=M("companyrz")->setField($date);
		if(!empty($info)){
			$this->success('审批成功！');
		}else{
			$this->error('审批失败！');
		}
	
	}
	
} 