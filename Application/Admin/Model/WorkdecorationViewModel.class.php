<?php
namespace Admin\Model;
use Think\Model\ViewModel;
class WorkdecorationViewModel extends ViewModel {
	 public $viewFields = array(
   
		'workdecoration'=>array('*','_type'=>'LEFT'),
		
		'member'=>array('userphoto','_on'=>'workdecoration.user_id=member.user_id','_type'=>'LEFT'),
		
		'gongyingshang'=>array('name','zhiwei','_on'=>'member.user_id=gongyingshang.user_id','_type'=>'LEFT'),
   );
}