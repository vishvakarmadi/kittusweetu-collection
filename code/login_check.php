<?php 
if(!isset($_SESSION["user_id"]) && empty($_SESSION["user_id"])){
    header("location:login.php");
    session_destroy();
}
?>