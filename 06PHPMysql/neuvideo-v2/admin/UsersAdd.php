<?php
  require_once('inc_admin.php');
  //连接数据库 
  connect();
  //使用$_POST数组获取表单中输入的数据
  $id = $_POST['id'];


  if(!empty($_FILES["pic"]["name"])){
  	$pic = uploadfile('pic',UserPhotoPath,array('png','jpg','gif'));
  }
  else{
  	$pic='';
  }

  $data = array(

		'uname' => trim($_POST['uname']),  
		'gender' => $_POST['gender'],
		'birthdate' => $_POST['birthdate'],
		'hobby' => implode($_POST['hobby'], ','),
		'degree' => $_POST['degree'],
		'intro' => $_POST['intro'],
		'pic'=>$pic
  	);

  $result = update('users',$data,'uid='.$id);
  
  if(!result){
		echo "更新失败！<br/>";
		echo "<a href='userList.php'>返回</a>";	  
  }else{		
		redirect('userList.php', '更新成功！');
  }	   

   /* $sql = "update users set uname='{$uname}', birthdate='{$birthdate}', gender={$gender}, hobby='{$hobby}', degree={$degree},intro='{$intro}', pic='{$newname}' where uid={$id}";	
  $result = mysql_query($sql) or die("sql={$sql}, 更新失败！<br/>".mysql_error());*/
  //判断是否更新成功
 ?>
