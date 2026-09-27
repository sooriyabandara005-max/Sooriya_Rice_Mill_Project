<?php
session_start(); 
require_once "includes/db.php"; 
require_once "includes/functions.php"; 
require_login();

$stmt = $pdo->prepare("SELECT p.*, r.name, r.price FROM preorders p JOIN rice_products r ON p.product_id = r.id WHERE p.user_id = ? ORDER BY p.created_at DESC"); 
$stmt->execute([$_SESSION["user_id"]]); 
$orders = $stmt->fetchAll(); 
$success = flash("success");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboard | Sooriya</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include "includes/header.php"; ?>
    <main class="section dashboard">
        <p class="eyebrow">YOUR SPACE</p>
        <h1>Hello, <?php echo e($_SESSION["username"]); ?> 👋</h1>
        <p>Here are your rice pre-orders.</p>
        
        <?php if($success): ?>
            <div class="alert success"><?php echo e($success); ?></div>
        <?php endif; ?>
        
        <a class="btn" href="preorder.php">+ New pre-order</a>
        
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Rice</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!$orders): ?>
                        <tr>
                            <td colspan="4">No pre-orders yet.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($orders as $o): ?>
                            <tr>
                                <td><?php echo e($o["name"]); ?></td>
                                <td><?php echo e($o["quantity"]); ?> kg</td>
                                <td><span class="status"><?php echo e($o["status"]); ?></span></td>
                                <td><?php echo e(date("Y-m-d", strtotime($o["created_at"]))); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
    <?php include "includes/footer.php"; ?>
</body>
</html>