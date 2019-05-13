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
			<div class="add_news">
				<div class="header_add_news">
					<div class="block_news">
						<input class="search_add_news" type="text" placeholder="Поиск новости"></input>
						<div class="btn_add_news">Добавить новость</div>
					</div>
				</div>
				<?php
					include '../php/connect.php';
					$select= mysql_query("SELECT * FROM `news` ORDER BY `id` DESC");
					while ($r = mysql_fetch_array($select)) {
				echo "	
				<div class='content_add_news'>
					<div class='header_content_news'>
						<div class='title_news'>
							<span>".$r['title']."</span>
						</div>
						<div class='navigation_bar'>
							<div class='edit_films'>
								<img src='https://img.icons8.com/ios-glyphs/80/000000/pencil.png'>
								<span>edit</span>
							</div>
							<div class='del_films'>
								<img src='https://img.icons8.com/dotty/80/000000/trash.png'>
								<span>delete</span>
							</div>
						</div>
					</div>
					<div class='footer_add_news'>
						<img src='../images/".$r['img']."'>
						<div class='inform_add_news'>
							<span class='date_news'>Дата: <p>".$r['date']."</p> </span>
							<div class='text_news'><span>Краткое описание:</span>".$r['text']."</div>
						</div>
					</div>
				</div>";}
				?>
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