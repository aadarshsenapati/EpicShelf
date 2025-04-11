<?php
include('includes/connection.php');

if (!isset($_SESSION['user_id'])) {
    echo "User not logged in!";
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch the email from the users table
$stmt = $conn->prepare("SELECT email FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($email);
$stmt->fetch();
$stmt->close();

if ($email) {
    $otp = rand(100000, 999999);
    $expires = date("Y-m-d H:i:s", strtotime("+10 minutes"));

    // Save OTP and expiry
    $update = $conn->prepare("UPDATE users SET otp = ?, otp_expiry = ? WHERE id = ?");
    $update->bind_param("isi", $otp, $expires, $user_id);
    $update->execute();

    // Send OTP via Email
    $subject = "Your OTP for Password Reset";
    $message = "Dear User,\n\nYour OTP for resetting your password is: $otp\nThis OTP will expire in 10 minutes.\n\nIf you didn't request this, please ignore the message.";
    $headers = "From: no-reply@yourdomain.com";

    $mail_status = mail($email, $subject, $message, $headers);

    if ($mail_status) {
        $_SESSION['reset_email'] = $email;
        header("Location: verify_otp.php");
        exit();
    } else {
        echo "Failed to send email. Please check your mail server settings.";
    }


    $_SESSION['reset_email'] = $email;
    header("Location: verify_otp.php");
    exit();
} else {
    echo "Email not found.";
}
?>
