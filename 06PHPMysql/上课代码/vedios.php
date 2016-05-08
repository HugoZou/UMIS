<?php
header("Content-type: text/html; charset=utf-8");
$conn = @mysql_connect('localhost','root','')
      or die('数据库无法连接');
@mysql_select_db('neuvideo',$conn)
      or die('数据库不存在');
mysql_set_charset("utf8");
$sql1 ='select t1.*,t2.uname,t3.typename from videos t1
left join users t2 on t1.uploadadmin=t2.uid
left join videotype t3 on t1.tid=t3.tid
where downtimes>0';
$result2 =mysql_query($sql1,$conn);
/*while ($result && ($row = mysql_fetch_assoc($result))!==FALSE) {
	echo $row['uname'].'<br>';
}*/
$video =fetch_array($result2);
//var_dump($users);

echo '<table border="1">';
echo '<caption>	视频信息</caption>';
echo '<tr><th>序号</th><th>vedioID</th><th>上传用户</th><th>tID</th><th>片名</th><th>海报</th><th>介绍</th><th>上传日期</th><th>上传管理员</th><th>点击次数</th>
<th>下载次数</th><th>视频类型</th></tr>';
foreach ($video as $index=>$one) {
	echo '<tr>';
	echo '<td>'.($index+1).'</td>';
	echo '<td>'.$one['vid'].'</td>';
	echo '<td>'.$one['uname'].'</td>';
	echo '<td>'.$one['tid'].'</td>';
	echo '<td>'.$one['videoname'].'</td>';
	echo '<td>'.$one['pic'].'</td>';
	echo '<td>'.$one['intro'].'</td>';
	echo '<td>'.$one['uploaddate'].'</td>';
	echo '<td>'.$one['uploadadmin'].'</td>';
	echo '<td>'.$one['hittimes'].'</td>';
	echo '<td>'.$one['downtimes'].'</td>';
	echo '<td>'.$one['typename'].'</td>';
	echo '</tr>';
}




function fetch_array($Results){
	$arrs = array();
    while ($Results && ($row = mysql_fetch_assoc($Results))!==FALSE) {
	       $arrs[] = $row;
          }
    return $arrs;
}







 ?>