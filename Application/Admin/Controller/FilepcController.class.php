<?php
namespace Admin\Controller;
use Think\Controller;
class FilepcController extends CommonController {
	//获取唯一的文件夹或文件的相对网盘路径（注意反斜杠 \ 路径方式）已经编译路劲
	public function nameonly($dir){
		$pst = strripos($dir,"\\");
		$basepath = substr($dir, 0, $pst+1);
		$foldername = substr($dir, $pst+1);
		$path = $basepath.$foldername;
		$foldername2 = $this->decodepath($foldername);
		$file = strripos($foldername2,".");
		$zhizhen = WEB_DIR ."Public\\wangpan\\PC\\".$path;
		if($file === false){
			
			if(is_dir($zhizhen)){
				//存在重新命名
				$foldername = $this->sameinc($foldername);
				$path = $basepath.$foldername;
				$path = $this->nameonly($path);
			}
		}else{
			if(file_exists($zhizhen)){
				//存在重新命名
				$foldername = $this->sameinc($foldername);
				$path = $basepath.$foldername;
				$path = $this->nameonly($path);
			}
		}
		return $path;
	}
	//取出文件名序号'xx(1).xx'+1
	public function sameinc($name){
		//对名称进行反编码
		$name = $this->decodepath($name);
		$a = strripos($name,"(");
		$e = strripos($name,")");
		if(($a === false) && ($e === false)){
			$file = strripos($name,".");
			if($file === false){
				return $this->encodepath($name.'(1)');
			}else{
				$p = strripos($name,".");
				$qian = substr($name, 0, $p);
				$hou = substr($name, $p);
				return $this->encodepath($qian.'(1)'.$hou);
			}
		}else{
			$before = substr($name, 0, $a);
			$after = substr($name, $e+1);
			$center = substr($name, $a+1, $e-$a-1);
			$center = intval($center);
			$center++;
			return $this->encodepath($before.'('.$center.')'.$after);
		}
	}
	//创建文件夹或文件夹
	public function create($path='',$filename){
		$filename=iconv("UTF-8","gb2312", $filename);
		$dir = '';
		if(empty($path) || ($path == '/') || ($path == './') || ($path == '.\\') || ($path == '\\')){
			$dir = $filename;
		}else{
			$string  =  $path ;
			$pattern  =  '/\//i' ;
			$replacement  =  '\\' ;
			$path = preg_replace ( $pattern ,  $replacement ,  $string );
			$path = trim($path,'\\') ;
			$dir =$path.'\\'.$filename;
		}
		
		$mode = 0777;
	
		$dir = $this->nameonly($dir);
		$lu = $this->decodepath($dir);
		//判断是创建文件还是文件夹
		$file = strripos($lu,".");
		if($file === false){
			$chuangjian = WEB_DIR .'Public\\wangpan\\PC\\'.$dir;
			if(mkdir($chuangjian, $mode,true)){
				$pst = strripos($chuangjian,"\\");
				$name = substr($chuangjian, $pst+1);
				$name = iconv("gb2312","UTF-8", $name);
				return $name;
			}else{
				return NULL;
			} 
		}else{
			$pst = strripos($dir,"\\");
			$name2 = substr($dir, $pst+1);
			$name2 = iconv("gb2312","UTF-8", $name2);
			//创建文件
			$content = '';
			$chuangjian = WEB_DIR .'Public\\wangpan\\PC\\'.$dir;
			file_put_contents($chuangjian,$content,FILE_APPEND);
			
			return $name2;
		}
		
	}
	//对文件名或相对路径的文件名进行编码
	public function encodepath($path){
		$arr = explode('.',$path);
		$path = $arr[0];
		$string2  =  $path;
		$pattern2  =  '/\\\\/i' ;
		$replacement2  =  '/' ;
		$path = preg_replace ( $pattern2 ,  $replacement2 ,  $string2 );
		$path = trim($path,'/');
		$path = explode('/',$path);
		$rerutn = '';
		foreach($path as $key=>$val){
			$val = str_replace(array('+',' ','=','#','&','%','?','/'), array('_a','_k','_e','_j','_d','_p','_r','_x'), base64_encode($val));
			$rerutn .= $val.'/';
		}
		$rerutn = trim($rerutn,'/');
		$rerutn .='.'.$arr[1];
		$rerutn = trim($rerutn);
		$rerutn = trim($rerutn,'.');
		return $rerutn;
	}
	//对文件名或相对路径的文件名进行解码
	public function decodepath($path){
		$arr = explode('.',$path);
		$path = $arr[0];
		$string2  =  $path;
		$pattern2  =  '/\\\\/i' ;
		$replacement2  =  '/' ;
		$path = preg_replace ( $pattern2 ,  $replacement2 ,  $string2 );
		$path = trim($path,'/');
		$path = explode('/',$path);
		$rerutn = '';
		foreach($path as $key=>$val){
			$val = base64_decode(str_replace(array('_a','_k','_e','_j','_d','_p','_r','_x'),array('+',' ','=','#','&','%','?','/'), $val));
			$rerutn .= $val.'/';
		}
		$rerutn = trim($rerutn,'/');
		$rerutn .='.'.$arr[1];
		$rerutn = trim($rerutn);
		$rerutn = trim($rerutn,'.');
		return $rerutn;
	}
	
}
