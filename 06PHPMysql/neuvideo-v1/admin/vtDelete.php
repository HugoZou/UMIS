<?php
	require_once('inc_admin.php');
	//连接到数据库	
	//用户id是通过GET方法提交的   
	$id = $_GET['id'];//$_GET用法
	$conn= connect();
	$sql = "delete from videotype where tid={$id}";
	$result = mysql_query($sql,$conn) or die('删除失败！'.mysql_error());
	if(!mysql_error()){
		redirect('vtlist.php', '删除成功！');
	}	
?>