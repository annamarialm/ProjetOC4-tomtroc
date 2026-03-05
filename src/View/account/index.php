<h1>Mon compte</h1>

<p><strong>Pseudo :</strong> <?= htmlspecialchars($user['username']) ?></p>

<p><strong>Email :</strong> <?= htmlspecialchars($user['email']) ?></p>

<h2>Ma bibliothèque</h2>

<a href="?route=create-book">Ajouter un livre</a>

<table border="1">
    <tr>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Description</th>
        <th>Statut</th>
    </tr>

    <?php foreach ($books as $book): ?>

        <tr>
            <td><?= htmlspecialchars($book['title']) ?></td>
            <td><?= htmlspecialchars($book['author']) ?></td>
            <td><?= htmlspecialchars($book['description']) ?></td>
            <td><?= htmlspecialchars($book['status']) ?></td>
        </tr>

    <?php endforeach; ?>

</table>

<a href="?route=logout">Se déconnecter</a>