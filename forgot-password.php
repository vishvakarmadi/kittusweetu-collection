<?php
// Include configuration and connection
include 'config.php';
include 'admin/code/connection.php';

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($con, trim($_POST['email']));
    
    // Check if email exists in database
    $sql = "SELECT * FROM `user` WHERE `email` = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) > 0) {
        // Generate a reset token
        $token = bin2hex(random_bytes(50));
        $user = mysqli_fetch_assoc($result);
        $user_id = $user['id'];
        
        // Store the token in the database
        $expires = date("U") + 1800; // Token expires in 30 minutes
        $insert_token_sql = "INSERT INTO `password_reset` (`user_id`, `token`, `expires_at`) VALUES (?, ?, ?)";
        $stmt_token = mysqli_prepare($con, $insert_token_sql);
        mysqli_stmt_bind_param($stmt_token, "iss", $user_id, $token, $expires);
        mysqli_stmt_execute($stmt_token);
        
        // Create reset link
        $reset_link = "http://localhost/kittusweetu-collection/reset-password.php?token=" . $token;
        $subject = "Password Reset Request - KittuSweetu Collection";
        $email_message = "
        <html>
        <head>
            <title>Password Reset Request</title>
        </head>
        <body>
            <h2>Password Reset Request</h2>
            <p>You have requested to reset your password. Click the link below to reset your password:</p>
            <p><a href=\"$reset_link\">Reset Password</a></p>
            <p>If you did not request this, please ignore this email.</p>
            <p>This link will expire in 30 minutes.</p>
        </body>
        </html>
        ";
        
        // Send email using our function
        if (sendEmail($email, $subject, $email_message)) {
            $message = "Password reset link has been sent to your email address. Please check your inbox.";
        } else {
            // Fallback: display the reset link if email fails
            $message = "Password reset link has been generated. Click <a href='$reset_link'>here</a> to reset your password.";
        }
    } else {
        $error = "No account found with that email address.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <?php include "hedder_link.php" ?>
    <style>
        .forgot-password-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <!-- Top Header Start -->
    <?php include "heder.php" ?>
    <!-- Top Header End -->

    <!-- navbar Start -->
    <?php include "navbar.php" ?>
    <!-- navbar End -->

    <?php include "Breadcrumb.php" ?>

    <div class="forgot-password-container">
        <h2>Forgot Password</h2>
        <p>Enter your email address and we'll send you a link to reset your password.</p>
        
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <?php if ($message): ?>
            <div class="alert alert-info"><?php echo $message; ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Send Reset Link</button>
        </form>
        <br>
        <a href="login.php">Back to Login</a>
    </div>

    <!-- Footer Start -->
    <?php include "footer.php" ?>
    <!-- Footer Bottom End -->

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <?php include "footer_link.php" ?>
</body>
</html>