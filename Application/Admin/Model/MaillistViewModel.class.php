<?php
namespace Admin\Model;
use Think\Model\ViewModel;
class MaillistViewModel extends ViewModel {
	 public $viewFields = array(
   
		
		'member'=>array('user_id','user_name','email','userphoto','regtime','_type'=>'LEFT'),
		
		'gongyingshang'=>array('name','zhiwei','beizhu','_on'=>'gongyingshang.user_id=member.user_id','_type'=>'LEFT'),
   );
   
   
}