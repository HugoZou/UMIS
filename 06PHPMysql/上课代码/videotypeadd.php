<?php 
header("Content-type: text/html; charset=utf-8");
//require_once('system/DbCoon.php')
$conn = @mysql_connect('localhost','root','')
      or die('数据库无法连接');
@mysql_select_db('neuvideo',$conn)
      or die('数据库不存在');
mysql_set_charset("utf8");
$typename=$_POST['typename'];

	$sql ="insert into videotype(typename)values('$typename')";
	$result= mysql_query($sql);
	if($result==FALSE){
		echo '失败';
	}
	else{
		echo '成功';
	}
 ?>