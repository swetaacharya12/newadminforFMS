<div class="verify-otp">
    <form method="post" action="<?= site_url('auth/verifyOtpProcess') ?>">
        <h2>Verify OTP</h2>
        <p>Enter the OTP sent to your email</p>
        <input type="text" name="otp" placeholder="OTP" required>
        <p><input type="submit" value="Verify OTP"></p>
    </form>
</div>