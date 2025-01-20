<?php
include 'includes/db_connect.php';

$categories_query = $pdo->query("SELECT * FROM categories");
$categories = $categories_query->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Scoops & Smiles Ice Cream Shop</title>
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
                <a href="index.php">Home</a>
                <a href="menu.php" class="active">Menu</a>
                <a href="index.php#about">About</a>
                <a href="index.php#contact">Contact</a>
            </div>
        </div>
    </nav>

    <div class="menu-page-header">
        <div class="container">
            <h1>Our Ice Cream Menu</h1>
            <p>Discover our delicious selection of handcrafted ice creams</p>
        </div>
    </div>

    <main class="container">
        <div class="menu-categories">
            <button class="category-btn active" onclick="filterFlavors('all')">All Flavors</button>
            <?php foreach ($categories as $category): ?>
                <button class="category-btn" onclick="filterFlavors('<?php echo $category['name']; ?>')">
                    <?php echo $category['name']; ?>
                </button>
            <?php endforeach; ?>
        </div>

        <section class="menu-grid" id="menu-items">
            <?php
            $stmt = $pdo->query("
                SELECT f.*, c.name as category_name 
                FROM flavors f 
                JOIN categories c ON f.category_id = c.id 
                ORDER BY f.category_id, f.name
            ");

            while ($row = $stmt->fetch()) {
                echo "<div class='flavor-card' data-category='" . $row['category_name'] . "'>";
                echo "<div class='category-label " . strtolower($row['category_name']) . "'>" . $row['category_name'] . "</div>";

                $image_path = 'images/' . $row['image_url'];
                $default_image = 'images/default.jpg';
                $image_to_show = file_exists($image_path) ? $image_path : $default_image;

                echo "<img src='" . $image_to_show . "' alt='" . $row['name'] . "'>";
                echo "<div class='flavor-info'>";
                echo "<h3>" . $row['name'] . "</h3>";
                echo "<p class='description'>" . $row['description'] . "</p>";
                echo "<p class='price'>$" . number_format($row['price'], 2) . "</p>";

                // Add special badges based on category
                echo "<div class='flavor-details'>";
                if ($row['is_featured']) {
                    echo "<p><i class='fas fa-star'></i> Customer Favorite</p>";
                }
                switch ($row['category_name']) {
                    case 'Premium':
                        echo "<p><i class='fas fa-gem'></i> Premium Selection</p>";
                        break;
                    case 'Special':
                        echo "<p><i class='fas fa-magic'></i> Special Creation</p>";
                        break;
                    case 'Classic':
                        echo "<p><i class='fas fa-heart'></i> Classic Favorite</p>";
                        break;
                }
                echo "</div>";
                echo "<button class='order-btn' onclick='orderNow(" . $row['id'] . ", \"" . addslashes($row['name']) . "\", " . $row['price'] . ")'>";
                echo "<i class='fas fa-ice-cream'></i> Order Now</button>";
                echo "</div></div>";
            }
            ?>
        </section>
    </main>


    <div id="orderModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Place Your Order</h2>
                <button class="close-modal">&times;</button>
            </div>
            <div class="order-details">
                <p>Selected Flavor: <span class="flavor-name" id="selectedFlavor"></span></p>
                <p id="flavorPrice"></p>
            </div>
            <form id="orderForm">
                <input type="hidden" id="flavorId" name="flavorId">
                <div class="form-group">
                    <label for="customerName">Your Name</label>
                    <input type="text" id="customerName" name="customerName" required placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="quantity">Number of Scoops</label>
                    <select id="quantity" name="quantity" required>
                        <option value="1">1 Scoop</option>
                        <option value="2">2 Scoops</option>
                        <option value="3">3 Scoops</option>
                        <option value="4">4 Scoops</option>
                        <option value="5">5 Scoops</option>
                    </select>
                </div>
                <button type="submit" class="submit-btn">
                    Place Order
                    <span class="loading-spinner"></span>
                </button>
            </form>
        </div>
    </div>
    <footer>
        <p>&copy; 2025 Scoops & Smiles Ice Cream Shop. All rights reserved.</p>
    </footer>

    <script src="js/script.js"></script>
</body>

</html>