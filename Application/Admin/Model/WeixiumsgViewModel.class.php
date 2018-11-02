<?php
namespace Admin\Model;
use Think\Model\ViewModel;
class WeixiumsgViewModel extends ViewModel {
	 public $viewFields = array(
   
		'weixiumsg'=>array('*','_type'=>'LEFT'),
		
		'member'=>array('user_name','_on'=>'member.user_id=weixiumsg.send_uid','_type'=>'LEFT'),
		
		'gongyingshang'=>array('name','zhiwei','_on'=>'gongyingshang.user_id=weixiumsg.send_uid','_type'=>'LEFT'),
   );
   
   
}