<!-- list_user.php 用于列出所有用户，不带修改、删除链接。 -->
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">  
  <title>用户列表</title>
 </head>
 <body>
 
 <?php
  $host = "localhost:8181";
  $user = "root";
  $pass = " ";
  $link = mysql_connect($host,$user,$pass) or die("mysql_error()");

  mysql_select_db("neuvedio",$link) or die(mysql_error());
  mysql_set_charset('utf8', $link);
  $sql = "select id,username,gender,hobby,degree,intro from users";
  echo $sql.'<br/>';  
  $result = mysql_query($sql) or die(mysql_error());  
  $num = mysql_num_rows($result);
  echo "共有".$num."名用户。";
 ?>
 <table align="center" width="80%" border=1>
 <caption><h3>用户列表</h3></caption>
 <tr>
   <th>用户编号</th>
   <th>用户名</th>
   <th>性别</th>
   <th>爱好</th>
   <th>学历</th>
   <th>自我介绍</th>   
 </tr>
 <?php

  while($row = mysql_fetch_row($result)){
	 echo '<tr>';
	 foreach ($row as $data){
		echo '<td>'.$data.'</td>';
	 }
	 echo '</tr>';
  }
 ?>
 </table> 

 <?php  
  mysql_free_result($result);
  mysql_close();
 ?>
 </body>
</html>