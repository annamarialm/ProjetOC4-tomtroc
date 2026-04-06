<?php require __DIR__ . '/../layout/header.php'; ?>
<?php require_once __DIR__ . '/../../helpers/date_helper.php'; ?>

<section class="account-page">

    <h1 id="account-title" class="account-title">Mon compte</h1>

    <form method="POST" action="?route=update-profile" enctype="multipart/form-data" aria-labelledby="account-title">

        <div class="account-top">

            <!-- PROFILE CARD -->
            <div class="account-profile">

                <?php
                $avatar = !empty($user['avatar'])
                    ? $user['avatar']
                    : '/tomtroc/public/assets/avatars/default-avatar.jpg';
                ?>

                <img
                    src="<?= htmlspecialchars($avatar) ?>"
                    alt="Avatar de <?= htmlspecialchars($user['username']) ?>"
                    class="profile-avatar">

                <input
                    type="file"
                    name="avatar"
                    id="avatar-upload"
                    accept="image/*"
                    class="hidden">

                <label for="avatar-upload" class="avatar-edit-btn">
                    modifier
                </label>

                <h2 class="profile-name"><?= htmlspecialchars($user['username']) ?></h2>

                <p class="member-since">
                    Membre depuis <?= getMembershipDuration($user['created_at']) ?>
                </p>

                <h3 class="library-title">BIBLIOTHÈQUE</h3>

                <div class="library-count">
                    <img 
                        src="/tomtroc/public/assets/book-icon.svg" 
                        class="library-icon" 
                        alt="" 
                        aria-hidden="true">
                    <span><?= count($books) ?> livres</span>
                </div>

            </div>


            <!-- ACCOUNT FORM CARD -->
            <div class="account-details">

                <h2>Vos informations personnelles</h2>

                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="<?= htmlspecialchars($user['email']) ?>"
                        autocomplete="email">
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="••••••••"
                        autocomplete="new-password">
                </div>

                <div class="form-group">
                    <label for="username">Pseudo</label>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        value="<?= htmlspecialchars($user['username']) ?>"
                        autocomplete="username">
                </div>

                <button type="submit">Enregistrer</button>

            </div>

        </div>

    </form>

    <a 
        class="add-book-link" 
        href="?route=create-book"
        aria-label="Ajouter un nouveau livre"
    >
        Ajouter un livre
    </a>

    <div class="account-books">

        <table class="books-table">

            <caption class="sr-only">
                Liste de vos livres
            </caption>

            <colgroup>
                <col class="col-photo">
                <col class="col-title">
                <col class="col-author">
                <col class="col-description">
                <col class="col-status">
                <col class="col-action">
            </colgroup>

            <thead>
                <tr>
                    <th scope="col" class="table-header">PHOTO</th>
                    <th scope="col" class="table-header">TITRE</th>
                    <th scope="col" class="table-header">AUTEUR</th>
                    <th scope="col" class="table-header">DESCRIPTION</th>
                    <th scope="col" class="table-header">DISPONIBILITE</th>
                    <th scope="col" class="table-header">ACTION</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($books as $book): ?>

                    <tr>

                        <td class="book-photo-cell">

                            <?php
                            $image = !empty($book['image'])
                                ? $book['image']
                                : '/tomtroc/public/assets/books/default.jpg';
                            ?>

                            <img
                                src="<?= htmlspecialchars($image) ?>"
                                alt="Couverture de <?= htmlspecialchars($book['title']) ?> par <?= htmlspecialchars($book['author']) ?>"
                                class="book-photo">

                        </td>

                        <td class="book-title-cell">
                            <a 
                                href="?route=book&id=<?= $book['id'] ?>&from=account"  
                                class="book-title-link"
                                aria-label="Voir le livre <?= htmlspecialchars($book['title']) ?>"
                            >
                                <div class="book-title">
                                    <?= htmlspecialchars($book['title']) ?>
                                </div>
                            </a>
                        </td>

                        <td class="book-author-cell">
                            <?= htmlspecialchars($book['author']) ?>
                        </td>

                        <td class="book-description-cell">
                            <div class="book-description">
                                <?= htmlspecialchars(mb_strimwidth($book['description'], 0, 85, '...')) ?>
                            </div>
                        </td>

                        <td class="book-status-cell">
                            <span class="book-status <?= $book['status'] === 'available' ? 'available' : 'unavailable' ?>">
                                <?= $book['status'] === 'available' ? 'disponible' : 'non dispo.' ?>
                            </span>
                        </td>

                        <td class="book-actions">
                            <div class="actions-wrapper">

                                <a 
                                    class="edit-book"
                                    href="?route=edit-book&id=<?= $book['id'] ?>"
                                    aria-label="Modifier le livre <?= htmlspecialchars($book['title']) ?>"
                                >
                                    Éditer
                                </a>

                                <a 
                                    class="delete-book"
                                    href="?route=delete-book&id=<?= $book['id'] ?>"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?');"
                                    aria-label="Supprimer le livre <?= htmlspecialchars($book['title']) ?>"
                                >
                                    Supprimer
                                </a>

                            </div>
                        </td>

                    </tr>

                <?php endforeach; ?>
            </tbody>

        </table>

    </div>

</section>

<?php require __DIR__ . '/../layout/footer.php'; ?>