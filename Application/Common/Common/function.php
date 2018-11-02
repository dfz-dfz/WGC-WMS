<?php
//移除融云群用户
function rongCloud_del_user($user_id,$group_id){
	$app=C('RONG2.APP_KEY');
	$key=C('RONG2.APP_SECRET');
	
	$rongCloud = new \Org\Util\ServerAPI($app,$key);
	//将用户从群中移除，不再接收该群组的消息。
	$rongRes = $rongCloud -> groupQuit($user_id, $group_id);
	
	
	return $rongRes;
}

//解散融云群用户和群
function rongCloud_groupDismiss($user_id,$group_id){
	$app=C('RONG2.APP_KEY');
	$key=C('RONG2.APP_SECRET');
	
	$rongCloud = new \Org\Util\ServerAPI($app,$key);
	//解散群组方法  将该群解散，所有用户都无法再接收该群的消息。
	$rongRes = $rongCloud -> groupDismiss($user_id, $group_id);
	
	
	return $rongRes;
}


//获取本月日期：
function getMonth($date){
  $firstday = date("Y-m-01",strtotime($date));
  $lastday = date("Y-m-d",strtotime("$firstday +1 month -1 day"));
  return array($firstday,$lastday);
}

//获取上月日期：
function getlastMonthDays($date){
  $timestamp=strtotime($date);
  $firstday=date('Y-m-01',strtotime(date('Y',$timestamp).'-'.(date('m',$timestamp)-1).'-01'));
  $lastday=date('Y-m-d',strtotime("$firstday +1 month -1 day"));
  return array($firstday,$lastday);
}

//获取下月日期：
function getNextMonthDays($date){
  $timestamp=strtotime($date);
  $arr=getdate($timestamp);
  if($arr['mon'] == 12){
    $year=$arr['year'] +1;
    $month=$arr['mon'] -11;
    $firstday=$year.'-0'.$month.'-01';
    $lastday=date('Y-m-d',strtotime("$firstday +1 month -1 day"));
  }else{
    $firstday=date('Y-m-01',strtotime(date('Y',$timestamp).'-'.(date('m',$timestamp)+1).'-01'));
    $lastday=date('Y-m-d',strtotime("$firstday +1 month -1 day"));
  }
  return array($firstday,$lastday);
}
//应项目的所有语音
function getvoice($f_id="",$table='voice'){
	$f_id=trim($f_id);
	$ret=M($table)->where(array('f_id'=>$f_id))->order('id desc')->field('v_path,addtime')->select();
	$ret=array_reverse($ret);
	return $ret;
}
//获取回复列表
function getHfList($f_id=0,$f_type=0){
	$w=array(
		'f_id'=>$f_id,
		'f_type'=>$f_type
	);
	$info=M('reply')->where($w)->order('id desc')->select();
	if(!empty($info)){
		foreach($info as $key=>$val){
			$user_id=$val['user_id'];
			$pic=$val['pic'];
			$uinfo=getuinf($user_id);
			$info[$key]['name']=$uinfo[0]['name'];
			$info[$key]['userphoto']=$uinfo[0]['userphoto'];
			$info[$key]['zhiwei']=$uinfo[0]['zhiwei'];
			//获取语音
			$voice=getvoice($info[$key]['id'],'voice_hf');
			foreach($voice as $k=>$v){
				$info[$key]['voice'][]=array('v_path'=>$v['v_path'],'addtime'=>$v['addtime']);
			}
			//分割图片
			$r=explode(',',$pic);
			$res=array();
			foreach($r as $k2=>$v2){
				$res[]=$v2;
			}
			$info[$key]['pic']=$res;
		}
		
	}
	return $info;
}
//获取用户姓名、头像、职位
function getuinf($user_ids=""){
	$user_ids=trim($user_ids,',');
	
	
	return M('member')->alias('m')->join('ecm_gongyingshang g ON m.user_id = g.user_id')->where(array('m.user_id'=>array('in',$user_ids)))->field('m.user_id,m.user_name as mobile,g.name,g.email,g.zhiwei,m.have_job,m.utype,g.sex,g.nianling as age,g.bumen,g.huji,g.shenfenzheng as id_card,g.gz_jingyan as experience,g.intension,g.skill,m.balance,m.frozen,m.authentication,m.userphoto,m.regtime,m.token,m.lon,m.lat,m.push_id,m.renzheng')->order('m.user_id desc')->select();
}
/**
 * 发送会话消息
 * @param $fromUserId   发送人用户 Id。（必传）
 * @param $toUserId     接收用户 Id，提供多个本参数可以实现向多人发送消息。（必传）
 * @param $objectName   消息类型，参考融云消息类型表.消息标志；可自定义消息类型。（必传）
 * @param $content      发送消息内容，参考融云消息类型表.示例说明；如果 objectName 为自定义消息类型，该参数可自定义格式。（必传）
 * @param string $pushContent   如果为自定义消息，定义显示的 Push 内容。(可选)
 * @param string $pushData  针对 iOS 平台，Push 通知附加的 payload 字段，字段名为 appData。(可选)
 * @return json|xml
 */
