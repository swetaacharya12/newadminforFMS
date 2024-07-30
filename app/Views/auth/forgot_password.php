<!-- app/Views/auth/forgot_password.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            animation: backgroundAnimation 10s infinite alternate;
        }

        @keyframes backgroundAnimation {
            0% {
                background: linear-gradient(135deg, #71b7e6, #9b59b6);
            }

            100% {
                background: linear-gradient(135deg, #9b59b6, #71b7e6);
            }
        }

        .forgot-password-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .forgot-password-container h2 {
            margin-bottom: 20px;
            color: #333;
            font-weight: 500;
        }

        .forgot-password-container input[type="email"] {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        .forgot-password-container input[type="email"]:focus {
            border-color: #6e7ff3;
        }

        .forgot-password-container button {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #6e7ff3, #785ce9);
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .forgot-password-container button:hover {
            background: linear-gradient(135deg, #785ce9, #6e7ff3);
        }
    </style>
</head>

<body>
    <div class="forgot-password-container">
        <h2>Forgot Password</h2>
        <?php if (session()->getFlashdata('msg')) : ?>
            <div class="msg"><?= session()->getFlashdata('msg') ?></div>
        <?php endif; ?>
        <form action="<?= site_url('auth/sendOtp') ?>" method="post">
            <input type="email" name="email" placeholder="Enter your email" required><br>
            <button type="submit">Send OTP</button>
        </form>
    </div>
</body>
</html>