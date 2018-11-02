<?php
//用户列表
namespace Admin\Model;
use Think\Model\ViewModel;
class UserViewModel extends ViewModel {
   public $viewFields = array(
		//'member'=>array('user_id','user_name','userphoto','regtime','_type'=>'RIGHT'),
		'member'=>array('content','job_live','graduate','tuijian_id','education','job_exp','user_id','user_name','userphoto','authentication','postion','regtime','_type'=>'LEFT'),
		'gongyingshang'=>array('name','sex','nianling','bumen','huji','shenfenzheng','kname','kahao','xinzi','gz_jingyan','intension','skill','mobile','beteach','teachcontent','zhiwei','email','gy_type','_on'=>'member.user_id=gongyingshang.user_id','_type'=>'LEFT'),
	);
 }