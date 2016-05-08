<?php 

header("Content-type: text/html; charset=utf-8");
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";
//上传文件的判断
if($_FILES["pic"]["error"]>0)
//文件上传的错误代码
	{
		switch ($_FILES["pic"]["error"]) {
			case 1:
				echo "over the max ";
				break;
			case 3:
				echo "part of files upload ";
				break;
			case 4:
				echo "None of files upload ";
				break;
			
			default:
				echo "Unknown error";
				break;
		}
		exit;
	}

//judge file 
	$allowtype = array("jpg","jpeg","gif","png","Bmp","flv");
	$arr=explode(",", $_FILES["pic"]["name"]);//客户端系统文件的名称
	$hz=$arr[count($arr)-1];
	echo $hz;
	if(!in_array($hz, $allowtype))//在数组allowtype中找$hz 即是否匹配类型
	{
		//echo "it isn't allowed"
		//exit;
		die("the type of file isn't allowed");
	}
	$filepath ="./images/";
	$randname=date("Ymdhis").rand(100,999).".".$hz;
	move_uploaded_file($_FILES["pic"]["name"], $filepath.$randname);//命名图片名字




 ?>