<?php require __DIR__ . '/../layout/header.php'; ?>
<?php require_once __DIR__ . '/../../helpers/date_helper.php'; ?>

<section class="books-page">

    <div class="books-layout">

        <div class="books-header">

            <h1 class="books-title">Nos livres à l’échange</h1>

            <form method="GET" class="books-search">
                <input type="hidden" name="route" value="books">

                <input
                    type="text"
                    name="search"
                    placeholder="Rechercher un livre"
                    value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
            </form>

        </div>

        <div class="books-grid">

            <?php foreach ($books as $book): ?>

                <article class="book-card">

                    <a href="?route=book&id=<?= $book['id'] ?>" class="book-card-link">

                        <div class="book-card-image">
                            <?php
                            $image = !empty($book['image'])
                                ? $book['image']
                                : '/tomtroc/public/assets/books/default.jpg';
                            ?>

                            <img src="<?= htmlspecialchars($image) ?>" alt="Couverture du livre">
                        </div>

                        <div class="book-card-info">

                            <h3><?= htmlspecialchars($book['title']) ?></h3>

                            <p class="book-author"><?= htmlspecialchars($book['author']) ?></p>

                            <p class="book-card-owner">
                                Proposé par : <?= htmlspecialchars($book['username']) ?>
                            </p>

                        </div>

                    </a>

                </article>

            <?php endforeach; ?>

        </div>

    </div>

</section>

<?php require __DIR__ . '/../layout/footer.php'; ?>