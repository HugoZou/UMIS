<!-- userEditForm.php 用于显示要更新的用户信息的表单。 -->
<!doctype html>
<html>
 <head>
  <meta charset="UTF-8">  
  <title>修改用户信息</title>
 </head>
 <body>
 <?php
   require_once('inc_admin.php');
   //连接数据库   
   connect();
   //用户id是通过GET方法提交的   
   //根据用户id从数据库中查询用户的所有信息
   $id = $_GET['uid'];  
   $sql = "select * from users where uid={$id}";   
   $result = mysql_query($sql) or die('查询失败！'.mysql_error());   
   $row = mysql_fetch_assoc($result);
   //var_dump($row);   
   $uname = $row['uname'];
   $gender = $row['gender'];
   $birthdate = $row['birthdate'];
   $hobby = $row['hobby'];
   $degree = $row['degree'];
   $intro = $row['intro'];
   $pic = UserPhotoPath.$row['pic'];	  
	//将查询结果显示在表单中
 ?>

<form method="post"  action="userUpdate.php"  enctype="multipart/form-data">
<table align="center" border="1" width=500>
<caption>修改用户</caption>
<tr>
  <td width="20%">id</td>
  <td width="80%"><?php  echo $id;  ?>
  <input type="hidden" name="uid" value=<?php  echo $id;  ?>>  
  </td>
</tr>
<tr>
  <td>姓名：</td>
  <td><input type="text" name="uname" size=30  value=<?php  echo $uname;  ?>></td>
</tr>
<tr>
<td>性别:</td>
<td>
<input type="radio" name="gender" value="0" <?php  if(!$gender) echo 'checked';  ?>>男
<input type="radio" name="gender" value="1" <?php  if($gender) echo 'checked';  ?>>女</td>
</tr>
<tr>
  <td>生日：</td>
  <td><input type="date" name="birthdate"  size=30 value=<?php  echo $birthdate;  ?>></td>
</tr>
<tr>
<td >爱好：</td>
<td>
     <input type="checkbox" name="hobby[]" value="旅游" <?php  if(strstr($hobby,'旅游')) echo 'checked';  ?>>旅游
     <input type="checkbox" name="hobby[]" value="登山" <?php  if(strstr($hobby,'登山')) echo 'checked';  ?>>登山
     <input type="checkbox" name="hobby[]" value="健身" <?php  if(strstr($hobby,'健身')) echo 'checked';  ?>>健身
     <input type="checkbox" name="hobby[]" value="上网" <?php  if(strstr($hobby,'上网')) echo 'checked';  ?>>上网
     <input type="checkbox" name="hobby[]" value="游泳" <?php  if(strstr($hobby,'游泳')) echo 'checked';  ?>>游泳
</td>
</tr>
<tr>
<td width=150>学历:</td>
<td>
<select name="degree">
	<option value="0">---请选择---</option>
	<option value="1" <?php  if($degree=='1') echo 'selected';  ?>>高中</option>
	<option value="2" <?php  if($degree=='2') echo 'selected';  ?>>大学</option>
	<option value="3" <?php  if($degree=='3') echo 'selected';  ?>>研究生</option>
	<option value="4" <?php  if($degree=='4') echo 'selected';  ?>>博士生</option>
      </select>
</td>
</tr>
<tr>
<td width=150>自我介绍：</td>
<td>
<textarea name="intro" cols="40" rows="5"><?php  echo $intro;  ?></textarea>
</td>
</tr>
<tr>
  <td width=150>头像</td>   
  <td>
  <img src='<?php  echo $pic;  ?>' width=100 height=150>
  <input type="file" name="pic">
  </td>
</tr>
<tr>
<td width=150></td>
<td>
<input type="submit" value="更新">
<input type="reset" value="重置">
</td>
</tr>
</table>
</form>
 </body>
</html>