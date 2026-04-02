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

        $userId = $_SESSION['user_id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $title = $_POST['title'] ?? '';
            $author = $_POST['author'] ?? '';
            $description = $_POST['description'] ?? '';
            $status = $_POST['status'] ?? 'available';

            $imagePath = null;

            if (!empty($_FILES['image']['name'])) {

                // 📁 User-specific folder
                $uploadDir = __DIR__ . '/../../public/images/books/' . $userId . '/';

                // 📁 Create folder if it doesn't exist
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $filename = uniqid() . '_' . basename($_FILES['image']['name']);

                $targetPath = $uploadDir . $filename;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                    $imagePath = '/tomtroc/public/images/books/' . $userId . '/' . $filename;
                }
            }

            $bookManager = new BookManager();
            $bookManager->createBook(
                $userId,
                $title,
                $author,
                $description,
                $status,
                $imagePath
            );

            header('Location: ?route=account');
            exit;
        }

        require __DIR__ . '/../View/book/create.php';
    }

    public function edit()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ?route=login');
            exit;
        }

        $userId = $_SESSION['user_id'];

        $bookManager = new BookManager();

        $id = $_GET['id'] ?? null;

        if (!$id) {
            header('Location: ?route=account');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $title = $_POST['title'] ?? '';
            $author = $_POST['author'] ?? '';
            $description = $_POST['description'] ?? '';
            $status = $_POST['status'] ?? 'available';

            $imagePath = null;

            if (!empty($_FILES['image']['name'])) {

                $uploadDir = __DIR__ . '/../../public/images/books/' . $userId . '/';

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $filename = uniqid() . '_' . basename($_FILES['image']['name']);

                $targetPath = $uploadDir . $filename;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                    $imagePath = '/tomtroc/public/images/books/' . $userId . '/' . $filename;
                }
            }

            $bookManager->updateBook(
                $id,
                $title,
                $author,
                $description,
                $status,
                $imagePath
            );

            header('Location: ?route=account');
            exit;
        }

        $book = $bookManager->findById($id);

        require __DIR__ . '/../View/book/edit.php';
    }

    public function delete()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ?route=login');
            exit;
        }

        $id = $_GET['id'] ?? null;

        if (!$id) {
            header('Location: ?route=account');
            exit;
        }

        $bookManager = new BookManager();
        $bookManager->deleteBook($id);

        header('Location: ?route=account');
        exit;
    }
}