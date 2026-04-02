<?php require __DIR__ . '/layout/header.php'; ?>

<main>

    <div class="container">

        <section class="hero">

            <div class="hero-text">

                <h1>Rejoignez nos lecteurs passionnés</h1>

                <p>
                    Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture.
                    Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres.
                </p>

                <a href="?route=books" class="btn-primary">Découvrir</a>

            </div>

            <div class="hero-image">
                <img src="/tomtroc/public/assets/imghome.jpg" alt="Personne lisant entourée de livres">
                <p class="image-credit">
                    <span class="sr-only">Crédit image :</span> Hamza
                </p>
            </div>

        </section>

    </div>

    <section class="latest-books">

        <div class="container">

            <h2>Les derniers livres ajoutés</h2>

            <div class="books-grid">

                <?php foreach ($latestBooks as $book): ?>

                    <article class="book-card">

                        <a href="?route=book&id=<?= $book['id'] ?>&from=home" class="book-card-link">
                            <div class="book-card-image">

                                <?php
                                $image = !empty($book['image'])
                                    ? $book['image']
                                    : '/tomtroc/public/assets/books/default.jpg';
                                ?>

                                <img
                                    src="<?= htmlspecialchars($image) ?>"
                                    alt="Couverture de <?= htmlspecialchars($book['title']) ?> par <?= htmlspecialchars($book['author']) ?>">

                            </div>

                            <div class="book-card-info">

                                <h3><?= htmlspecialchars($book['title']) ?></h3>

                                <p class="book-author">
                                    <?= htmlspecialchars($book['author']) ?>
                                </p>

                                <p class="book-card-owner">
                                    Proposé par <?= htmlspecialchars($book['username']) ?>
                                </p>

                            </div>

                        </a>

                    </article>

                <?php endforeach; ?>

            </div>

            <a href="?route=books" class="btn-secondary">
                Voir tous les livres disponibles
            </a>

        </div>

    </section>

    <section class="how-section">

        <div class="container">

            <h2 class="how-title">Comment ça marche ?</h2>

            <p class="how-intro">
                Échanger des livres avec TomTroc c’est simple et amusant !
                Suivez ces étapes pour commencer :
            </p>

            <div class="how-it-works">

                <a href="?route=register" class="card-link card">
                    <h3>Inscription</h3>
                    <p>Inscrivez-vous gratuitement sur notre plateforme.</p>
                </a>

                <a href="?route=create-book" class="card-link card">
                    <h3>Ajout de livres</h3>
                    <p>Ajoutez les livres que vous souhaitez échanger à votre profil.</p>
                </a>

                <a href="?route=books" class="card-link card">
                    <h3>Parcourir</h3>
                    <p>Parcourez les livres disponibles chez d'autres membres.</p>
                </a>

                <a href="?route=books" class="card-link card">
                    <h3>Échanger</h3>
                    <p>Proposez un échange et discutez avec d'autres passionnés de lecture.</p>
                </a>

            </div>

            <a href="?route=books" class="btn-outline">
                Explorer tous les livres
            </a>

        </div>

    </section>

    <div class="values-image">
        <img src="/tomtroc/public/assets/values.png" alt="" aria-hidden="true">
    </div>

    <div class="container">

        <section class="values-section">

            <h2>Nos valeurs</h2>

            <p>
                Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté.
            </p>

            <p>
                Notre association a été fondée avec une conviction profonde :
                chaque livre mérite d'être lu et partagé.
            </p>

            <p>
                Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux
                lecteurs de se connecter, de partager leurs découvertes littéraires et d'échanger
                des livres.
            </p>

            <p class="values-signature">L'équipe Tom Troc</p>

        </section>

    </div>

    <img
        src="/tomtroc/public/assets/heart-hand.svg"
        alt=""
        aria-hidden="true"
        class="values-illustration">

</main>

<?php require __DIR__ . '/layout/footer.php'; ?>