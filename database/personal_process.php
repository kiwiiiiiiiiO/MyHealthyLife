<?php
    // 可以登入並在 personal.html 顯示使用者資料
    session_start();
    require "master.php";
    
    $helper = new master();
    $userid = 100000; 
    $result = $helper->findPerson($userid);
    
    $name =  $result["name"];
    $password = $result["password"];
    $birth = $result["birth"];
    $email = $result["email"];
    $cellphone = $result["cellphone"];
    $water = $result["water"];
   
    $weight = $result['weight'];
    $height = $result['height'];

    $weight_goal = $result['weight_goal'];
    
    $activity_m  = $result["activity"];
    switch($activity_m){
        case 'activity_0':
            $activity_m = "基本不動";
            break;
        case 'activity_1':
            $activity_m = "不太活躍";
            break;
        case 'activity_2':
            $activity_m = "稍微活躍";
            break;  
        case 'activity_3':
            $activity_m = "活躍";
            break;
        case 'activity_4':
            $activity_m = "非常活躍";
            break;
    }
    $activity =  $activity_m;

    $weekly_goal_m = $result["weekly_goal"];
    
    switch($weekly_goal_m){
        case 'weeklygoal_1':
            $weekly_goal_m = "減重0.25kg";
            break;
        case 'weeklygoal_2':
            $weekly_goal_m = "減重0.5kg";
            break;
        case 'weeklygoal_3':
            $weekly_goal_m = "減重1kg";
            break;  
        case 'weeklygoal_4':
            $weekly_goal_m = "維持體重";
            break;
        case 'weeklygoal_5':
            $weekly_goal_m= "增重0.25kg";
            break;
        case 'weeklygoal_6':
            $weekly_goal_m = "增重0.5kg";
            break;
        case 'weeklygoal_1':
            $weekly_goal_m = "增重1kg";
            break;
            
    }
    $weekly_goal = $weekly_goal_m;
    
?>