<?php
    session_start();
?>
<?php
		if($_SESSION['user']['status']=='admin') :
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>admin panel</title>
	<link rel="stylesheet" href="../stylesheets/admin.css" type="text/css">
</head>
<body>
	<?include "header.php" ?>

	<div class="content">
		<div class="menu">
			<a href="index.php" class="new">
				<img src="https://img.icons8.com/color/48/000000/new.png">
				<p>New film</p>
			</a>
			<a href="add_film.php" class="film">
				<img src="https://img.icons8.com/cotton/64/000000/clapperboard.png">
				<p>Films</p>
			</a>
			<a href="news.php" class="news">
				<img src="../images/news_icon.png">
				<p>News</p>
			</a>
			<a href="top.php" class="top"> 
				<img src="../images/rating_icon.png">
				<p>Top 10</p>
			</a>
			<a href="./user.php" class="user">
				<img src="../images/user_icon.png" >
				<p>User</p>
			</a>
		</div>

		<div class="content1">
			<div class="add_new_film">
				<div class="header_new_film">
					<span>Добавление новых фильмов</span>
				</div>
				<div class="field_new_film">
					<div class="name_newfilm">
						<span>Ведите название:</span>
						<input class="name_new_film" type="text" placeholder="Введите названия фильма"></input>
					</div>
					<div class="year_newfilm">
						<span>Выберите год:</span>
						<select id="year" class="year">
				            <option>Выберите год</option>
				            <?php
								include '../php/connect.php';
								$select = mysql_query("SELECT * FROM `LifeFilm`.`year` ORDER BY `id` DESC ");
								while ($r = mysql_fetch_array($select)) {
								echo "<option>".$r['year'] ."</option>";
								}
							?>
		        		</select>
					</div>
					<div class="country_newfilm">
						<span>Выберите страну:</span>
						<select id="country" class="country">
				        	<option>Выберите страну</option>
				        	<?php
							include '../php/connect.php';
							$select = mysql_query("SELECT * FROM `LifeFilm`.`country` ORDER BY `country_id` ASC ");
							while ($r = mysql_fetch_array($select)){
						echo "<option>".$r['name'] ."</option>";}
						?>
				        </select>
					</div>
					<div class="actor_newfilm">
						<span>Введите актёров фильма:</span>
						<input class="actor_new_film" type="text" placeholder="Введите актёров фильма"></input>
					</div>
					<div class="janr_newfilm">
						<span>Выберите жанр:</span>
						<div class="add_genre">
							<select id="genre" class="genre">
					        	<option>Выберите жанр</option>
					        	<?php
									include '../php/connect.php';
									$select = mysql_query("SELECT * FROM `LifeFilm`.`genre` ORDER BY `id` DESC ");
									while ($r = mysql_fetch_array($select)){
									echo "<option>".$r['genre'] ."</option>";}
									?>
					        </select>
					        <img class="image_add_genre" src="https://img.icons8.com/ios/50/000000/plus.png">
						</div>
					</div>
					<div class="opisanie_newfilm">
						<span>Введите описание фильма:</span>
						<div class="form_editor" >
							<textarea name="editor1" id="editor1" ></textarea>
						</div>
					</div>
					<div class="kratkoe_newfilm">
						<span>Введите краткое описание фильма:</span>
						<div class="form_editor" >
							<textarea name="editor2" id="editor2" ></textarea>
						</div>
					</div>
					<div class="img_newfilm">
						<div class="poster">
							<span>Загрузка постера фильма:</span>
							<input class="poster_new_film" type="file" placeholder="Загрузите изображение">
						</div>
						<div class="file_new_film">
							<span>Загрузка фильма:</span>
							<input class="file_new_films" type="file" placeholder="Загрузите изображение">
						</div>
					</div>	
					<div class="link">
						<span>Введите ссылку на фильм:</span>
						<input class="link_new_film" type="text" placeholder="Введите ссылку на фильм"></input>
					</div>
					<div class="btn_add_new_film">Добавить</div>	
				</div>	
			</div>

		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="../libs/ckeditor/ckeditor.js"> </script>
<script type="text/javascript" src="./admin.js" ></script>
	<script type="text/javascript">
	     CKEDITOR.replace( 'editor1');
	     CKEDITOR.replace( 'editor2');
    </script>
</html>
	<?php
else : ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>warning</title>
	<link rel="stylesheet" href="../stylesheets/admin.css" type="text/css">
</head>
<body>
	<div class="warning">
		<p>ВНИМАНИЕ</p>
		<span>вы не являетесь администратором данного сайта</span>
		<a href="/" class="warning_back">Вернуться на сайт</a>
	</div>
</body>
</html>

<?php endif; ?>