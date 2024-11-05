-- Code for creating database, user and table

CREATE DATABASE recipe_finder;
USE recipe_finder;

CREATE TABLE recipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    ingredients TEXT NOT NULL,
    instructions TEXT NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- CREATE USER Replace with your DB password

GRANT USAGE ON *.* TO `recipe_finder`@`localhost` IDENTIFIED BY PASSWORD 's8DefjmxzybB@Gro';

GRANT SELECT, INSERT, UPDATE, DELETE ON `recipe_finder`.* TO `recipe_finder`@`localhost`;