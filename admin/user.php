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
			<div class="del_user">
				<div class="header_user">
					<div class="block_user">
						<input class="search_user" type="text" placeholder="Поиск пользователя"></input>
						<div class="btn_add_user">Добавить пользователя</div>
					</div>
				</div>
				<?php
					include '../php/connect.php';
					$select= mysql_query("SELECT * FROM `users` ORDER BY `id` DESC");
					while ($r = mysql_fetch_array($select)) {
				echo "	
				<div class='content_user'>
					<div class='header_content_user'>
						<div class='title_user'>
							<span class='zagolovok'>Пользователь:</span>
							<span>".$r['login']."</span>
							<span class='zagolovok1'>Текущий статус:</span>
							<span class = 'zagolovok2'>".$r['status']."</span>
						</div>
						<div class='navigation_bar'>
							<div data-id=".$r['id']." class='delete_user'>
								<img src='https://img.icons8.com/dotty/80/000000/trash.png'>
								<span>delete</span>
							</div>
						</div>
					</div>
					<div class='footer_user'>
						<span>Присвоить статус:</span>
						<select class='status_user' id='status_user'>
							<option>admin</option>
							<option>user</option>
						</select>
						<div data-id=".$r['id']." class='btn_add_status'>Присвоить</div>
					</div>
				</div>";}?>
			</div>
		</div>
	</div>
	<div class="floating_form">
		<span class="close_floating">&times </span>
		
		<form class="form_add_user">
			<div class="header_form">
				<h1>Добавления пользователя</h1>
				<h2>Для добавления пользователя заполните все нижеперечисленные поля.</h2>
			</div>
			<div class="footer_form">
				<input class="pole_form_login" type="text"   placeholder="Login"></input>
				<input class="pole_form_email" type="text" name="inp email"  placeholder="E-mail"></input>
				<input class="pole_form_password" type="password" name="inp password" placeholder="Password"></input>
				<input class="pole_form_password_2" type="password" name="inp password_2" placeholder="re-Password"></input>
				<div class="buttons_form_add">Добавить</div>
			</div>
		</form>
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