<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LifeFilm</title>
	<script src="../js/playerjs.js" type="text/javascript"></script>
	<link type="text/css" rel="stylesheet" href="../node_modules/video.js/dist/video-js.min.css" />
	<!-- <link href="https://vjs.zencdn.net/7.5.4/video-js.css" rel="stylesheet">
	<script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script> -->
</head>
<body>
	<?include "../php/header.php"; ?>
	<?include "../php/auth.php" ?>
	<?include "../php/link.php" ?>



	<div class="content1">		
		<div class="content">
			<div class="fullfilm">
				<?php
				include '../php/connect.php';
				$select = mysql_query("SELECT * FROM `LifeFilm`.`film` WHERE id = '$_GET[id]'");
				$r = mysql_fetch_array($select);
				echo "<div class='full'>";
					echo "<div class='imgbuttons'>";
						echo "<img src=../images/".$r['img'] .">";
					echo "</div>";
					echo "<div class='opisanie'>";

						echo "<h1>".$r['name'] ."</h1>";
						echo "<p>"."<span>".'Год: </span>' .$r['year'] ."</p>";
						echo "<p>"."<span>".'Страна: </span>' .$r['country'] ."</p>";
						echo "<p>"."<span>".'Жанр: </span>' .$r['janr'] ."</p>";
						echo "<p>"."<span>".'В ролях: </span>' .$r['actor'] ."</p>" .	"<br>";
						echo "<p>".$r['description'] ."</p>";
					
					echo "</div>";
	
				echo "</div>";
			?>
			</div>
		<!-- 		<video
			    id="vid1"
			    class="video-js vjs-default-skin"
			    controls
			    autoplay
			    width="1000" height="600"
			    data-setup='{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "https://www.youtube.com/watch?v=xjS6SftYQaQ"}] }'
			  >
			</video> -->
			<?
			if($r['film']!= null) {
				echo "
					<video width='854' height='480' controls='controls' style='margin: auto;margin-top: 20px; margin-bottom: 20px;'>
						<source src='".$r['film']."' type='video/mp4'>
					</video>
				";
			}
			else {
				echo "
					<div class='player'>
						<iframe scrolling='no' frameborder='0' width='854' height='480' webkitallowfullscreen mozallowfullscreen allowfullscreen src='http://video.meta.ua/iframe/4692525/'></iframe>
					</div>
				";
				/// Нужно в бд сохранать только ссылку на ресурс, типа(http://video.meta.ua/iframe/4692525/). С низу закоменчен код который работает с ссылками.
				// echo "
				// 	<div class='player'>
				// 		<iframe scrolling='no' frameborder='0' width='854' height='480' webkitallowfullscreen mozallowfullscreen allowfullscreen src='".$r['link']."'></iframe>
				// 	</div>
				// "
			}
			?>
		  
		 <!--  <div id="player">
		  	
		  </div>
	
		<script>
		   var player = new Playerjs({id:"player", file:"//youtu.be/cAY98E7EN64/"});
		</script> -->

			
				<div class="coment">
					<div class="name">
						<span>ОТЗЫВЫ НА ФИЛЬМ</span>
					</div>
					<div class="coment_block">
						<?php if ( isset ($_SESSION['user']) ) : ?>
						<textarea name="editor5" id="editor5"></textarea>
						<div class="btn_coment" data-id="<? echo $r['dtime'];?>">Опубликовать</div>
					<?php else : ?>
						<br><p>Что бы оставлять комментарии, Вам необходимо авторизироваться</p>
					<?php endif; ?>
					</div>
					<?php
						$dt=$r['dtime'];
	            		$message = mysql_query("SELECT * FROM `message` WHERE `dtime` = '$dt' ORDER BY `id` DESC ");
	            		while($row1 = mysql_fetch_array($message)){ 
	            	echo "
					<div class='coment_message'>
						<div class='information'>
							<span class='coment_film_user'><p class= 'aut_film_mes'>Автор :</p>".$row1['author']."</span>
							<div class='coment_film_date'><p class= 'date_film_mes'>Дата :</p>".$row1['dt']."</div>
							<div class='coment_film_message' ><p class= 'coment_mes_text'>Текст сообщения:</p>".$row1['text']."</div>
						</div>
					</div>
					 ";
            	}
            	?>
				
			</div>
		</div>
	</div>	
</body>

<!-- <script src="//site.com/playerjs.js" type="text/javascript"></script> -->
<!-- <script src="../node_modules/video.js/dist/video.min.js"></script> -->
<!-- <script src="../js/Youtube.min.js"></script> -->
<!-- <script src='https://vjs.zencdn.net/7.5.4/video.js'></script> -->
<script src="../libs/Owl-Carousel/dist/owl.carousel.min.js"></script>
<script type="text/javascript" src="../libs/ckeditor/ckeditor.js"> </script>
<script type="text/javascript" src="../js/open.js" ></script>
<script type="text/javascript">
    CKEDITOR.replace( 'editor5');
</script>
</html>