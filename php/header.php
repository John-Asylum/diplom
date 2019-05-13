<div class="header">
	<a href="/"><img src="../images/logo.png"></a>
	<div class="search">
		<input type="search" class="inp_search" name="text" required placeholder="Поиск фильмов">
		<img class="btn_search" src="https://img.icons8.com/material/24/000000/search.png">
	</div>
	
		<nav class="menu" >
			<li><a href="../php/filmu.php">Фильмы</a></li>
			<li><a href="#">TOP 10</a></li>

<?php if ( isset ($_SESSION['user']) ) : ?>
		<li><a href="../php/playlist.php">Плейлист</a></li>
	</nav>
<?php
if($_SESSION['user']['status']=='admin')
	echo "<a href='../admin' ><img class= 'admin' src='../images/admin.png'></a>";
?>
	<span class="user"><?php print_r($_SESSION['user']['login']); ?></span>
	<div class="buttons sign_out" type="submit">Выйти</div>
<?php else : ?>
<div class="login2">
 	<img src="../images/login.png">
 	<span id="auth" class="submit">Авторизация</span>
 </div>
<?php endif; ?>	 
</div>