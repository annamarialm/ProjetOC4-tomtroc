<?php require_once __DIR__ . '/../../helpers/message_time_helper.php'; ?>
<?php require __DIR__ . '/../layout/header.php'; ?>

<section class="messaging-page">

    <div class="messaging-container">

        <!-- LEFT COLUMN : INBOX -->
        <div class="message-list" role="navigation" aria-label="Conversations">

            <h1 class="messaging-title">Messagerie</h1>

            <?php if (empty($messages)): ?>

                <p role="status">Aucun message</p>

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

                    <div class="message-item" role="listitem">

                        <a href="?route=messages&user=<?= $otherUserId ?>"
                            class="message-link <?= ($otherUser == $otherUserId) ? 'active' : '' ?>">

                            <div class="message-row">

                                <img 
                                    src="<?= htmlspecialchars($avatar) ?>" 
                                    class="message-avatar" 
                                    alt="Avatar de <?= htmlspecialchars($message['username']) ?>"
                                >

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
        <div class="conversation" role="region" aria-label="Conversation">

            <?php if ($otherUser): ?>

                <?php if ($otherUserData): ?>

                    <?php
                    $avatar = !empty($otherUserData['avatar'])
                        ? $otherUserData['avatar']
                        : '/tomtroc/public/assets/avatars/default-avatar.jpg';
                    ?>

                    <div class="conversation-header">

                        <img 
                            src="<?= htmlspecialchars($avatar) ?>" 
                            class="conversation-avatar" 
                            alt="Avatar de <?= htmlspecialchars($otherUserData['username']) ?>"
                        >

                        <span class="conversation-username">
                            <?= htmlspecialchars($otherUserData['username']) ?>
                        </span>

                    </div>

                <?php endif; ?>

                <?php if (empty($conversation)): ?>
                    <p class="empty-state" role="status">
                        Aucun message pour le moment. Commencez la conversation 👇
                    </p>
                <?php endif; ?>

                <div class="messages-wrapper" role="log" aria-live="polite">

                    <?php foreach ($conversation as $msg): ?>

                        <?php
                        $isMe = $msg['sender_id'] == $_SESSION['user_id'];
                        ?>

                        <div class="conversation-message <?= $isMe ? 'message-right' : 'message-left' ?>">

                            <!-- TIMESTAMP + AVATAR -->
                            <?php if (!$isMe): ?>
                                <div class="message-meta-left">
                                    <img
                                        src="<?= htmlspecialchars(!empty($otherUserData['avatar'])
                                                    ? $otherUserData['avatar']
                                                    : '/tomtroc/public/assets/avatars/default-avatar.jpg') ?>"
                                        class="message-avatar-small"
                                        alt="Avatar de <?= htmlspecialchars($otherUserData['username']) ?>"
                                    >

                                    <span class="message-time">
                                        <?= formatMessageTime($msg['created_at']) ?>
                                    </span>
                                </div>
                            <?php else: ?>
                                <span class="message-time">
                                    <?= formatMessageTime($msg['created_at']) ?>
                                </span>
                            <?php endif; ?>

                            <!-- MESSAGE -->
                            <div class="message-bubble">
                                <p class="message-text">
                                    <span class="sr-only">
                                        <?= $isMe ? 'Vous' : htmlspecialchars($otherUserData['username']) ?> :
                                    </span>
                                    <?= htmlspecialchars($msg['content']) ?>
                                </p>
                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>


                <!-- MESSAGE INPUT -->
                <form method="POST" class="message-form" aria-label="Envoyer un message">

                    <label for="message-content" class="sr-only">Message</label>

                    <textarea
                        id="message-content"
                        name="content"
                        placeholder="Tapez votre message ici"
                        required
                        aria-required="true"></textarea>

                    <button type="submit">
                        Envoyer
                    </button>

                </form>

            <?php else: ?>

                <p class="empty-state" role="status">
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