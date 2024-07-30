<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;

class Auth extends Controller
{
    public function login()
    {
        echo view('auth/login');
    }

    public function loginAuth()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $model = new UserModel();
        $user = $model->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) { // Corrected line
            if ($user['role'] === 'admin') {
                session()->set([
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'isLoggedIn' => true,
                ]);
                return redirect()->to(base_url('/admin/dashboard'));
            } else {
                session()->setFlashdata('msg', 'Only admins can log in.');
                return redirect()->to(base_url('/auth/login'));
            }
        } else {
            session()->setFlashdata('msg', 'Invalid username or password');
            return redirect()->to(base_url('/auth/login'));
        }
    }



    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }

    public function register()
    {
        echo view('auth/register');
    }

    public function registerUser()
    {
        $model = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'email' => $this->request->getPost('email'),
            'role' => 'user' // default role, you can adjust based on requirements
        ];
        $model->save($data);
        return redirect()->to('/auth/login');
    }

    public function forgotPassword()
    {

        helper(['form']);
        echo view('auth/forgot_password');
    }
    public function testEmail()
    {
        $emailService = \Config\Services::email();
    
        $emailService->setTo('acharyasweta472@gmail.com'); // Test recipient email
        $emailService->setFrom('swetaacharya890@gmail.com', 'sweta');
        $emailService->setSubject('Test Email');
        $emailService->setMessage('This is a test email.');
    
        if ($emailService->send()) {
            echo 'Email sent successfully.';
        } else {
            $error = $emailService->printDebugger(['headers']);
            echo 'Failed to send email. Error: ' . $error;
        }
    }
public function sendOtp()
{
    $email = $this->request->getPost('email');
    $model = new UserModel();
    $user = $model->where('email', $email)->first();

    if (!$user) {
        session()->setFlashdata('msg', 'Email not found');
        return redirect()->to(base_url('/auth/forgotPassword'));
    }

    $otp = rand(100000, 999999); // Generate OTP
    $otpExpiry = Time::now()->addMinutes(10); // OTP valid for 10 minutes

    $user['otp'] = $otp;
    $user['otp_expiry'] = $otpExpiry->toDateTimeString();
    $model->save($user);

    $emailService = \Config\Services::email();

    $emailService->setTo($email);
    $emailService->setFrom('swetaacharya890@gmail.com', 'sweta');
    $emailService->setSubject('Password Reset OTP');
    $emailService->setMessage("Your OTP for password reset is: $otp");

    if ($emailService->send()) {
        session()->setFlashdata('msg', 'OTP sent successfully. Check your email.');
        return redirect()->to(base_url('/auth/verifyOtp'));
    } else {
        $error = $emailService->printDebugger(['headers']);
        log_message('error', 'Failed to send OTP: ' . $error);
        session()->setFlashdata('msg', 'Failed to send OTP. Please try again. Error: ' . $error);
        return redirect()->to(base_url('/auth/forgotPassword'));
    }
}


public function verifyOtp()
{
    echo view('auth/verify_otp');
}
public function verifyOtpProcess()
{
    $otp = $this->request->getPost('otp');
    $model = new UserModel();
    $user = $model->where('otp', $otp)->first();

    if (!$user || Time::now()->isAfter($user['otp_expiry'])) {
        session()->setFlashdata('msg', 'Invalid or expired OTP');
        return redirect()->to(base_url('/auth/verifyOtp'));
    }

    session()->set([
        'otp_verified' => true,
        'reset_email' => $user['email']
    ]);

    return redirect()->to(base_url('/auth/resetPassword'));
}

public function resetPassword()
{
    if (!session()->get('otp_verified')) {
        return redirect()->to(base_url('/auth/forgotPassword'));
    }

    echo view('auth/reset_password');
}

public function resetPasswordProcess()
{
    if (!session()->get('otp_verified')) {
        return redirect()->to(base_url('/auth/forgotPassword'));
    }

    $newPassword = $this->request->getPost('password');
    $email = session()->get('reset_email');

    $model = new UserModel();
    $user = $model->where('email', $email)->first();

    if ($user) {
        $user['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
        $user['otp'] = null;
        $user['otp_expiry'] = null;
        $model->save($user);

        session()->remove(['otp_verified', 'reset_email']);
        session()->setFlashdata('msg', 'Password reset successfully');
        return redirect()->to(base_url('/auth/login'));
    } else {
        session()->setFlashdata('msg', 'Failed to reset password. Please try again.');
        return redirect()->to(base_url('/auth/resetPassword'));
    }
}
}