function messageSystem($toUserId = array(),$content = array()){
	$app=C('RONG2.APP_KEY');
	$key=C('RONG2.APP_SECRET');
	$rongCloud = new \Org\Util\ServerAPI($app,$key);
	$rongCloud->messagePublish('1473403924', $toUserId, 'RC:TxtMsg',$content);
	//$rongres = $rongCloud->messagePublish('1473403924', $toUserId, $objectName, $content, $pushContent='', $pushData = ''); 
}


//数组规范输出
//文件上传类
function upload($file=null,$maxSize=0,$exts=0,$savePath='')
{
    $upload = new \Think\Upload();// 实例化上传类
    //$upload->maxSize   = $maxSize;// 设置附件上传大小
	$upload->maxSize   = '1000000000000000000';// 设置附件上传大小
    //$upload->exts      = $exts; //array('jpg', 'gif', 'png', 'jpeg'); 设置附件上传类型
	$upload->exts      = array(
		".png", ".jpg", ".jpeg", ".gif", ".bmp",
        ".flv", ".swf", ".mkv", ".avi", ".rm", ".rmvb", ".mpeg", ".mpg",
        ".ogg", ".ogv", ".mov", ".wmv", ".mp4", ".webm", ".mp3", ".wav", ".mid",
        ".rar", ".zip", ".tar", ".gz", ".7z", ".bz2", ".cab", ".iso",
        ".doc", ".docx", ".xls", ".xlsx", ".ppt", ".pptx", ".pdf", ".txt", ".md", ".xml"
	); // 设置附件上传类型
    $upload->savePath  = $savePath; // 设置附件上传目录
	// 上传文件
    if($file)
      $info = $upload->uploadOne($file);
    else
      $info = $upload->upload();
    if(!$info) {
	// 上传错误提示错误信息
		//print_r($upload->getError());die;
		//$this->error($upload->getError());
		return false;
    }else{
	// 上传成功
		return $info;
	}
}
//数组位置互换
function sortbyindex($one=0,$two=0,$arr){
	$twov=$arr[$two];
	$onev=$arr[$one];
	$arr[$one]=$twov;
	$arr[$two]=$onev;
	return $arr;
}
//二维数组排序
/*
*SORT_ASC - 默认，按升序排列。(A-Z)
*SORT_DESC - 按降序排列。(Z-A)
*
*SORT_REGULAR - 默认。将每一项按常规顺序排列。
*SORT_NUMERIC - 将每一项按数字顺序排列。
*SORT_STRING - 将每一项按字母顺序排列
*/
function my_sort($arrays,$sort_key,$sort_order=SORT_DESC,$sort_type=SORT_NUMERIC){ 
	if(is_array($arrays)){   
		foreach ($arrays as $array){   
			if(is_array($array)){   
				$key_arrays[] = $array[$sort_key];   
			}else{   
				return false;   
			}   
		}   
	}else{   
		return false;   
	}  
	array_multisort($key_arrays,$sort_order,$sort_type,$arrays);   
	return $arrays;   
} 
//合并两个一维数组，去掉重复元素
function arraymerge($arr1=array(),$arr2=array(),$returnarr=array()){
	if(!empty($arr1) && is_array($arr1)){
		foreach($arr1 as $key=>$val){
			$returnarr[] = $val;
		}
	}
	if(!empty($arr2) && is_array($arr2)){
		if(!empty($returnarr)){
			foreach($arr2 as $k=>$v){
				$flag = false;
				foreach($returnarr as $ke=>$va){
					if($va == $v){
						$flag = true;
					}
				}
				if(!$flag){
					$returnarr[] = $v;
				}
			}
			
		}else{
			if(!empty($arr2) && is_array($arr2)){
				foreach($arr2 as $key2=>$val2){
					$returnarr[] = $val2;
				}
			}
		}
	}
	return $returnarr;
}
//删除图片
function myunlink($picpath){
  unlink($picpath);
}

