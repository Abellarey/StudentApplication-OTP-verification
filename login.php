<?php
session_start();
include "conn.php";

$emailWarning = "";
$passWarning = "";

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $Password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $users = mysqli_fetch_array($result, MYSQLI_ASSOC);


    if ($users) {
        if (password_verify($Password, $users["password"])) {
            $_SESSION["id"] = $users["id"];
            header("Location: index.php");
            die();
        } else {
            $passWarning = "Password does not match";
        }
    } else {
        $emailWarning = "email does not exists";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(120deg, #1e88e5, #1565c0);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
        }

        .container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.8);
            width: 400px;
            max-width: 90%;
            overflow: hidden;
        }

        .header {
            background: #1976d2;
            padding: 25px 30px;
            text-align: center;
            color: white;
        }
        .header img{
            height: 50px;
            vertical-align: middle;
            margin-right: 10px;
            clip-path: circle();
        }
        .header h1 {
            font-weight: 600;
            font-size: 24px;
        }

        .form-container {
            padding: 25px 30px;
        }

        .form-control {
            margin-bottom: 20px;
            position: relative;
        }

        .form-control label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            font-size: 14px;
            color: #424242;
        }

        .form-control input {
            width: 100%;
            padding: 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s;
        }

        .form-control input:focus {
            outline: none;
            border-color: #2196f3;
            box-shadow: 0 0 0 2px rgba(33, 150, 243, 0.2);
        }

        .form-control i {
            position: absolute;
            right: 15px;
            top: 42px;
            color: #757575;
        }

        .btn {
            background: #2196f3;
            color: white;
            border: none;
            padding: 14px;
            border-radius: 8px;
            width: 100%;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }
        .btn a {
            color: white;
            text-decoration: none;
        }
        .btn:hover {
            background: #1976d2;
        }

        .separator {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 25px 0;
            color: #757575;
            font-size: 14px;
        }

        .separator::before,
        .separator::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #ddd;
        }

        .separator::before {
            margin-right: 10px;
        }

        .separator::after {
            margin-left: 10px;
        }

        .social-login {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .social-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .social-btn:hover {
            transform: translateY(-3px);
        }

        .google {
            background: #db4437;
        }

        .microsoft {
            background: #0078d7;
        }

        .apple {
            background: #000;
        }

        .switch-form {
            text-align: center;
            margin-top: 25px;
            font-size: 14px;
            color: #757575;
        }

        .switch-form a {
            color: #2196f3;
            text-decoration: none;
            font-weight: 600;
            margin-left: 5px;
        }

        .switch-form a:hover {
            text-decoration: underline;
        }

        .password-toggle {
            cursor: pointer;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .remember {
            display: flex;
            align-items: center;
        }
     
        .remember input {
            margin-right: 8px;
        }
      
        .forgot-password {
            color: #2196f3;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }
        .warning {
            color: red;
            font-size: 16px;
           
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><img src="https://th.bing.com/th/id/OIP.lW_QFgbFGyPHNU8DZawY0AHaHa?w=144&h=180&c=7&r=0&o=7&pid=1.7&rm=3" alt=""></i>Lyceum Of Alabang</h1>
        </div>
        
        <div class="form-container">
            <form id="loginForm"action="login.php" method="POST">
                <div class="form-control">
                    <label for="email">Email</label>
                    <input type="text" id="email"name="email"placeholder="Enter your email" required>
                    <span class="warning"><?php echo $emailWarning; ?></span>
                    <i class="fas fa-envelope"></i>
                </div>
                
                <div class="form-control">
                    <label for="password">Password</label>
                    <input type="password" id="password"name="password" placeholder="Enter your password" required>
                    <span class="warning"> <?php echo $passWarning; ?></span>
                    <i class="fas fa-eye password-toggle" onclick="togglePassword()"></i>
                </div>
                
                <div class="remember-forgot">
                    <div class="remember">
                        <input type="checkbox" id="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <a href="#" class="forgot-password">Forgot Password?</a>
                </div>             
                <button type="submit" class="btn"name="login">Login</button>
            </form>
            
          
            <div class="switch-form">
                Don't have an account? <a href="signup.php">Sign up</a>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.querySelector('.password-toggle');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
        
    </script>
</body>
</html>