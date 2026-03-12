<?php require __DIR__ . '/../layout/header.php'; ?>
<?php require_once __DIR__ . '/../../helpers/date_helper.php'; ?>

<section class="account-page">

    <h1 class="account-title">Mon compte</h1>

    <form method="POST" action="?route=update-profile" enctype="multipart/form-data">

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
                    alt="Photo de profil"
                    class="profile-avatar">

                <input
                    type="file"
                    name="avatar"
                    id="avatar-upload"
                    accept="image/*"
                    style="display:none;">

                <label for="avatar-upload" class="avatar-edit-btn">
                    modifier
                </label>

                <h3 class="profile-name"><?= htmlspecialchars($user['username']) ?></h3>

                <p class="member-since">
                    Membre depuis <?= getMembershipDuration($user['created_at']) ?>
                </p>

                <h3 class="library-title">BIBLIOTHÈQUE</h3>

                <div class="library-count">
                    <img src="/tomtroc/public/assets/book-icon.svg" class="library-icon" alt="">
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
                        value="<?= htmlspecialchars($user['email']) ?>">
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="••••••••">
                </div>

                <div class="form-group">
                    <label for="username">Pseudo</label>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        value="<?= htmlspecialchars($user['username']) ?>">
                </div>


                <button type="submit">Enregistrer</button>

            </div>

        </div>

    </form>

    <a class="add-book-link" href="?route=create-book">Ajouter un livre</a>

<div class="account-books">

    <table class="books-table">

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
                <th>PHOTO</th>
                <th>TITRE</th>
                <th>AUTEUR</th>
                <th>DESCRIPTION</th>
                <th>DISPONIBILITE</th>
                <th>ACTION</th>
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
                            alt="<?= htmlspecialchars($book['title']) ?>"
                            class="book-photo">

                    </td>

                    <td class="book-title-cell">
                        <div class="book-title">
                            <?= htmlspecialchars($book['title']) ?>
                        </div>
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

                            <a class="edit-book"
                               href="?route=edit-book&id=<?= $book['id'] ?>">
                                Éditer
                            </a>

                            <a class="delete-book"
                               href="?route=delete-book&id=<?= $book['id'] ?>"
                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?');">
                                Supprimer
                            </a>

                        </div>
                    </td>

                </tr>

            <?php endforeach; ?>
        </tbody>

    </table>

</div>

    <a href="?route=logout">Se déconnecter</a>

</section>

<?php require __DIR__ . '/../layout/footer.php'; ?>