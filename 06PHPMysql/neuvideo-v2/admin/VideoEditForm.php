<!-- userUpdate.php 用于将修改后的用户信息录入数据库。 -->
<?php
  require_once('inc_admin.php');
  //连接数据库 
  connect();
  //使用$_POST数组获取表单中输入的数据
  $id = $_POST['vid'];
  if(!empty($_FILES["pic"]["name"])){
    $pic = uploadfile('pic',UserPhotoPath,array('png','jpg','gif'));
  }
  else{
    $pic='';
  }

  $data = array(
    'tid' => $_POST['tid'],
    'videoname' => trim($_POST['videoname']),  
    'pic'=>$pic,
    'intro' => $_POST['intro'],
    'uploaddate' => $_POST['uploaddate'],
    'uploadadmin' => $_POST['uploadadmin'],
    'hittimes ' => '',
    'downtimes' => '',
    'address' => $_POST['address']
    );
  //var_dump($data);
  $result = update('videos',$data,'vid='.$id);
  
  if(!$result){
    echo "更新失败！<br/>";
    echo "<a href='VideoForm.php'>返回</a>";   
  }else{    
    redirect('VideoList.php', '更新成功！');
  }    
 ?>