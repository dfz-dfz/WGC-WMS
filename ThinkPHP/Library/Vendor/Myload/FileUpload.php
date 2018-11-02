<?php
class FileUpload { 
    private $path;          //上传文件保存的路径
    private $allowtype; //设置限制上传文件的类型
    private $maxsize;           //限制文件上传大小（字节）
    private $israndname;           //设置是否随机重命名文件， false不随机
	private $subname;           //子目录 创建方式 array('date', 'YmdHis组合') 或者 array('string', '/分隔字符串') 或者 array()
	
	/**
     * 默认上传配置
     * @var array
     */
    private $config = array(
        'path'         =>  "D:\\wwwroot\\59jiaju\\wwwroot\\manage\\Public\\wangpan\\", //上传文件保存的路径
        'allowtype'       =>  array('jpg','gif','png'), //设置限制上传文件的类型
        'maxsize'          =>  1000000, //限制文件上传大小（字节）
        'israndname'       =>  true, //设置是否随机重命名文件， false不随机
		'subname'       =>  array()
    );
	
    private $originName;              //源文件名
    private $tmpFileName;              //临时文件名
    private $fileType;               //文件类型(文件后缀)
    private $fileSize;               //文件大小
    private $newFileName;              //新文件名
    private $errorNum = 0;             //错误号
    private $errorMess="";             //错误报告消息
	//构造类，
	function __construct($config = array()){
		 /* 获取配置 */
        $this->config   =   array_merge($this->config, $config);
		foreach($this->config as $key=>$val){
			$this->set($key, $val);
		}
	}
    
	
    /**
     * 调用该方法上传文件,支持多文件上传
     * @param  string $fileFile  上传文件的表单名称 
     * @return bool        如果上传成功返回数true 
     */
    function upload($fileField){
        $return = true;
        /* 检查文件路径是滞合法 */
        if(!$this->checkFilePath()){       
            $this->errorMess = $this->getError();
			$this->path=$this->config['path'];
            return false;
        }
        /* 将文件上传的信息取出赋给变量 */
        $name = $_FILES[$fileField]['name'];
		//$name = iconv("UTF-8","gb2312", $name);
        $tmp_name = $_FILES[$fileField]['tmp_name'];
        $size = $_FILES[$fileField]['size'];
        $error = $_FILES[$fileField]['error'];

      /* 如果是多个文件上传，则$file["name"]会是一个数组 */
      if(is_Array($name)){    
        $errors=array();
        /*多个文件上传则循环处理 ， 这个循环只有检查上传文件的作用，并没有真正上传 */
        for($i = 0; $i < count($name); $i++){ 
            /*设置文件信息 */
			//$svname = iconv("UTF-8","gb2312", $name[$i]);
			$svname = $name[$i];
            if($this->setFiles($svname,$tmp_name[$i],$size[$i],$error[$i])) {
                if(!$this->checkFileSize() || !$this->checkFileType()){
                    $errors[] = $this->getError();
                    $return=false; 
                }
            }else{
                $errors[] = $this->getError();
                $return=false;
            }
            /* 如果有问题，则重新初使化属性 */
            if(!$return){
				$this->setFiles();
			}    
        }
        if($return){
            /* 存放所有上传后文件名的变量数组 */
            $fileNames = array();      
            /* 如果上传的多个文件都是合法的，则通过销魂循环向服务器上传文件 */
            for($i = 0; $i < count($name); $i++){ 
				//$svname2 = iconv("UTF-8","gb2312", $name[$i]);
				$svname2 = $name[$i];
                if($this->setFiles($svname2, $tmp_name[$i], $size[$i], $error[$i] )) {
                    $this->setNewFileName(); //随机新名称
                    if(!$this->copyFile()){//临时文件，转移存储
                        $errors[] = $this->getError();
                        $return = false;
                    }
                    $fileNames[] = $this->newFileName;  
                }          
            }
            $this->newFileName = $fileNames;//多文件上传的所有文件对应新的文件名数组
        }
        $this->errorMess = $errors;//多文件上传的所有错误信息数组
		$this->path=$this->config['path'];
        return $return;
      /*上传单个文件处理方法*/
      } else {
			/* 设置文件信息 */
			//$svname3 = iconv("UTF-8","gb2312", $name);
			$svname3 = $name;
			if($this->setFiles($svname3,$tmp_name,$size,$error)) {
				/* 上传之前先检查一下大小和类型 */
				if($this->checkFileSize() && $this->checkFileType()){ 
					/* 为上传文件设置新文件名 */
					$this->setNewFileName(); 
					/* 上传文件  返回0为成功， 小于0都为错误 */
					if($this->copyFile()){ 
					  $this->path=$this->config['path'];
					  return true;
					}else{
					  $return=false;
					}
				}else{
					$return=false;
				}
			} else {
				$return=false; 
			}
			//如果$return为false, 则出错，将错误信息保存在属性errorMess中
			if(!$return)
			{
				$this->errorMess=$this->getError();
			}
			$this->path=$this->config['path'];
			return $return;
      }
    }
    /** 
     * 获取上传后的文件名称
     * @param  void   没有参数
     * @return string 上传后，新文件的名称， 如果是多文件上传返回数组
     */
    public function getFileName(){
        return $this->newFileName;
    }
	
