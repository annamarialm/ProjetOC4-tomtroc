<?php require __DIR__ . '/../layout/header.php'; ?>

<h1>Ajouter un livre</h1>

<form method="POST" action="?route=create-book" enctype="multipart/form-data">

    <label for="title">Titre</label>
    <input type="text" name="title" id="title" required>

    <label for="author">Auteur</label>
    <input type="text" name="author" id="author" required>

    <label for="description">Commentaires</label>
    <textarea name="description" id="description"></textarea>

    <label for="status">Disponibilité</label>
    <select name="status" id="status">
        <option value="available">Disponible</option>
        <option value="unavailable">Indisponible</option>
    </select>

    <label for="image">Image du livre</label>
    <input type="file" name="image" id="image" accept="image/*">

    <button type="submit">Valider</button>

</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>