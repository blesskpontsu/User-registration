use project;

CREATE TABLE IF NOT EXISTS payments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userID INT(6),
    payment_type VARCHAR(20) NOT NULL,
    card_name VARCHAR(80) NOT NULL,
    card_number VARCHAR(15) NOT NULL,
    expiration VARCHAR(10) NOT NULL,
    cvv INT(5),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS users (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(30) NOT NULL,
                dob VARCHAR(20) NOT NULL,
                address VARCHAR(100) NOT NULL,
                country VARCHAR(60) NOT NULL, 
                state VARCHAR(50) NOT NULL,
                zip VARCHAR(20) NOT NULL,       
                profile LONGBLOB NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                );