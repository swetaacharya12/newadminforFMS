<!-- app/Views/auth/reset_password.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        /* Your existing styles */
    </style>
</head>
<body>
    <div class="forgot-password-container">
        <h2>Reset Password</h2>
        <?php if(session()->getFlashdata('msg')): ?>
            <div class="msg"><?= session()->getFlashdata('msg') ?></div>
        <?php endif; ?>
        <form action="site_url('auth/resetPasswordProcess') " method="post">
        <p>Enter your new password</p>
        <input type="password" name="password" placeholder="New Password" required>
        <p><input type="submit" value="Reset Password"></p>
        </form>
    </div>
</body>
</html>
<!-- <div class="reset-password">
    <form method="post" action="<?= site_url('/resetPasswordProcess') ?>">
        <h2>Reset Password</h2>
        <p>Enter your new password</p>
        <input type="password" name="password" placeholder="New Password" required>
        <p><input type="submit" value="Reset Password"></p>
    </form>
</div> -->