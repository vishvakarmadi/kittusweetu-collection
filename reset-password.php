<?php
// Include connection
include 'admin/code/connection.php';

$message = '';
$error = '';
$token = '';

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    
    // Check if token exists and is valid
    $sql = "SELECT * FROM `password_reset` WHERE `token` = ? AND `expires_at` > ?";
    $stmt = mysqli_prepare($con, $sql);
    $current_time = date("U");
    mysqli_stmt_bind_param($stmt, "si", $token, $current_time);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) == 0) {
        $error = "Invalid or expired reset token.";
    }
} else {
    $error = "No reset token provided.";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !$error) {
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    if ($password != $confirm_password) {
        $error = "Passwords do not match.";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters long.";
    } else {
        // Get user ID from the token
        $token_data = mysqli_fetch_assoc($result);
        $user_id = $token_data['user_id'];
        
        // Update the user's password (in a real application, you'd hash the password)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $update_sql = "UPDATE `user` SET `password` = ? WHERE `id` = ?";
        $update_stmt = mysqli_prepare($con, $update_sql);
        mysqli_stmt_bind_param($update_stmt, "si", $hashed_password, $user_id);
        $result = mysqli_stmt_execute($update_stmt);
        
        if ($result) {
            // Delete the used token
            $delete_sql = "DELETE FROM `password_reset` WHERE `token` = ?";
            $delete_stmt = mysqli_prepare($con, $delete_sql);
            mysqli_stmt_bind_param($delete_stmt, "s", $token);
            mysqli_stmt_execute($delete_stmt);
            
            $message = "Your password has been successfully reset. <a href='login.php'>Click here to login</a>.";
        } else {
            $error = "Error updating password. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <?php include "hedder_link.php" ?>
    <style>
        .reset-password-container {
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

    <div class="reset-password-container">
        <h2>Reset Password</h2>
        
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <?php if ($message): ?>
            <div class="alert alert-success"><?php echo $message; ?></div>
        <?php else: ?>
            <?php if (!$error): ?>
                <form method="POST">
                    <div class="form-group">
                        <label for="password">New Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm New Password:</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </form>
            <?php endif; ?>
        <?php endif; ?>
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