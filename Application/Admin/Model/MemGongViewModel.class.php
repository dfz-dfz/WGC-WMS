<?php
//项目汇报列表
namespace Admin\Model;
use Think\Model\ViewModel;
class MemGongViewModel extends ViewModel {
   public $viewFields = array(
		'member'=>array('user_id','user_name','shenfen','shenfentype','userphoto','xiangxi','postion','is_user','fenxiaoshang','fenxiaoshang_name','fenxiaoshang_userid','_type'=>'LEFT'),
		
		'gongsi'=>array('id','name','logo','storeid','tel','mobile','email','linkman','address','ps','regtime','status','_on'=>'member.user_id=gongsi.muid','_type'=>'LEFT'),
   );
 }