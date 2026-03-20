<?php

require_once __DIR__ . '/../Model/MessageManager.php';
require_once __DIR__ . '/../Model/Database.php';

class MessageController
{
    public function index()
    {
        // 🔒 Authentication check
        if (!isset($_SESSION['user_id'])) {
            header('Location: ?route=login');
            exit;
        }

        $messageManager = new MessageManager();
        $userId = $_SESSION['user_id'];

        // 📥 Load inbox
        $messages = $messageManager->getInbox($userId);

        // 👤 Get other user (safe cast)
        $otherUser = isset($_GET['user']) ? (int) $_GET['user'] : null;

        // Prevent self messaging
        if ($otherUser === $userId) {
            $otherUser = null;
        }

        $conversation = [];
        $otherUserData = null;

        if ($otherUser) {

            // ✉️ Handle message sending
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $content = trim($_POST['content'] ?? '');

                if (!empty($content)) {
                    $messageManager->sendMessage(
                        $userId,
                        $otherUser,
                        $content
                    );
                }

                // 🔁 Redirect to prevent duplicate POST
                header('Location: ?route=messages&user=' . $otherUser);
                exit;
            }

            // 💬 Load conversation
            $conversation = $messageManager->getConversation(
                $userId,
                $otherUser
            );

            // 👤 Fetch selected user data (avatar + username)
            $db = Database::getConnection();

            $stmt = $db->prepare("
                SELECT username, avatar
                FROM users
                WHERE id = :id
            ");

            $stmt->execute(['id' => $otherUser]);

            $otherUserData = $stmt->fetch(PDO::FETCH_ASSOC);

           
        }

        require __DIR__ . '/../View/messages/index.php';
    }
}