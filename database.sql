-- ========================================
-- DATABASE: tomtroc
-- ========================================

CREATE DATABASE IF NOT EXISTS tomtroc;
USE tomtroc;

-- ========================================
-- USERS
-- ========================================

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    bio TEXT DEFAULT NULL,
    avatar VARCHAR(255) DEFAULT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO users (id, username, email, password, avatar, created_at) VALUES
(2, 'nathalire', 'nathalie.dupont@example.com', '$2y$10$qsDcavPXdp.qZtEIytulr.flS678MHCZzkvqvBYOezMwK.FkEj0fm', '/tomtroc/public/images/avatars/2/69ce5e5a58653_69b3eb4f23c17_Mask group.png', '2026-03-05 12:13:08'),
(3, 'Frodo', 'frodo@shire.com', '$2y$10$qsDcavPXdp.qZtEIytulr.flS678MHCZzkvqvBYOezMwK.FkEj0fm', '/tomtroc/public/images/avatars/3/69ce7addb4c4f_pexels-emir-kenter-398664013-26957262.jpg', '2026-03-19 10:29:58'),
(4, 'Sam', 'sam@shire.com', '$2y$10$qsDcavPXdp.qZtEIytulr.flS678MHCZzkvqvBYOezMwK.FkEj0fm', '/tomtroc/public/images/avatars/4/69ce7b46144a2_pexels-imperioame-30682570.jpg', '2026-03-19 10:39:29'),
(5, 'Gandalf', 'gandalf@middleearth.com', '$2y$10$qsDcavPXdp.qZtEIytulr.flS678MHCZzkvqvBYOezMwK.FkEj0fm', '/tomtroc/public/images/avatars/5/69ce7b03a0ea5_photo-1600637453426-7c64826b19d9.avif', '2026-03-19 10:43:01');

-- ========================================
-- BOOKS
-- ========================================

CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    image VARCHAR(255) DEFAULT NULL,
    description TEXT DEFAULT NULL,
    status ENUM('available', 'unavailable') NOT NULL DEFAULT 'available',
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_books_user
        FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO books (id, user_id, title, author, image, description, status, created_at) VALUES
(1, 2, 'The Kinfolk Table', 'Nathan Williams', '/tomtroc/public/images/books/2/69ce5ea0b35a0_default.jpg', 'Livre sur le partage et la convivialité.', 'available', '2026-03-05 13:20:43'),
(2, 2, 'The Kinfolk Table', 'Nathan Williams', '/tomtroc/public/images/books/2/69ce5eaa02945_default.jpg', 'Collection de recettes et moments partagés.', 'unavailable', '2026-03-05 13:30:18'),
(11, 3, 'The Hobbit', 'J. R. R. Tolkien', '/tomtroc/public/images/books/3/69ce7aee13dbf_pexels-grant-larcom-1296658223-24414786.jpg', 'Bilbo\'s journey takes him into more sinister territory.', 'available', '2026-03-19 13:41:53'),
(12, 5, 'Harry Potter 1', 'J. K. Rowling', '/tomtroc/public/images/books/5/69ce7b0dc20b2_pexels-withoguz-26647221.jpg', 'Harry discovers his magical heritage.', 'available', '2026-04-02 13:33:18'),
(16, 4, 'The Silmarillion', 'J. R. R. Tolkien', '/tomtroc/public/images/books/4/69ce7b72636f6_pexels-artem-krapivin-2149275329-30560799.jpg', 'Chronicles of Middle-earth.', 'available', '2026-04-02 14:10:47');

-- ========================================
-- MESSAGES
-- ========================================

CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sender_id INT NOT NULL,
    receiver_id INT NOT NULL,
    content TEXT NOT NULL,
    is_read TINYINT(1) DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_messages_sender
        FOREIGN KEY (sender_id)
        REFERENCES users(id),

    CONSTRAINT fk_messages_receiver
        FOREIGN KEY (receiver_id)
        REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO messages (id, sender_id, receiver_id, content, is_read, created_at) VALUES
(1, 5, 2, 'Bonjour Nathalire', 0, '2026-03-19 13:05:01'),
(2, 3, 5, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', 0, '2026-03-19 13:58:00'),
(3, 3, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, '2026-03-19 16:23:00'),
(4, 3, 5, 'Gandalf, what time are we meeting tomorrow for our quest to Rivendell?', 0, '2026-03-19 16:50:50'),
(5, 5, 3, 'Hello Frodo, we meet at dawn, tell Samwise to pack warm clothes and lots of food. See you tomorrow!', 0, '2026-03-19 16:52:30'),
(6, 5, 3, 'By the way, don\'t forget to pack the Ring!', 0, '2026-03-19 16:56:48'),
(10, 4, 3, 'Mr Frodo, I am packing extra mushrooms, we will need them for the journey.', 0, '2026-03-19 17:06:47'),
(12, 5, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, '2026-03-19 17:35:06'),
(13, 3, 4, 'Thanks you Sam, Gandalf will be expecting us at dawn, do not be late!', 0, '2026-03-19 19:44:55');