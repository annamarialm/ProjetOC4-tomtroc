<?php require __DIR__ . '/../layout/header.php'; ?>

<section class="register-page">

    <div class="register-layout">

        <!-- LEFT : FORM -->
        <div class="register-form">

            <div class="register-content">

                <h1 id="login-title">Connexion</h1>

                <?php if (!empty($error)): ?>
                    <p class="form-error" role="alert">
                        <?= htmlspecialchars($error) ?>
                    </p>
                <?php endif; ?>

                <form method="POST" action="?route=login" aria-labelledby="login-title">

                    <label for="email">Adresse email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        required 
                        aria-required="true"
                        autocomplete="email"
                    >

                    <label for="password">Mot de passe</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required 
                        aria-required="true"
                        autocomplete="current-password"
                    >

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
            <img src="/tomtroc/public/assets/register.png" alt="" aria-hidden="true">
        </div>

    </div>

</section>

<?php require __DIR__ . '/../layout/footer.php'; ?>