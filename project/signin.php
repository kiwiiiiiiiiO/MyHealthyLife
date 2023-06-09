<?php
    session_start();
    session_destroy(); 
    session_start();
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: home.html");
        exit;  //記得要跳出來，不然會重複轉址過多次
    }
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title> MyHealthyLife Sign in</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../style/signin.css">
    <link rel="stylesheet" href="../style/sign.css">
    <style>
        body{
            background-image: url("../img/yoga.jpg");
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
        <form class="form" method="post" action="../database/signin_process.php">
            <h1 class="title"> 會員登入 </h1>
            <div class="inputDiv">
                <input class="input" name="email" required="required" placeholder="Email" type="text">
                <label class="label"> 帳號/信箱 </label>
            </div>
            <div class="inputDiv">
                <input class="input" name="password" required="required" minlength ="8" placeholder="密碼" type="password" id="passwordInput">
                <label class="label"> 密碼 </label>
                <i id="checkEye" class="far fa-eye"></i>
            </div>
            <a href="forgetPassword.html" style="color:gray;">忘記密碼？</a>
            <!-- change to submit input -->
            <button class="signinBtn">登入</button>
            <div class="signinDiv">
                <a>還不是會員？</a>
                <a href="signup.php" style="color:#0676C2;">立即註冊</a>
            </div>
        </form>
    </div>
</body>
<script>
    const togglePassword = document.querySelector('#checkEye');
    const password = document.querySelector('#passwordInput');
    togglePassword.addEventListener('click', function (e) {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });
</script> 
</html>