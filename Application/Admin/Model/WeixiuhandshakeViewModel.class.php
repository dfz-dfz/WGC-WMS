<?php
//项目汇报列表
namespace Admin\Model;
use Think\Model\ViewModel;
class WeixiuhandshakeViewModel extends ViewModel{
   public $viewFields = array(
		'weixiuhandshake'=>array('id','hh_id','weixiu_id','pid','user_id','times','huifunumber','address','money','needmoney','paymoney','evidence','types','_type'=>'LEFT'),
		
		'member'=>array('userphoto','_on'=>'weixiuhandshake.user_id=member.user_id','_type'=>'LEFT'),
		
		'gongyingshang'=>array('name','zhiwei','_on'=>'member.user_id=gongyingshang.user_id','_type'=>'LEFT'),			
   );
 }