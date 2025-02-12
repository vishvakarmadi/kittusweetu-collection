<?php
if(!isset($_SESSION["login_satus"])){
    if($_SESSION["login_satus"]!=true ){
        header("location:index.php"); 
        exit();
    }
}
?>