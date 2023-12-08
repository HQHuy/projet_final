<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Database Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>Table Information Customer </h2>

    <?php
    // Kết nối đến CSDL (thay thông tin kết nối của bạn vào đây)
    include_once("db_config.php");


    // Thực hiện truy vấn SQL để lấy dữ liệu từ CSDL (thay tên bảng của bạn vào đây)
    $sql = "SELECT id, Name, Sex, Email, Address, Phone_num FROM Customer_Info";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Hiển thị dữ liệu trong bảng
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Sex</th><th>Email</th><th>Address</th><th>Phone Number</th></tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["Name"] . "</td>";
            echo "<td>" . $row["Sex"] . "</td>";
            echo "<td>" . $row["Email"] . "</td>";
            echo "<td>" . $row["Address"] . "</td>";
            echo "<td>" . $row["Phone_num"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "0 results";
    }

    // Đóng kết nối CSDL
    $conn->close();
    ?>

    <a href="logout.php">
        <button name="return">Return</button>
    </a>

</body>
</html>
