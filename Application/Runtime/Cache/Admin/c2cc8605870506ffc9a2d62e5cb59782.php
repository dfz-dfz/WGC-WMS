<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>栏目列表</title>
<style type="text/css">
td {font-size: 12px;}
</style>
</head>

<body>

<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
	<tr width="100%">
		<td width="100%" align="center" valign="top" background="leftlist_bg.jpg">
		<script language="javascript" id="clientEventHandlersJS">
			<!--
			var number=0;//左栏目一级栏目数

			function LMYC() {
			var lbmc;
			//var treePic;
				for (i=1;i<=number;i++) {
					lbmc = eval('LM' + i);
					//treePic = eval('treePic'+i);
					//treePic.src = 'file.gif';
					lbmc.style.display = 'none';
				}
			}
			 
			function ShowFLT(i) {
				lbmc = eval('LM' + i);
				//treePic = eval('treePic' + i)
				if (lbmc.style.display == 'none') {
					LMYC();
					//treePic.src = 'nofile.gif';
					lbmc.style.display = '';
				}
				else {
					//treePic.src = 'file.gif';
					lbmc.style.display = 'none';
				}
			}
			//-->
		</script>
			<table cellspacing="0" cellpadding="0" width="100%" border="0">
				<?php
 $catstr = ''; foreach($catlist as $key=>$row){ $post = $key+1; $catstr .= '<tr>'; $catstr .= '<td style="PADDING-LEFT: 20px;width:70%;" background height="23">'; $catstr .= '<img height="9" src="/Public/IMG/lanmu01.gif" width="8" align="absMiddle">'; $catstr .= '<a onclick="javascript:ShowFLT('.$post.')" href="javascript:void(null)">'; $catstr .= $row['catname']; $catstr .= '</a>'; $catstr .= '</td>'; $catstr .= '<td style="width:25%;">'; $catstr .= '<a href="'.U('Admin/Category/addcat',array('pid'=>$row['id'])).'">添加</a>&nbsp;'; $catstr .= '<a href="'.U('Admin/Category/editcat',array('id'=>$row['id'])).'">修改</a>&nbsp;'; $catstr .= '<a href="'.U('Admin/Category/delcat',array('id'=>$row['id'])).'">删除</a>'; $catstr .= '</td>'; $catstr .= '</tr>'; $catstr .= '<tr id="LM'.$post.'" style="DISPLAY: none">'; $catstr .= '<td>'; $catstr .= '<table cellspacing="0" cellpadding="0" width="100%" border="0">'; foreach($row['children'] as $k=>$r){ $catstr .= '<tr >'; $catstr .= '<td style="PADDING-LEFT: 40px;width:80%;" height="23">'; $catstr .= '<img height="7" src="/Public/IMG/lanmu02.gif" width="8" align="absMiddle">'; $catstr .= '<a title="'.$r['catname'].'" href="javascript:;" target="_parent">'.$r['catname'].'</a> '; $catstr .= '</td>'; $catstr .= '<td style="width:20%;">'; $catstr .= '<a href="'.U('Admin/Category/editcat',array('id'=>$r['id'])).'">修改</a>&nbsp;'; $catstr .= '<a href="'.U('Admin/Category/delcat',array('id'=>$r['id'])).'">删除</a>'; $catstr .= '</td>'; $catstr .= '</tr>'; } $catstr .= '</table>'; $catstr .= '</td>'; $catstr .= '</tr>'; } echo $catstr; ?>
			</table>
		</td>
	</tr>
</table>
</body>
</html>