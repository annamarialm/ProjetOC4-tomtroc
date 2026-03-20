<?php

require_once __DIR__ . '/Database.php';

class MessageManager
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    // 📥 Inbox (latest message per conversation)
    public function getInbox($userId)
    {
        $userId = (int) $userId;

        $sql = "
        SELECT 
            m.*, 
            u.username,
            u.avatar
        FROM messages m
        JOIN users u 
            ON u.id = CASE
                WHEN m.sender_id = :user_id THEN m.receiver_id
                ELSE m.sender_id
            END
        WHERE m.id IN (
            SELECT MAX(id)
            FROM messages
            WHERE sender_id = :user_id OR receiver_id = :user_id
            GROUP BY
                LEAST(sender_id, receiver_id),
                GREATEST(sender_id, receiver_id)
        )
        ORDER BY m.created_at DESC
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['user_id' => $userId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 💬 Full conversation
    public function getConversation($userId, $otherUserId)
    {
        $userId = (int) $userId;
        $otherUserId = (int) $otherUserId;

        $sql = "
        SELECT m.*, u.username
        FROM messages m
        JOIN users u ON m.sender_id = u.id
        WHERE
        (m.sender_id = :user AND m.receiver_id = :other)
        OR
        (m.sender_id = :other AND m.receiver_id = :user)
        ORDER BY m.created_at ASC
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'user' => $userId,
            'other' => $otherUserId
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ✉️ Send message
    public function sendMessage($senderId, $receiverId, $content)
    {
        $senderId = (int) $senderId;
        $receiverId = (int) $receiverId;
        $content = trim($content);

        if (empty($content) || $senderId === $receiverId) {
            return;
        }

        $sql = "
        INSERT INTO messages (sender_id, receiver_id, content)
        VALUES (:sender, :receiver, :content)
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            'sender' => $senderId,
            'receiver' => $receiverId,
            'content' => $content
        ]);
    }
}