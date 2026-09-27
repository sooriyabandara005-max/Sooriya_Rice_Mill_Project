<?php
function e($value) { return htmlspecialchars((string)$value, ENT_QUOTES, "UTF-8"); }
function is_logged_in() { return isset($_SESSION["user_id"]); }
function require_login() { if (!is_logged_in()) { header("Location: auth/login.php"); exit; } }
function flash($key, $message = null) {
    if ($message !== null) { $_SESSION["flash_$key"] = $message; return; }
    $msg = $_SESSION["flash_$key"] ?? "";
    unset($_SESSION["flash_$key"]);
    return $msg;
}
?>