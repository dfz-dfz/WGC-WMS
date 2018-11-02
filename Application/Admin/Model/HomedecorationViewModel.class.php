<?php
namespace Admin\Model;
use Think\Model\ViewModel;
class HomedecorationViewModel extends ViewModel {
	 public $viewFields = array(
   
		'homedecoration'=>array('*','_type'=>'LEFT'),
		
		'member'=>array('userphoto','_on'=>'homedecoration.user_id=member.user_id','_type'=>'LEFT'),
		
		'gongyingshang'=>array('name','zhiwei','_on'=>'member.user_id=gongyingshang.user_id','_type'=>'LEFT'),
   );
}