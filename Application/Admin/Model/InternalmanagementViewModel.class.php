<?php
//项目列表
namespace Home\Model;
use Think\Model\ViewModel;
class InternalmanagementViewModel extends ViewModel {
   public $viewFields = array(
   
		'internal_management'=>array('id','addtime','name','user_id'=>'uid','group_id','status','content','mtype','storeid','_type'=>'LEFT'),
		
		'usertointernalmanagement'=>array('intermid','user_id','utype','_on'=>'internal_management.id=usertointernalmanagement.intermid','_type'=>'LEFT'),
		
		
   );
 }