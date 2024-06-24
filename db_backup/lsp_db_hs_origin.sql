-- Active: 1718265508202@@127.0.0.1@3306@lsp_wedding_db
CREATE TABLE orders (
    id INT(11) PRIMARY KEY,
    package_id VARCHAR(11),
    name VARCHAR(80) NOT NULL,
    email VARCHAR(80) NOT NULL,
    phone_number VARCHAR(30) NOT NULL,
    wedding_date DATE NOT NULL,
    status ENUM('requested', 'approved', 'rejected') NOT NULL,
    user_id INT(11),
    created_at DATETIME NOT NULL,
    updated_at DATETIME DEFAULT NULL,
    FOREIGN KEY (package_id) REFERENCES wedding_packages(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE settings (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    website_name VARCHAR(80) NOT NULL,
    phone_number1 VARCHAR(15) NOT NULL,
    phone_number2 VARCHAR(15) NULL,
    email1 VARCHAR(80) NOT NULL,
    email2 VARCHAR(80) NULL,
    address TEXT NOT NULL,
    maps TEXT NULL,
    logo VARCHAR(80) NOT NULL,
    facebook_url VARCHAR(128) NULL,
    instagram_url VARCHAR(128) NULL,
    youtube_url VARCHAR(128) NULL,
    header_business_hour VARCHAR(100) NOT NULL,
    time_business_hour TEXT NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME DEFAULT NULL
);


CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(80) NOT NULL,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role enum('admin', 'customer') NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL
);

CREATE TABLE wedding_packages (
    id VARCHAR(11) PRIMARY KEY,
    image MEDIUMBLOB DEFAULT NULL,
    package_name VARCHAR(80) NOT NULL,
    description MEDIUMTEXT NOT NULL,
    price INT(11) NOT NULL,
    status_publish ENUM('publish', 'draft') NOT NULL,
    user_id INT(11),
    created_at DATETIME NOT NULL,
    updated_at DATETIME DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);