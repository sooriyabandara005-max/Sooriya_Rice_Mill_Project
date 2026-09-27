CREATE DATABASE IF NOT EXISTS sooriya_rice_mill CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE sooriya_rice_mill;
CREATE TABLE users (
 id INT AUTO_INCREMENT PRIMARY KEY,
 username VARCHAR(80) NOT NULL,
 email VARCHAR(150) NOT NULL UNIQUE,
 password VARCHAR(255) NOT NULL,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE rice_products (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(120) NOT NULL,
 description TEXT NOT NULL,
 price DECIMAL(10,2) NOT NULL,
 image_class VARCHAR(50) DEFAULT 'rice-art',
 active TINYINT(1) DEFAULT 1
);
CREATE TABLE preorders (
 id INT AUTO_INCREMENT PRIMARY KEY,
 user_id INT NOT NULL,
 product_id INT NOT NULL,
 quantity INT NOT NULL,
 phone VARCHAR(30) NOT NULL,
 address TEXT NOT NULL,
 status VARCHAR(30) DEFAULT 'Pending',
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
 FOREIGN KEY (product_id) REFERENCES rice_products(id) ON DELETE RESTRICT
);
CREATE TABLE messages (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(100) NOT NULL,
 email VARCHAR(150) NOT NULL,
 message TEXT NOT NULL,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO rice_products(name,description,price,image_class) VALUES
('Samba Rice','Soft, tasty and perfect for everyday family meals.',240.00,'samba'),
('Nadu Rice','A popular choice for delicious Sri Lankan rice dishes.',230.00,'nadu'),
('Keeri Samba','A premium rice choice for special meals and celebrations.',260.00,'keeri');
