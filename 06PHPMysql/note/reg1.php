<?php 
header("Content-type: text/html; charset=utf-8");
//require_once('system/DbCoon.php')
$conn = @mysql_connect('localhost','root','')
      or die('数据库无法连接');
@mysql_select_db('neuvideo',$conn)
      or die('数据库不存在');
mysql_set_charset("utf8");
  
  // $sql = "insert into user values(null,'$username',md5('$pwd'),'$gender','$hobby','$degree','$intro')";
  $sql = "insert into users values(null,'3','232','0','er','2016-04-01','f','2','dfd')";
  echo $sql.'<br/>';
  
  $result = mysql_query($sql) or die(mysql_error());  
  echo "nihaoa ";

  $num = mysql_affected_rows();
  if($num!=1){
	  echo "注册失败！";
	  //header("location:reg.html");
  }else{	  
	  echo "注册成功！<br/>";
	  echo "请使用管理员<a href='login.html'>登录</a>查看用户信息";
	  echo "，或返回<a href='reg.html'>返回</a>注册页面！";
	  //header("location:login.html");
	  //$_SESSION();
  }  
  mysql_close();
?>
</body>
</html>