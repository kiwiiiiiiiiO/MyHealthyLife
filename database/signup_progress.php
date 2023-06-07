<?php

    session_start();
    require "master.php";

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $birth = $_POST['birth'];
    $cellphone = $_POST['cellphone'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $weight_goal = $_POST['weight_goal'];
    $weekly_goal = $_POST['weekly_goal'];
    $activity = $_POST['activity'];
  
    // num 
    $weight = (int)$weight;
    $height = (int)$height;
    $weight_goal = (int)$weight_goal;
    $helper = new master();
    
    $msg = $helper->doRegister($name, $email, $password, $gender, $birth, $cellphone, $weight, $height, $weight_goal, $weekly_goal, $activity);

    $_SESSION['msg'] = $msg;
    header("Location: ../project/signup.php");
    exit();
?>