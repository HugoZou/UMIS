

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户列表</title>
</head>
<body>
	
</body>
</html>
<?php 
require_once('inc_admin.php');
require_once('menu.php');
connect();
$sql = 'select * from users';
$result = mysql_query($sql) or die('filed'.mysql_error());
$users = fetch_array($result);
//var_dump($users);
echo '<table border="1" align="center">';
echo '<caption>	用户信息</caption>';
echo '<tr><th>ID</th><th>用户名</th><th>密码</th><th>性别</th><th>生日</th><th>爱好</th><th>学历</th><th>介绍</th>
<th width=80>头像</th><th>操作</th></tr>';
foreach ($users as $one) {
	echo '<tr>';
	echo '<td>'.$one['uid'].'</td>';
	echo '<td>'.$one['uname'].'</td>';
	echo '<td>'.$one['password'].'</td>';
	echo '<td>'.$one['gender'].'</td>';
	echo '<td>'.$one['birthdate'].'</td>';
	echo '<td>'.$one['hobby'].'</td>';
	switch ($one['degree']) {
		case '1':
			$dg='高中';
			break;
		case '2':
			$dg='大学';
			break;
		case '3':
			$dg='硕士';
			break;
		case '4':
			$dg='博士';
			break;
		default:
			$dg='未知';
	}
	echo'<td>'.$dg.'</td>';
	echo '<td>'.$one['intro'].'</td>';
	echo '<td align="center"><img src='.UserPhotoPath.$one['pic'].' width=60 height=80 alt="无头像"></td>';
	echo "<td><a href='UserReg.html'>增加</a>";
	echo "|<a href='userEditForm.php?uid=".$one['uid']."'>修改</a>";
    echo "|<a href='UserDelete.php?abc=".$one['uid']."'>删除</a></td>";
    echo "</tr>";
}







 ?>
<!-- 

//土办法 建议用函数
$sql = 'select * from users';
$sql1 ='select t1.*,t2.uname,t3.typename from videos t1
left join users t2 on t1.uploadadmin=t2.uid
left join videotype t3 on t1.tid=t3.tid
where downtimes>0';
$result = mysql_query($sql,$conn);
$result2 =mysql_query($sql1,$conn);
/*while ($result && ($row = mysql_fetch_assoc($result))!==FALSE) {
	echo $row['uname'].'<br>';
}*/
$users = fetch_array($result);
$video =fetch_array($result2);
//var_dump($users);
echo '<table border="1">';
echo '<caption>	用户信息</caption>';
echo '<tr><th>ID</th><th>用户名</th><th>密码</th><th>性别</th><th>生日</th><th>爱好</th><th>学历</th><th>信息</th>
<th>头像</th></tr>';
foreach ($users as $one) {
	echo '<tr>';

	echo '<td>'.$one['uid'].'</td>';
	echo '<td>'.$one['uname'].'</td>';
	echo '<td>'.$one['password'].'</td>';
	echo '<td>'.$one['gender'].'</td>';
	echo '<td>'.$one['birthdate'].'</td>';
	echo '<td>'.$one['hobby'].'</td>';
	echo '<td>'.$one['degree'].'</td>';
	echo '<td>'.$one['intro'].'</td>';
	echo '<td>'.$one['pic'].'</td>';
	echo '</tr>';
}



-->