//获取现有url的所有参数，并把重复的替换
function getUrlvalue($key="",$value="")
{
	$data=array();
	foreach($_GET as $k=>$v){
		$data[$k]=$v;
	}
  if(!empty($key) && !empty($value)){
    $data[$key]=$value;
  }
	return $data;
}

//获取现有url的所有参数,放入数组参数列表，并把重复的替换,去掉空的参数值
function getUrlvalues($params=array())
{
  $data=array();
  foreach($_GET as $k=>$v){
  	$v=trim($v);
  	if(!empty($v)){
  		$data[$k]=$v;
  	}
  }
  foreach($params as $key=>$val){
  	$val=trim($val);
  	if(!empty($val)){
  		$data[$key]=$val;
  	}
  }
  return $data;
}

//获取ip
//function getip()
//{
//	return get_client_ip();
//}

//获取ip所属地址
function getIpAddress($ip)
{
	$Ip = new \Org\Net\IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
	$address = $Ip->getlocation($ip); // 获取某个IP地址所在的位置
	$address = iconv('gb2312','utf-8',$address['country']);
	return $address;
}

//检查密码是否一致
function check_password($inputpassword,$userpassword)
{
	if(crypt($inputpassword,$userpassword) == $userpassword){
		return true;
	}else{
		return false;
	}
}

//验证码检验
function check_verify($code,$id="")
{
    $verify = new \Think\Verify();
    return $verify->check($code,$id);
}

//加密
function pwd_encode($data,$key,$expire)
{
	$key=$key?$key:C('PWD_KEY');
	$expire=$expire?$expire:C('AUTO_LOGIN_TIME');
	return \Think\Crypt\Driver\Think::encrypt($data,$key,$expire);
}
//解密
function pwd_decode($data)
{
	$key=$key?$key:C('PWD_KEY');
	return \Think\Crypt\Driver\Think::decrypt($data,$key);
}

//读取Excel
function Read_excel($file){
  import('Com.PHPExcel');       //引入excel
  import('Com.PHPExcel.Reader.Excel2007');
  $Excel = new \PHPExcel();
  $Reader = new \PHPExcel_Reader_Excel2007();
  if(!$Reader->canRead($file)){
      import('Com.PHPExcel.Reader.Excel5');
      $Reader = new \PHPExcel_Reader_Excel5();
      if(!$Reader->canRead($file)){
          exit("Excel 操作出错!");
      }
  }
  $PHPExcel = $Reader->load($file);
  $SheetCount = $PHPExcel->getSheetCount();   // 获取工作表个数
  $array = array();
  for($i=0;$i<$SheetCount;$i++){
      $currentSheet = $PHPExcel->getSheet($i);    //获取第$i个工作表
      $allColumn = $currentSheet->getHighestColumn();
      $allRow = $currentSheet->getHighestRow();
      $array[$i]["Title"] = $currentSheet->getTitle();
      $array[$i]["Cols"] = $allColumn;
      $array[$i]["Rows"] = $allRow;
      $arr = array();
      //循环获取表中的数据，$currentRow表示当前行，从哪行开始读取数据，索引值从0开始
      for($currentRow=1;$currentRow<=$allRow;$currentRow++){
          for($currentColumn='A';$currentColumn<=$allColumn;$currentColumn++){
              $address=$currentColumn.$currentRow;
              $arr[$currentRow][$currentColumn]=$currentSheet-> getCell($address)->__toString();
          }
      }
      $array[$i]["Content"] = $arr;
  }
  return $array;
}

