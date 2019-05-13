<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>News</title>
</head>
<body>
	<?include "../php/header.php" ?>
	<?include "../php/link.php" ?>
	<?include "../php/auth.php" ?>

	<div class="content1">
		<div class="content">
			<div class="block_news">
				<?php 
				include '../php/connect.php';
				$select = mysql_query("SELECT * FROM `LifeFilm`.`news` WHERE id = '$_GET[id]'");
				$r = mysql_fetch_array($select);
				echo"
				<h3>".$r['title']."</h3>
				<div class='image'><img src=../images/".$r['img']."></div>
				<p>".$r['fulltext']."</p>
				<div class='import'>
					<div class='import_icon'>
						<span class='import_zag'>Поделиться новостью:</span>
						<script src='//yastatic.net/es5-shims/0.0.2/es5-shims.min.js'></script>
						<script src='//yastatic.net/share2/share.js'></script>
						<div class='ya-share2' data-services='vkontakte,facebook,odnoklassniki,telegram'></div>
					</div>
					<div class='import_img'>
						<img class= 'like' data-id=".$r['dtime']."  src='https://img.icons8.com/material/48/000000/hearts.png'>
						<div class='sum'>".getLike($r['dtime'])."</div>
					</div>
					"; 
			       function getLike($id) {
			            $like = 0;
			            $likes =  mysql_query("SELECT * FROM `likes` WHERE dtime='$id'");
			            while($row2 = mysql_fetch_array($likes)) {
			                $like++;
			            }
			            return $like;
			        }
					?>

				</div>
			</div>
			<div class="news_coment">
				<span>Коментарии</span>
				<?php if ( isset ($_SESSION['user']) ) : ?>
				<form id="form1" name="form1" method="post" action="">
  					<textarea name="editor1" id="editor1" ></textarea>
				</form>
				<div class="btn_news_coment" data-id="<? echo $r['dtime'];?>" type="submit">Опубликовать</div>
				<?php else : ?>
					<br><p>Что бы оставлять комментарии, Вам необходимо авторизироваться</p>
				<?php endif; ?>
				<?php
					$dt=$r['dtime'];
            		$message = mysql_query("SELECT * FROM `message` WHERE `dtime` = '$dt' ORDER BY `id` DESC ");
            		while($row1 = mysql_fetch_array($message)){ 
            	echo "
				<div class='news_message'>
                    <span class = 'messega_author'> <p class= 'aut'>Автор :</p> ".$row1['author']."</span>
                    <div class='dt'><p class= 'date_mess'>Дата :</p>".$row1['dt']."</div>
                    <div class='message_text'><p class= 'mess_text'>Текст сообщения:</p>".$row1['text']."</div>
				</div>
                ";
            	}
            	?> 
			</div>
		</div>
	</div>
</body>
	<script src="../libs/Owl-Carousel/dist/owl.carousel.min.js"></script>
	<script type="text/javascript" src="../js/open.js" ></script>
	<script type="text/javascript" src="../libs/ckeditor/ckeditor.js"> </script>
</html>