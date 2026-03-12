<?php require __DIR__ . '/../layout/header.php'; ?>

<section class="register-page">

    <div class="register-layout">

        <!-- LEFT : FORM -->
        <div class="register-form">

            <div class="register-content">

                <h1>Connexion</h1>

                <form method="POST" action="?route=login">

                    <label for="email">Adresse email</label>
                    <input type="email" id="email" name="email" required>

                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>

                    <button type="submit" class="btn-primary register-btn">
                        Se connecter
                    </button>

                    <p class="register-login">
                        Pas de compte ?
                        <a href="?route=register">Inscrivez-vous</a>
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