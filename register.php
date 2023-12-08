<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Register</title>
    <style>
        body {
            background-image: url(pic/a9f7bc87f8b5e4b889d24a54e420659b.jpg);
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            margin: 0;
            display: flex;
            align-items:center;
            justify-content: center;
            height: 100vh;
        }

        .container {
                background-color: rgba(142, 142, 142, 0.8);
                border-radius: 16px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                overflow: hidden;
                width: 500px;
        }

        form {
            padding: 20px;
            box-sizing: border-box;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #6e6e6e;
            border-radius: 4px;
        }

        button {
            background-color: #000000;
            color: rgb(160, 160, 160);
            padding: 15px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #000000;
        }

        .switch {
            text-align: center;
            padding: 10px;
        }

        .switch a {
            text-decoration: none;
            color: #000000;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <form id="loginForm" method="post">
        <h2>Login</h2>
        <input type="text" placeholder="Username" name="username" required>
        <input type="password" placeholder="Password" name="password" required>
        <button type="submit" name="dangnhap">Login</button>
        <div class="switch">
            <p>Don't have an account? <a href="#" onclick="toggleForm()">Register</a></p>
        </div>
    </form>

    <form style="display: none;" id="registerForm" method="post">
        <h2>Register</h2>
        <input type="text" placeholder="Username" name="newUsername" required>
        <input type="password" placeholder="Password" name="newPassword" required>
        <input type="password" placeholder="Rewrite password" name="rewrite_password" required>
        <button type="submit" name="dangky">Register</button>
        <div class="switch">
            <p>Already have an account? <a href="#" onclick="toggleForm()">Login</a></p>
        </div>
    </form>
</div>

<script>
    function toggleForm() {
        var loginForm = document.getElementById('loginForm');
        var registerForm = document.getElementById('registerForm');

        if (loginForm.style.display === 'none') {
            loginForm.style.display = 'block';
            registerForm.style.display = 'none';
        } else {
            loginForm.style.display = 'none';
            registerForm.style.display = 'block';
        }
    }
</script>

<?php
    session_start();
    include_once("db_config.php");

    if(isset($_SESSION['mySession'])){
        header("location: products.php");
    }
    if (isset($_POST['dangnhap'])) {
        $user = $_POST['username'];
        $password = $_POST['password'];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy dữ liệu từ form
            $username = mysqli_real_escape_string($conn, $_POST["username"]);
            $password = mysqli_real_escape_string($conn, $_POST["password"]);
        
            // Truy vấn kiểm tra tài khoản tồn tại
            $query = "SELECT * FROM account WHERE taikhoan='$username' AND matkhau='$password'";
            $result = mysqli_query($conn, $query);
            
            // Kiểm tra số lượng hàng trả về
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $user_level = $row['level'];
                $_SESSION['mySession'] = $user_level;
                if($user_level == 1){
                    header("location: admin_dashboard.php");
                } elseif ($user_level == 2) {
                    header("location: products.php");
                }
            } else {
                echo "<script>alert('Dang nhap that bai, vui long kiem tra lai username hoac password');</script>";
            }
        }
    }
    
    if (isset($_POST['dangky'])){
        $new_user = $_POST['newUsername'];
        $new_password = $_POST['newPassword'];
        $rewrite_password = $_POST['rewrite_password'];
        $level = 2;
        $sql = " INSERT INTO account (taikhoan, matkhau, level)
        VALUES ('$new_user', '$new_password', '$level')";
        if ($new_password == $rewrite_password){
            $result = mysqli_query($conn, $sql);
            if ($result){
                echo "<script>alert('Dang ky thanh cong');</script>";
            } else{
                echo "<script>alert('Dang ky that bai');</script>";
            }
            }
    }
    
?>
</body>
</html>