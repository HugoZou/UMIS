<?php
	session_start();
	define('UserPhotoPath','../images/');		//用户头像存放的路径
	require_once('../system/myfunction.php');   
    require_once('../system/DB_connect.php');  
    if (!isset($_SESSION['user'])) {
    	//如果不满足
    	//isset函数
    	redirect('Login.html','无权访问');
    	exit();
    }
?>