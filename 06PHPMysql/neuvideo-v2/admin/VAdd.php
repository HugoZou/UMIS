<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>视频添加</title>
</head>
<body>
	<form action="doVideoAdd.php" method="post" enctype="multipart/form-data">
		<table border="0" align="center">
			<caption>	添加视频	</caption>
			<tr>
				<th label="videoname" width="28%">名称:</th>
				<th align="left">
					<input type="text" name="videoname" required="" >
				</th>
			</tr>	
			<tr>
				<th>类型:</th>
				<td>
					<input type="radio" name="tid" value="1" >电影
					<input type="radio" name="tid" value="2" >电视剧
					<input type="radio" name="tid" value="3" >动画片
				</td>
			</tr>
			<tr>
				<th>
					<label for="pic">海报:</label>
				</th>
				<td>
					<input type="file" name="pic" id="pic">
				</td>
			</tr>
			<tr>
				<th>介绍:</th>
				<td><textarea name="intro" id="" cols="30" rows="5">视频介绍简介</textarea></td>
			</tr>
			<tr>
				<th>上传员:</th>
				<td>
					<input type="radio" name="uploadadmin" value="1" >邹昌宏
					<input type="radio" name="uploadadmin" value="2" >liuxiang
				</td>
			</tr>
			<tr>
				<th>时间：</th>
				<td><input type="date" name="uploaddate" id="uploaddate"></td>
			</tr>
			<tr>
				<th>地址:</th>
				<td><input type="text" name="address" id="address"></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" value="提交">
					<input type="reset" value="重置">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>