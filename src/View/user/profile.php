<?php require __DIR__ . '/../layout/header.php'; ?>
<?php require_once __DIR__ . '/../../helpers/date_helper.php'; ?>

<div class="profile-container">

    <!-- LEFT PROFILE CARD -->
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

        <h3><?= htmlspecialchars($user['username']) ?></h3>

        <p>
            Membre depuis
            <?= getMembershipDuration($user['created_at']) ?>
        </p>

        <h3>BIBLIOTHÈQUE</h3>

        <p><?= count($books) ?> livres</p>

        <a href="#" class="message-button">
            Écrire un message
        </a>

    </div>


    <!-- RIGHT BOOK LIST -->
    <div class="account-books">

        <table class="books-table">

            <thead>
                <tr>
                    <th>PHOTO</th>
                    <th>TITRE</th>
                    <th>AUTEUR</th>
                    <th>DESCRIPTION</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($books as $book): ?>

                    <tr>

                        <td class="book-cover">

                            <?php
                            $image = !empty($book['image'])
                                ? $book['image']
                                : '/tomtroc/public/assets/books/default.jpg';
                            ?>

                            <img
                                src="<?= htmlspecialchars($image) ?>"
                                alt="Couverture">

                        </td>

                        <td><?= htmlspecialchars($book['title']) ?></td>

                        <td><?= htmlspecialchars($book['author']) ?></td>

                        <td><?= htmlspecialchars($book['description']) ?></td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>