<?php 
header("Content-type: text/html; charset=utf-8");
$conn = @mysql_connect('localhost','root','')
      or die('数据库无法连接');
@mysql_select_db('neuvideo',$conn)
      or die('数据库不存在');
mysql_set_charset("utf8");
$sql = 'select * from videotype';
$result = mysql_query($sql,$conn);
$videotype = fetch_array($result);
function fetch_array($Results){
	$arrs = array();
    while ($Results && ($row = mysql_fetch_assoc($Results))!==FALSE) {
	       $arrs[] = $row;
          }
    return $arrs;
}
echo '<table border="1">';
echo '<caption>	视频类型信息</caption>';
echo '<tr><th>序号</th><th>视频ID</th><th>视频类型名字</th>';

foreach ($videotype as $index=>$one) {
	echo '<tr>';
	echo '<td>'.($index+1).'</td>';
	echo '<td>'.$one['tid'].'</td>';
	echo '<td>'.$one['typename'].'</td>';
	echo '</tr>';
}

 ?>