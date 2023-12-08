<?php
    session_status();
    include_once("db_config.php");

    $customer_name = $_POST['fullName'];
    $customer_sex = $_POST['sex'];
    $customer_email = $_POST['email'];
    $customer_address = $_POST['address'];
    $customer_num = $_POST['num'];

    // Chèn dữ liệu vào CSDL
    $sql = "INSERT INTO Customer_Info (Name, Sex, Email, Address, Phone_num)
    VALUES ('$customer_name', '$customer_sex', '$customer_email', '$customer_address', '$customer_num')";
    if ($conn -> query($sql) == TRUE){
        echo "Data inserted successfully!";
        header("location: payments.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>