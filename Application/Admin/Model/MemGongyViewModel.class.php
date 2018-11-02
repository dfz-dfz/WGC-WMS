<?php
//项目汇报列表
namespace Admin\Model;
use Think\Model\ViewModel;
class MemGongyViewModel extends ViewModel {
   public $viewFields = array(
		'member'=>array('user_id','user_name','shenfen','shenfentype','balance','userphoto','xiangxi','regtime','token','fenxiaoshang','fenxiaoshang_name','fenxiaoshang_time','postion','type','is_user','pai','_type'=>'LEFT'),
		
		'gongyingshang'=>array('name','sex','bumen','nianling','huji','zhiwei','user_id'=>'uid','_on'=>'member.user_id=gongyingshang.user_id','_type'=>'LEFT'),
   );
 }