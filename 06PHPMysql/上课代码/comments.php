<?php
header("Content-type: text/html; charset=utf-8");
$conn = @mysql_connect('localhost','root','')
      or die('数据库无法连接');
@mysql_select_db('neuvideo',$conn)
      or die('数据库不存在');
mysql_set_charset("utf8");
$sql = 'select * from comments';
$result =mysql_query($sql,$conn);
$comments =fetch_array($result);
echo '<table border="1">';
echo '<caption>	视频信息</caption>';
echo '<tr><th>序号</th><th>评论ID</th><th>内容</th><th>用户ID</th><th>视频ID</th></tr>';
foreach ($comments as $index=>$one) {
	echo '<tr>';
	echo '<td>'.($index+1).'</td>';
	echo '<td>'.$one['cid'].'</td>';
	echo '<td>'.$one['content'].'</td>';
	echo '<td>'.$one['uid'].'</td>';
	echo '<td>'.$one['vid'].'</td>';
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