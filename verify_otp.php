<?php
include 'conn.php';

if (isset($_POST['verify'])) {
    $email = $_POST['email'];
    $otp = $_POST['otp'];

    // Optional: Validate OTP format
    if (!preg_match('/^\d{6}$/', $otp)) {
        echo "<script>alert('OTP must be 6 digits.');</script>";
    } else {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND otp = ?");
        $stmt->bind_param("ss", $email, $otp);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $update = $conn->prepare("UPDATE users SET is_verified = 1 WHERE email = ?");
            $update->bind_param("s", $email);
            $update->execute();
            $update->close();

            echo "<script>alert('Account verified successfully!'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Invalid OTP. Please try again.');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Verification</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #1a2980, #26d0ce);
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 440px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 46, 109, 0.3);
            overflow: hidden;
        }

        .header {
            background: #1e88e5;
            color: white;
            padding: 25px 30px;
            text-align: center;
        }

        .header h1 {
            font-weight: 600;
            font-size: 22px;
        }

        .header p {
            margin-top: 8px;
            font-size: 14px;
            opacity: 0.9;
        }

        .content {
            padding: 30px;
        }

        .instruction {
            text-align: center;
            color: #1565c0;
            margin-bottom: 25px;
            font-size: 15px;
            line-height: 1.5;
        }

        .otp-input {
            width: 100%;
            padding: 14px;
            font-size: 20px;
            text-align: center;
            border: 2px solid #bbdefb;
            border-radius: 10px;
            background: #e3f2fd;
            color: #0d47a1;
            margin-bottom: 30px;
        }

        .verify-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(to right, #2196f3, #1e88e5);
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 10px rgba(33, 150, 243, 0.4);
        }

        .verify-btn:hover {
            background: linear-gradient(to right, #1e88e5, #1976d2);
            box-shadow: 0 6px 15px rgba(33, 150, 243, 0.5);
            transform: translateY(-2px);
        }

        .verify-btn:active {
            transform: translateY(0);
        }

        @media (max-width: 480px) {
            .container {
                border-radius: 12px;
            }

            .content {
                padding: 20px;
            }

            .otp-input {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Secure Verification</h1>
            <p>Enter your verification code to continue</p>
        </div>
        <div class="content">
            <p class="instruction">Please enter the 6-digit verification code</p>
            <form method="post" action="">
                <input type="hidden" name="email" value="<?php echo htmlspecialchars($_GET['email']); ?>">
                <input type="text" name="otp" maxlength="6" class="otp-input" placeholder="Enter 6-digit OTP" required>
                <button class="verify-btn" name="verify">Verify & Continue</button>
            </form>
        </div>
    </div>
</body>
</html>