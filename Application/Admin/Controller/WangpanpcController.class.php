<?php
namespace Admin\Controller;
use Think\Controller;
class WangpanpcController extends Controller {
	public function _initialize()
    {	if(!isset($_SESSION['wgcadmininfo'])||empty($_SESSION['wgcadmininfo'])){
    		//当前访问的url
				
			$this->redirect('Admin/login', array(), 1 , '请登录...');
 		}
        vendor('Myload.FileUpload');
		vendor('Myload.FileDownload');
    }
	//文档文件夹首页列表
	public function document(){
		$this->display('document');
	}
	//图片文件夹首页列表
	public function picture(){
		$this->display('picture');
	}
	//视频文件夹首页列表
	public function video(){
		$this->display('video');
	}
	//笔记文件夹首页列表
	public function note(){
		$this->display('note');
	}
	function urlsafe_b64encode($string) {
	   $data = base64_encode($string);
	   $data = str_replace(array('+','/','='),array('-','_',''),$data);
	   return $data;
	 }
	//创建文件夹OR文本文件
	public function creat(){
		if(!IS_POST){die('404');}
		@session_start();
		$wgcadmininfo = $_SESSION['wgcadmininfo'];
		$bumenlist = $wgcadmininfo['bumen'];
		if(!empty($bumenlist)){
			$bumenlist =',经艺,'.$bumenlist.',';
		}
		$filename = I('post.filename','新文件夹');
		$file = A('Admin/Filepc');
		$levels = I('post.levels',0,'intval'); //所在层级
		$userid = I('post.userid',NULL); //登录用户
		$userid = trim($userid);
		$pid = I('post.pid',0,'intval');//新文件（夹）的父id 即所在层级的主键id
		$isdir = I('post.isdir',1,'intval');//所要创建的是文件夹还是文件  1 文件夹   2文件
		$types = I('post.types',1,'intval');//从属类型   默认1未指定  2文档 3图片 4笔记 5视频
		$display = I('post.display',1,'intval');//可见状态
		if(empty($userid) || ($userid == 'null')){
			$res = array(
				'code' => 202,
				'message' => '用户长时间离线，请重新登录！'
			);
			$this->ajaxReturn($res, "json");die;
		}
		//获取的保存路径已经编码过，
		$path = $this->getPath($pid);
		//filename编码
		$filename = $this->encodepath($filename);
		
		$returnname = $file->create($path,$filename);

		if(empty($returnname)){
			$res = array(
				'code' => 202,
				'message' => '创建失败'
			);
			$this->ajaxReturn($res, "json");die;
		}else{
			$data = array(
				  'pid' => $pid,
				  'userid' => $userid,
				  'filename' => $returnname,
				  'isdir' => $isdir,
				  'types' => $types,
				  'levels' => $levels,
				  'display' => $display,
				  'bumenlist' => $bumenlist,
				  'today' => date('Y-m-d',time()),
				  'addtime' => time()
			);
			$id = M('wangpan')->add($data);
			if($id){}else{
				$res = array(
					'code' => 202,
					'message' => '创建时，文件入库异常'
				);
				$this->ajaxReturn($res, "json");
			}
			$levels = $levels+1;
			//后缀名
			$returnname = $this->decodepath($returnname);
			$pst = strripos($returnname,".");
			$houzhui = '';
			if($pst === false){
				
			}else{
				$houzhui = substr($returnname, $pst+1);
			}
			$res = array(
				'code' => 200,
				'message' => '创建成功！',
				'id' => $id,
				'types' => I('post.types',1,'intval'),
				'isdir' => I('post.isdir',1,'intval'),
				'userid' => $userid,
				'levels' => $levels,
				'display' => I('post.display',1,'intval'),
				'filename' => $returnname,
				'houzhui' => $houzhui
			);
			$this->ajaxReturn($res, "json");
		}
		
	}

