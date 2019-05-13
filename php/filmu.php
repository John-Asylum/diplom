<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Фильмы</title>
</head>
<body>
	<?include "../php/header.php"; ?>
	<?include "../php/auth.php" ?>
	<?include "../php/link.php" ?>

	<div class="content1">	
	<div class="content">
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
			<div class="prosmotr">
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
								
								<div class='count_film_icon'>
									<div class='like_film_icon'>
										<img class= 'like' data-id=".$r['dtime']."  src='https://img.icons8.com/material/48/000000/hearts.png'>
										<div class='sum'>".getLike($r['dtime'])."</div>
									</div>
									<div class='mess_film_icon'>
										<img src='https://img.icons8.com/material-rounded/24/000000/filled-speech-bubble-with-dots.png'>
										<div class='sum'>".getMes($r['dtime'])."</div>
									</div>
								</div>
						</div>";
				echo "</div>";}
					function getLike($id) {
			            $like = 0;
			            $likes =  mysql_query("SELECT * FROM `likes` WHERE dtime='$id'");
			            while($row2 = mysql_fetch_array($likes)) {
			                $like++;
			            }
			            return $like;
		        	}
			       function getMes($id) {
			            $Mes = 0;
			            $Messages =  mysql_query("SELECT * FROM `message` WHERE dtime='$id'");
			            while($row2 = mysql_fetch_array($Messages)) {
			                $Mes++;
			            }
			            return $Mes;
			        }
			?>
			</div>
			</div>
		</div>
	</div>	
</body>
<script src="../libs/Owl-Carousel/dist/owl.carousel.min.js"></script>
<script type="text/javascript" src="../js/open.js" ></script>
</html>