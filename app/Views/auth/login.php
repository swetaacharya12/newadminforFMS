<!-- 
<h1>Login</h1>
<?php if(session()->getFlashdata('msg')):?>
    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
<?php endif;?>
<form action="/auth/loginAuth" method="post">
     <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username" required>
    </div> 
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
<p>Don't have an account? <a href="/auth/register">Register here</a></p>
 -->
 <!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f0f0f0;
        margin: 0;
    }
    h1 {
        text-align: center;
        animation: fadeIn 1s ease-in-out;
    }
    form {
        background: #fff;
        padding: 33px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        animation: slideIn 1s ease-in-out;
    }
    .form-group {
        margin-bottom: 15px;
        animation: fadeIn 1.2s ease-in-out;
    }
    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: all 0.3s ease;
    }
    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }
    .btn-primary {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
    .alert {
        animation: shake 0.5s ease-in-out;
    }
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    @keyframes slideIn {
        from {
            transform: translateY(-50px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    @keyframes shake {
        0%, 100% {
            transform: translateX(0);
        }
        20%, 60% {
            transform: translateX(-10px);
        }
        40%, 80% {
            transform: translateX(10px);
        }
    }
</style>
<body>
    <?php if(session()->getFlashdata('msg')):?>
        <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
    <?php endif;?>
    <form action="/auth/loginAuth" method="post">
         <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Username" required>
        </div> 
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <p>Don't have an account? <a href="/auth/register">Register here</a></p>
</body>
</html> -->
<!-- <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        .login-container {
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

        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
            font-weight: 500;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        .login-container input[type="text"]:focus,
        .login-container input[type="password"]:focus {
            border-color: #6e7ff3;
        }

        .login-container button {
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

        .login-container button:hover {
            background: linear-gradient(135deg, #785ce9, #6e7ff3);
        }

        .login-container a {
            display: block;
            margin-top: 20px;
            color: #6e7ff3;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .login-container a:hover {
            color: #785ce9;
        }

        .login-container .msg {
            margin-bottom: 20px;
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <?php if(session()->getFlashdata('msg')): ?>
            <div class="msg"><?= session()->getFlashdata('msg') ?></div>
        <?php endif; ?>
        <form action="/auth/loginAuth" method="post">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>
         <p>Don't have an account? <a href="/auth/register">Register here</a></p> 
    </div>
</body>
</html> -->


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        .login-container {
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

        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
            font-weight: 500;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        .login-container input[type="text"]:focus,
        .login-container input[type="password"]:focus {
            border-color: #6e7ff3;
        }

        .login-container button {
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

        .login-container button:hover {
            background: linear-gradient(135deg, #785ce9, #6e7ff3);
        }

        .login-container a {
            display: block;
            margin-top: 20px;
            color: #6e7ff3;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .login-container a:hover {
            color: #785ce9;
        }

        .login-container .msg {
            margin-bottom: 20px;
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <?php if(session()->getFlashdata('msg')): ?>
            <div class="msg"><?= session()->getFlashdata('msg') ?></div>
        <?php endif; ?>
        <form action="/auth/loginAuth" method="post">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>
        <a href="/auth/forgotPassword">Forgot Password?</a>
    </div>
</body>
</html>
