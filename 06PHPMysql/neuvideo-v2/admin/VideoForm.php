<!doctype html>
<html>
 <head>
  <meta charset="UTF-8">  
  <title>修改视频信息</title>
 </head>
 <body>
 <?php
   require_once('inc_admin.php');
   //连接数据库   
   connect();
   //用户id是通过GET方法提交的   
   //根据用户id从数据库中查询用户的所有信息
   $id = $_GET['id'];  
   $sql = "select * from videos where vid={$id}";   
   $result = mysql_query($sql) or die('查询失败！'.mysql_error());   
   $row = mysql_fetch_assoc($result);
   //var_dump($row); 
   $tid=$row['tid']; 
   $videoname = $row['videoname'];
   $intro = $row['intro'];
   $uploaddate = $row['uploaddate'];
   $uploadadmin = $row['uploadadmin'];
   $address = $row['address'];
   $pic = UserPhotoPath.$row['pic'];	  
	//将查询结果显示在表单中
 ?>

<form method="post"  action="VideoEditForm.php"  enctype="multipart/form-data">
<table align="center" border="1" width=500>
<caption>修改视频</caption>
<tr>
  <td width="20%">id</td>
  <td width="80%"><?php  echo $id;  ?>
  <input type="hidden" name="vid" value=<?php  echo $id;  ?>>  
  </td>
</tr>
<tr>
  <td>名称：</td>
  <td><input type="text" name="videoname" size=30  value=<?php  echo $videoname;  ?>></td>
</tr>
<tr>
<td>类别:</td>
<td>
<input type="radio" name="tid" value="1" <?php  if(!$tid) echo 'checked';  ?>>电影
<input type="radio" name="tid" value="2" <?php  if($tid) echo 'checked';  ?>>电视剧
<input type="radio" name="tid" value="3" <?php  if($tid) echo 'checked';  ?>>动画片</td>
</tr>
<tr>
  <td>上传日期：</td>
  <td><input type="date" name="uploaddate"  size=30 value=<?php  echo $uploaddate;  ?>></td>
</tr>
<tr>
<td width=150>上传管理员:</td>
<td>
<select name="uploadadmin">
	<option value="0">---请选择---</option>
	<option value="1" <?php  if($uploadadmin=='1') echo 'selected';  ?>>邹昌宏</option>
	<option value="2" <?php  if($uploadadmin=='2') echo 'selected';  ?>>liuxiang</option>
      </select>
</td>
</tr>
<tr>
<td width=150>影片介绍：</td>
<td>
<textarea name="intro" cols="40" rows="5"><?php  echo $intro;  ?></textarea>
</td>
</tr>
<tr>
  <td width=150>海报</td>   
  <td>
  <img src='<?php  echo $pic;  ?>' width=100 height=150>
  <input type="file" name="pic">
  </td>
</tr>
<tr>
  <td>地址：</td>
  <td><input type="text" name="address" size=30  value=<?php  echo $address;  ?>></td>
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