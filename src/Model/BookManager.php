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

    public function createBook($userId, $title, $author, $description, $status, $imagePath)
    {
        $sql = "INSERT INTO books (user_id, title, author, description, status, image)
                VALUES (:user_id, :title, :author, :description, :status, :image)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            'user_id' => $userId,
            'title' => $title,
            'author' => $author,
            'description' => $description,
            'status' => $status,
            'image' => $imagePath
        ]);
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM books WHERE id = :id LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateBook($id, $title, $author, $description, $status, $imagePath = null)
    {
        if ($imagePath) {

            $sql = "UPDATE books
                    SET title = :title,
                        author = :author,
                        description = :description,
                        status = :status,
                        image = :image,
                        updated_at = NOW()
                    WHERE id = :id";

            $stmt = $this->db->prepare($sql);

            $stmt->execute([
                'id' => $id,
                'title' => $title,
                'author' => $author,
                'description' => $description,
                'status' => $status,
                'image' => $imagePath
            ]);

        } else {

            $sql = "UPDATE books
                    SET title = :title,
                        author = :author,
                        description = :description,
                        status = :status,
                        updated_at = NOW()
                    WHERE id = :id";

            $stmt = $this->db->prepare($sql);

            $stmt->execute([
                'id' => $id,
                'title' => $title,
                'author' => $author,
                'description' => $description,
                'status' => $status
            ]);
        }
    }

    public function deleteBook($id)
    {
        $sql = "DELETE FROM books WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    public function findAvailableBooks()
    {
        $sql = "SELECT books.*, users.username
                FROM books
                JOIN users ON books.user_id = users.id
                WHERE books.status = 'available'
                ORDER BY books.created_at DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findBookWithOwner($id)
    {
        $sql = "SELECT books.*, users.username
                FROM books
                JOIN users ON books.user_id = users.id
                WHERE books.id = :id
                LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findLatestBooks($limit = 4)
    {
        $sql = "SELECT books.*, users.username
                FROM books
                JOIN users ON books.user_id = users.id
                WHERE books.status = 'available'
                ORDER BY books.created_at DESC
                LIMIT :limit";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchByTitle($search)
    {
        $sql = "SELECT books.*, users.username
                FROM books
                JOIN users ON books.user_id = users.id
                WHERE books.status = 'available'
                AND books.title LIKE :search";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            'search' => '%' . $search . '%'
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}