	//上传文档 'txt','doc','pdf','zip','xls','ppt','docx','xlsx','pptx','rtf','wpx','docm','dotm','dotx','docx'    dtmp
	public function uploadDocument(){
			if(!IS_POST){die('404');}
			@session_start();
			$wgcadmininfo = $_SESSION['wgcadmininfo'];
			$bumenlist = $wgcadmininfo['bumen'];
			if(!empty($bumenlist)){
				$bumenlist =',经艺,'.$bumenlist.',';
			}
			//文件上传保存路径
			$filename = I('post.filename','filename');
			$pid = I('post.pid',0,'intval');
			$isdir = 2;
			$display = I('post.display',1,'intval');
			$nowid  = I('post.nowid',NULL);
			$userid = I('post.userid',NULL);
			if(empty($userid) || ($userid == 'null')){
				$res = array(
					'code' => 202,
					'message' => '用户长时间离线，请重新登录！'
				);
				$this->ajaxReturn($res, "json");die;
			}
			$ifo = M('wangpan')->where(array('id'=>$pid))->field('types,levels')->find();
			$types = $ifo['types'];
			$levels = $ifo['levels']+1;
			//获取数据库的文件先对与网盘根目录所在路径
			$path = $this->getPath($pid);
			//echo $types.'-'.$levels.'-'.$path;die;
			if(empty($nowid) || ($nowid == 0) || ($nowid == '0') || ($nowid == 'null')){
				$config = array(
						'path'         =>  WEB_DIR ."Public\\wangpan\\PC\\", //上传文件保存的路径
						'allowtype'       =>  array('txt','doc','pdf','zip','xls','ppt','docx','xlsx','pptx','rtf','wpx','docm','dotm','dotx','docx','rar','gz'), //设置限制上传文件的类型
						'maxsize'          =>  120000000, //限制文件上传大小（字节）
						'israndname'       =>  false, //设置是否随机重命名文件， false不随机
						'subname'       =>  array('string', $path)
					);
				$myfile = new \FileUpload($config);
				
				$res = $myfile->upload($filename);
				if(!$res){
					$r=$myfile->getErrorMsg();//错误异常信息
					$res = array(
						'code' => 202,
						'message' => $r
					);
					$this->ajaxReturn($res, "json");die;
				}else{
					
					//上传成功数据写入数据库
					$m=$myfile->getFilePath();//图片路径
					$string2  =  $m;
					$pattern2  =  '/\//i' ;
					$replacement2  =  '\\' ;
					$m = preg_replace ( $pattern2 ,  $replacement2 ,  $string2 );
						$pst = strripos($m,"\\");
						$basepath = substr($m, 0, $pst+1);
						$foldername = substr($m, $pst+1);
						//$m[$key]['name'] = $foldername;
						//插入数据到数据库
						if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
							if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
								$fenxiaoshang_userid = $_SESSION['wgcadmininfo']['fenxiaoshang_userid'];
							}
						}else{
							$fenxiaoshang_userid = 1;
						}
						
						$data = array(
							  'pid' => $pid,
							  'userid' => $userid,
							  'filename' => $foldername,
							  'isdir' => $isdir,
							  'types' => $types,
							  'levels' => $levels,
							  'bumenlist' => $bumenlist,
							  'display' => $display,
							  'today' => date('Y-m-d',time()),
							  'fenxiaoshang_userid' => $fenxiaoshang_userid,
							  'addtime' => time()
						);
						$id = M('wangpan')->add($data);
						if(!$id){
							$res = array(
								'code' => 202,
								'message' => '文件入库异常！'
							);
							$this->ajaxReturn($res, "json");die;
						}else{
							//后缀名
							$pst2 = strripos($foldername,".");
							$houzhui = '';
							if($pst2 === false){
								
							}else{
								$houzhui = substr($foldername, $pst2+1);
								
							}
							$qianzhui = substr($foldername,0,$pst2);
							$fdn = $this->decodepath($qianzhui).'.'.$houzhui;
							$res = array(
								'code' => 200,
								'message' => '上传成功！',
								'id' => $id,
								'types' => $types,
								'isdir' => $isdir,
								'userid' => $userid,
								'levels' => $levels+1,
								'display' => $display,
								'filename' => $fdn,
								'houzhui' => $houzhui
							);
							$this->ajaxReturn($res, "json");die;
						}
					
					
				}
			}else{
				//修改数据库
				$data = array(
					  'pid' => $pid,
					  'userid' => $userid,
					  'isdir' => $isdir,
					  'types' => $types,
					  'levels' => $levels,
					  'display' => $display
				);
				$aft = M('wangpan')->where(array('id'=>$nowid))->setField($data);
				if($aft === false){
					$res = array(
						'code' => 202,
						'message' => '修改出错！'
					);
					$this->ajaxReturn($res, "json");die;
				}else{
					$foldername = M('wangpan')->where(array('id'=>$nowid))->getField('filename');
					//后缀名
					$pst3 = strripos($foldername,".");
					$houzhui = '';
					if($pst3 === false){
						
					}else{
						$houzhui = substr($foldername, $pst3+1);
					}
					$res = array(
						'code' => 200,
						'message' => '上传成功！',
						'id' => $nowid,
						'types' => $types,
						'isdir' => $isdir,
						'userid' => $userid,
						'levels' => $levels+1,
						'display' => $display,
						'filename' => $foldername,
						'houzhui' => $houzhui
					);
					$this->ajaxReturn($res, "json");die;
				}
				
			}
			
	}
    //上传图片 'jpg','png','gif','bmp','jpeg'  ptmp
	public function uploadPicture(){
		if(!IS_POST){die('404');}
		@session_start();
		$wgcadmininfo = $_SESSION['wgcadmininfo'];
		$bumenlist = $wgcadmininfo['bumen'];
		if(!empty($bumenlist)){
			$bumenlist =',经艺,'.$bumenlist.',';
		}
			//文件上传保存路径
			$filename = I('post.filename','filename');
			$pid = I('post.pid',0,'intval');
			$isdir = 2;
			$display = I('post.display',1,'intval');
			$nowid  = I('post.nowid',NULL);
			$userid = I('post.userid',NULL);
			if(empty($userid) || ($userid == 'null')){
				$res = array(
					'code' => 202,
					'message' => '用户长时间离线，请重新登录！'
				);
				$this->ajaxReturn($res, "json");die;
			}
			$ifo = M('wangpan')->where(array('id'=>$pid))->field('types,levels')->find();
			$types = $ifo['types'];
			$levels = $ifo['levels']+1;
			//获取数据库的文件先对与网盘根目录所在路径
			$path = $this->getPath($pid);
			//echo $types.'-'.$levels.'-'.$path;die;
			if(empty($nowid) || ($nowid == 0) || ($nowid == '0') || ($nowid == 'null')){
				$config = array(
						'path'         =>  WEB_DIR ."Public\\wangpan\\PC\\", //上传文件保存的路径
						'allowtype'       =>  array('jpg','png','gif','bmp','jpeg','zip','rar','gz'), //设置限制上传文件的类型
						'maxsize'          =>  120000000, //限制文件上传大小（字节）
						'israndname'       =>  false, //设置是否随机重命名文件， false不随机
						'subname'       =>  array('string', $path)
					);
				$myfile = new \FileUpload($config);
				
				$res = $myfile->upload($filename);
				if(!$res){
					$r=$myfile->getErrorMsg();//错误异常信息
					$res = array(
						'code' => 202,
						'message' => $r
					);
					$this->ajaxReturn($res, "json");die;
				}else{
					
					//上传成功数据写入数据库
					$m=$myfile->getFilePath();//图片路径
					$string2  =  $m;
					$pattern2  =  '/\//i' ;
					$replacement2  =  '\\' ;
					$m = preg_replace ( $pattern2 ,  $replacement2 ,  $string2 );
						$pst = strripos($m,"\\");
						$basepath = substr($m, 0, $pst+1);
						$foldername = substr($m, $pst+1);
						//$m[$key]['name'] = $foldername;
						//插入数据到数据库
						if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
							if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
								$fenxiaoshang_userid = $_SESSION['wgcadmininfo']['fenxiaoshang_userid'];
							}
						}else{
							$fenxiaoshang_userid = 1;
						}
						$data = array(
							  'pid' => $pid,
							  'userid' => $userid,
							  'filename' => $foldername,
							  'isdir' => $isdir,
							  'types' => $types,
							  'levels' => $levels,
							  'display' => $display,
							  'fenxiaoshang_userid' => $fenxiaoshang_userid,
							  'bumenlist' => $bumenlist,
							  'today' => date('Y-m-d',time()),
							  'addtime' => time()
						);
						$id = M('wangpan')->add($data);
						if(!$id){
							$res = array(
								'code' => 202,
								'message' => '文件入库异常！'
							);
							$this->ajaxReturn($res, "json");die;
						}else{
							//后缀名
							$pst2 = strripos($foldername,".");
							$houzhui = '';
							if($pst2 === false){
								
							}else{
								$houzhui = substr($foldername, $pst2+1);
								
							}
							$qianzhui = substr($foldername,0,$pst2);
							$fdn = $this->decodepath($qianzhui).'.'.$houzhui;
							$res = array(
								'code' => 200,
								'message' => '上传成功！',
								'id' => $id,
								'types' => $types,
								'isdir' => $isdir,
								'userid' => $userid,
								'levels' => $levels+1,
								'display' => $display,
								'filename' => $fdn,
								'houzhui' => $houzhui
							);
							$this->ajaxReturn($res, "json");die;
						}
					
					
				}
			}else{
				//修改数据库
				$data = array(
					  'pid' => $pid,
					  'userid' => $userid,
					  'isdir' => $isdir,
					  'types' => $types,
					  'levels' => $levels,
					  'display' => $display
				);
				$aft = M('wangpan')->where(array('id'=>$nowid))->setField($data);
				if($aft === false){
					$res = array(
						'code' => 202,
						'message' => '修改出错！'
					);
					$this->ajaxReturn($res, "json");die;
				}else{
					$foldername = M('wangpan')->where(array('id'=>$nowid))->getField('filename');
					//后缀名
					$pst3 = strripos($foldername,".");
					$houzhui = '';
					if($pst3 === false){
						
					}else{
						$houzhui = substr($foldername, $pst3+1);
					}
					$res = array(
						'code' => 200,
						'message' => '上传成功！',
						'id' => $nowid,
						'types' => $types,
						'isdir' => $isdir,
						'userid' => $userid,
						'levels' => $levels+1,
						'display' => $display,
						'filename' => $foldername,
						'houzhui' => $houzhui
					);
					$this->ajaxReturn($res, "json");die;
				}
				
			}
	}
	//上传视频 'mpg','mpeg','avi','rm','rmvb','mov','wmv','asf','dat','mp4','3gp','asx','mpe','wvx'
	public function uploadVideo(){
		if(!IS_POST){die('404');}
		@session_start();
		$wgcadmininfo = $_SESSION['wgcadmininfo'];
		$bumenlist = $wgcadmininfo['bumen'];
		if(!empty($bumenlist)){
			$bumenlist =',经艺,'.$bumenlist.',';
		}
			//文件上传保存路径
			$filename = I('post.filename','filename');
			$pid = I('post.pid',0,'intval');
			$isdir = 2;
			$display = I('post.display',1,'intval');
			$nowid  = I('post.nowid',NULL);
			$userid = I('post.userid',NULL);
			if(empty($userid) || ($userid == 'null')){
				$res = array(
					'code' => 202,
					'message' => '用户长时间离线，请重新登录！'
				);
				$this->ajaxReturn($res, "json");die;
			}
			$ifo = M('wangpan')->where(array('id'=>$pid))->field('types,levels')->find();
			$types = $ifo['types'];
			$levels = $ifo['levels']+1;
			//获取数据库的文件先对与网盘根目录所在路径
			$path = $this->getPath($pid);
			//echo $types.'-'.$levels.'-'.$path;die;
			if(empty($nowid) || ($nowid == 0) || ($nowid == '0') || ($nowid == 'null')){
				$config = array(
						'path'         =>  WEB_DIR ."Public\\wangpan\\PC\\", //上传文件保存的路径
						'allowtype'       =>  array('mpg','mpeg','avi','rm','rmvb','mov','wmv','asf','dat','mp4','3gp','asx','mpe','wvx','zip','rar','gz'), //设置限制上传文件的类型
						'maxsize'          =>  120000000, //限制文件上传大小（字节）
						'israndname'       =>  false, //设置是否随机重命名文件， false不随机
						'subname'       =>  array('string', $path)
					);
				$myfile = new \FileUpload($config);
				
				$res = $myfile->upload($filename);
				if(!$res){
					$r=$myfile->getErrorMsg();//错误异常信息
					$res = array(
						'code' => 202,
						'message' => $r
					);
					$this->ajaxReturn($res, "json");die;
				}else{
					
					//上传成功数据写入数据库
					$m=$myfile->getFilePath();//图片路径
					$string2  =  $m;
					$pattern2  =  '/\//i' ;
					$replacement2  =  '\\' ;
					$m = preg_replace ( $pattern2 ,  $replacement2 ,  $string2 );
						$pst = strripos($m,"\\");
						$basepath = substr($m, 0, $pst+1);
						$foldername = substr($m, $pst+1);
						//$m[$key]['name'] = $foldername;
						//插入数据到数据库
						if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
							if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
								$fenxiaoshang_userid = $_SESSION['wgcadmininfo']['fenxiaoshang_userid'];
							}
						}else{
							$fenxiaoshang_userid = 1;
						}
						$data = array(
							  'pid' => $pid,
							  'userid' => $userid,
							  'filename' => $foldername,
							  'isdir' => $isdir,
							  'types' => $types,
							  'levels' => $levels,
							  'fenxiaoshang_userid' => $fenxiaoshang_userid,
							  'display' => $display,
							  'bumenlist' => $bumenlist,
							  'today' => date('Y-m-d',time()),
							  'addtime' => time()
						);
						$id = M('wangpan')->add($data);
						if(!$id){
							$res = array(
								'code' => 202,
								'message' => '文件入库异常！'
							);
							$this->ajaxReturn($res, "json");die;
						}else{
							//后缀名
							$pst2 = strripos($foldername,".");
							$houzhui = '';
							if($pst2 === false){
								
							}else{
								$houzhui = substr($foldername, $pst2+1);
								
							}
							$qianzhui = substr($foldername,0,$pst2);
							$fdn = $this->decodepath($qianzhui).'.'.$houzhui;
							$res = array(
								'code' => 200,
								'message' => '上传成功！',
								'id' => $id,
								'types' => $types,
								'isdir' => $isdir,
								'userid' => $userid,
								'levels' => $levels+1,
								'display' => $display,
								'filename' => $fdn,
								'houzhui' => $houzhui
							);
							$this->ajaxReturn($res, "json");die;
						}
					
					
				}
			}else{
				//修改数据库
				$data = array(
					  'pid' => $pid,
					  'userid' => $userid,
					  'isdir' => $isdir,
					  'types' => $types,
					  'levels' => $levels,
					  'display' => $display
				);
				$aft = M('wangpan')->where(array('id'=>$nowid))->setField($data);
				if($aft === false){
					$res = array(
						'code' => 202,
						'message' => '修改出错！'
					);
					$this->ajaxReturn($res, "json");die;
				}else{
					$foldername = M('wangpan')->where(array('id'=>$nowid))->getField('filename');
					//后缀名
					$pst3 = strripos($foldername,".");
					$houzhui = '';
					if($pst3 === false){
						
					}else{
						$houzhui = substr($foldername, $pst3+1);
					}
					$res = array(
						'code' => 200,
						'message' => '上传成功！',
						'id' => $nowid,
						'types' => $types,
						'isdir' => $isdir,
						'userid' => $userid,
						'levels' => $levels+1,
						'display' => $display,
						'filename' => $foldername,
						'houzhui' => $houzhui
					);
					$this->ajaxReturn($res, "json");die;
				}
				
			}
	}

