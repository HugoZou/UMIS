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
   connect();
   $id = $_GET['id'];  
   $sql = "select * from videotype where tid={$id}";   
   //$result = mysql_query($sql) or die('查询失败！'.mysql_error());   
   //$row = mysql_fetch_assoc($result);
   $row=fetch_one($sql);
   //var_dump($row);   
 ?>

<form method="post"  action="vtEditForm.php" >
<table align="center" border="1" width=500>
<caption>修改视频类别</caption>
<tr>
  <td width="20%">id</td>
  <td width="80%"><?php  echo $id;  ?>
  <input type="hidden" name="tid" value=<?php  echo $row['tid'];  ?>>  
  </td>
</tr>
<tr>
  <td>类别名</td>
  <td><input type="text" name="typename" size=30  value=<?php  echo $row['typename'];  ?>></td>
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