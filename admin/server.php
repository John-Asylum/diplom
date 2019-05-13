<?php
session_start();
include "../db.php";
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

        case "del_film" :
            $film_id = $_POST['film_id'];
            mysql_query("DELETE FROM film WHERE id='$film_id'");
            $json_obj = '{status:200}';
            echo json_encode($json_obj);
        break;
        
        case 'user_add_form' :
            $login = $_POST['login'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $status = $_POST['status'];
            mysql_query("INSERT INTO users(login,email,password,status) VALUES('$login','$email','$password','$status')");
            $json_obj = '{status:200}';
            echo json_encode($json_obj);
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
}
if(isset($_POST['destroy']))    session_destroy();