<?php 
    include('../database/personal_process.php'); 
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>個人中心</title>
    <link rel="stylesheet" href="../style/personal.css">
    <script>
        function Edit() {
            common.style.display = "none";
            content.style.display = "block"
        }
        function Submit() {
            common.style.display = "block";
            content.style.display = "none"
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header>
        <nav>
            <div class="container">
                <ul>
                    <li class="home "><a href="home.html">MyHealthyLife</a></li>
                    <li class="about"><a href="exercise.html">運動日記</a></li>
                    <li class="function"><a href="foodtest.html">食物日記</a></li>
                    <li class="calculate"><a href="chart.html">統計報表</a></li>
                    <li class="team active"><a href="personal.html">使用者設定</a></li>
                    <li class="signin"><a href="welcome.html">登出</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="center" id="common">
            <ul>
                <h2>使用者資料</h2>
                <table style="width: 400px;height: 400px;">
                    <ul>
                        <tr>
                            <td colspan="2"><strong>姓名</strong></td>
                            <td colspan="5"><?php echo $name; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>性別</strong></td>
                            <td colspan="5"><?php echo $gender; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>生日</strong></td>
                            <td colspan="5"><?php echo $birth; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>電子郵件</strong></td>
                            <td colspan="5"><?php echo $email; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>手機號碼</strong></td>
                            <td colspan="5"><?php echo $cellphone; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>喝水量(cc)</strong></td>
                            <td colspan="5"><?php echo $water; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>減重目標</strong></td>
                            <td colspan="5">[<?php echo $weekly_goal; ?></td>
                        </tr>
                        <tr>
                            <td colspan="7"><button onclick="Edit()">修改資料</button></td>
                        </tr>
                    </ul>
                </table>
            </ul>
        </div>
        <div id="content" style="display:none">
            <ul>
                <h2>使用者資料</h2>
                <table style="width: 400px;height: 400px;">
                    <ul>
                        <tr>
                            <td colspan="2"><strong>姓名</strong></td>
                            <td colspan="3"><input value="你的姓名"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>性別</strong></td>
                            <td colspan="3"><input value="你的性別"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>生日</strong></td>
                            <td colspan="3"><input value="你的生日"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>電子郵件</strong></td>
                            <td colspan="3"><input value="你的電子郵件"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>手機號碼</strong></td>
                            <td colspan="3"><input value="你的手機號碼"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>喝水量(cc)</strong></td>
                            <td colspan="3"> <input type="range" id="myRange" min="0" max="10000" step="1" value="1500">
                                <output for="myRange">1500</output>

                                <script>
                                    const range = document.getElementById('myRange');
                                    const output = document.querySelector('output[for="myRange"]');

                                    range.addEventListener('input', () => {
                                        output.textContent = range.value;
                                    });
                                </script>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>減重目標</strong></td>
                            <td colspan="3"><select>
                                    <option value="option1">減重0.25kg</option>
                                    <option value="option2">減重0.5kg</option>
                                    <option value="option3">減重1kg</option>
                                    <option value="option3">維持體重</option>
                                    <option value="option3">增重0.25kg</option>
                                    <option value="option3">增重0.5kg</option>
                                    <option value="option3">增重1kg</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td colspan="5"><button onclick="Submit()">修改資料</button></td>
                        </tr>
                    </ul>
                </table>
            </ul>
        </div>
    </main>

</body>

</html>