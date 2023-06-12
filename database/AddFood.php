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
$maxFoodId = 0;
$sqlMaxId = "SELECT MAX(food_id) AS max_id FROM food";
$result = $conn->query($sqlMaxId);
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $maxFoodId = $row['max_id'];
}
// 新的 food_id 值
$newFoodId = $maxFoodId + 1;
// 驗證表單提交的數據
if (isset($_POST['foodName'], $_POST['quantity'], $_POST['calories'], $_POST['date'])) {
    $foodName = $_POST['foodName'];
    $quantity = $_POST['quantity'];
    $calories = $_POST['calories'];
    $date = $_POST['date'];

    // 執行插入操作
    $sql = "INSERT INTO food (food_id, date, food_name, quantity, calories)
    VALUES ('$newFoodId', '$date', '$foodName', '$quantity', '$calories')";
     
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
