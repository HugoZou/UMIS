<!-- userDelete.php 用于根据id删除用户。 -->
<?php
	require_once('inc_admin.php');
	//连接到数据库	
	//用户id是通过GET方法提交的   
	$uid = $_GET['abc'];//$_GET用法
	//echo $uid;
	$conn= connect();
	$sql="select * from users where uid={$uid}";
	$result=mysql_query($sql);
	$row=mysql_fetch_assoc($result);
	$filename=UserPhotoPath.$row["pic"];
	//echo $filename;
	//删除数据库相应信息，如果删除成功，删除该用户的头像文件
	$sql = "delete from users where uid={$uid}";
	$result = mysql_query($sql,$conn) or die('删除失败！'.mysql_error());
	if(!mysql_error()){
		//如果有头像，则删除头像文件
		if($filename!=UserPhotoPath && file_exists($filename))
			unlink($filename);
		redirect('UsersList.php', '删除成功！');
	}	
?>