CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    pass VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    pfp VARCHAR(255),
    UNIQUE (email)
);
