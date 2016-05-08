

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
if(empty($_GET['id'])){
	$sql='select * from videos';
}
else{
	$sql='select * from  videos where tid ='.$_GET['id'];
}




//$sql = 'select * from videos';
$result = mysql_query($sql) or die('filed'.mysql_error());
$users = fetch_array($result);
//var_dump($users);
echo '<table border="1" align="center">';
echo '<caption>	视频列表</caption>';
echo '<tr><th>ID</th><th>视频类别</th><th>视频名</th><th width=80>海报</th><th>信息</th><th>上传日期</th><th>上传管理员</th><th>点击次数</th><th>下载次数</th><th>连接地址</th> 
<th>操作</th></tr>';
foreach ($users as $one) {
	echo '<tr>';
	echo '<td>'.$one['vid'].'</td>';
	switch ($one['tid']) {
		case '1':
			$dg='电影';
			break;
		case '2':
			$dg='电视剧';
			break;
		case '3':
			$dg='动画片';
			break;
		default:
			$dg='未知';
	}
	echo'<td>'.$dg.'</td>';
	echo '<td>'.$one['videoname'].'</td>';
	echo '<td align="center"><img src='.UserPhotoPath.$one['pic'].' width=60 height=80 alt="无海报"></td>';
	echo '<td>'.$one['intro'].'</td>';
	echo '<td>'.$one['uploaddate'].'</td>';
	echo '<td>'.$one['uploadadmin'].'</td>';
	echo '<td>'.$one['hittimes'].'</td>';
	echo '<td>'.$one['downtimes'].'</td>';
	echo '<td>'.$one['address'].'</td>';
	echo "<td><a href='VAdd.php?id=".$one['vid']."'>添加</a>";//完成
	echo "|<a href='VideoForm.php?id=".$one['vid']."'>修改</a>";//未完成
    echo "|<a href='VideoDelete.php?id=".$one['vid']."'>删除</a></td>";//完成
    echo "</tr>";
}






 ?>