	/** 
     * 获取上传后的文件的相对（文件）根目录的路径
     * @param  void   没有参数
     * @return string 上传后，新文件的名称， 如果是多文件上传返回数组
     */
    public function getFilePath(){
         $paths=$this->newFileName;
		 $path = rtrim($this->config['path'], '\\').'\\';
		 if(is_array($paths)){
			 foreach($paths as $key=>$val){
				if(empty($this->subname)){
					 $paths[$key]=$path.$paths[$key];
					 $paths[$key]=ltrim($paths[$key],'.');
				}else if(in_array('date',$this->subname)){
					 $subname=$this->subname;
					 $paths[$key]=$path.date($subname[1],time()).'\\'.$paths[$key];
					 $paths[$key]=ltrim($paths[$key],'.');
				}else if(in_array('string',$this->subname)){
					$subname=$this->subname;
					$subname = trim($subname[1], '\\');
					$paths[$key]=$path.$subname.'\\'.$paths[$key];
					$paths[$key]=ltrim($paths[$key],'.');
				}
			 }
		 }else{
			if(empty($this->subname)){
				 $paths=$path.$paths;
				 $paths=ltrim($paths,'.');
			}else if(in_array('date',$this->subname)){
				 $subname=$this->subname;
				 $paths=$path.date($subname[1],time()).'\\'.$paths;
				 $paths=ltrim($paths,'.');
			}else if(in_array('string',$this->subname)){
				$subname=$this->subname;
				$subname = trim($subname[1], '\\');
				$paths=$path.$subname.'\\'.$paths;
				$paths=ltrim($paths,'.');
			}
		 }
		// $paths = iconv("gb2312","UTF-8", $paths);
		 return $paths;
    }

    /**
	 * 最后结果异常错误信息
     * 上传失败后，调用该方法则返回，上传出错信息
     * @param  void   没有参数
     * @return string  返回上传文件出错的信息报告，如果是多文件上传返回数组
     */
    public function getErrorMsg(){
        return $this->errorMess;
    }

    /* 
	*过程中临时记录的异常错误信息
	*设置上传出错信息 
	*
	*/
    private function getError() {
        $str = "上传文件<font color='red'>{$this->originName}</font>时出错 : ";
        switch ($this->errorNum) {
			case 5: $str .= "保存路径子目录格式有误"; break;
            case 4: $str .= "没有文件被上传"; break;
            case 3: $str .= "文件只有部分被上传"; break;
            case 2: $str .= "上传文件的大小超过了HTML表单中MAX_FILE_SIZE选项指定的值"; break;
            case 1: $str .= "上传的文件超过了php.ini中upload_max_filesize选项限制的值"; break;
            case -1: $str .= "未允许类型"; break;
            case -2: $str .= "文件过大,上传的文件不能超过{$this->maxsize}个字节"; break;
            case -3: $str .= "上传失败"; break;
            case -4: $str .= "建立存放上传文件目录失败，请重新指定上传目录"; break;
            case -5: $str .= "必须指定上传文件的路径"; break;
            default: $str .= "未知错误";
        }
        return $str.'<br>';
    }
	
