<?php
  
  require_once('inc_admin.php');
  //连接数据库   
  connect();
  $data = array(
    'typename' => trim($_POST['typename']),  
    );

  //执行SQL语句
  $result = add('videotype',$data);

  if(!$result){
    echo "添加失败！<br/>";
    echo "<a href='userReg.html'>返回</a>";   
  }else{    
  echo "添加成功！";
  echo "进入<a href='vtlist.php'>视频类型列表</a>查看视频类型，";
  echo "或返回<a href='userReg.html'>注册</a>页面！";   
  }    
  
?>