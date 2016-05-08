<!-- myFunc.php -->
<?php  
header("Content-type:text/html;charset=utf-8");
//自定义函数，输入提示信息，并在3秒后自动跳转到指定页面
function redirect($url, $msg)
{	  
   echo $msg.'<a href="'.$url.'">如果没有跳转，请点这里跳转</a>';
   header("refresh:3;url=$url"); 
}
function uploadfile($filename,$filepath='./images/',$allowtype=array("jpg","jpeg","png","gif","Bmp","flv")){
	//上传文件错误的判定
  if($_FILES["$filename"]["error"]>0)
  {
	switch($_FILES["$filename"]["error"]){
		case 1: echo "文件尺寸超过了配置文件的最大值";	exit;
		case 3: echo "部分文件上传";	exit;
		case 4: 
			echo "没有选择文件！";	
			//如果没有选择头像，则不需要上传文件，直接添加到数据库中
			//编写SQL语句
				
			break;
		default: echo "未知错误";  exit;		
	}	
  }else{		//上传文件

	//获取文件扩展名
	$suffix = strrchr($_FILES["$filename"]["name"], '.');	//获取.在文件名中最后一次出现
	//echo $suffix;
	//判断文件类型是否图片
	
	if(!in_array(ltrim($suffix, '.'),$allowtype))
	{	
		echo "文件类型为".$suffix."！<br/>";
		echo "文件类型不正确！只能选择扩展名为jpg,jpeg,png,gif,Bmp,flv类型的文件！";
		exit;
	}  
  
	//指定在服务器上的文件存放路径和文件名
	$newname=date("YmdHis").rand(100,999).$suffix;
	//上传文件，如果上传成功，返回文件名，否则提示“上传失败”
	if (!move_uploaded_file($_FILES["$filename"]["tmp_name"],$filepath.$newname)) {
		//die('图片上传失败');
	}else {		
		return $filepath.$newname;
	}
  }
}
?>