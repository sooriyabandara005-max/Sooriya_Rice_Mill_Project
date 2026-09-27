<?php
session_start(); 
require_once "../includes/db.php"; 
require_once "../includes/functions.php";

$error = ""; 
$success = flash("success");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"] ?? ""); 
    $password = $_POST["password"] ?? "";

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?"); 
    $stmt->execute([$email]); 
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password"])) {
        session_regenerate_id(true); 
        $_SESSION["user_id"] = $user["id"]; 
        $_SESSION["username"] = $user["username"]; 
        header("Location: ../dashboard.php"); 
        exit;
    }

    $error = "Invalid email or password. Please try again.";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login | Sooriya</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include "../includes/header.php"; ?>
    <main class="form-page">
        <div class="form-card">
            <p class="eyebrow"><B>WELCOME TO BACK</B> </p>
            <h1>Login to your account</h1>
            <p>Manage your rice pre-orders easily.</p>
            
            <?php if($success): ?>
                <div class="alert success">
                    <?php echo e($success); ?>
                </div>
            <?php endif; ?>
            
            <?php if($error): ?>
                <div class="alert error">
                    <?php echo e($error); ?>
                </div>
            <?php endif; ?>

            <form method="post">
                <label>
                    Email
                    <input type="email" name="email" required>
                </label>
                <label>
                    Password
                    <input type="password" name="password" required>
                </label>
                <button class="btn full" type="submit">Login ↗</button>
            </form>
            
            <p class="form-foot">
                New here? <a href="register.php">Create an account</a>
            </p>
        </div>
    </main>
    <?php include "../includes/footer.php"; ?>
</body>
</html>