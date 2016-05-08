<!-- userUpdate.php 用于将修改后的用户信息录入数据库。 -->
<?php
  require_once('inc_admin.php');
  //连接数据库 
  connect();
  //使用$_POST数组获取表单中输入的数据
  $id = $_POST['uid'];
  echo $id;

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
  //var_dump($data);
  $result = update('users',$data,'uid='.$id);
  
  if(!$result){
    echo "更新失败！<br/>";
    echo "<a href='UsersList.php'>返回</a>";   
  }else{    
    redirect('UsersList.php', '更新成功！');
  }    
 ?>