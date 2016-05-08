<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>视频类型添加</title>
</head>
<body>
	<form action="doVTAdd.php" method="post">
		<table>
			<caption>	名称	</caption>
			<tr>
				<th label="typename">名称</th>
				<th>
					<input type="text" name="typename" required="">
				</th>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="提交">
					<input type="reset" value="重置">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>