function SendEmail($email,$title,$content)
{
  import('Com.PHPMailer');
  $mail = new \PHPMailer();
  $title = "密码找回";
  $content = "亲爱的用户 ".$username."：您好！
      <br>
      <br>
        您收到这封这封电子邮件是因为您 (也可能是某人冒充您的名义) 申请了一个新的密码。假如这不是您本人所申请, 请不用理会这封电子邮件, 但是如果您持续收到这类的信件骚扰, 请您尽快联络管理员。
      <br>";
  $mail->IsSMTP();                           // tell the class to use SMTP
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->Port       = 25;                    // set the SMTP server port
  $mail->Host       = "smtp.163.com"; // SMTP server
  $mail->Username   = "13232139621@163.com";     // SMTP server username
  $mail->Password   = "tbamiabtpcgyurqo";            // SMTP server password
  //$mail->IsSendmail();  // tell the class to use Sendmail
  $mail->AddReplyTo("13232139621@163.com","test网");
  $mail->From       = "13232139621@163.com";
  $mail->FromName   = "test";
  $mail->Subject  = $title;
  $mail->AltBody    = $title; // optional, comment out and test
  $mail->WordWrap   = 80; // set word wrap
  $mail->MsgHTML($content);
  $mail->IsHTML(true); // send as HTML
  $mail->AddAddress($email);
  if($mail->Send()){
    return true;
  }else{
    return false;
  }
}

function p_del($input,&$model,$where,$field)
{
  if($input && is_array($input)){
    foreach($input as $id){
      $res = $model->field($field)->where($where,$id)->find();
      if($res){
        foreach($res as $v){
          $p = C('UNLINK_PATH').$v;
          if($v && file_exists($p)){
            unlink($p);
          }
        }
      }
      $model->where(sprintf($where,$id))->delete();
    }
    return true;
  }else{
    return false;
  }
}

//根据IP地址获取所在城市的详细信息 返回：
    // [start] => -1
    // [end] => -1
    // [country] => 中国
    // [province] => 广东
    // [city] => 广州
    // [district] => 
    // [isp] => 
    // [type] => 
    // [desc] => 
    // [ip] => 219.137.123.156
/*function GetIpLookup($ip = ''){
    if(empty($ip)){
        $ip = getip();
    }
    $res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);
    if(empty($res)){ return false; }
    $jsonMatches = array();
    preg_match('#\{.+?\}#', $res, $jsonMatches);
    if(!isset($jsonMatches[0])){ return false; }
    $json = json_decode($jsonMatches[0], true);
    if(isset($json['ret']) && $json['ret'] == 1){
        $json['ip'] = $ip;
        unset($json['ret']);
    }else{
        return false;
    }
    return $json;
}*/
function mycallback($var){
    if(is_numeric($var)){return true;}
    if(!is_array($var)){
         $var=trim($var);
        if(!empty($var)){
          return true;
        }else{
          return false;
        }
    }else{
      return false;
    }
   
}
/*
清除数组中的空元素
注意，这里只是一维数组
*/
function my_array_filter($arr){
  $res=array_filter($arr,'mycallback');
  return $res;
}

