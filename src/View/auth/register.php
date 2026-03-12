<?php require __DIR__ . '/../layout/header.php'; ?>

<section class="register-page">

    <div class="register-layout">

        <!-- LEFT : FORM -->
        <div class="register-form">

            <div class="register-content">

                <h1>Inscription</h1>

                <form method="POST" action="?route=register">

                    <label for="username">Pseudo</label>
                    <input type="text" id="username" name="username" required>

                    <label for="email">Adresse email</label>
                    <input type="email" id="email" name="email" required>

                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>

                    <button type="submit" class="btn-primary">
                        S'inscrire
                    </button>

                    <p class="register-login">
                        Déjà inscrit ?
                        <a href="?route=login">Connectez-vous</a>
                    </p>

                </form>

            </div>

        </div>

        <!-- RIGHT : IMAGE -->
        <div class="register-image">
            <img src="/tomtroc/public/assets/register.png" alt="">
        </div>

    </div>

</section>

<?php require __DIR__ . '/../layout/footer.php'; ?>