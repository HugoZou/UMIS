<?php 

$data=array(
	'uname'=>'fff';
	'gender'=>'fff';
	)
$result=add('users',$data);
if($result){header('location:.php');}
else{header('location:.php');}//页面跳转




function add($tbl,$data){
	$keys=implode(',', array_keys($data));//implode函数 第一个分隔符 第二个数组
	$values=implode("','", array_values($data));
	insert into users(uname,gender) values('jz','1');
	$sql="insert into $tbl($keys) values('$values')";
	$result=mysql_query($sql);
	if($result){return mysql_insert_id();}
	else {return 0;}
	}


//delete
$id=$_GET['uid'];
$sql="delete from users where id =$id";
$result=mysql_query($sql);
if($result){}
else{}
//用户注册登录 处理（完成)
//用户列表（完成)
//删除
//用户修改 处理
//管理员登录 处理（完成)

//在inc_admin.php添加
//判断权限
if(!isset($_SESSION['user'])){
	redirect('login.html','无权限');
	exit;
}

 ?>