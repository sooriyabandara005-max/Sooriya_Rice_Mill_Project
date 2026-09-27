<?php
session_start(); 
require_once "includes/db.php"; 
require_once "includes/functions.php"; 

$message = ""; 
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $msg = trim($_POST["message"] ?? ""); 
    
    if ($name === "" || !filter_var($email, FILTER_VALIDATE_EMAIL) || $msg === "") {
        $error = "Please fill all fields with valid information.";
    } else {
        $s = $pdo->prepare("INSERT INTO messages(name,email,message) VALUES(?,?,?)");
        $s->execute([$name, $email, $msg]);
        $message = "Thank you! Your message was received.";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Contact | Sooriya</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include "includes/header.php"; ?>
    <main class="form-page">
        <div class="form-card wide">
            <p class="eyebrow">LET'S CONNECT</p>
            <h1>Contact Sooriya</h1>
            <p>Have a question about rice or your order? Send us a message.</p>
            
            <?php if($message): ?>
                <div class="alert success"><?php echo e($message); ?></div>
            <?php endif; ?>
            
            <?php if($error): ?>
                <div class="alert error"><?php echo e($error); ?></div>
            <?php endif; ?>
            
            <form method="post">
                <label>
                    Name
                    <input name="name" required>
                </label>
                <label>
                    Email
                    <input type="email" name="email" required>
                </label>
                <label>
                    Message
                    <textarea name="message" rows="5" required></textarea>
                </label>
                <button class="btn full" type="submit">Send message ↗</button>
            </form>
        </div>
    </main>
    <?php include "includes/footer.php"; ?>
</body>
</html>