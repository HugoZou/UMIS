<?php
  require_once('inc_admin.php');
  //连接数据库 
  connect();
  //使用$_POST数组获取表单中输入的数据
  $id = $_POST['tid'];//配合hidden
  echo $id;

  $data = array(
    'typename' => trim($_POST['typename'])
    );
  $result = update('videotype',$data,'tid='.$id);
  
  if(!$result){
    echo "更新失败！<br/>";
    echo "<a href='vtForm.php?id={$id}'>返回</a>";   
  }else{    
    redirect('vtlist.php', '更新成功！');
  }    
 ?>