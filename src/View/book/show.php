<?php require __DIR__ . '/../layout/header.php'; ?>

<p>
    <a href="?route=books">Nos livres</a>
    >
    <?= htmlspecialchars($book['title']) ?>
</p>

<div class="book-detail">

    <div class="book-left">

        <?php if (!empty($book['image'])): ?>
            <img src="<?= htmlspecialchars($book['image']) ?>" alt="Couverture du livre">
        <?php else: ?>
            <img src="/tomtroc/public/assets/books/default.jpg" alt="Couverture du livre">
        <?php endif; ?>

        <p class="edit-image">
            <a href="?route=edit-book&id=<?= $book['id'] ?>">Modifier l'image</a>
        </p>

    </div>

    <div class="book-right">

        <h1><?= htmlspecialchars($book['title']) ?></h1>

        <p>par <?= htmlspecialchars($book['author']) ?></p>

        <h3>Description</h3>

        <p><?= nl2br(htmlspecialchars($book['description'])) ?></p>

        <h3>Propriétaire</h3>

        <p>
            <a href="?route=profile&id=<?= $book['user_id'] ?>">
                <?= htmlspecialchars($book['username']) ?>
            </a>
        </p>

        <button>Envoyer un message</button>

    </div>

</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>