<?php
//项目汇报列表
namespace Home\Model;
use Think\Model\ViewModel;
class XmHuibaoViewModel extends ViewModel {
   public $viewFields = array(
   
		'huibao'=>array('id','address','types','rwname','cell_username','cell_userid','fzr','UserPhoto'=>'photo','uid','kid','jindutxt','picdescript','content','lon','lat','stime','andtime','addtime','_type'=>'LEFT'),
		
		//'member'=>array('user_id','user_name','userphoto', '_on'=>'member.user_id=huibao.uid','_type'=>'LEFT'),
		
		
		//'gongyingshang'=>array('name','zhiwei','_on'=>'gongyingshang.user_id=member.user_id','_type'=>'LEFT'),
   );
 }