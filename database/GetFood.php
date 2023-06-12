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

// 檢查是否有接收到日期參數
if (isset($_GET['date'])) {
    $date = $_GET['date'];

    // 建立查詢 SQL
    $sql = " SELECT * FROM food WHERE date = '$date'";

    // 執行查詢
    $result = $conn->query($sql);

    // 檢查查詢結果
    if ($result->num_rows > 0) {
        $rows = array();

        // 將查詢結果轉換為關聯陣列
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        // 輸出 JSON 格式的結果
        echo json_encode($rows);
    } else {
        // 回傳空陣列表示沒有結果
        echo json_encode([]);
    }
} else {
    echo "Invalid date parameter.";
}

// 關閉資料庫連接
$conn->close();

?>

