<?php require __DIR__ . '/../layout/header.php'; ?>

<section class="book-page">

    <div class="book-breadcrumb">
        <a href="?route=books">Nos livres</a>
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

            <img src="<?= htmlspecialchars($image) ?>" alt="Couverture du livre">

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

                <h3 class="book-section-title">DESCRIPTION</h3>

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

                    <img src="<?= htmlspecialchars($avatar) ?>" class="owner-avatar" alt="Avatar">
                    <a href="?route=profile&id=<?= $book['user_id'] ?>" class="owner-name">
                        <?= htmlspecialchars($book['username']) ?>
                    </a>

                </div>

                <?php if ($_SESSION['user_id'] != $book['user_id']): ?>
                    <a href="?route=messages&user=<?= $book['user_id'] ?>" class="btn-primary book-message">
                        Envoyer un message
                    </a>
                <?php endif; ?>

            </div>

        </div>

    </div>

</section>

<?php require __DIR__ . '/../layout/footer.php'; ?>