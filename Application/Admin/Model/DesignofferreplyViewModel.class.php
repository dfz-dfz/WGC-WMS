<?php
//项目汇报列表
namespace Admin\Model;
use Think\Model\ViewModel;
class DesignofferreplyViewModel extends ViewModel {
   public $viewFields = array(
		'designofferreply'=>array('*','_type'=>'LEFT'),
		
		'member'=>array('user_name','userphoto','_on'=>'designofferreply.send_uid=member.user_id','_type'=>'LEFT'),
		
		'gongyingshang'=>array('name','zhiwei','_on'=>'member.user_id=gongyingshang.user_id','_type'=>'LEFT'),
   );
 }