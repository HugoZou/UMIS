<?php 
  session_start();//使用session
  require_once('../system/myfunction.php');   
    require_once('../system/DB_connect.php');  
  //获取用户输入的信息
  $username = $_POST["username"];
  $pwd = $_POST["pwd"];

  //连接数据库  
  connect();
  //编写sql语句
  $sql = "select * from admins where adminname='".$username."' and password=('".$pwd."')"; 
  //echo $sql."<br/>";
  //$result = mysql_query($sql) or die('查询失败！'.mysql_error());//无权限验证
  $result=fetch_one($sql);


  //判断是否合法用户，如果是合法用户，则转向用户列表页面，否则转向登录页面
  //$num = mysql_num_rows($result);//无权限验证
  //if($num>0){	 //无权限验证
  if($result){
    //
    $_SESSION['user']=$result;//权限判断
	  //3秒后转向用户列表页面
	  redirect('UsersList.php', '登录成功!');
	  //header("location:UsersList.php");	
  }else{
	  redirect('../AdminLogin.html', '用户名或密码错误！请重新登录！');	 //引用上一层文件的用法
	  //header("location:login.html");	  
  } 
 ?>

<!--
 require_once('inc_admin.php'); 
connect();//调用connect函数
$username=$_POST["username"];
$pwd=$_POST["pwd"];
$sql="select * from admins where adminname='".$username."'and password=('".$pwd."')";
 echo $sql.'<br/>';
$result = mysql_query($sql) or die('query failed'.mysql_error());
$num=mysql_num_rows($result);
if($num>0){
	echo "successfully";
	redirect('UsersList.php','Login successfully')；
	header("location:userList.php");	
}
else{
	redirect('AdminLogin.html','Worng password or admins name,Please retry!');
	//echo "failed";
}
-->