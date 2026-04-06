<?php require __DIR__ . '/../layout/header.php'; ?>

<section class="edit-book-page">

    <div class="container">

        <a href="?route=account" class="edit-book-back" aria-label="Retour à votre compte">← retour</a>

        <h1 id="create-book-title" class="edit-book-title">Ajouter un livre</h1>

        <div class="edit-book-card">

            <form 
                method="POST" 
                action="?route=create-book" 
                enctype="multipart/form-data" 
                class="edit-book-layout"
                aria-labelledby="create-book-title"
            >

                <!-- LEFT SIDE : IMAGE -->
                <div class="edit-book-image">

                    <label>Photo</label>

                    <img 
                        src="/tomtroc/public/assets/books/default.jpg" 
                        alt="Couverture par défaut du livre"
                    >

                    <label for="image" class="edit-photo-link">Ajouter une photo</label>

                    <input
                        type="file"
                        name="image"
                        id="image"
                        accept="image/*"
                        class="hidden">

                </div>


                <!-- RIGHT SIDE : FORM -->
                <div class="edit-book-form">

                    <div class="form-group">
                        <label for="title">Titre</label>

                        <input
                            type="text"
                            name="title"
                            id="title"
                            required
                            autocomplete="off">
                    </div>


                    <div class="form-group">
                        <label for="author">Auteur</label>

                        <input
                            type="text"
                            name="author"
                            id="author"
                            required
                            autocomplete="name">
                    </div>


                    <div class="form-group">
                        <label for="description">Commentaire</label>

                        <textarea
                            name="description"
                            id="description"></textarea>
                    </div>


                    <div class="form-group">
                        <label for="status">Disponibilité</label>

                        <select name="status" id="status">
                            <option value="available">disponible</option>
                            <option value="unavailable">indisponible</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="edit-book-submit">
                            Ajouter
                        </button>
                    </div>

                </div>

            </form>

        </div>

    </div>

</section>

<?php require __DIR__ . '/../layout/footer.php'; ?>