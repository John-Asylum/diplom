<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?include "../php/link.php" ?>

	<div id="add_playlist" class="add_playlist">
	<span class="close_playlist">&times </span>
	<form class="form_add_playlist" id="form_add_playlist">
		<div class="header_playlist">
			<h1>Форма создания плейлиста</h1>
		</div>
		<div class="field_playlist">
			<input class="name_playlist" type="text" placeholder="Введите названия плейлиста"></input>
			<textarea name="playlist" id="playlist" ></textarea>
		</div>
	</form>
</div>
</body>
<script type="text/javascript" src="../js/open.js" ></script>
<script type="text/javascript" src="../libs/ckeditor/ckeditor.js"> </script>
</html>
