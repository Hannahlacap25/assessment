<?php 
session_start();

include("classes/connect.php");
include("classes/login.php");
include("classes/user.php");

if(isset($_SESSION['userid']))
    {
        header("Location: home.php");
    }else{
        header("Location: login.php");
}
?>