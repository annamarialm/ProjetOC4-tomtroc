<?php

require_once __DIR__ . '/Database.php';

class BookManager
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function findByUserId($userId)
    {
        $sql = "SELECT * FROM books WHERE user_id = :user_id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['user_id' => $userId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createBook($userId, $title, $author, $description, $status)
    {
        $sql = "INSERT INTO books (user_id, title, author, description, status)
            VALUES (:user_id, :title, :author, :description, :status)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            'user_id' => $userId,
            'title' => $title,
            'author' => $author,
            'description' => $description,
            'status' => $status
        ]);
    }
}
