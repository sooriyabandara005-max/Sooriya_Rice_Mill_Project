<header class="site-header">
    <a href="/Sooriya_Rice_Mill_Project/index.php" class="brand" style="color: #ffffff; text-decoration: none; font-family: 'Times New Roman', Times, serif;">
        <img src="logo.jpeg" alt="Sooriya Rice Mill Logo" class="header-logo">
        <div>
            <b>SOORIYA<small style="color: #ffffff; font-family: 'Times New Roman', Times, serif;"> RICE MILL</small></b>
        </div>
    </a>
    <nav>
        <a href="/Sooriya_Rice_Mill_Project/index.php" style="color: #ffffff; text-decoration: none; font-family: 'Times New Roman', Times, serif;"><b>Home</b></a>
        <a href="/Sooriya_Rice_Mill_Project/index.php#products" style="color: #ffffff; text-decoration: none; font-family: 'Times New Roman', Times, serif;"><b>Rice</b></a>
        <a href="/Sooriya_Rice_Mill_Project/contact.php" style="color: #ffffff; text-decoration: none; font-family: 'Times New Roman', Times, serif;"><b>Contact</b></a>
        <?php if(isset($_SESSION["user_id"])): ?>
            <a href="/Sooriya_Rice_Mill_Project/dashboard.php" style="color: #ffffff; text-decoration: none; font-family: 'Times New Roman', Times, serif;"><b>Dashboard</b></a>
            <a class="nav-btn" href="/Sooriya_Rice_Mill_Project/auth/logout.php" style="font-family: 'Times New Roman', Times, serif;"><b>Logout</b></a>
        <?php else: ?>
            <a href="/Sooriya_Rice_Mill_Project/auth/login.php" style="color: #ffffff; text-decoration: none; font-family: 'Times New Roman', Times, serif;"><b>Login</b></a>
            <a class="nav-btn" href="/Sooriya_Rice_Mill_Project/auth/register.php" style="font-family: 'Times New Roman', Times, serif;"><b>Register</b></a>
        <?php endif; ?>
    </nav>
</header>