<?php
header("Content-type: text/html; charset=utf-8");
$conn = @mysql_connect('localhost','root','')
      or die('数据库无法连接');
@mysql_select_db('neuvideo',$conn)
      or die('数据库不存在');
mysql_set_charset("utf8");
$sql = 'select * from levels';
$result =mysql_query($sql,$conn);
$levels =fetch_array($result);
echo '<table border="1">';
echo '<caption>	视频信息</caption>';
echo '<tr><th>序号</th><th>评分ID</th><th>评分用户</th><th>用户ID</th><th>score</th></tr>';
foreach ($levels as $index=>$one) {
	echo '<tr>';
	echo '<td>'.($index+1).'</td>';
	echo '<td>'.$one['lid'].'</td>';
	echo '<td>'.$one['uid'].'</td>';
	echo '<td>'.$one['vid'].'</td>';
	echo '<td>'.$one['score'].'</td>';
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