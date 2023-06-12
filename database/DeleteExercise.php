<?php
$servername = "127.0.0.1"; // 資料庫伺服器名稱
$username = "root"; // 資料庫使用者名稱
$password = ""; // 資料庫密碼
$dbname = "myhealthylife"; // 資料庫名稱

// 建立與資料庫的連接
$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查連接是否成功
if ($conn->connect_error) {
    die("連接失敗: " . $conn->connect_error);
}

// 驗證表單提交的數據
if (isset($_GET['id'])) {
    $ExerciseId = $_GET['id'];

    // 執行刪除操作
    $sql = "DELETE FROM exercise WHERE exercise_id = '$ExerciseId'";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid data received";
}

// 關閉資料庫連接
$conn->close();
?>
