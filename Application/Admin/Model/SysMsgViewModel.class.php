<?php
//项目汇报列表
namespace Admin\Model;
use Think\Model\ViewModel;
class SysMsgViewModel extends ViewModel {
   public $viewFields = array(
		'member'=>array('user_id','user_name','userphoto','_type'=>'LEFT'),
		
		'gongyingshang'=>array('name','zhiwei','_on'=>'gongyingshang.user_id=member.user_id','_type'=>'LEFT'),
		
		'systemmsg'=>array('id','send_uid','rev_uid','mtype','content','sendtime','status','title','_on'=>'member.user_id=systemmsg.send_uid','_type'=>'LEFT'),
   );
 }