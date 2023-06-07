<?php
    session_start();
    $name = "";
    $msg = "";
    if(isset($_SESSION['msg'])){
        $msg = $_SESSION['msg'];
    }
?>

<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="UTF-8">
  <title> MyHealthyLife Sign up</title>
  <!--  google font -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="../style/signup.css">
  <link rel="stylesheet" href="../style/sign.css">
  <style>
    body{
        background-image: url("../img/signup.webp");
    }
  </style>
</head>
<body>
    <nav>
        <div class="navContainer">
            <ul>
                <li><a href="welcome.html">MyHealthyLife</a></li>
            </ul>
        </div>
    </nav>
    <div class="FormDiv">
        <?php
            if($msg == "done"){
            echo "<div id='msg' class='msg'>
                    <p>Hello $name! 您已成功註冊 （๐•ᴗ•๐） </p>
                </div>";
            }
        ?>
        <form id="regForm" method="post" action="../database/signup_progress.php" class="form" >
            <!-- 1 -->
            <div class="tab">
                <h1 class="title">請問您叫什麼名字呢？</h1>
                <a >很高興認識您！<br>讓我們一起進入健康生活吧！</a><br><br>
                <input class="input" name="name" placeholder="輸入名稱" type="text" required="required" ><br>
            </div>
            <!-- 2 -->
            <div class="tab">
                <h1 class="title"> 體重目標 </h1>
                <a>請以週為單位，選取您理想的體重目標。</a><br>
                <div id="radios">
                    <label><input class="radio" type="radio" name="weekly_goal" value="weeklygoal_1"><span class="round button">減重0.25kg</span></label>
                    <label><input class="radio" type="radio" name="weekly_goal" value="weeklygoal_2"><span class="round button">減重0.5kg</span></label>
                    <label><input class="radio" type="radio" name="weekly_goal" value="weeklygoal_3"><span class="round button">減重1kg</span></label>
                    <label><input class="radio" type="radio" name="weekly_goal" value="weeklygoal_4"><span class="round button">維持體重</span></label>
                    <label><input class="radio" type="radio" name="weekly_goal" value="weeklygoal_5"><span class="round button">增重0.25kg</span></label>
                    <label><input class="radio" type="radio" name="weekly_goal" value="weeklygoal_6"><span class="round button">增重0.5kg</span></label>
                    <label><input class="radio" type="radio" name="weekly_goal" value="weeklygoal_7"><span class="round button">增重1kg</span></label>
                </div>
            </div>
            <!-- 3 -->
            <div class="tab">
                <h1 class="title"> 基本活動程度 </h1><br><br>
                <div id="radios">
                    <label><input class="radio" type="radio" name="activity" value="activity_0"><span class="round button">基本不動</span></label>
                    <label><input class="radio" type="radio" name="activity" value="activity_1"><span class="round button">不太活躍</span></label>
                    <label><input class="radio" type="radio" name="activity" value="activity_2"><span class="round button">稍微活躍</span></label>
                    <label><input class="radio" type="radio" name="avtivity" value="activity_3"><span class="round button">活躍</span></label>
                    <label><input class="radio" type="radio" name="activity" value="activity_4"><span class="round button">非常活躍</span></label>
                </div>
                <!-- 只要點擊，其他btn變成白色 -->
            </div>
            <!-- 4 -->
            <div class="tab">
                <h1 calss="title"> 基本資料 </h1><br>
                <input type="radio" name="gender" value="male" checked="checked"><a font-size="20px">男</a>
                <input type="radio" name="gender" value="female"><a font-size="20px">女</a><br><br>
                <input class="input" placeholder="選擇生日" type="date" name="birth" required="required" >
                <input class="input" placeholder="手機號碼" type="text" name="cellphone" required="required" maxlength="10" pattern="09\d{2}-\d{6}"/>
            </div>
            <!-- 5 -->
            <div class="tab">
                <h1 class="title"> 身高體重 </h1><br><br>
                <input class="input" name="height" placeholder="目前身高(cm)" type="number">
                <input class="input" name="weight" placeholder="目前體重(kg)" type="number">
                <input class="input" name="weight_goal" placeholder="目標體重(kg)" type="number">
            </div>
            <!-- 6 -->
            <div class="tab">
                <h1 class="title"> 建立帳號 </h1><br><br>
                <input class="input" name="email" placeholder="郵件地址" type="text" required="required">
                <input class="input" name="password" placeholder="建立密碼" type="password" required="required">
                <input class="input" name="password" placeholder="確認密碼" type="password" required="required">
            </div>

            <div class="signupBtnDiv">
                <button type="button" class="signupBtn" id="prevBtn" onclick="nextPrev(-1)">返回</button>
                <button type="button" class="signupBtn" id="nextBtn" onclick="nextPrev(1)">下一步</button>
            </div>
            <br><br><br>
            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
            </div>
        </form>
    </div>
    <script src="../js/signup.js"></script>
</body>
</html>