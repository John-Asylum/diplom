<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>search</title>
</head>
<body>
	<?include "../php/header.php"; ?>
	<?include "../php/auth.php" ?>
	<?include "../php/link.php" ?>

	<div class="content1">		
		<div class="content">
			<div class="block_search">
				<div class="zag_search">
					<span>Результаты поиска</span>
				</div>
				<?php
					include '../php/connect.php';
					$data = $_GET['data'];
					$data = strtr($data, " ", "%");
					$select= mysql_query("SELECT * FROM `film` WHERE `name` LIKE '$data'");
					while ($r = mysql_fetch_array($select)){
						echo "<div class='film'>";
							echo "<div class='prosmotr'>";
								echo "<img src=../images/".$r['img'] .">";
								echo "<a href='../php/film.php?id=$r[id]' class = 'view'>".'Смотреть онлайн'."</a>";

							echo "</div>";
							echo "<div class='other'>";
								echo "<h1>".$r['name'] ."</h1>";
								echo "<p>"."<span>".'Год: </span>' .$r['year'] ."</p>";
								echo "<p>"."<span>".'Страна: </span>' .$r['country'] ."</p>";
								echo "<p>"."<span>".'Жанр: </span>' .$r['janr'] ."</p>";
								echo "<p>"."<span>".'В ролях: </span>' .$r['actor'] ."</p>" .	"<br>";
								echo "<p>".$r['kratkoe'] ."</p>";
							echo "</div>";
						echo "</div>";}
				?>
			</div>
		</div>
	</div>
</body>
<script src="../libs/Owl-Carousel/dist/owl.carousel.min.js"></script>
<script type="text/javascript" src="../js/open.js" ></script>
</html>