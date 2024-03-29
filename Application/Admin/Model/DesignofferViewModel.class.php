<?php
namespace Admin\Model;
use Think\Model\ViewModel;
class DesignofferViewModel extends ViewModel {
	 public $viewFields = array(
   
		'designoffer'=>array('id','user_id','autoaddress','address','ps','img','rev_name','addtime','_type'=>'LEFT'),
		
		'designprice'=>array('bj_name','unit','tel','_on'=>'designprice.id=designoffer.dpid','_type'=>'LEFT'),
		
		'member'=>array('userphoto','user_name'=>'mobile','_on'=>'designoffer.user_id=member.user_id','_type'=>'LEFT'),
		
		'gongyingshang'=>array('name','zhiwei','_on'=>'member.user_id=gongyingshang.user_id','_type'=>'LEFT'),
   );
}