<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the email entered by the user
    $email = $_POST['email'];

    // Check if the email exists in the database
    // You will need to replace 'your_database' with your actual database name
    $conn = new mysqli('localhost', 'username', 'password', 'your_database');
    $stmt = $conn->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Generate a unique token for password reset
        $token = bin2hex(random_bytes(32));

        // Store the token in the database
        $stmt = $conn->prepare('UPDATE users SET reset_token = ? WHERE email = ?');
        $stmt->bind_param('ss', $token, $email);
        $stmt->execute();

        // Send an email to the user with the password reset link
        $resetLink = 'https://example.com/reset-password.php?token=' . $token;
        $to = $email;
        $subject = 'Password Reset';
        $message = 'Click the following link to reset your password: ' . $resetLink;
        $headers = 'From: noreply@example.com' . "\r\n" .
            'Reply-To: noreply@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);

        echo 'An email with instructions to reset your password has been sent to your email address.';
    } else {
        echo 'Email not found in our database.';
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forget Password</title>
</head>
<body>
    <h1>Forget Password</h1>
    <form method="POST" action="">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
