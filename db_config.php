<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cosodulieu";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }

    mysqli_query($conn, "SET NAMES 'utf8'");
?>
