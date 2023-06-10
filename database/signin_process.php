<?php
    // 可以登入並在 personal.html 顯示使用者資料
    session_start();
    require "master.php";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $helper = new master();
    // doLogin 
    $helper->doLogin($email, $password);

?>