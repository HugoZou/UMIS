
<?php 
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PWD', '');
define('DB_CHARSET', 'UTF8');
define('DB_DBNAME', 'neuvideo');
//连接数据库的函数
function connect(){
	$link=@mysql_connect(DB_HOST,DB_USER,DB_PWD)
		or die('连接数据库失败<br>ERROR'.mysql_errno().':'.mysql_error());
	//设定字符类型
	mysql_set_charset(DB_CHARSET);
	//打开指定的数据库
	mysql_select_db(DB_DBNAME) 
		or die('指定的数据库打开失败'.mysql_error());
		return $link;
}

 //用户 视频类别视频 
header("Content-type: text/html; charset=utf-8");
$conn = @mysql_connect('localhost','root','')
      or die('数据库无法连接');
@mysql_select_db('neuvideo',$conn)
      or die('数据库不存在');
mysql_set_charset("utf8");

//插入操作函数
//$tbl string

function add($tbl,$data){
	$keys=implode(',',array_keys($data));//implode连接数组
	$values=implode("','", array_values($data));
	$sql="insert into {$tbl}({$keys}) values ('{$values}')";
	$result=mysql_query($sql);
	if($result==FALSE){return false;}
	else{return mysql_insert_id();}//取得上一步 INSERT 操作产生的 ID
}



function delete($tbl,$where=null){
	$where=$where==null?'':'where'.$where;
	$sql="delete from {$tbl}{$where}";
	$res=mysql_query($sql);
	if ($res){ return mysql_affected_rows();}
    else {  return false;}
}

function update($tbl,$data,$where=null){
    $sets='';
    foreach ($data as $key=>$val){
        $sets.=$key."='".$val."',";
       	// $set  = $set  .     $key. "'=".$val."',";
		//	example:
		//	$stu = array('stuno'=>1111,'sex'=>1);
		//	第1次遍历
		//	$set = "stuno='1111',";
		//	第2次遍历
		//	 $set = $set ."sex='1',";
		//	$set = "stuno = '1111',sex='1',";
    }
    $sets=rtrim($sets,','); //去掉SQL里的最后一个逗号
    $where=$where==null?'':' WHERE '.$where;
    $sql="UPDATE {$tbl} SET {$sets} {$where}";
    $res=mysql_query($sql);
    if ($res){
        return mysql_affected_rows();
    }else {
        return false;
    }
}
function fetch_array($Results){
	$arrs = array();
    while ($Results && ($row = mysql_fetch_assoc($Results))!==FALSE) {
	       $arrs[] = $row;
          }
    return $arrs;
	
}

function fetch_one($sql,$result_type=MYSQL_ASSOC){
    $result=mysql_query($sql);
    if ($result && mysql_num_rows($result)>0){
        return mysql_fetch_array($result,$result_type);
    }else {
        return false;
    }
}
 ?>
