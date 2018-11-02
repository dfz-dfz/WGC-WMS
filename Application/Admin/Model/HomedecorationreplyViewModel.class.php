<?php
//项目汇报列表
namespace Admin\Model;
use Think\Model\ViewModel;
class HomedecorationreplyViewModel extends ViewModel {
   public $viewFields = array(
		'jiazhreply'=>array('*','_type'=>'LEFT'),
		
		'member'=>array('user_name','userphoto','_on'=>'jiazhreply.user_id=member.user_id','_type'=>'LEFT'),
		
		'gongyingshang'=>array('name','zhiwei','_on'=>'member.user_id=gongyingshang.user_id','_type'=>'LEFT'),
   );
 }