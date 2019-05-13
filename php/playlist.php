<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Плейлист</title>
</head>
<body>
	<?include "../php/header.php" ?>
	<?include "../php/link.php" ?>
	<?include "../php/auth.php" ?>

	<div class="content1">
		<div class="content">
			<div class="playlist">
				<div class="playlist_count">
					<p>МОИ ПОДБОРКИ</p>
					<div class="sum">2</div>
				</div>
				<div class="btn_add_playlist" type="submit">новый плейлист</div>
			</div>

			<div id="add_playlist" class="add_playlist">
				<span class="close_playlist">&times </span>
				<form class="form_add_playlist" id="form_add_playlist">
					<div class="header_playlist">
						<h1>Форма создания плейлиста</h1>
					</div>
					<div class="field_playlist">
						<input class="name_playlist" type="text" placeholder="Введите названия плейлиста"></input>
						<div class="form_editor" >
							<textarea name="editor3" id="editor3" ></textarea>
						</div>
  						
						<input class="file_playlist" type="file" placeholder="Загрузите изображение">
						<div data-name = <?php echo $_SESSION['user']['login']?> class="btn_adds_playlist">Добавить</div>
					</div>
				</form>
			</div>

			<div id="edit_playlist" class="edit_playlist">
				<span class="close_edit_playlist">&times </span>
				<form class="form_edit_playlist" id="form_edit_playlist">
					<div class="header_edit_playlist">
						<h1>Форма редактирования плейлиста</h1>
					</div>
					<div class="field_edit_playlist">
						<input class="name_edit_playlist" type="text" placeholder="Введите названия плейлиста"></input>
						<div class="form_edit_editor" >
							<textarea name="editor4" id="editor4" ></textarea>
						</div>
						<input class="file_edit_playlist" type="file">
						<div class="btn_edit_playlist">Добавить</div>
					</div>
				</form>
			</div>

				<?php 
				include '../php/connect.php';
				$id = $_SESSION['user']['login'];
				$select= mysql_query("SELECT * FROM `LifeFilm`.`playlist` WHERE author='$id'");
				while ($r = mysql_fetch_array($select)){
				echo"
				<div class='playlist_content'>
				<div class='content_img'>
						<img src='../images/".$r['img'] ."'>
						<a href='../php/film_playlist.php?id=$r[id]' class='btn_open_playlist'>Смотреть подборку</a>
				</div>
				<div class='content_block'>
					<div class='block_info'>
						<p class='title'>".$r['title'] ."</p>
						<p class='date'><span>Дата создания :</span>".$r['date'] ."</p>
						<div class='text'><span>Описание :</span><br>".$r['text'] ."</div>
							<div class='info_count'>
								<div class='bottom_info'>
									<img src='https://img.icons8.com/ios/50/000000/clapperboard-filled.png'>
									<div class='sum'>1</div>
								</div>
							</div>	
					</div>
					<div class='playlist_edite'>
						<img class= 'edits_playlist' data-id=".$r['id']." title='Редактирование' src='https://img.icons8.com/ios/50/000000/pencil-filled.png'>
						<img class= 'del_playlist' data-id=".$r['id']." title='Удалить' src='https://img.icons8.com/ios/50/000000/cancel-filled.png'>
					</div>
				</div>
			</div>";}
			?>

		</div>
	</div>
</body>
	<script src="../libs/Owl-Carousel/dist/owl.carousel.min.js"></script>
	<script type="text/javascript" src="../libs/ckeditor/ckeditor.js"> </script>
	<script type="text/javascript" src="../js/open.js" ></script>
	<script type="text/javascript">
	     CKEDITOR.replace( 'editor3');
	     CKEDITOR.replace( 'editor4');
    </script>
</html>