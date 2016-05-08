<?php 
	echo 'welcome'.$_SESSION['user']['adminname'];
	echo ' <a href="UsersList.php">用户列表</a>';
	echo ' <a href="VideoList.php">视频管理</a>';
	echo ' <a href="vtlist.php">视频类别管理</a>';
	echo ' <a href="logout.php">注销</a>';
 ?>