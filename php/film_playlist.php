<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Film playlist</title>
</head>
<body>
	<?include "../php/header.php" ?>
	<?include "../php/link.php" ?>
	<?include "../php/auth.php" ?>
	
	<div class="content1">
		<div class="content">
			<?php 
				include '../php/connect.php';
				$id = $_SESSION['user']['login'];
				$select= mysql_query("SELECT * FROM `LifeFilm`.`playlist` WHERE id = '$_GET[id]'");
				$r = mysql_fetch_array($select);
				echo"
				<div class='inform_playlist'>
					<div class='inform_titles'>
						<p>Фильмы подборки: <span>".$r['title'] ."</span></p>
					</div>
					<div class=inform_content>
						<div class=inform_img>
							<img src='../images/".$r['img'] ."'>
						</div>
						<div class='inform_block'>
							<div class='block_infos'>
								<p class='date'><span>Дата создания :</span>".$r['date'] ."</p>
								<div class='text'><span>Описание :</span><br>".$r['text'] ."</div>
								<div class='info_count'>
									<div class='bottom_info'>
										<p>Фильмов</p>
										<div class='sum'>1</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>";
			?>
			<div class="film_playlist">
				<div class="filter">
			<span>Сортировка</span>
			<div class="filter_block">
		        <select id="genre" class="form-control">
		        	<option>Выберите жанр</option>
		        	<?php
					include '../php/connect.php';
					$select = mysql_query("SELECT * FROM `LifeFilm`.`genre` ORDER BY `id` DESC ");
					while ($r = mysql_fetch_array($select)){
				echo "<option>".$r['genre'] ."</option>";}
				?>
		        </select>
		        <select id="year" class="form-control">
		            <option>Выберите год</option>
		            <?php
					include '../php/connect.php';
					$select = mysql_query("SELECT * FROM `LifeFilm`.`year` ORDER BY `id` DESC ");
					while ($r = mysql_fetch_array($select)){
				echo "<option>".$r['year'] ."</option>";}
				?>
		        </select>
		        <select id="country" class="form-control">
		        	<option>Выберите страну</option>
		        	<?php
					include '../php/connect.php';
					$select = mysql_query("SELECT * FROM `LifeFilm`.`country` ORDER BY `country_id` ASC ");
					while ($r = mysql_fetch_array($select)){
				echo "<option>".$r['name'] ."</option>";}
				?>
		        </select>
			</div>
			<div class="end_filter">
				<div class="btn_filter" type="submit">Сбросить фильтр</div>
			</div>
		</div>
				<?php
				include '../php/connect.php';
				$select= mysql_query("SELECT * FROM `LifeFilm`.`film` ORDER BY `id` DESC");
				while ($r = mysql_fetch_array($select)){
				echo "<div data-genre = ".$r['janr'] ." data-country = ".$r['country'] ." data-year = ".$r['year'] ." class='film'>";
					echo "<div class='prosmotr'>";
						echo "<img src=../images/".$r['img'] .">";
						echo "<a href='../php/film.php?id=$r[id]' class = 'view'>".'Смотреть онлайн'."</a>";
					echo "</div>";
					echo "<div class='other'>
							<h1>".$r['name'] ."</h1>
							<p><span>Год: </span>" .$r['year'] ."</p>
							<p><span>Страна: </span>" .$r['country'] ."</p>
							<p><span>Жанр: </span>" .$r['janr'] ."</p>
							<p><span>В ролях: </span>" .$r['actor'] ."</p><br>
							<p>".$r['kratkoe'] ."</p>
						</div>";
				echo "</div>";}
				?>
			</div>
		</div>
	</div>
</body>
	<script src="../libs/Owl-Carousel/dist/owl.carousel.min.js"></script>
	<script type="text/javascript" src="../libs/ckeditor/ckeditor.js"> </script>
	<script type="text/javascript" src="../js/open.js" ></script>
</html>