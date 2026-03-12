<?php
$currentRoute = $_GET['route'] ?? 'home';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Tom Troc</title>

    <link rel="stylesheet" href="/tomtroc/public/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>

    <header>

        <div class="container">

            <nav class="main-nav">

                <!-- LEFT NAVIGATION -->
                <div class="nav-left">

                    <!-- LOGO -->
                    <div class="nav-logo">
                        <a href="?route=home">
                            <img src="/tomtroc/public/assets/logo.svg" alt="Tom Troc">
                        </a>
                    </div>

                    <!-- MAIN NAVIGATION -->
                    <div class="nav-main">

                        <a href="?route=home"
                            class="<?= $currentRoute === 'home' ? 'nav-active' : '' ?>">
                            Accueil
                        </a>

                        <a href="?route=books" class="nav-divider">
                            Nos livres à l’échange
                        </a>

                    </div>

                </div>

                <!-- USER AREA -->
                <div class="nav-user">

                    <a href="?route=messages"
                        class="nav-link <?= $currentRoute === 'messages' ? 'nav-active' : '' ?>">
                        <img src="/tomtroc/public/assets/icon-messagerie.svg" alt="" class="nav-icon">
                        Messagerie
                    </a>

                    <?php if (isset($_SESSION['user_id'])): ?>

                        <a href="?route=account"
                            class="nav-link <?= $currentRoute === 'account' ? 'nav-active' : '' ?>">
                            <img src="/tomtroc/public/assets/icon-mon-compte.svg" alt="" class="nav-icon">
                            Mon compte
                        </a>

                        <a href="?route=logout">Déconnexion</a>

                    <?php else: ?>

                        <a href="?route=login"
                            class="<?= $currentRoute === 'login' ? 'nav-active' : '' ?>">
                            Connexion
                        </a>

                    <?php endif; ?>

                </div>

            </nav>

        </div>

    </header>