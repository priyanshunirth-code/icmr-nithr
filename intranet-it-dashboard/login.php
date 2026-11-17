<?php
declare(strict_types=1);
?><!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sign in · ICMR-NITHR IT</title>
    <link rel="stylesheet" href="assets/css/app.css">
</head>
<body class="login-page">
    <div class="login-announcement">ICMR-NITHR · National Institute for Tribal Health Research, Jabalpur</div>
    <main class="login-card">
        <div class="brand-lockup">
            <img src="assets/images/logo.jpg" alt="ICMR-NITHR logo">
            <div><strong>IT Administration</strong><small>Internal IT Services · Jabalpur</small></div>
        </div>
        <div class="login-intro">
            <p class="eyebrow">SECURE INTERNAL ACCESS</p>
            <h1>Welcome back</h1>
            <p class="muted">Sign in to manage IT assets, IP records, and support operations.</p>
        </div>
        <?php if (!empty($login_error)): ?><div class="alert alert-error"><?= e($login_error) ?></div><?php endif; ?>
        <form method="post" class="login-form">
            <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
            <input type="hidden" name="action" value="login">
            <div class="account-toggle" role="group" aria-label="Account type">
                <input type="radio" id="account-master" name="account_type" value="master">
                <label for="account-master">Master</label>
                <input type="radio" id="account-user" name="account_type" value="user" checked>
                <label for="account-user">User</label>
            </div>
            <label>Username<input name="username" required autocomplete="username" placeholder="Enter your username"></label>
            <label>Password<input type="password" name="password" required autocomplete="current-password" placeholder="Enter your password"></label>
            <button class="btn btn-primary btn-block" type="submit">Sign in <span>→</span></button>
        </form>
        <p class="login-note">For authorized ICMR-NITHR personnel only</p>
    </main>
</body>
</html>
