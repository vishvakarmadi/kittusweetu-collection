<?php
include 'code/role_check.php';

// Check basic login status
if(!isset($_SESSION["login_satus"]) || $_SESSION["login_satus"] != true){
    header("location:index.php"); 
    exit();
}

// Default to admin level access for backward compatibility
checkRoleAccess('admin');

?>