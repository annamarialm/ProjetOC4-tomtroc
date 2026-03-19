<?php

require_once __DIR__ . '/../Model/UserManager.php';

class AuthController
{
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username = $_POST['username'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $userManager = new UserManager();
            $userManager->createUser($username, $email, $hashedPassword);

            // ✅ Redirect instead of echo
            header('Location: ?route=login&registered=1');
            exit;
        }

        require __DIR__ . '/../View/auth/register.php';
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $userManager = new UserManager();
            $user = $userManager->findByEmail($email);

            if ($user && password_verify($password, $user['password'])) {

                $_SESSION['user_id'] = $user['id'];

                header('Location: ?route=account');
                exit;
            }

            echo "Email ou mot de passe incorrect";
        }

        require __DIR__ . '/../View/auth/login.php';
    }

    public function logout()
    {
        session_destroy();

        header('Location: ?route=login');
        exit;
    }
}
