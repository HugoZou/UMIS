<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>视频类型列表</title>
</head>
<body>
</body>
</html>
<?php 
require_once('inc_admin.php');
require_once('menu.php');
connect();
$sql = 'select * from videotype';
$result = mysql_query($sql) or die('filed'.mysql_error());
$users = fetch_array($result);
echo '<table border="1" align="center" width="80%">';
echo '<caption>	视频类型列表</caption>';
echo '<tr><th>ID</th><th>视频类别名字</th><th>操作</th></tr>';
foreach ($users as $one) {
	echo '<tr>';
	echo '<td>'.$one['tid'].'</td>';
	echo '<td>'.$one['typename'].'</td>';
	echo "<td><a href='vtAdd.php?id=".$one['tid']."'>添加</a>";
	echo "|<a href='vtForm.php?id=".$one['tid']."'>修改</a>";
    echo "|<a href='vtDelete.php?id=".$one['tid']."'>删除</a></td>";
    echo "</tr>";
}
echo '</table>';
$totalrows=count($users);
echo "<table align='center'><tr><td>共有{$totalrows}条记录</td></tr></table>";



 ?>