
<?php
  
  require_once('inc_admin.php');
  //连接数据库   
  connect();
  if(!empty($_FILES["pic"]["name"])){
    $pic = uploadfile('pic',UserPhotoPath,array('jpg','gif','png'));
  }
  else{
    $pic='';
  }
  $data = array(

    'videoname' => $_POST['videoname'], 
    'tid' => $_POST['tid'],  
    'intro' => $_POST['intro'],
    'uploaddate' => $_POST['uploaddate'],
    'uploadadmin' => $_POST['uploadadmin'],
    'address' => $_POST['address'],
    'pic'=>$pic
    
    );

  //执行SQL语句
  $result = add('videos',$data);

  if(!$result){
    echo "添加失败！<br/>";
    echo "<a href='userReg.html'>返回</a>";   
  }else{    
  echo "添加成功！";
  echo "进入<a href='VideoList.php'>视频列表</a>查看视频，";
  echo "或返回<a href='VAdd.php'>添加</a>页面！";   
  }    
  
?>