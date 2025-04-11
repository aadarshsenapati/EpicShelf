<?php
include('includes/connection.php');

if (!isset($_SESSION['reset_email'])) {
    header("Location: request_otp.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $otp = $_POST['otp'];
    $new_pass = $_POST['new_password'];
    $confirm_pass = $_POST['confirm_password'];
    $email = $_SESSION['reset_email'];

    // Fetch OTP and expiry
    $stmt = $conn->prepare("SELECT otp, otp_expiry FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($stored_otp, $otp_expiry);
    $stmt->fetch();
    $stmt->close();

    if ($stored_otp == $otp && strtotime($otp_expiry) > time()) {
        if ($new_pass === $confirm_pass) {
            $hashed = password_hash($new_pass, PASSWORD_DEFAULT);
            $update = $conn->prepare("UPDATE users SET password = ?, otp = NULL, otp_expiry = NULL WHERE email = ?");
            $update->bind_param("ss", $hashed, $email);
            $update->execute();

            unset($_SESSION['reset_email']);
            $success = "Password changed successfully.";
        } else {
            $error = "Passwords do not match.";
        }
    } else {
        $error = "Invalid or expired OTP.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Verify OTP</title></head>
<body>
<h2>Enter OTP & New Password</h2>
<form action="verify_otp.php" method="POST">
    <label>OTP:</label>
    <input type="text" name="otp" required><br>
    <label>New Password:</label>
    <input type="password" name="new_password" required><br>
    <label>Confirm Password:</label>
    <input type="password" name="confirm_password" required><br>
    <button type="submit">Change Password</button>
</form>
</body>
</html>
