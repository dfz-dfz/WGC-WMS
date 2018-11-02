<?php
namespace Admin\Model;
use Think\Model\ViewModel;
class BudgetofferViewModel extends ViewModel {
	 public $viewFields = array(
		
		'budgetoffer'=>array('id','user_id','autoaddress','address','ps','img','rev_name','addtime','_type'=>'LEFT'),
		
		'budgetprice'=>array('bj_name','unit','tel','_on'=>'budgetoffer.bgpid=budgetprice.id','_type'=>'LEFT'),
		
		'member'=>array('userphoto','user_name'=>'mobile','_on'=>'budgetoffer.user_id=member.user_id','_type'=>'LEFT'),
		
		'gongyingshang'=>array('name','zhiwei','_on'=>'member.user_id=gongyingshang.user_id','_type'=>'LEFT'),
   );
}