	/* 设置随机文件名 */
    private function proRandName() {    
       // $fileName = date('YmdHis')."_".rand(1,999999);
		$fileName = sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));	   
        $fileName=time().'-'.$fileName.'.'.$this->fileType; 
		$path = rtrim($this->config['path'], '\\').'\\';
		if(empty($this->subname)){
			$filePath=$path.$fileName;
			if(file_exists($filePath)){
				$this->proRandName();
			}	
		}else if(in_array('date',$this->subname)){
			 $subname=$this->subname;
			 $filePath=$path.date($subname[1],time()).'\\'.$fileName;
			 if(file_exists($filePath)){
				$this->proRandName();
			 }
		}else if(in_array('string',$this->subname)){
			$subname=$this->subname;
			$subname = trim($subname[1], '\\');
			$filePath=$path.$subname.'\\'.$fileName;
			if(file_exists($filePath)){
				$this->proRandName();
			 }
		}
		return $fileName;
    }
    
    /* 设置上传后的文件名称 */
    private function setNewFileName() {
        if ($this->israndname) {
            $this->setOption('newFileName', $this->proRandName());  
        } else{ 
            $this->setOption('newFileName', $this->originName);
        } 
    }

    /* 检查上传的文件是否是合法的类型 */
    private function checkFileType() {
        if (in_array(strtolower($this->fileType), $this->allowtype)) {
            return true;
        }else {
            $this->setOption('errorNum', -1);
            return false;
        }
    }

    /* 检查上传的文件是否是允许的大小 */
    private function checkFileSize() {
        if ($this->fileSize > $this->maxsize) {
            $this->setOption('errorNum', -2);
            return false;
        }else{
            return true;
        }
    }
	
    /* 复制上传文件到指定的位置 */
    private function copyFile() {
        if(!$this->errorNum) {
            $path = rtrim($this->path, '\\').'\\';
            $path .= $this->newFileName;
            if (@move_uploaded_file($this->tmpFileName, $path)) {
                return true;
            }else{
                $this->setOption('errorNum', -3);
                return false;
            }
        } else {
            return false;
        }
    }
	/**
     * 用于设置成员属性（$path, $allowtype,$maxsize, $israndname）
     * 可以通过连贯操作一次设置多个属性值
     *@param  string $key  成员属性名(不区分大小写)
     *@param  mixed  $val  为成员属性设置的值
     *@return  object     返回自己对象$this，可以用于连贯操作
     */
    function set($key, $val){
        $key = strtolower($key); 
        if( array_key_exists( $key, get_class_vars(get_class($this) ) ) ){
            $this->setOption($key, $val);
        }
        return $this;
    }
	
	/* 为单个成员属性设置值 */
    private function setOption($key, $val) {
        $this->$key = $val;
    }

	/* 检查是否有存放上传文件的目录 ，没有就创建*/
    private function checkFilePath() {
        if(empty($this->path)){
            $this->setOption('errorNum', -5);
            return false;
        }
		if(empty($this->subname)){
			//默认存放在存储路径
		}else if(in_array('date',$this->subname)){
			$this->path= rtrim($this->path, '\\');
			$subname=$this->subname;
			$this->path=$this->path . '\\'.date($subname[1],time());
		}else if(in_array('string',$this->subname)){
			$this->path= rtrim($this->path, '\\');
			$subname=$this->subname;
			$subname = trim($subname[1], '\\');
			$this->path=$this->path . '\\'.$subname;
		}else{
			 $this->setOption('errorNum', 5);
			 return false;
		}
		if(!file_exists($this->path) || !is_writable($this->path)){
			if (!@mkdir($this->path, 0777 ,true)) {
				$this->setOption('errorNum', -4);
				return false;
			}
		}
        return true;
    }
	
	 /* 设置和$_FILES有关的内容
	*$name=$_FILES['name']
	*$tmp_name=$_FILES['tmp_name']
	*$size=$_FILES['size']
	*$error=$_FILES['error']
	*/
    private function setFiles($name="", $tmp_name="", $size=0, $error=0) {
        $this->setOption('errorNum', $error);
        if($error){
			 return false;
		} 
		$path = '';
		if(empty($this->subname)){
			//默认存放在存储路径
		}else if(in_array('date',$this->subname)){
			$subname=$this->subname;
			$path = $path .date($subname[1],time()). '\\';
		}else if(in_array('string',$this->subname)){
			$subname=$this->subname;
			
			$string  =  $subname[1] ;
			$pattern  =  '/\//i' ;
			$replacement  =  '\\' ;
			$subname = preg_replace ( $pattern ,  $replacement ,  $string );
			$subname = trim($subname,'\\') ;
			
			$path = $path .$subname. '\\';
		}
		$path = rtrim($path, '\\').'\\';
		$aryStr = explode(".", $name);
		$nameCN = $aryStr[0];
		$count = count($aryStr);
		$str = $aryStr[$count-1];
		$nameEN = $this->encodepath($nameCN);
		$name = $nameEN.'.'.$str;
		
		$dir = $path.$name;
		//原始文件名是否重复
		$namedir = $this->nameonly($dir);
		$pst = strripos($namedir,"\\");
		$name = substr($namedir, $pst+1);
		
        $this->setOption('tmpFileName',$tmp_name);//临时文件名
      
		$ft = strtolower($str);
        $this->setOption('fileType', $ft);//文件类型(文件后缀)
        $this->setOption('fileSize', $size);//文件大小
		
		$this->setOption('originName', $name);//源文件名
		
        return true;
    }
	//获取唯一的文件夹或文件的相对网盘路径（注意反斜杠 \ 路径方式）已经编译路劲
	public function nameonly($dir){
		$pst = strripos($dir,"\\");
		$basepath = substr($dir, 0, $pst+1);
		$foldername = substr($dir, $pst+1);
		$path = $basepath.$foldername;
		//$foldername2 = $this->decodepath($foldername);
		$file = strripos($foldername,".");
		$root = rtrim($this->config['path'], '\\').'\\';
		//保存子路径
		$zhizhen = $root.$path;
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
		//看看是否是文件夹还是文件
		$isdir = strripos($name,".");
		if($isdir === false){
			//对名称进行反编码
			$name = $this->decodepath($name);
		}else{
			$tp = strripos($name,".");
			$tmpname = substr($name, 0, $tp);
			$tmphou = substr($name, $tp);
			//对名称进行反编码
			$tmpname = $this->decodepath($tmpname);
			$name = $tmpname.$tmphou;
		}
		
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
				 $name = $this->encodepath($qian.'(1)');
				return $name.$hou;
			}
			
		}else{
			$file = strripos($name,".");
			if($file === false){
				$before = substr($name, 0, $a);
				$after = substr($name, $e+1);
				$center = substr($name, $a+1, $e-$a-1);
				$center = intval($center);
				$center++;
				$name = $this->encodepath($before.'('.$center.')');
				$name = $name.$after;
				return $name;
			}else{
				$before = substr($name, 0, $a);
				$after = substr($name, $e+1);
				$center = substr($name, $a+1, $e-$a-1);
				$center = intval($center);
				$center++;
				$name = $before.'('.$center.')'.$after;
				$ps = strripos($name,".");
				$qianzhui = substr($name, 0, $ps);
				$qianzhui = $this->encodepath($qianzhui);
				$houzhui = substr($name, $ps);
				return $qianzhui.$houzhui;
			}
			
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