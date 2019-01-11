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
	
	//优惠券设置
	public function options(){
		$this->display();
	}
	
} 