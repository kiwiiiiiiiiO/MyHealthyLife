<?php
    // 可以登入並在 personal.html 顯示使用者資料
    session_start();
    require "master.php";
    
    $user_id = $_SESSION["user_id"];

    $helper = new master();

    $result = $helper->doLogin($email, $password);
    
    $name = $_SESSION["name"];
    $gender = $result["gender"];
    $birth = $result["birth"];
    $email = $result["email"];
    $cellphone = $result["cellphone"];
    $water = $result["water"];
    $water = $result["water"];
    $weekly_goal = $result["weekly_goal"];
    // weekly_goal 
    
?>