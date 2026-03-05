FR [Version française](#version-française)  
EN [English version](#english-version)

<a id="tomtroc-fr"></a>

# TomTroc (FR)

TomTroc est une application web développée en PHP permettant de mettre en relation des lecteurs afin qu’ils puissent échanger des livres.

Ce projet a été réalisé dans le cadre d’un **diplôme de développement Full-Stack**.
Il s’agit d’un **MVP (Minimal Viable Product)** dont l’objectif est d’implémenter les fonctionnalités principales d’une plateforme d’échange de livres.

---

## Fonctionnalités

* Inscription des utilisateurs
* Connexion et déconnexion
* Page "Mon compte"
* Bibliothèque personnelle de livres
* Consultation des livres disponibles à l’échange
* Page de détail d’un livre
* Messagerie entre utilisateurs (prévue dans une version ultérieure)

---

## Technologies utilisées

* **PHP** (programmation orientée objet)
* **Architecture MVC**
* **MySQL / MariaDB**
* **PDO** pour la communication avec la base de données
* **HTML / CSS**
* **Git et GitHub** pour la gestion de version

---

## Structure du projet

```
tomtroc/
│
├── public/
│   └── index.php
│
├── src/
│   ├── Controller/
│   ├── Model/
│   └── View/
│
├── config/
│   └── database.php
│
└── README.md
```

---

## Installation

1. Cloner le dépôt :

```
git clone https://github.com/annamarialm-creator/tomtroc.git
```

2. Placer le projet dans le dossier du serveur web (par exemple `htdocs` si vous utilisez **XAMPP**).

3. Créer une base de données nommée :

```
tomtroc
```

4. Configurer la connexion à la base de données dans le fichier :

```
config/database.php
```

5. Démarrer **Apache** et **MySQL** dans XAMPP.

6. Accéder au projet dans votre navigateur :

```
http://localhost/tomtroc/public/
```

---

## Sécurité

* Les mots de passe sont sécurisés grâce à la fonction `password_hash()`
* Les requêtes SQL utilisent des **requêtes préparées PDO** afin d’éviter les injections SQL

---

## Auteur

Projet réalisé dans le cadre d’une formation en développement **Full-Stack** par Anna Maria LOWE MANOLIS.

---
---
---
---
---

<a id="tomtroc-en"></a>

# TomTroc (EN)

TomTroc is a PHP web application that allows readers to exchange books with other users.

This project was developed as part of a **Full-Stack Development diploma**.
It is a **Minimal Viable Product (MVP)** designed to implement the core functionality of a book exchange platform.

---

## Features

* User registration
* User login and logout
* User account page
* Personal book library
* Browse books available for exchange
* View book details
* Messaging between users (planned)

---

## Technologies Used

* PHP (Object-Oriented Programming)
* MVC architecture
* MySQL / MariaDB
* PDO for database access
* HTML & CSS
* Git / GitHub for version control

---

## Project Structure

```
tomtroc/
│
├── public/
│   └── index.php
│
├── src/
│   ├── Controller/
│   ├── Model/
│   └── View/
│
├── config/
│   └── database.php
│
└── README.md
```

---

## Installation

1. Clone the repository

```
git clone https://github.com/annamarialm-creator/tomtroc.git
```

2. Place the project in your web server directory (for example `htdocs` if using XAMPP)

3. Create a MySQL database named:

```
tomtroc
```

4. Configure your database connection in:

```
config/database.php
```

5. Start Apache and MySQL with XAMPP.

6. Open the project in your browser:

```
http://localhost/tomtroc/public/
```

---

## Security

* Passwords are hashed using `password_hash()`
* Database access uses PDO prepared statements

---

## Author

Project developed as part of a Full-Stack Development training program by Anna Maria LOWE MANOLIS.

