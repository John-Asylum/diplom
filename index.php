<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LifeFilm</title>
</head>
<body>
	<?include "./php/header.php" ?>
	<?include "./php/link.php" ?>
	<?include "./php/auth.php" ?>
		

	<div class="content1">	
		<div class="slayder">
			<span class="newinki">Новинки</span>
				<div id="slider_container" class="owl-carousel owl-theme">
					<?php
						include './php/connect.php';
						$query = mysql_query("SELECT * FROM `film` WHERE status= 'new' ORDER BY `id` DESC LIMIT 8");

						while($row = mysql_fetch_array($query)) {
							echo "  
						    <div class='item'>
						    	<img src='../images/".$row['img'] ."'>
						    	<a href='../php/film.php?id=$row[id]'><h1>".$row['name'] ."</h1></a>
						    </div>";
						}
			    	?>
			</div>
		</div>	
		<div class="content">
			<div class="zag">
				<p>НОВОСТИ КИНО</p>
			</div>
			<div class="news">
				<?php 
				include './php/connect.php';
				$select= mysql_query("SELECT * FROM `LifeFilm`.`news` ORDER BY `id` DESC");
				while ($r = mysql_fetch_array($select)){
				echo"
				<a href='../php/news.php?id=$r[id]' class='baha1493'>
				<div class='image'><img src=../images/".$r['img']."></div>
				
				<figcaption>
				<div class='date'><span class='day'>28</span><span class='month'>Oct</span></div>
				<h3>".$r['title']."</h3>
				<p>".$r['text']."</p>
				<div class='figcaption_icon'>
					<div class='figcaption_likes'>
						<img class= 'like' data-id=".$r['dtime']."  src='https://img.icons8.com/material/48/000000/hearts.png'>
						<div class='sum'>".getLike($r['dtime'])."</div>
					</div>
					<div class='figcaption_mes'>
						<img src='https://img.icons8.com/material-rounded/24/000000/filled-speech-bubble-with-dots.png'>
						<div class='sum'>".getMes($r['dtime'])."</div>
					</div>
				</div>

				</figcaption>
				</a>
				";}
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
				<div class="empty_block"></div>
				<div class="empty_block"></div>
			</div>
		</div>
	</div>	
</body>
<script src="libs/Owl-Carousel/dist/owl.carousel.min.js"></script>
<script type="text/javascript" src="./js/open.js" ></script>
</html>
