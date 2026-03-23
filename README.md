FR [Version française](#version-française)  
EN [English version](#english-version)

<a id="tomtroc-fr"></a>

# TomTroc (FR)

## Description
TomTroc est une application web développée en PHP permettant de mettre en relation des utilisateurs afin qu’ils puissent échanger des livres.

Ce projet est un MVP (Minimal Viable Product) mettant en œuvre une architecture MVC et une logique backend complète : gestion des utilisateurs, authentification, gestion de données et interactions entre utilisateurs.

L’objectif est de concevoir une application structurée, maintenable et proche d’un environnement réel de développement.

---

## Fonctionnalités

- Inscription et authentification des utilisateurs  
- Gestion du profil utilisateur ("Mon compte")  
- Gestion d’une bibliothèque personnelle de livres  
- Consultation des livres disponibles à l’échange  
- Affichage détaillé d’un livre  
- (Prévu) Messagerie entre utilisateurs  

---

## Technologies utilisées

* **PHP** (programmation orientée objet)
* **Architecture MVC**
* **MySQL / MariaDB**
* **PDO** pour la communication avec la base de données
* **HTML / CSS**
* **Git et GitHub** pour la gestion de version

---

## Compétences mises en œuvre
- Conception d’une application web complète en PHP  
- Implémentation d’une architecture MVC  
- Gestion de l’authentification utilisateur  
- Manipulation de données via PDO  
- Structuration d’un projet maintenable  
- Sécurisation des données (hash des mots de passe, requêtes préparées)

```

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
## Architecture et logique
- Architecture MVC (Model / View / Controller)  
- Gestion des requêtes HTTP côté serveur  
- Séparation des responsabilités (routing, logique métier, affichage)  
- Interaction avec la base de données via PDO  
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

## Description
TomTroc is a PHP web application that allows users to exchange books with each other.

This project is a Minimal Viable Product (MVP) implementing a full backend logic using MVC architecture: user management, authentication, data handling, and user interactions.

The goal is to build a structured and maintainable application, close to real-world development practices.

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

## Skills Demonstrated
- Building a full PHP web application  
- Implementing MVC architecture  
- User authentication handling  
- Database interaction using PDO  
- Structuring a maintainable application  
- Data security (password hashing, prepared statements)  

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
## Architecture & Backend Logic
- MVC architecture (Model / View / Controller)  
- Server-side request handling  
- Separation of concerns (routing, business logic, presentation)  
- Database interaction using PDO  
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

