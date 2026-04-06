<?php require __DIR__ . '/../layout/header.php'; ?>

<section class="book-page">

    <div class="book-breadcrumb">

        <?php
        $from = $_GET['from'] ?? 'books';
        ?>

        <?php if ($from === 'account'): ?>
            <a href="?route=account">Mon compte</a>

        <?php elseif ($from === 'home'): ?>
            <a href="?route=home">Accueil</a>

        <?php elseif ($from === 'profile'): ?>
            <a href="?route=profile&id=<?= $book['user_id'] ?>">
                Profil de <?= htmlspecialchars($book['username']) ?>
            </a>

        <?php else: ?>
            <a href="?route=books">Nos livres</a>

        <?php endif; ?>

        <span>></span>

        <?= htmlspecialchars($book['title']) ?>

    </div>

    <div class="book-layout">

        <!-- LEFT IMAGE -->
        <div class="book-image">

            <?php
            $image = !empty($book['image'])
                ? $book['image']
                : '/tomtroc/public/assets/books/default.jpg';
            ?>

            <img
                src="<?= htmlspecialchars($image) ?>"
                alt="Couverture de <?= htmlspecialchars($book['title']) ?> par <?= htmlspecialchars($book['author']) ?>">

        </div>


        <!-- RIGHT PANEL -->
        <div class="book-panel">

            <div class="book-info">

                <h1 class="book-title">
                    <?= htmlspecialchars($book['title']) ?>
                </h1>

                <p class="book-author">
                    par <?= htmlspecialchars($book['author']) ?>
                </p>

                <div class="book-divider"></div>

                <h2 class="book-section-title">DESCRIPTION</h2>

                <div class="book-description">
                    <?= nl2br(htmlspecialchars($book['description'])) ?>
                </div>

                <h3 class="book-section-title">PROPRIÉTAIRE</h3>

                <div class="book-owner">

                    <?php
                    $avatar = !empty($book['avatar'])
                        ? $book['avatar']
                        : '/tomtroc/public/assets/avatars/default-avatar.jpg';
                    ?>

                    <img
                        src="<?= htmlspecialchars($avatar) ?>"
                        class="owner-avatar"
                        alt="Avatar de <?= htmlspecialchars($book['username']) ?>">

                    <a
                        href="?route=profile&id=<?= $book['user_id'] ?>"
                        class="owner-name"
                        aria-label="Voir le profil de <?= htmlspecialchars($book['username']) ?>">
                        <?= htmlspecialchars($book['username']) ?>
                    </a>

                </div>

                <?php if (!isset($_SESSION['user_id'])): ?>

                    <a
                        href="?route=login"
                        class="btn-primary book-message"
                        aria-label="Se connecter pour envoyer un message">
                        Envoyer un message
                    </a>

                <?php elseif ($_SESSION['user_id'] != $book['user_id']): ?>

                    <a
                        href="?route=messages&user=<?= $book['user_id'] ?>"
                        class="btn-primary book-message"
                        aria-label="Envoyer un message à <?= htmlspecialchars($book['username']) ?>">
                        Envoyer un message
                    </a>

                <?php endif; ?>

            </div>

        </div>

    </div>

</section>

<?php require __DIR__ . '/../layout/footer.php'; ?>