//上传笔记 'txt','doc','pdf','xls','ppt','docx','xlsx','pptx','php','rtf','wpx','docm','dotm','dotx','docx'
	public function uploadnot(){
		if(!IS_POST){die('404');}
		@session_start();
		$wgcadmininfo = $_SESSION['wgcadmininfo'];
		$bumenlist = $wgcadmininfo['bumen'];
		if(!empty($bumenlist)){
			$bumenlist =',经艺,'.$bumenlist.',';
		}
			//文件上传保存路径
			$filename = I('post.filename','filename');
			$pid = I('post.pid',0,'intval');
			$isdir = 2;
			$display = I('post.display',1,'intval');
			$nowid  = I('post.nowid',NULL);
			$userid = I('post.userid',NULL);
			if(empty($userid) || ($userid == 'null')){
				$res = array(
					'code' => 202,
					'message' => '用户长时间离线，请重新登录！'
				);
				$this->ajaxReturn($res, "json");die;
			}
			$ifo = M('wangpan')->where(array('id'=>$pid))->field('types,levels')->find();
			$types = $ifo['types'];
			$levels = $ifo['levels']+1;
			//获取数据库的文件先对与网盘根目录所在路径
			$path = $this->getPath($pid);
			//echo $types.'-'.$levels.'-'.$path;die;
			if(empty($nowid) || ($nowid == 0) || ($nowid == '0') || ($nowid == 'null')){
				$config = array(
						'path'         =>  WEB_DIR ."Public\\wangpan\\PC\\", //上传文件保存的路径
						'allowtype'       =>  array('txt','doc','pdf','xls','ppt','docx','xlsx','pptx','php','rtf','wpx','docm','dotm','dotx','docx','zip','rar','gz'), //设置限制上传文件的类型
						'maxsize'          =>  120000000, //限制文件上传大小（字节）
						'israndname'       =>  false, //设置是否随机重命名文件， false不随机
						'subname'       =>  array('string', $path)
					);
				$myfile = new \FileUpload($config);
				
				$res = $myfile->upload($filename);
				if(!$res){
					$r=$myfile->getErrorMsg();//错误异常信息
					$res = array(
						'code' => 202,
						'message' => $r
					);
					$this->ajaxReturn($res, "json");die;
				}else{
					
					//上传成功数据写入数据库
					$m=$myfile->getFilePath();//图片路径
					$string2  =  $m;
					$pattern2  =  '/\//i' ;
					$replacement2  =  '\\' ;
					$m = preg_replace ( $pattern2 ,  $replacement2 ,  $string2 );
						$pst = strripos($m,"\\");
						$basepath = substr($m, 0, $pst+1);
						$foldername = substr($m, $pst+1);
						//$m[$key]['name'] = $foldername;
						//插入数据到数据库
						if(!empty($_SESSION['wgcadmininfo']['fenxiaoshang_name'])){
							if($_SESSION['wgcadmininfo']['fenxiaoshang_userid'] > 0){
								$fenxiaoshang_userid = $_SESSION['wgcadmininfo']['fenxiaoshang_userid'];
							}
						}else{
							$fenxiaoshang_userid = 1;
						}
						$data = array(
							  'pid' => $pid,
							  'userid' => $userid,
							  'filename' => $foldername,
							  'isdir' => $isdir,
							  'types' => $types,
							  'levels' => $levels,
							  'bumenlist' => $bumenlist,
							  'display' => $display,
							  'fenxiaoshang_userid' => $fenxiaoshang_userid,
							  'today' => date('Y-m-d',time()),
							  'addtime' => time()
						);
						$id = M('wangpan')->add($data);
						if(!$id){
							$res = array(
								'code' => 202,
								'message' => '文件入库异常！'
							);
							$this->ajaxReturn($res, "json");die;
						}else{
							//后缀名
							$pst2 = strripos($foldername,".");
							$houzhui = '';
							if($pst2 === false){
								
							}else{
								$houzhui = substr($foldername, $pst2+1);
								
							}
							$qianzhui = substr($foldername,0,$pst2);
							$fdn = $this->decodepath($qianzhui).'.'.$houzhui;
							$res = array(
								'code' => 200,
								'message' => '上传成功！',
								'id' => $id,
								'types' => $types,
								'isdir' => $isdir,
								'userid' => $userid,
								'levels' => $levels+1,
								'display' => $display,
								'filename' => $fdn,
								'houzhui' => $houzhui
							);
							$this->ajaxReturn($res, "json");die;
						}
					
					
				}
			}else{
				//修改数据库
				$data = array(
					  'pid' => $pid,
					  'userid' => $userid,
					  'isdir' => $isdir,
					  'types' => $types,
					  'levels' => $levels,
					  'display' => $display
				);
				$aft = M('wangpan')->where(array('id'=>$nowid))->setField($data);
				if($aft === false){
					$res = array(
						'code' => 202,
						'message' => '修改出错！'
					);
					$this->ajaxReturn($res, "json");die;
				}else{
					$foldername = M('wangpan')->where(array('id'=>$nowid))->getField('filename');
					//后缀名
					$pst3 = strripos($foldername,".");
					$houzhui = '';
					if($pst3 === false){
						
					}else{
						$houzhui = substr($foldername, $pst3+1);
					}
					$res = array(
						'code' => 200,
						'message' => '上传成功！',
						'id' => $nowid,
						'types' => $types,
						'isdir' => $isdir,
						'userid' => $userid,
						'levels' => $levels+1,
						'display' => $display,
						'filename' => $foldername,
						'houzhui' => $houzhui
					);
					$this->ajaxReturn($res, "json");die;
				}
				
			}
	}
	//ajax获取网盘文件夹列表
	public function folderList(){
		if(!IS_POST){die('404');}
		@session_start();
		$wgcadmininfo = $_SESSION['wgcadmininfo'];
		$bumen = $wgcadmininfo['bumen'];
		$pid = I('post.pid',0,'intval');
		$userid = I('post.userid',NULL);
		if(empty($userid) || ($userid == 'null')){
			$res = array(
				'code' => 202,
				'message' => '用户长时间离线，请重新登录！'
			);
			$this->ajaxReturn($res, "json");die;
		}
		$where = array(
			'pid' => $pid ,
			'types' => I('post.types',1,'intval'),
			//'isdir' => I('post.isdir',1,'intval'),
			'levels' => I('post.levels',0,'intval'),
			'display' => I('post.display',1,'intval'),
			'_complex' => array(
				'userid' => array(array('eq',$userid),array('eq','all'),'OR'),
				'bumenlist' =>array(array('like','%,'.$bumen.',%'),array('exp','is not null'),'AND'),
				'_logic'=>'OR')
		);
		//当前进入的文件夹路径
		//$info = M('wangpan')->where(array('id'=>$pid))->field('levels')->find();
		$folder = M('wangpan')->where($where)->select();
		if(empty($folder)){
			//返回当前目录，即使是空
			$res = array(
				'code' => 202,
				'message' => '请创建文件夹'
			);
			$this->ajaxReturn($res, "json");die;
		}else{
			//问价夹层数返回加1 ，除去根路径的保存路径   后缀名
			foreach($folder as $key=>$val){
				$folder[$key]['levels'] = $val['levels']+1;
				$pst = strripos($folder[$key]['filename'],".");
				if($pst === false){
					//文件夹
					$folder[$key]['houzhui']='';
					$qianzhuiCN = $this->decodepath($val['filename']);
					$folder[$key]['filename'] = $qianzhuiCN;
				}else{
					$houzui = substr($val['filename'], $pst+1);
					$qianzhuiCN = substr($val['filename'],0, $pst);
					$qianzhuiCN = $this->decodepath($qianzhuiCN);
					$folder[$key]['houzhui']=$houzui;
					$folder[$key]['filename'] = $qianzhuiCN.'.'.$houzui;
				}
				$basepth = $this->getPath($val['id']);
				$folder[$key]['filedir'] = $basepth;
			}
			$res = array(
				'code' => 200,
				'message' => $folder
			);
			$this->ajaxReturn($res, "json");die;
		}
	}
	//修改文件名
	public function filerename(){
		if(!IS_POST){die('404');}
		$id = I('post.id',0,'intval');
		$name = I('post.filename',NULL);
		$userid = I('post.userid',NULL);
		if(empty($userid) || ($userid == 'null')){
			$res = array(
				'code' => 202,
				'message' => '用户长时间离线，请重新登录！'
			);
			$this->ajaxReturn($res, "json");die;
		}
		$name = trim($name);
		if(empty($name)){
			$res = array(
				'code' => 202,
				'message' => '名字不能为空'
			);
			$this->ajaxReturn($res, "json");die;
		}else{
			$namearr = explode('.',$name);
			$writename =  $namearr[0];
			$name = $namearr[0];
			$nameEN = $this->encodepath($name);
			$info = M('wangpan')->field('filename')->where(array('id'=>$id))->find();
			$basedirall = $this->getPath($id);
			$arr = explode("/",$basedirall);
			$count = count($arr);
			$ps = $count-1;
			$oldname = $arr[$ps];
			$basedir = '';
			for($i=0;$i<$count-1;$i++){
				$basedir .= $arr[$i].'\\';
			}
			if(empty($info)){
				$res = array(
					'code' => 202,
					'message' => '修改文件不存在！'
				);
				$this->ajaxReturn($res, "json");die;
			}else{
				
				//看看同级目录是否有重名的文件
				$pst = strripos($info['filename'],".");
				if($pst === false){
					$dir = WEB_DIR .'Public\\wangpan\\PC\\'.$basedir.$nameEN;
					$ret = $this->checkname($dir);
					if($ret){
						$res = array(
							'code' => 202,
							'message' => '文件已存在！'
						);
						$this->ajaxReturn($res, "json");die;
					}else{
						
						//修改文件夹名
						$xg = M('wangpan')->where(array('id'=>$id))->setField('filename',$nameEN);
						
						if($xg){
							//原先文件夹名
							$oldname = WEB_DIR .'Public\\wangpan\\PC\\'.$basedir.$info['filename'];
							$newname = WEB_DIR .'Public\\wangpan\\PC\\'.$basedir.$nameEN;
							$ok = rename ( $oldname ,  $newname );
							if($ok){
								$res = array(
									'code' => 200,
									'message' => $writename
								);
								$this->ajaxReturn($res, "json");die;
							}else{
								$res = array(
									'code' => 202,
									'message' => '重命名失败！'
								);
								$this->ajaxReturn($res, "json");die;
							}
						}else{
							$res = array(
								'code' => 202,
								'message' => '修改数据库名称失败！'
							);
							$this->ajaxReturn($res, "json");die;
						}
					}
				}else{
					$houzui = substr($info['filename'], $pst);
					//$dir = WEB_DIR .$info['filedir'].$name.$houzui;
					$dir = WEB_DIR .'Public\\wangpan\\PC\\'.$basedir.$nameEN.$houzui;
					$ret = $this->checkname($dir);
					if($ret){
						$res = array(
							'code' => 202,
							'message' => '文件已存在！'
						);
						$this->ajaxReturn($res, "json");die;
					}else{
						//修改文件名
						$oldname = WEB_DIR .'Public\\wangpan\\PC\\'.$basedir.$info['filename'];
						$newname = $dir;
						//$oldname = iconv("UTF-8","gb2312", $oldname);
						//$newname = iconv("UTF-8","gb2312", $newname);
						$ok = rename($oldname,$newname);
						if($ok){
							//修改数据库
							M('wangpan')->where(array('id'=>$id))->setField('filename',$nameEN.$houzui);
							$res = array(
								'code' => 200,
								'message' => $writename.$houzui
							);
							$this->ajaxReturn($res, "json");die;
						}else{
							$res = array(
								'code' => 202,
								'message' => '文件重命名失败'
							);
							$this->ajaxReturn($res, "json");die;
						}
					}
				}
				
			}
		}
	}
	//重名检测全路径（注意反斜杠 \ 路径方式）
	public function checkname($dir){
		if(file_exists($dir)){
			return true;
		}else{
			return false;
		}
	}
	//ajax删除指定文件或文件夹
	public function deletfile(){
		if(!IS_POST){die('404');}
		$ids = I('post.ids','');
		
		$userid = I('post.userid',NULL);
		if(empty($userid) || ($userid == 'null')){
			$res = array(
				'code' => 202,
				'message' => '用户长时间离线，请重新登录！'
			);
			$this->ajaxReturn($res, "json");die;
		}
		if(empty($ids)){
			$res = array(
				'code' => 202,
				'message' => '请选择要删除的文件或文件夹！'
			);
			$this->ajaxReturn($res, "json");die;
		}
		$arr = explode(",",$ids);
		
		foreach($arr as $key=>$id){
			$xiangduilujing = $this->getPath($id);
			$string  =  $xiangduilujing ;
			$pattern  =  '/\//i' ;
			$replacement  =  '\\' ;
			$xiangduilujing = preg_replace ( $pattern ,  $replacement ,  $string );
			$xiangduilujing = trim($xiangduilujing,'\\');
			
			$dirName = WEB_DIR . 'Public\\wangpan\\PC\\'.$xiangduilujing;
			$this->deletefd($dirName);
		}
		//删除数据库数据
		foreach($arr as $key2=>$id2){
			$this->zigong($id2);
			$ret = M('wangpan')->where(array('id'=>$id2,'pid'=>$id2,'_logic'=>'OR'))->delete();
		}
		$res = array(
				'code' => 200,
				'message' => '删除成功！'
			);
		$this->ajaxReturn($res, "json");die;
	}
	//删除文件或文件夹
	public function deletefd($dirName){
		$pst = strripos($dirName,"\\");
		$basepath = substr($dirName, 0, $pst+1);
		$foldername = substr($dirName, $pst+1);
		$path = $basepath.$foldername;
		$file = strripos($foldername,".");
		if($file === false){
			$this->delDirAndFile($dirName,true);
		}else{
			$dirName = iconv("UTF-8","gb2312", $dirName);
			unlink($dirName);
		}
	}
	
	//删除指定目录下的所有文件和文件夹 delDir文件夹是否删除
	public function delDirAndFile($dirName,$delDir = true)
	{	
		$dirName = iconv("UTF-8","gb2312", $dirName);
		$handle = opendir($dirName);
		if($handle){
			while(false !== ( $item = readdir($handle) )){
				if(in_array($item,array('.','..','Public','wangpan'))){
					continue;
				}else{
					//如果是文件就将其删掉
					$file = strripos($item,".");
					if($file === false){
						$dir = $dirName.'\\'.$item;
						$dir = iconv("gb2312","UTF-8",$dir);
						$this->delDirAndFile($dir);
					}else{
						unlink($dirName.'\\'.$item);
					}
					
				}
			}
			if($delDir){
				@rmdir($dirName);
			}
			clearstatcache();
			closedir($handle);
			unset($handle);
		}
	}
	
	//网盘数据库删除后代
	public function zigong($id){
		//看看自己是否是父亲
		$shi = M('wangpan')->field('id')->where(array('pid'=>$id))->select();
		if(empty($shi)){
			//阉割
			M('wangpan')->where(array('id'=>$id))->delete();
		}else{
			foreach($shi as $key=>$row){
				$this->zigong($row['id']);
			}
		}
	}
	//文件下载
	public function filedownload(){
		$id = I('get.id',0,'intval');
		
		$info = M('wangpan')->where(array('id'=>$id))->field('filename,isdir')->find();
		if(empty($info)){
			die;
		}else{
			if(($info['isdir'] === 1) || ($info['isdir'] === '1')){
				die;
			}else{
				$basedirall = $this->getPath($id);
				$arr = explode("/",$basedirall);
				$count = count($arr);
				$ps = $count-1;
				$oldname = $arr[$ps];
				$basedir = '';
				for($i=0;$i<$count-1;$i++){
					$basedir .= $arr[$i].'\\';
				}
				$path = WEB_DIR .'Public\\wangpan\\PC\\'.$basedir.$info['filename'];
				//$path = iconv("UTF-8", "gb2312",$path);
				//echo $path;die;
				//下载
				$f=new \FileDownload();
				$f->download($path, $name='', true);
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
	
	//获取相对于网盘的路径信息
	public function getPath($pid){
		//看看是否存在父级
		$haspid = M('wangpan')->where(array('id'=>$pid))->getField('pid');
		$path = array();
		$path[] = M('wangpan')->where(array('id'=>$pid))->field('pid,filename')->find();
		do {
		  $res = M('wangpan')->where(array('id'=>$haspid))->field('pid,filename')->find();
		  if(!empty($res)){
			  $path[] = $res;
			  $haspid = $res['pid'];
		  }else{
			  $haspid = false;
		  }
		} while($haspid);
		$num = count($path);
		$string='';
		for($i=$num-1;$i>=0;$i--){
			$string.=$path[$i]['filename'].'/';
		}
		$string = trim($string,'/');
		return $string;
	}
}
?>