//字符串转数组
function my_explode($str=" ",$string){
  return explode($str,$string);
}
function my_implode($str=" ",$arr){
  return implode($str,$arr);
}
function my_trim($val){
  return trim($val);
}
//删除票务函数
/*
*$goods_id 票务id
*$time_id 时间段id
*$goods 票务模型
*$time 票务时间表模型
*/
function ticket_del($goods_id,$time_id,$goods,$time){
  //判断当前票务，是否有多个时间段，少于等于一个，把票务删除，否则只删除时间段
      $count=$time->where(array('goods_id'=>$goods_id))->count();
      if(!empty($goods_id) && !empty($time_id)){
        if($count>1){
          $time->where(array('time_id'=>$time_id))->delete();
        }else{
          //把票务对应图片删除
          $picstr=$goods->where(array('goods_id'=>$goods_id))->getField('thumb');
          $picarr=my_array_filter(my_explode(',',$picstr));
          foreach($picarr as $picurl){
            if(!empty($picurl)){
                  unlink($picurl);
                }
          }
          if($goods->where(array('goods_id'=>$goods_id))->delete()){
            if($time->where(array('time_id'=>$time_id))->delete())
            {
              return true;
            }else{return false;}
            
          }
        }

      }else{return false;}
}


/**
* 杨工
* 2016-09-08
*优易网php短信接口
*/
class UeSmsApi{
  function sendSMS($mobile,$content)
  {
      $http = 'http://inter.smswang.net:7801/sms';
      $extno='1069032239089422';
      $action='send';
    
    $account='000432';
    $password='DJnmS7';
    
      $data = array
      (
          'action'=>$action,
          'account'=>$account,          //账户密码
          'password'=>$password,      //账户密码
          'mobile'=>$mobile,        //目标号码
          'content'=>$content,      //
          'extno'=>$extno,
      );
      $re= $this->postSMS($http,$data);     //POST方式提交
  //    var_dump($re);exit;
      if(stristr($re,'OK'))
      {
          return "发送成功!";
      }
      else
      {
          return "发送失败! XML信息".$re;
      }
  }

  function postSMS($url,$data='')
  {
      $row = parse_url($url);
      $row['port']='7803';
      $host = $row['host'];
      $port = $row['port'] ? $row['port']:80;
      $file = $row['path'];
      $post='';
      while (list($k,$v) = each($data))
      {
          $post .= rawurlencode($k)."=".rawurlencode($v)."&"; //תURL��׼��
      }
      $post = substr( $post , 0 , -1 );
      $len = strlen($post);
      $fp = @fsockopen( $host ,$port, $errno, $errstr, 10);
      if (!$fp) {
          return "$errstr ($errno)\n";
      } else {
          $receive = '';
          $out = "POST $file HTTP/1.1\r\n";
          $out .= "Host: $host\r\n";
          $out .= "Content-type: application/x-www-form-urlencoded\r\n";
          $out .= "Connection: Close\r\n";
          $out .= "Content-Length: $len\r\n\r\n";
          $out .= $post;
          fwrite($fp, $out);
          while (!feof($fp)) {
              $receive .= fgets($fp, 128);
          }
          fclose($fp);
          $receive = explode("\r\n\r\n",$receive);
          unset($receive[0]);
          return implode("",$receive);
      }
  }
}

//发送短信

function send($mobile,$content){
  $send = new UeSmsApi();
  $send -> sendSMS($mobile,$content); 
}

