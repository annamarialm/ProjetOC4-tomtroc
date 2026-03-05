<h1>Ajouter un livre</h1>

<form method="POST" action="?route=create-book">

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

    <button type="submit">Valider</button>

</form>