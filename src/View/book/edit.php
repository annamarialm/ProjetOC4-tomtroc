<?php require __DIR__ . '/../layout/header.php'; ?>

<section class="edit-book-page">

    <div class="container">

        <a href="?route=account" class="edit-book-back">← retour</a>

        <h1 class="edit-book-title">Modifier les informations</h1>

        <div class="edit-book-card">

            <form method="POST" enctype="multipart/form-data" class="edit-book-layout">

                <!-- LEFT SIDE : IMAGE -->
                <div class="edit-book-image">

                    <label>Photo</label>

                    <?php if (!empty($book['image'])): ?>
                        <img src="<?= htmlspecialchars($book['image']) ?>" alt="Couverture du livre">
                    <?php else: ?>
                        <img src="/tomtroc/public/assets/books/default.jpg" alt="Couverture du livre">
                    <?php endif; ?>

                    <label for="image" class="edit-photo-link">Modifier la photo</label>

                    <input
                        type="file"
                        name="image"
                        id="image"
                        accept="image/*"
                        style="display:none;">

                </div>


                <!-- RIGHT SIDE : FORM -->
                <div class="edit-book-form">

                    <div class="form-group">
                        <label for="title">Titre</label>

                        <input
                            type="text"
                            name="title"
                            id="title"
                            value="<?= htmlspecialchars($book['title']) ?>"
                            required>
                    </div>


                    <div class="form-group">
                        <label for="author">Auteur</label>

                        <input
                            type="text"
                            name="author"
                            id="author"
                            value="<?= htmlspecialchars($book['author']) ?>"
                            required>
                    </div>


                    <div class="form-group">
                        <label for="description">Commentaire</label>

                        <textarea
                            name="description"
                            id="description"><?= htmlspecialchars($book['description']) ?></textarea>
                    </div>


                    <div class="form-group">
                        <label for="status">Disponibilité</label>

                        <select name="status" id="status">
                            <option value="available" <?= $book['status'] === 'available' ? 'selected' : '' ?>>
                                disponible
                            </option>

                            <option value="unavailable" <?= $book['status'] === 'unavailable' ? 'selected' : '' ?>>
                                indisponible
                            </option>
                        </select>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="edit-book-submit">
                            Valider
                        </button>
                    </div>

                </div>

            </form>

        </div>

    </div>

</section>

<?php require __DIR__ . '/../layout/footer.php'; ?>