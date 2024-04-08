<?php
    session_start();
    
    if(!isset($_SESSION["email"])){
        session_destroy();
        header("Location: ./login1.php");
        die();
    }
?>