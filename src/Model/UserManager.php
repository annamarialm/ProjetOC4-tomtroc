<?php

require_once __DIR__ . '/Database.php';

class UserManager
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function createUser($username, $email, $password)
    {
        $sql = "INSERT INTO users (username, email, password, created_at)
                VALUES (:username, :email, :password, NOW())";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => $password
        ]);
    }

    public function findByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['email' => $email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProfile($id, $email, $username, $password, $avatar)
    {
        // ✅ Ensure ID is always an integer (extra safety)
        $id = (int) $id;

        if (!empty($password)) {
            $password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "UPDATE users
                SET email = :email,
                    username = :username,
                    password = :password,
                    avatar = :avatar
                WHERE id = :id";

            $stmt = $this->db->prepare($sql);

            $stmt->execute([
                'email' => $email,
                'username' => $username,
                'password' => $password,
                'avatar' => $avatar,
                'id' => $id
            ]);
        } else {

            $sql = "UPDATE users
                SET email = :email,
                    username = :username,
                    avatar = :avatar
                WHERE id = :id";

            $stmt = $this->db->prepare($sql);

            $stmt->execute([
                'email' => $email,
                'username' => $username,
                'avatar' => $avatar,
                'id' => $id
            ]);
        }
    }
}