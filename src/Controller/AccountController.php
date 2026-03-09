<?php

require_once __DIR__ . '/../Model/UserManager.php';
require_once __DIR__ . '/../Model/BookManager.php';

class AccountController
{
    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ?route=login');
            exit;
        }

        $userManager = new UserManager();
        $user = $userManager->findById($_SESSION['user_id']);

        $bookManager = new BookManager();
        $books = $bookManager->findByUserId($_SESSION['user_id']);

        require __DIR__ . '/../View/account/index.php';
    }

    public function updateProfile()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ?route=login');
            exit;
        }

        $userManager = new UserManager();
        $user = $userManager->findById($_SESSION['user_id']);

        $email = $_POST['email'] ?? $user['email'];
        $username = $_POST['username'] ?? $user['username'];
        $password = $_POST['password'] ?? null;

        $avatarPath = $user['avatar'];

        // Handle avatar upload
        if (!empty($_FILES['avatar']['name'])) {

            // Delete old avatar if it exists and is not the default
            if (!empty($user['avatar']) && strpos($user['avatar'], 'default-avatar.jpg') === false) {

                $oldFilePath = __DIR__ . '/../../public' . $user['avatar'];

                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            $uploadDir = __DIR__ . '/../../public/assets/avatars/';
            $filename = uniqid() . '_' . basename($_FILES['avatar']['name']);
            $targetPath = $uploadDir . $filename;

            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $targetPath)) {
                $avatarPath = '/tomtroc/public/assets/avatars/' . $filename;
            }
        }

        $userManager->updateProfile(
            $_SESSION['user_id'],
            $email,
            $username,
            $password,
            $avatarPath
        );

        header('Location: ?route=account');
        exit;
    }
}