<?php
    // 可以登入並在 personal.html 顯示使用者資料
    session_start();
    require "master.php";
    
    $name = $_SESSION["name"];
    $user_id = $_SESSION["user_id"];

    

?>