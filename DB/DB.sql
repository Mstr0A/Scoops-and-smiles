CREATE DATABASE ice_cream_shop;

CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    description TEXT
);

CREATE TABLE flavors (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    price DECIMAL(6,2) NOT NULL,
    description TEXT,
    image_url VARCHAR(255),
    category_id INT,
    is_featured BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

CREATE TABLE orders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    customer_name VARCHAR(100) NOT NULL,
    flavor_id INT,
    quantity INT NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (flavor_id) REFERENCES flavors(id)
);

INSERT INTO categories (name, description) VALUES
('Classic', 'Timeless favorites that never go out of style'),
('Special', 'Unique combinations for adventurous taste buds'),
('Premium', 'Luxury flavors made with premium ingredients');

INSERT INTO flavors (name, price, description, image_url, category_id, is_featured) VALUES
('Vanilla Bean', 3.99, 'Rich and creamy Madagascar vanilla', 'vanilla.jpg', 1, TRUE),
('Chocolate', 3.99, 'Deep, rich chocolate made with Belgian cocoa', 'chocolate.jpg', 1, TRUE),
('Strawberry', 3.99, 'Fresh strawberry ice cream with real fruit pieces', 'strawberry.jpg', 1, FALSE),

('Cookie Dough Delight', 5.99, 'Vanilla ice cream loaded with chocolate chip cookie dough', 'cookie-dough.jpg', 2, TRUE),
('Mint Chocolate Symphony', 5.99, 'Refreshing mint ice cream with dark chocolate chips', 'mint-chip.jpg', 2, FALSE),
('Caramel Pretzel Crunch', 5.99, 'Salted caramel ice cream with pretzel pieces', 'caramel-pretzel.jpg', 2, TRUE),

('Dark Chocolate Truffle', 7.99, 'Premium dark chocolate with French truffle pieces', 'truffle.jpg', 3, TRUE),
('Pistachio Gold', 7.99, 'Luxury pistachio ice cream with real nuts', 'pistachio.jpg', 3, FALSE),
('Madagascar Vanilla Bourbon', 7.99, 'Premium vanilla ice cream with bourbon vanilla beans', 'vanilla-bourbon.jpg', 3, TRUE);