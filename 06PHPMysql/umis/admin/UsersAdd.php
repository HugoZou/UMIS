<?php 
header("Content-type: text/html; charset=utf-8");
//require_once('system/DbCoon.php')
$conn = @mysql_connect('localhost','root','')
      or die('数据库无法连接');
@mysql_select_db('neuvideo',$conn)
      or die('数据库不存在');
mysql_set_charset("utf8");
$uname=$_POST['uname'];
$password=$_POST['password'];
$gender=$_POST['gender'];
$birthday=$_POST['birthdate'];
$hobby=implode(',',$_POST['hobby']);//数组处理
$degree=$_POST['degree'];
$intro=$_POST['intro'];
$pic=$_POST['pic'];
	$sql ="insert into users(uname,password,gender,birthdate,hobby,degree,intro,pic)values('$uname','$password','$gender','$birthday','$hobby','$degree','$intro','$pic')";
	$result= mysql_query($sql);
	echo $sql;
	exit();
	if($result==FALSE){
		echo '失败';
	}
	else{
		echo '成功';
	}

 ?>
 