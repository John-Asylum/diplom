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
	<title>User</title>
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
			<div class="add_film">
				<div class="header_add_film">
					<div class="block_films">
						<input class="search_add_film" type="text" placeholder="Поиск фильма"></input>
						<div class="btn_add_film">Добавить фильм</div>
					</div>
				</div>

				<?php
				include '../php/connect.php';
				$select= mysql_query("SELECT * FROM `film` ORDER BY `id` DESC");
				while ($r = mysql_fetch_array($select)) {
				echo "	
				<div class='content_add_film'>
					<div class='header_content'>
						<div class='title_film'>
							<span>".$r['name']."</span>
						</div>
						<div class='navigation_bar'>
							<div class='edit_films'>
								<img src='https://img.icons8.com/ios-glyphs/80/000000/pencil.png'>
								<span>edit</span>
							</div>
							<div data-id=".$r['id']." class='del_films'>
								<img src='https://img.icons8.com/dotty/80/000000/trash.png'>
								<span>delete</span>
							</div>
						</div>
					</div>
					<div class='footer_add_film'>
						<img src='../images/".$r['img']."'>
						<div class='inform_add_film'>
							<span class='year_film'>Год: <p>".$r['year']."</p> </span>
							<span class='country_film'>Страна: <p>".$r['country']."</p> </span>
							<span class='genre_film'>Жанр: <p>".$r['janr'] ."</p> </span>
							<div class='cast_film'>
								<p> <span>В ролях:</span>".$r['actor'] ."</p>
							</div>
							<div class='opisanie'>".$r['kratkoe']."</div>
						</div>
					</div>
				</div>";}?>
			</div>
		</div>
	</div>




</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="../libs/ckeditor/ckeditor.js"> </script>
<script type="text/javascript" src="./admin.js" ></script>
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