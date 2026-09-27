<?php
session_start(); require_once "../includes/db.php"; require_once "../includes/functions.php";
$error = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";
    if ($username === "" || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 6) {
        $error = "Please enter a name, a valid email, and a password of at least 6 characters.";
    } else {
        $check = $pdo->prepare("SELECT id FROM users WHERE email=?"); $check->execute([$email]);
        if ($check->fetch()) $error = "This email is already registered. Please login.";
        else {
            $stmt = $pdo->prepare("INSERT INTO users(username,email,password) VALUES(?,?,?)");
            $stmt->execute([$username,$email,password_hash($password,PASSWORD_DEFAULT)]);
            flash("success","Registration successful. You can now login.");
            header("Location: login.php"); exit;
        }
    }
}
?>
<!doctype html><html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Register | Sooriya</title>
        <link rel="stylesheet" href="../css/style.css">
    </head><body><?php include "../includes/header.php"; ?>
    <main class="form-page">
        <div class="form-card">
            <p class="eyebrow">WELCOME TO SOORIYA RICE MILE </p>
            <h1>Create your account</h1>
            <p>Register to place and view your rice pre-orders.</p>
            <?php if($error): ?><div class="alert error">
                <?php echo e($error); ?></div>
                <?php endif; ?>
                <form method="post" novalidate>
                    <label>Username
                        <input name="username" required maxlength="80">
                    </label>
                    <label>Email
                        <input type="email" name="email" required>
                    </label>
                    <label>Password
                        <input type="password" name="password" minlength="6" required>
                    </label>
                    <button class="btn full" type="submit">Create account ↗</button>
                </form><p class="form-foot">Already have an account?

    <a href="login.php">Login here</a>
</p></div></main><?php include "../includes/footer.php"; ?></body></html>