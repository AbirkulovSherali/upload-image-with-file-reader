<?php require_once('handle.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<title>Upload Images</title>
</head>
<body>

	<div id="wrapper">
		<h1>Загрузка изображения</h1>
		<form action="" method="post" id="form">
			<input type="file" id="img" name="image">
			<input type="hidden" name="blob" value="" id="blobInput">
			<button type="submit" name="button" id="send">Загрузить</button>
		</form>
		<div id="image">
			<img alt="" id="preview">
		</div>
	</div>

	<script src="main.js"></script>
</body>
</html>
