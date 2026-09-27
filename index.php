<?php
session_start();
require_once "includes/db.php";
require_once "includes/functions.php";
$products = $pdo->query("SELECT * FROM rice_products WHERE active=1 ORDER BY id ASC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sooriya Rice Mill | Fresh Rice Pre-Orders</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


    <?php include "includes/header.php"; ?>
    <section class="hero">
        <div class="hero-content">
            <p class="eyebrow">PURE,FRESH AND TRUSTED</p>
            <h1>Good rice makes<br><span>beautiful moments.</span></h1>
            <p>Order quality rice from Sooriya Rice Mill and bring the goodness of Sri Lankan rice to your home.</p>
            <a class="btn" href="#products">Explore Rice <span>↗</span></a>
        </div>

        <div class="hero-art">
            <div class="sun"></div>
              <img class="hero-logo" src="logo.jpeg" alt="Sooriya Rice Mill Logo">
           <div class="art-card">Harvested with care<br><strong>Made for your family</strong></div>
        </div>
        
    </section>

    <section class="section" id="products">
        <div class="section-heading">
            <p class="eyebrow">OUR COLLECTION</p>
            <h2>Choose your favourite rice</h2>
            <p>Simple ordering. Reliable quality. Friendly service.</p>
        </div>
        
        <div class="product-grid">
            <?php foreach($products as $p): ?>
                <?php 
                    // Determine image path based on image_class or default to samba.jpg
                    $image_file = !empty($p['image_class']) ? $p['image_class'] . '.jpg' : 'samba.jpg';
                ?>
                <article class="product-card">
                    <div class="product-image <?php echo e($p['image_class']); ?>">
                        <img src="<?php echo e($image_file); ?>" alt="<?php echo e($p['name']); ?>">
                    </div>
                    <div class="product-body">
                        <span class="tag">Fresh stock</span>
                        <h3><?php echo e($p['name']); ?></h3>
                        <p><?php echo e($p['description']); ?></p>
                        <div class="product-bottom">
                            <strong>Rs. <?php echo number_format($p['price'], 2); ?>/kg</strong>
                            <a class="small-btn" href="preorder.php?product=<?php echo $p['id']; ?>">Pre-order</a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
    

   <section class="features-banner" style="background-color: #2d5a3f; padding: 20px 0;">
    <div class="features-container" style="display: flex; justify-content: space-around; align-items: center; max-width: 1200px; margin: 0 auto; color: #ffffff;">
        
        <!-- Quality First -->
        <div class="feature-item" style="display: flex; align-items: center; gap: 12px;">
            <img src="quality.jpg" alt="Premium Quality Badge" style="width: 45px; height: 45px; border-radius: 50%; object-fit: cover;">
            <div>
                <strong style="display: block; font-size: 1.1rem; color: #ffffff; font-family: 'Times New Roman', Times, serif;">Quality first</strong>
                <span style="font-size: 0.9rem; color: #d0e0d5; font-family: 'Times New Roman', Times, serif;">Carefully selected rice</span>
            </div>
        </div>

        <!-- Easy Pre-orders -->
        <div class="feature-item" style="display: flex; align-items: center; gap: 12px;">
            <img src="pre order.jpg" alt="Pre-Order Badge" style="width: 45px; height: 45px; border-radius: 50%; object-fit: cover;">
            <div>
                <strong style="display: block; font-size: 1.1rem; color: #ffffff; font-family: 'Times New Roman', Times, serif;">Easy pre-orders</strong>
                <span style="font-size: 0.9rem; color: #d0e0d5; font-family: 'Times New Roman', Times, serif;">Order in a few clicks</span>
            </div>
        </div>
        <div>
            🤝<strong>Trusted service</strong>
            <span>Made for our community</span>
        </div>
    </section>

    <section class="about section">
        <div>
            <p class="eyebrow">ABOUT US</p>
            <h2><u> our mill</u> </h2>
            <p>Sooriya Rice Mill is a local rice business focused on supplying quality rice with a simple and friendly pre-order service.
              Our goal is to deliver excellent service with a fresh look, building upon the public trust established over more than 30 years.
            </p>
            <a class="text-link" href="contact.php">Talk to us →</a>
        </div>
      
       <div style="background-color: #f3e8d2;
          border-radius: 16px; padding: 30px;
          display: flex; align-items: center;
          justify-content: space-between; 
          gap: 20px; max-width: 900px;
          margin: 20px auto;">

         <p style="font-family: 'Times New Roman', Times, serif; 
          font-size: 1.5rem;
          color: #4a3b1d;
          margin: 0; flex: 1;
          font-style: italic;
          line-height: 1.4;">

        “Every grain carries a little story of care, hard work and home.”</p>
        <img src="bags.jpeg" alt="Sooriya Rice Bags" style="width: 220px;
          height: 160px;
          object-fit: cover;
          border-radius: 12px;
          box-shadow: 0 4px 10px rgba(0,0,0,0.15);">
      </div>
    </section>

    <?php include "includes/footer.php"; ?>
    <script src="js/script.js"></script>
</body>
</html>