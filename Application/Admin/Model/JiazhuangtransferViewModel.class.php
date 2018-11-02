<?php
//项目汇报列表
namespace Admin\Model;
use Think\Model\ViewModel;
class JiazhuangtransferViewModel extends ViewModel{
   public $viewFields = array(
		'jiazhuangtransfer'=>array('id','weixiu_id','pid','send_uid','rev_uid','content','ps','tel','times','address','money','evidence','_type'=>'LEFT'),
		
		'member'=>array('userphoto','user_name'=>'mobile','_on'=>'jiazhuangtransfer.send_uid=member.user_id','_type'=>'LEFT'),
		
		'gongyingshang'=>array('name','zhiwei','_on'=>'member.user_id=gongyingshang.user_id','_type'=>'LEFT'),			
   );
 }