<?php require __DIR__ . '/../layout/header.php'; ?>

<?php require_once __DIR__ . '/../../helpers/date_helper.php'; ?>

<div class="account-page public-profile">
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

            <div class="profile-name">
                <?= htmlspecialchars($user['username']) ?>
            </div>

            <div class="member-since">
                Membre depuis <?= getMembershipDuration($user['created_at']) ?>
            </div>

            <div class="library-title">
                BIBLIOTHÈQUE
            </div>

            <div class="library-count">
                <img src="/tomtroc/public/assets/book-icon.svg" class="library-icon" alt="">
                <span><?= count($books) ?> livres</span>
            </div>

            <?php if ($_SESSION['user_id'] != $user['id']): ?>
                <a href="?route=messages&user=<?= $user['id'] ?>" class="btn-outline">
                    Écrire un message
                </a>
            <?php endif; ?>

        </div>


        <!-- BOOK TABLE -->

        <div class="account-books">

            <table class="books-table">

                <colgroup>
                    <col class="col-photo">
                    <col class="col-title">
                    <col class="col-author">
                    <col class="col-description">
                </colgroup>

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

                            <td>

                                <?php
                                $image = !empty($book['image'])
                                    ? $book['image']
                                    : '/tomtroc/public/assets/books/default.jpg';
                                ?>

                                <img
                                    src="<?= htmlspecialchars($image) ?>"
                                    alt="Couverture"
                                    class="book-photo">

                            </td>

                            <td class="book-title">
                                <div class="title-text">
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

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>