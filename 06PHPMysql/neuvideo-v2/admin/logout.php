<?php 
require_once('inc_admin.php');

if(isset($_SESSION['user'])){
	//丑陋的方式
	//session_destroy();
	unset($_SESSION['user']);
	redirect('login.html','注销成功！');
}
 ?>