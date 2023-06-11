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
                    <li class="team active"><a href="personal.php">使用者設定</a></li>
                    <li class="signin"><a href="welcome.html" action="sesstion_destroy">登出</a></li>
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
                            <td colspan="2"><strong>生日</strong></td>
                            <td colspan="5"><?php echo $birth; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>電子郵件</strong></td>
                            <td colspan="5"><?php echo $email; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>密碼</strong></td>
                            <td colspan="5"><?php echo $password; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>手機號碼</strong></td>
                            <td colspan="5"><?php echo $cellphone; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>身高</strong></td>
                            <td colspan="5"><?php echo $height; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>體重</strong></td>
                            <td colspan="5"><?php echo $weight; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>目標體重</strong></td>
                            <td colspan="5"><?php echo $weight_goal; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>喝水量(cc)</strong></td>
                            <td colspan="5"><?php echo $water; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>活動量</strong></td>
                            <td colspan="5"><?php echo $activity; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>減重目標</strong></td>
                            <td colspan="5"><?php echo $weekly_goal; ?></td>
                        </tr>
                        <tr>
                            <td colspan="7"><button onclick="Edit()">修改資料</button></td>
                        </tr>
                    </ul>
                </table>
            </ul>
        </div>
        <form id="content" method="post" action="../database/personal_change.php" style="display:none">
            <ul>
                <h2>使用者資料</h2>
                <table style="width: 400px;height: 400px;">
                    <ul>
                        <tr>
                            <td colspan="2"><strong>姓名</strong></td>
                            <td colspan="3"><input name="name_c" value=<?php echo $name; ?>></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>生日</strong></td>
                            <td colspan="3"><input name="birth_c" value=<?php echo $birth; ?> type="date"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>電子郵件</strong></td>
                            <td colspan="3"><?php echo $email; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>密碼</strong></td>
                            <td colspan="3"><input name="password_c" value=<?php echo $password; ?>></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>手機號碼</strong></td>
                            <td colspan="3"><input name="cellphone_c" value=<?php echo $cellphone; ?>></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>身高</strong></td>
                            <td colspan="3"><input name="height_c" value=<?php echo $height; ?>></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>體重</strong></td>
                            <td colspan="3"><input name="weight_c" value=<?php echo $weight; ?>></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>目標體重</strong></td>
                            <td colspan="3"><input name="weight_goal_c" value=<?php echo $weight_goal; ?>></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>喝水量(cc)</strong></td>
                            <td colspan="3"> <input type="range" id="myRange" name="water_c" min="0" max="3500" step="1" value=<?php echo $water; ?>>
                                <output for="myRange"><?php echo $water; ?></output>
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
                            <td colspan="2"><strong>活動量</strong></td>
                            <td colspan="3">
                                <select name="activity_c">
                                    <option value="activity_0">基本不動</option>
                                    <option value="activity_1">不太活躍</option>
                                    <option value="activity_2">稍微活躍</option>
                                    <option value="activity_3">維持體重</option>
                                    <option value="activity_4">活躍</option>
                                    <option value="activity_5">非常活躍</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>減重目標</strong></td>
                            <td colspan="3">
                                <select name="weekly_goal_c">
                                    <option value="weeklygoal_1">減重0.25kg</option>
                                    <option value="weeklygoal_2">減重0.5kg</option>
                                    <option value="weeklygoal_3">減重1kg</option>
                                    <option value="weeklygoal_4">維持體重</option>
                                    <option value="weeklygoal_5">增重0.25kg</option>
                                    <option value="weeklygoal_6">增重0.5kg</option>
                                    <option value="weeklygoal_7">增重1kg</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <button onclick="Submit()" type="submit">修改資料</button>
                            </td>
                        </tr>
                    </ul>
                </table>
            </ul>
        </form>
    </main>

</body>

</html>