<?php
    session_start();
    include "db.php";
    if(isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password'])){
        $login = $_POST['login'];
        $email = $_POST["email"];
        $password = $_POST["password"];
      

        $result = mysql_query("SELECT id FROM users WHERE login='$login'");
        $myrow = mysql_fetch_array($result);
        if(!empty($myrow['id'])){
            http_response_code(400);
        }
        else{
            mysql_query("INSERT INTO users(login,email,password) VALUES('$login','$email','$password')");
    }  
    }

    if(isset($_POST['password1']) && isset($_POST['login1'])){
        $password1 = $_POST["password1"];
        $login1 = $_POST["login1"];
        $result = mysql_query("SELECT * FROM users WHERE login='$login1' AND password='$password1' ");
        $res = mysql_fetch_assoc($result);
        if ($res!="")
            echo json_encode($res);
        $_SESSION['user'] = $res;


    } 

 switch ($_POST['action']) {
        case 'search':
            $name = $_POST['inp_search'];
            $arr = array();
            $select= mysql_query("SELECT * FROM `film` WHERE `name` LIKE '$name'");
            while ($myrow = mysql_fetch_array($select)) {
                array_push($arr, $myrow);
            }
            echo json_encode($arr);
        break;
        
        case 'user_add_form' :

        break;

        case 'status':
            $id = $_POST['user_id'];
            $status = $_POST['status'];
            mysql_query("UPDATE users SET `status` = '$status' WHERE id = '$id'");
            $json_obj = '{status:200}';
            echo json_encode($json_obj);
        break;

        case "del_user" :
            $user_id = $_POST['user_id'];
            mysql_query("DELETE FROM users WHERE id='$user_id'");
            $json_obj = '{status:200}';
            echo json_encode($json_obj);
        break;

        case "like_add" :
            $data_id = $_POST['data_id'];
            $r= $_SESSION['user']['login'];
            $result = mysql_query("SELECT * FROM likes WHERE author='$r' AND dtime='$data_id'");
            $myrow = mysql_fetch_array($result);
            if(!empty($myrow['dtime'])){
                mysql_query("DELETE FROM likes WHERE author='$r' AND dtime='$data_id'");
            }
            else{
                mysql_query("INSERT INTO likes(author,dtime) VALUES('$r','$data_id')");
            
        }
            echo json_encode($myrow['dtime']);       
        break;

        case "news_chat_add" :
            $textnews = $_POST['textnews'];
            $newsid = $_POST['newsid'];
            $date = $_POST['date'];
            
            $r = $_SESSION['user']['login'];
            mysql_query("INSERT INTO message(text,author,dt,dtime) VALUES('$textnews','$r','$date','$newsid')");
            $json_obj = '{status:200}';
            echo json_encode($json_obj);
        break;

        case "film_chat_add" :
            $textfilm = $_POST['textfilm'];
            $filmid = $_POST['filmid'];
            $date = $_POST['date'];
            $dtime = $_POST['dtime'];

            $r = $_SESSION['user']['login'];
            mysql_query("INSERT INTO message(text,author,dt,dtime) VALUES('$textfilm','$r','$date','$filmid')");
            $json_obj = '{status:200}';
            echo json_encode($json_obj);
        break;

        case  "playlist_edit" :
            $id = $_POST['id'];
            $titleplaylist = $_POST['titleplaylist'];
            $opisanies = $_POST['opisanies'];
            $imgName = saveImage();
            if(!$_FILES["file"]["type"])
               $sq =  mysql_query("UPDATE playlist SET `title` = '$titleplaylist', `text` = '$opisanies' WHERE id = '$id'");
            else
                $sq = mysql_query("UPDATE playlist SET `title` = '$titleplaylist', `text` = '$opisanies', `img` = '$imgName' WHERE id = '$id'");
            $json_obj = '{status:200}';
            // echo json_encode($json_obj);
            echo json_encode($sq);

        break;

        case "del_playlist" :
            $id_playlist = $_POST['id_playlist'];
            mysql_query("DELETE FROM playlist WHERE id='$id_playlist'");
            $json_obj = '{status:200}';
            echo json_encode($json_obj);
        break;

        case "playlist_add":
            $fileimg = $_POST['fileimg'];
            $titleplaylist = $_POST['titleplaylist'];
            $opisanies = $_POST['opisanies'];
            $date = $_POST['date'];
            $dtime = $_POST['dtime'];
            $author = $_POST['author'];
            $imgName = saveImage();
            $r= $_SESSION['user'][0]['username'];
            mysql_query("INSERT INTO playlist SET img = '$imgName', author = '$author', title = '$titleplaylist', date = '$date', text = '$opisanies',dtime = '$dtime' ");
            $json_obj = '{status:200}';
            echo json_encode($json_obj);
        break;
 }

function saveImage() {
    $uploadedFile = '';
    if(!empty($_FILES["file"]["type"])){
        $fileName = time().'_'.$_FILES['file']['name'];
        $temporary = explode(".", $_FILES["file"]["name"]);
        $file_extension = end($temporary);
        $sourcePath = $_FILES['file']['tmp_name'];
        $targetPath = "images/".$fileName;
        if(move_uploaded_file($sourcePath,$targetPath)){
            $uploadedFile = $fileName;
        }
    }
    return $fileName;
}

 switch ($_GET['action']) {
     case 'search':
        echo json_encode('search');
        break;
     case "like_add" :
            $data_id = $_POST['data_id'];
            $r= $_SESSION['user'][0]['login'];
            $result = mysql_query("SELECT * FROM likes WHERE author='$r' AND dtime='$data_id'");
            $myrow = mysql_fetch_array($result);
            if(!empty($myrow['dtime'])){
                http_response_code(400);
            }
            else{
                mysql_query("INSERT INTO likes(author,dtime) VALUES('$r','$data_id')");
            
        }
            echo json_encode($myrow['dtime']);       
        break;         
 }
    if(isset($_POST['destroy']))    session_destroy();
    // if($link) echo"coonect:true";
    // else echo"connect:false";