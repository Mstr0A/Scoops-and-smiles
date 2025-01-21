<?php include 'includes/db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scoops & Smiles Ice Cream Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <a href="index.php" class="logo">🍦 Scoops & Smiles</a>
            <div class="nav-links">
                <a href="#home" class="active">Home</a>
                <a href="menu.php">Menu</a>
                <a href="#about">About</a>
                <a href="#contact">Contact</a>
            </div>
        </div>
    </nav>

    <section class="hero" id="home">
        <div class="container">
            <h1>Where Every Scoop Brings a Smile</h1>
            <p>Handcrafted ice cream made with love since 1995</p>
            <a href="menu.php" class="cta-button">View Our Menu <i class="fas fa-arrow-right"></i></a>
        </div>
    </section>

    <main class="container">
        <section class="featured-section">
            <h2>Why Choose Scoops & Smiles?</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <i class="fas fa-heart"></i>
                    <h3>Made with Love</h3>
                    <p>Each flavor is crafted in small batches using premium ingredients and traditional techniques.</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-leaf"></i>
                    <h3>Fresh Ingredients</h3>
                    <p>We source our ingredients from local farmers to ensure the highest quality and freshest taste.
                    </p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-ice-cream"></i>
                    <h3>Unique Flavors</h3>
                    <p>From classics to creative combinations, we have something for every ice cream lover.</p>
                </div>
            </div>
        </section>

        <section id="about" class="about-section">
            <div class="about-content">
                <div class="about-text">
                    <h2>Our Story</h2>
                    <p>Started in 1995 by the Johnson family, Scoops & Smiles has been serving happiness one scoop at a
                        time. What began as a small ice cream cart in the local park has grown into the community's
                        favorite ice cream destination.</p>
                    <p>We believe in creating moments of joy through our handcrafted ice cream. Every flavor tells a
                        story, and every scoop is made with passion and dedication to quality.</p>
                    <a href="menu.php" class="secondary-button">Discover Our Flavors</a>
                </div>
                <div class="about-image">
                    <img src="images/store-front.jpg" alt="Ice Cream in scoops" class="rounded-image">
                </div>
            </div>
        </section>

        <section class="special-offers">
            <h2>Today's Special Offers</h2>
            <div class="offers-grid">
                <div class="offer-card">
                    <h3>Family Package</h3>
                    <p>Buy 4 scoops, get 1 free!</p>
                    <a href="menu.php" class="offer-button">Order Now</a>
                </div>
                <div class="offer-card">
                    <h3>Student Special</h3>
                    <p>10% off with valid student ID</p>
                    <a href="menu.php" class="offer-button">Learn More</a>
                </div>
            </div>
        </section>

        <section id="contact" class="contact-section">
            <h2>Visit Us Today</h2>
            <div class="contact-grid">
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h3>Location</h3>
                            <p>123 Ice Cream Lane<br>Sweet Town, ST 12345</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <h3>Hours</h3>
                            <p>Monday - Friday: 11AM - 10PM<br>
                                Saturday - Sunday: 10AM - 11PM</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h3>Contact</h3>
                            <p>Phone: (555) 123-4567<br>
                                Email: info@scoopsandsmiles.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Scoops & Smiles</h3>
                <p>Bringing smiles with every scoop since 1995</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <a href="menu.php">Menu</a>
                <a href="#about">About Us</a>
                <a href="#contact">Contact</a>
            </div>
            <div class="footer-section">
                <h3>Follow Us</h3>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Scoops & Smiles Ice Cream Shop. All rights reserved.</p>
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>

</html>