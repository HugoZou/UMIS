<?php 
    require_once('inc_admin.php');
    if(empty($_GET['id'])){
      $sql='select * from videos';
    }
    else{
      $sql='select * from  videos where tid ='.$_GET['id'];
    }
    $result = mysql_query($sql) or die('filed'.mysql_error());
    $video = fetch_array($result);
 ?>
<!DOCTYPE html>

<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>视频管理系统</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body>
  
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">视频管理系统</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><?php echo $_SESSION['user']['adminname']; ?></a></li>
            <li><a href="logout.php">注销</a></li>
            <li><a href="#">设置</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li ><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li ><a href="UserList2.php">用户管理</a></li>
            <li class="active"><a href="VideoList2.php">视频管理</a></li>
            <li><a href="vtlist2.php">视频类别管理</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">视频管理</h1>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>视频类别</th>
                  <th>视频名</th>
                  <th>海报</th>
                  <th>信息</th>
                  <th>上传日期</th>
                  <th>上传管理员</th>
                  <th>点击次数</th>
                  <th>下载次数</th>
                  <th>链接</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                    foreach ($video as $one) {
                        echo '<tr>';
                        echo '<td>'.$one['vid'].'</td>';
                        switch ($one['tid']) {
                          case '1':
                            $dg='电影';
                            break;
                          case '2':
                            $dg='电视剧';
                            break;
                          case '3':
                            $dg='动画片';
                            break;
                          default:
                            $dg='未知';
                        }
                        echo'<td>'.$dg.'</td>';
                        echo '<td>'.$one['videoname'].'</td>';
                        echo '<td align="center"><img src='.UserPhotoPath.$one['pic'].' width=60 height=80 alt="无海报"></td>';
                        echo '<td>'.$one['intro'].'</td>';
                        echo '<td>'.$one['uploaddate'].'</td>';
                        echo '<td>'.$one['uploadadmin'].'</td>';
                        echo '<td>'.$one['hittimes'].'</td>';
                        echo '<td>'.$one['downtimes'].'</td>';
                        echo '<td>'.$one['address'].'</td>';
                        echo "<td><a href='VAdd.php?id=".$one['vid']."'>添加</a>";//完成
                        echo "|<a href='VideoForm.php?id=".$one['vid']."'>修改</a>";//未完成
                          echo "|<a href='VideoDelete.php?id=".$one['vid']."'>删除</a></td>";//完成
                          echo "</tr>";
                      }
                 
                 $totalrows = count($video);
                echo "<table align='center'><tr><td>共有{$totalrows}个视频</td></tr></table>";   
               ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
