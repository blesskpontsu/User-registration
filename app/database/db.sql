
use project;

CREATE TABLE IF NOT EXISTS payment (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    payment_type VARCHAR(20) NULL,
    card_name VARCHAR(80) NULL,
    card_number VARCHAR(15) NULL,
    expiration VARCHAR(10) NULL,
    cvv INT(5),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS users (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                paymentID INT(6),
                name VARCHAR(30) NULL,
                dob VARCHAR(20) NULL,
                address VARCHAR(100) NULL,
                country VARCHAR(60) NULL, 
                state VARCHAR(50) NULL,
                zip VARCHAR(20) NULL,       
                profile LONGBLOB NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                );