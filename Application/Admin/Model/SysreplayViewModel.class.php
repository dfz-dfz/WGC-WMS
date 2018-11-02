<?php
//评论列表
namespace Admin\Model;
use Think\Model\ViewModel;
class SysreplayViewModel extends ViewModel{
   public $viewFields = array(
		'sysreplay'=>array('id','sys_id','userid','pic','content','addtime','_type'=>'LEFT'),
		'member'=>array('userphoto','_on'=>'sysreplay.userid=member.user_id','_type'=>'LEFT'),
		'gongyingshang'=>array('name','zhiwei','_on'=>'member.user_id=gongyingshang.user_id','_type'=>'LEFT'),
		
   );
 }