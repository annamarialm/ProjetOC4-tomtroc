<?php

require_once __DIR__ . '/../Model/BookManager.php';

class BookController
{
    public function create()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ?route=login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $title = $_POST['title'] ?? '';
            $author = $_POST['author'] ?? '';
            $description = $_POST['description'] ?? '';
            $status = $_POST['status'] ?? 'available';

            $bookManager = new BookManager();
            $bookManager->createBook(
                $_SESSION['user_id'],
                $title,
                $author,
                $description,
                $status
            );

            header('Location: ?route=account');
            exit;
        }

        require __DIR__ . '/../View/book/create.php';
    }
}
