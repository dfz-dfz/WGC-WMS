<?php
//项目汇报列表
namespace Admin\Model;
use Think\Model\ViewModel;
class WeixiuconfirmViewModel extends ViewModel{
   public $viewFields = array(
		'weixiuconfirm'=>array('id','hh_id','weixiu_id','pid','user_id','times','weixiuren','ps','tel','types','huifunumber','address','_type'=>'LEFT'),
		
		'member'=>array('userphoto','user_name'=>'mobile','_on'=>'weixiuconfirm.user_id=member.user_id','_type'=>'LEFT'),
		
		'gongyingshang'=>array('name','zhiwei','_on'=>'member.user_id=gongyingshang.user_id','_type'=>'LEFT'),			
   );
 }