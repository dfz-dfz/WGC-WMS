<?php
//材料商
namespace Admin\Model;
use Think\Model\ViewModel;
class CaiLiaoShangViewModel extends ViewModel {
   public $viewFields = array(
		'cailiaoshang_mianpian'=>array('id','userid','name'=>'cname','title','office_name','mobile','tel','email'=>'cemail','businessscope','fenxiaoshang_userid','description','web','fax','addr','type','addtime','_type'=>'LEFT'),
		'member'=>array('user_name','userphoto','postion','_on'=>'member.user_id=cailiaoshang_mianpian.userid','_type'=>'LEFT'),
		'gongyingshang'=>array('name','sex','nianling','email','_on'=>'member.user_id=gongyingshang.user_id','_type'=>'LEFT'),
	);
 }