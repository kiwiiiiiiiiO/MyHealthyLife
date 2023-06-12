<?php
    session_start();
    require "master.php";
    $userid = 100000; 

    // 設定初始值，如果沒有設定，當使用者沒有選擇 select ， 就會是 null QQQQ
    // happy
    $weekly_goal_c = 'weeklygoal_2';
    $activity_c ='activity_1';
    $name_c = $_POST['name_c'];
    $password_c = $_POST['password_c'];
    $birth_c = $_POST['birth_c'];
    $cellphone_c = $_POST['cellphone_c'];
    $weight_c = (int)$_POST['weight_c'];
    $height_c = (int)$_POST['height_c'];
    $weight_goal_c = (int)$_POST['weight_goal_c'];
    $weekly_goal_c = $_POST['weekly_goal_c'];
    if( $weekly_goal_c == ""){
        $weekly_goal_c = $weekly_goal;
    }
   
    $activity_c = $_POST['activity_c'];
    if(  $activity_c== ""){
        $activity_c = $activity;
    }
    
    $water_c = (int)$_POST['water_c'];

    $helper = new master();
    $helper->updatePerson($userid, $name_c, $password_c, $birth_c, $cellphone_c, $weight_c, $height_c, $weight_goal_c, $weekly_goal_c, $activity_c, $water_c);


    header("Location: ../project/personal.php");

?>