//https请求（支持GET和POST）
function https_request($url,$data = null)
{
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	if(!empty($data))
	{
		curl_setopt($ch,CURLOPT_POST,1);//模拟POST
		curl_setopt($ch,CURLOPT_POSTFIELDS,$data);//POST内容
	}
	$outopt = curl_exec($ch);
	curl_close($ch);
	$outopt = json_decode($outopt,true);
	return $outopt;
}
//获取城市
function GetIp(){  
    $realip = '';  
    $unknown = 'unknown';  
    if (isset($_SERVER)){  
        if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown)){  
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);  
            foreach($arr as $ip){  
                $ip = trim($ip);  
                if ($ip != 'unknown'){  
                    $realip = $ip;  
                    break;  
                }  
            }  
        }else if(isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP']) && strcasecmp($_SERVER['HTTP_CLIENT_IP'], $unknown)){  
            $realip = $_SERVER['HTTP_CLIENT_IP'];  
        }else if(isset($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['REMOTE_ADDR']) && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)){  
            $realip = $_SERVER['REMOTE_ADDR'];  
        }else{  
            $realip = $unknown;  
        }  
    }else{  
        if(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), $unknown)){  
            $realip = getenv("HTTP_X_FORWARDED_FOR");  
        }else if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), $unknown)){  
            $realip = getenv("HTTP_CLIENT_IP");  
        }else if(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), $unknown)){  
            $realip = getenv("REMOTE_ADDR");  
        }else{  
            $realip = $unknown;  
        }  
    }  
    $realip = preg_match("/[\d\.]{7,15}/", $realip, $matches) ? $matches[0] : $unknown;  
    return $realip;  
}
function GetIpLookup($ip = ''){  
    if(empty($ip)){  
        $ip = GetIp();  
    }  
    $res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);  
    if(empty($res)){ return false; }  
    $jsonMatches = array();  
    preg_match('#\{.+?\}#', $res, $jsonMatches);  
    if(!isset($jsonMatches[0])){ return false; }  
    $json = json_decode($jsonMatches[0], true);  
    if(isset($json['ret']) && $json['ret'] == 1){  
        $json['ip'] = $ip;  
        unset($json['ret']);  
    }else{  
        return false;  
    }  
	
	
    return $json;  
} 
function city(){
	$SA_IP=GetIpLookup();
	$city = $SA_IP['city'];
	if(empty($_SESSION['city']) && !isset($_SESSION['city'])){
		return $city;
	}else{
		return $_SESSION['city'];
	}
}
/**
 * 验证输入的邮件地址是否合法
 *
 * @param   string      $email      需要验证的邮件地址
 *
 * @return bool
 */
function is_email($user_email)
{
    $chars = "/^([a-z0-9+_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,5}\$/i";
    if (strpos($user_email, '@') !== false && strpos($user_email, '.') !== false)
    {
        if (preg_match($chars, $user_email))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    else
    {
        return false;
    }
}


/**
 * 获得当前的域名
 *
 * @return  string
 */
function get_domain()
{
    /* 协议 */
    $protocol = (isset($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) != 'off')) ? 'https://' : 'http://';

    /* 域名或IP地址 */
    if (isset($_SERVER['HTTP_X_FORWARDED_HOST']))
    {
        $host = $_SERVER['HTTP_X_FORWARDED_HOST'];
    }
    elseif (isset($_SERVER['HTTP_HOST']))
    {
        $host = $_SERVER['HTTP_HOST'];
    }
    else
    {
        /* 端口 */
        if (isset($_SERVER['SERVER_PORT']))
        {
            $port = ':' . $_SERVER['SERVER_PORT'];

            if ((':80' == $port && 'http://' == $protocol) || (':443' == $port && 'https://' == $protocol))
            {
                $port = '';
            }
        }
        else
        {
            $port = '';
        }

        if (isset($_SERVER['SERVER_NAME']))
        {
            $host = $_SERVER['SERVER_NAME'] . $port;
        }
        elseif (isset($_SERVER['SERVER_ADDR']))
        {
            $host = $_SERVER['SERVER_ADDR'] . $port;
        }
    }

    return $protocol . $host;
}

/**
 * 获得当前URL地址
 *
 * @return  string
 */
function site_url()
{
    return get_domain() . substr(PHP_SELF, 0, strrpos(PHP_SELF, '/')).$_SERVER[REQUEST_URI];
}
?>
