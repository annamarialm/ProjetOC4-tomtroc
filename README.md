[🇫🇷 Version française](#version-française)  
[🇬🇧 English version](#english-version)

---

<a id="version-française"></a>

# 📚 TomTroc (FR)

## Description
TomTroc est une application web développée en PHP permettant de mettre en relation des utilisateurs afin qu’ils puissent échanger des livres.

Ce projet est un MVP (Minimal Viable Product) construit avec une architecture MVC personnalisée, mettant en œuvre une logique backend complète : gestion des utilisateurs, authentification, gestion des livres et messagerie entre utilisateurs.

L’objectif est de concevoir une application structurée, maintenable et proche d’un environnement réel de développement.

---

## 🚀 Fonctionnalités

### Utilisateur
- Inscription et authentification sécurisée  
- Gestion du profil utilisateur  
- Upload d’avatar  

### Livres
- Ajout, modification et suppression de livres (CRUD)  
- Consultation des livres disponibles  
- Recherche par titre  
- Page détail d’un livre  

### Messagerie
- Boîte de réception (une conversation par utilisateur)  
- Vue conversation  
- Envoi de messages  
- Affichage des timestamps et aperçus  

---

## 🛠 Technologies utilisées

- PHP (Programmation Orientée Objet)  
- Architecture MVC (custom)  
- MySQL / MariaDB  
- PDO (requêtes préparées)  
- HTML5 / CSS3  
- Git / GitHub  

---

## 🧠 Compétences mises en œuvre

- Conception d’une application web complète  
- Implémentation d’une architecture MVC  
- Gestion de l’authentification (sessions, password_hash)  
- Manipulation de données avec PDO  
- Sécurisation des données (SQL injection, XSS)  
- Conception d’une base de données relationnelle (foreign keys)  

---

## 🏗 Structure du projet


tomtroc/
│
├── public/
│ └── index.php
│
├── src/
│ ├── Controller/
│ ├── Model/
│ └── View/
│
├── config/
│ └── database.php
│
├── database.sql
└── README.md


---

## ⚙️ Installation

### 1. Cloner le projet

git clone https://github.com/annamarialm-creator/tomtroc.git


### 2. Installer le projet
Placez le dossier dans votre serveur local (ex: `htdocs` avec XAMPP)

### 3. Créer la base de données
Dans phpMyAdmin :

- Créez une base nommée :

tomtroc


- Importez le fichier :

database.sql


### 4. Configurer la connexion
Modifier :

config/database.php


### 5. Lancer le serveur
Démarrer Apache et MySQL (XAMPP)

### 6. Accéder au projet

http://localhost/tomtroc/public/


---

## 🔐 Sécurité

- Mots de passe hashés (`password_hash`)  
- Requêtes préparées (PDO)  
- Protection XSS avec `htmlspecialchars`  
- Intégrité des données via foreign keys  

---

## 📌 Remarques techniques

- Architecture MVC respectée (séparation claire des responsabilités)  
- Aucune logique SQL dans les vues  
- Aucun HTML dans les contrôleurs  
- Validation HTML (W3C) et accessibilité (WCAG) prises en compte  

---

## 👩‍💻 Auteur

Projet réalisé dans le cadre d’une formation en développement **Full-Stack**  
par **Anna Maria LOWE MANOLIS**

---

---

<a id="english-version"></a>

# 📚 TomTroc (EN)

## Description
TomTroc is a PHP web application that allows users to exchange books.

This project is a Minimal Viable Product (MVP) built using a custom MVC architecture, implementing full backend logic including authentication, book management, and a messaging system.

The goal is to build a structured and maintainable application aligned with real-world development practices.

---

## 🚀 Features

### User
- Secure registration & authentication  
- Profile management  
- Avatar upload  

### Books
- CRUD operations (create, edit, delete)  
- Browse available books  
- Search by title  
- Book detail page  

### Messaging
- Inbox (one conversation per user)  
- Conversation view  
- Send messages  
- Timestamp & preview display  

---

## 🛠 Tech Stack

- PHP (OOP)  
- Custom MVC architecture  
- MySQL / MariaDB  
- PDO (prepared statements)  
- HTML5 / CSS3  
- Git / GitHub  

---

## 🧠 Skills Demonstrated

- Full-stack application development  
- MVC architecture implementation  
- Authentication handling  
- Secure database interaction (PDO)  
- Data security (XSS, SQL injection)  
- Relational database design (foreign keys)  

---

## 🏗 Project Structure


tomtroc/
│
├── public/
│ └── index.php
│
├── src/
│ ├── Controller/
│ ├── Model/
│ └── View/
│
├── config/
│ └── database.php
│
├── database.sql
└── README.md


---

## ⚙️ Installation

### 1. Clone repository

git clone https://github.com/annamarialm-creator/tomtroc.git


### 2. Setup project
Place it in your local server directory (e.g. `htdocs` with XAMPP)

### 3. Database setup
- Create a database named:

tomtroc


- Import:

database.sql


### 4. Configure DB connection
Edit:

config/database.php


### 5. Start server
Run Apache + MySQL (XAMPP)

### 6. Open project

http://localhost/tomtroc/public/


---

## 🔐 Security

- Password hashing (`password_hash`)  
- PDO prepared statements  
- XSS protection with `htmlspecialchars`  
- Data integrity with foreign keys  

---

## 👩‍💻 Author

Project developed as part of a **Full-Stack Development program**  
by **Anna Maria LOWE MANOLIS**