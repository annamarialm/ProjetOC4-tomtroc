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
                <img src="/tomtroc/public/assets/imghome.jpg" alt="Lecteurs échangeant des livres">
                <p class="image-credit">Hamza</p>
            </div>

        </section>


    </div>

    <section class="latest-books">


        <div class="container">

            <h2>Les derniers livres ajoutés</h2>

            <div class="books-grid">

                <?php foreach ($latestBooks as $book): ?>

                    <div class="book-card">

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

                                <p class="book-author">
                                    <?= htmlspecialchars($book['author']) ?>
                                </p>

                                <p class="book-card-owner">
                                    Proposé par <?= htmlspecialchars($book['username']) ?>
                                </p>
                            </div>

                        </a>

                    </div>

                <?php endforeach; ?>

            </div>

            <a href="?route=books" class="btn-secondary">Voir tous les livres</a>

        </div>


    </section>

    <div class="container">


        <h2 class="how-title">Comment ça marche ?</h2>

        <p class="how-intro">
            Échanger des livres avec TomTroc c’est simple et amusant !
            Suivez ces étapes pour commencer :
        </p>

        <div class="how-it-works">

            <a href="?route=register" class="card-link card">

                <p>Inscrivez-vous gratuitement sur notre plateforme.</p>
            </a>

            <a href="?route=create-book" class="card-link card">
                <p>Ajoutez les livres que vous souhaitez échanger à votre profil.</p>
            </a>

            <a href="?route=books" class="card-link card">
                <p>Parcourez les livres disponibles chez d'autres membres.</p>
            </a>

            <a href="?route=books" class="card-link card">
                <p>Proposez un échange et discutez avec d'autres passionnés de lecture.</p>
            </a>

        </div>


        <a href="?route=books" class="btn-outline">Voir tous les livres</a>

        <section class="values-image">
            <img src="/tomtroc/public/assets/values.png" alt="">
        </section>

        <div class="values-section">
            <h2>Nos valeurs</h2>

            <p>
                Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté. Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs. Nous croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes.
            </p>

            <p>
                Notre association a été fondée avec une conviction profonde :
                chaque livre mérite d'être lu et partagé.
            </p>

            <p>
                Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux
                lecteurs de se connecter, de partager leurs découvertes littéraires et d'échanger
                des livres qui attendent patiemment sur les étagères.
            </p>

            <p class="values-signature">L'équipe Tom Troc</p>
        </div>
    </div>

    <img
        src="/tomtroc/public/assets/heart-hand.svg"
        alt=""
        class="values-illustration">


</main>

<?php require __DIR__ . '/layout/footer.php'; ?>