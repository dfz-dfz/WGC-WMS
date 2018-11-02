<?php
//项目汇报列表
namespace Admin\Model;
use Think\Model\ViewModel;
class WeixiureplyViewModel extends ViewModel {
   public $viewFields = array(
		'weixiureply'=>array('id','pid','wx_id','user_id','rev_name','work_number','deal','phone','look_time','play_time','pay_money','personal_ps','need_cai','ps','areaphoto','address','money','type','addtime','_type'=>'LEFT'),
		
		'member'=>array('userphoto','_on'=>'weixiureply.user_id=member.user_id','_type'=>'LEFT'),
		
		'gongyingshang'=>array('name','zhiwei','_on'=>'member.user_id=gongyingshang.user_id','_type'=>'LEFT'),
		
		
   );
 }