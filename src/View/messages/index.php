<?php require_once __DIR__ . '/../../helpers/message_time_helper.php'; ?>
<?php require __DIR__ . '/../layout/header.php'; ?>

<section class="messaging-page">

    <div class="messaging-container">

        <!-- LEFT COLUMN : INBOX -->
        <div class="message-list">

            <h1 class="messaging-title">Messagerie</h1>

            <?php if (empty($messages)): ?>

                <p>Aucun message</p>

            <?php else: ?>

                <?php foreach ($messages as $message): ?>

                    <?php
                    $otherUserId = $message['sender_id'] == $_SESSION['user_id']
                        ? $message['receiver_id']
                        : $message['sender_id'];

                    $avatar = !empty($message['avatar'])
                        ? $message['avatar']
                        : '/tomtroc/public/assets/avatars/default-avatar.jpg';
                    ?>

                    <div class="message-item">

                        <a href="?route=messages&user=<?= $otherUserId ?>"
                            class="message-link <?= ($otherUser == $otherUserId) ? 'active' : '' ?>">

                            <div class="message-row">

                                <img src="<?= htmlspecialchars($avatar) ?>" class="message-avatar" alt="avatar">

                                <div class="message-content">

                                    <div class="message-top">

                                        <span class="message-username">
                                            <?= htmlspecialchars($message['username']) ?>
                                        </span>

                                        <span class="message-time">
                                            <?= formatMessageTime($message['created_at']) ?>
                                        </span>

                                    </div>

                                    <?php
                                    $limit = 27;
                                    $preview = mb_substr($message['content'], 0, $limit);
                                    $isLong = mb_strlen($message['content']) > $limit;
                                    ?>

                                    <p class="message-preview">
                                        <?= htmlspecialchars($preview) ?><?= $isLong ? '...' : '' ?>
                                    </p>

                                </div>

                            </div>

                        </a>

                    </div>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>


        <!-- RIGHT COLUMN : CONVERSATION -->
        <div class="conversation">

            <?php if ($otherUser): ?>

                <?php if ($otherUserData): ?>

                    <?php
                    $avatar = !empty($otherUserData['avatar'])
                        ? $otherUserData['avatar']
                        : '/tomtroc/public/assets/avatars/default-avatar.jpg';
                    ?>

                    <div class="conversation-header">

                        <img src="<?= htmlspecialchars($avatar) ?>" class="conversation-avatar" alt="avatar">

                        <span class="conversation-username">
                            <?= htmlspecialchars($otherUserData['username']) ?>
                        </span>

                    </div>

                <?php endif; ?>

                <?php if (empty($conversation)): ?>
                    <p class="empty-state">
                        Aucun message pour le moment. Commencez la conversation 👇
                    </p>
                <?php endif; ?>

                <div class="messages-wrapper">

                    <?php foreach ($conversation as $msg): ?>

                        <?php
                        $isMe = $msg['sender_id'] == $_SESSION['user_id'];
                        ?>

                        <div class="conversation-message <?= $isMe ? 'message-right' : 'message-left' ?>">

                            <!-- ✅ TIMESTAMP FIRST (outside bubble) -->
                            <?php if (!$isMe): ?>
                                <div class="message-meta-left">
                                    <img
                                        src="<?= htmlspecialchars(!empty($otherUserData['avatar'])
                                                    ? $otherUserData['avatar']
                                                    : '/tomtroc/public/assets/avatars/default-avatar.jpg') ?>"
                                        class="message-avatar-small"
                                        alt="avatar">

                                    <span class="message-time">
                                        <?= formatMessageTime($msg['created_at']) ?>
                                    </span>
                                </div>
                            <?php else: ?>
                                <span class="message-time">
                                    <?= formatMessageTime($msg['created_at']) ?>
                                </span>
                            <?php endif; ?>

                            <!-- ✅ BUBBLE -->
                            <div class="message-bubble">
                                <p class="message-text">
                                    <?= htmlspecialchars($msg['content']) ?>
                                </p>
                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>


                <!-- MESSAGE INPUT -->
                <form method="POST" class="message-form">

                    <textarea
                        name="content"
                        placeholder="Tapez votre message ici"
                        required></textarea>

                    <button type="submit">
                        Envoyer
                    </button>

                </form>

            <?php else: ?>

                <p class="empty-state">
                    Sélectionnez une conversation
                </p>

            <?php endif; ?>

        </div>

    </div>

</section>

<script>
    window.addEventListener("load", function() {
        const container = document.querySelector(".messages-wrapper");

        if (container) {
            container.scrollTop = container.scrollHeight;
        }
    });
</script>


<?php require __DIR__ . '/../layout/footer.php'; ?>