<?php require __DIR__ . '/../layout/header.php'; ?>
<?php require_once __DIR__ . '/../../helpers/date_helper.php'; ?>

<h1>Mon compte</h1>

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
            Modifier
        </label>

        <h3><?= htmlspecialchars($user['username']) ?></h3>

        <p>Membre depuis <?= getMembershipDuration($user['created_at']) ?></p>

        <h3>BIBLIOTHÈQUE</h3>

        <p><?= count($books) ?> livres</p>

    </div>


    <!-- ACCOUNT FORM -->
    <div class="account-details">

        <h2>Vos informations personnelles</h2>

        <label for="email">Adresse email</label>
        <input
            type="email"
            id="email"
            name="email"
            value="<?= htmlspecialchars($user['email']) ?>">

        <label for="password">Mot de passe</label>
        <input
            type="password"
            id="password"
            name="password"
            placeholder="••••••••">

        <label for="username">Pseudo</label>
        <input
            type="text"
            id="username"
            name="username"
            value="<?= htmlspecialchars($user['username']) ?>">

        <button type="submit">Enregistrer</button>

    </div>

</div>

</form>


<!-- BOOK LIBRARY -->
<div class="account-books">

    <a href="?route=create-book">Ajouter un livre</a>

    <table border="1">

        <tr>
            <th>PHOTO</th>
            <th>TITRE</th>
            <th>AUTEUR</th>
            <th>DESCRIPTION</th>
            <th>DISPONIBILITE</th>
            <th>ACTION</th>
        </tr>

        <?php foreach ($books as $book): ?>

            <tr>

                <td>
                    <?php if ($book['image']): ?>
                        <img src="<?= htmlspecialchars($book['image']) ?>" width="50">
                    <?php else: ?>
                        —
                    <?php endif; ?>
                </td>

                <td><?= htmlspecialchars($book['title']) ?></td>

                <td><?= htmlspecialchars($book['author']) ?></td>

                <td><?= htmlspecialchars($book['description']) ?></td>

                <td>
                    <?= $book['status'] === 'available' ? 'Disponible' : 'Indisponible' ?>
                </td>

                <td>
                    <a href="?route=edit-book&id=<?= $book['id'] ?>">Éditer</a> |
                    <a
                        href="?route=delete-book&id=<?= $book['id'] ?>"
                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?');">
                        Supprimer
                    </a>
                </td>

            </tr>

        <?php endforeach; ?>

    </table>

</div>


<a href="?route=logout">Se déconnecter</a>

<?php require __DIR__ . '/../layout/footer.php'; ?>