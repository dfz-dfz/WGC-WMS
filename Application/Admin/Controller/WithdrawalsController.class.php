<?php
//优惠券管理
namespace Admin\Controller;
use Think\Controller;
class WithdrawalsController extends CommonController {
	//提现列表
    public function index(){
		header("Content-type: text/html; charset=utf-8"); 
		
		$withdrawals = M('withdrawals');
		$pay_type = I('pay_type');
		if(!empty($pay_type)){
			$where['pay_type'] = array('eq',$pay_type);
		}
		$count      = $withdrawals->where($where)->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $withdrawals->field('ecm_withdrawals.*,ecm_member.user_name,ecm_gongyingshang.name')
				->join('ecm_member ON ecm_withdrawals.userid = ecm_member.user_id','left')
				->join('ecm_gongyingshang ON ecm_withdrawals.userid = ecm_gongyingshang.user_id','left')
				->where($where)->order('id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
				
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('count',$count);// 赋值分页输出
		$this->assign('pay_type',$pay_type);// 赋值分页输出
		$this->display(); // 输出模板
    }
	
	//提现修改
	public function update(){
		$withdrawals=M("withdrawals");
		$id=I("id");
		$info=$withdrawals->field('ecm_withdrawals.*,ecm_member.user_name')->join('ecm_member ON ecm_withdrawals.userid = ecm_member.user_id','left')->where(array('id'=>$id))->find();
		$this->assign("info",$info);
		$this->display();
	}
	//提现信息修改
	public function upinfo(){
		$withdrawals=M("withdrawals");
		$id=I("get.id");
		$date=I("post.");
		$date['pay_time']=time();
		$a=$withdrawals->where(array('id'=>$id))->data($date)->save();
		if($a>0){
				$this->redirect('withdrawals/index','', 5, '修改成功！页面跳转中。。。。');
			}else{
				$this->error('修改失败！');
			}
		
	}
	
} 