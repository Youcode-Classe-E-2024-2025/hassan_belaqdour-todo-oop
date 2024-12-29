# TaskFlow - Application de Gestion de Tâches OOP

Une application web de gestion de tâches développée en PHP orienté objet, utilisant une architecture MVC.

## 📁 Structure du Projet

```
taskflow/
├── config/
│   └── connectiondb.php     # Configuration de la base de données
├── src/
│   ├── controllers/         # Contrôleurs
│   │   ├── TaskController.php
│   │   ├── UserController.php
│   │   ├── display_tasks.php
│   │   └── display_users.php
│   ├── modules/            # Classes métier
│   │   ├── Task.php
│   │   └── User.php
│   └── views/             # Vues
│       ├── dashboard.php
│       ├── login_form.php
│       ├── sign_up.php
│       └── task_form.php
└── index.php              # Point d'entrée
```



## 🚀 Installation

### Prérequis
- XAMPP ou Laragon
- PHP 8.0 ou supérieur
- MySQL

### Étapes d'installation

1. Clonez le repository dans votre dossier www (Laragon) ou htdocs (XAMPP)
```bash
git clone https://github.com/Youcode-Classe-E-2024-2025/hassan_belaqdour-todo-oop.git
```

2. Configuration de la base de données
- Créez une base de données MySQL
- Modifiez le fichier `config/connectiondb.php` avec vos informations de connexion :
```php
$host = "localhost";
$dbname = "votre_base_de_donnees";
$username = "votre_username";
$password = "votre_password";
```

3. Importez la structure de la base de données
- Utilisez le fichier SQL fourni pour créer les tables nécessaires
- Ou exécutez les migrations si disponibles

4. Accédez à l'application
- Avec Laragon : http://taskflow.test
- Avec XAMPP : http://localhost/taskflow

## 💡 Fonctionnalités

### Gestion des Utilisateurs
- Inscription (`views/sign_up.php`)
- Connexion (`views/login_form.php`)
- Tableau de bord personnalisé (`views/dashboard.php`)

### Gestion des Tâches
- Création de tâches (`views/task_form.php`)
- Types de tâches : Standard, Bug, Feature
- Attribution aux utilisateurs
- Changement de statut

## 🔧 Architecture

### Pattern MVC
- **Models** (`src/modules/`) : Classes métier (Task, User)
- **Views** (`src/views/`) : Interface utilisateur
- **Controllers** (`src/controllers/`) : Logique de l'application

### Principes OOP
- Encapsulation
- Héritage (pour les types de tâches)
- Validation des données

## 🛠️ Développement

### Convention de Nommage
- Classes : PascalCase (ex: TaskController)
- Méthodes : camelCase
- Fichiers : snake_case

### Structure de la Base de Données

```sql
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE tasks (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    type ENUM('basic', 'bug', 'feature') NOT NULL,
    status ENUM('todo', 'doing', 'done') NOT NULL,
    assignee VARCHAR(50),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE user_tasks (
    user_id INT,
    task_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (task_id) REFERENCES tasks(id)
);
```

#### Description des Tables

1. **Table users**
   - `id`: Identifiant unique de l'utilisateur
   - `username`: Nom d'utilisateur
   - `email`: Adresse email de l'utilisateur
   - `password`: Mot de passe hashé (utilisant bcrypt)
   - `created_at`: Date et heure de création du compte

2. **Table tasks**
   - `id`: Identifiant unique de la tâche
   - `title`: Titre de la tâche
   - `type`: Type de tâche ('basic', 'bug', 'feature')
   - `status`: État de la tâche ('todo', 'doing', 'done')
   - `assignee`: Utilisateur assigné à la tâche
   - `created_at`: Date et heure de création de la tâche

3. **Table user_tasks**
   - Table de liaison pour la relation many-to-many entre users et tasks
   - `user_id`: Référence vers l'ID de l'utilisateur
   - `task_id`: Référence vers l'ID de la tâche

#### Exemple d'Utilisation

```sql

INSERT INTO users (username, email, password) 
VALUES ('username', 'email@example.com', 'hashed_password');

INSERT INTO tasks (title, type, status) 
VALUES ('basic', 'bug', 'feature');

INSERT INTO user_tasks (user_id, task_id) 
VALUES (1, 1);
```

## 📝 Todo
- [ ] Ajouter la validation des formulaires
- [ ] Implémenter la pagination des tâches
- [ ] Ajouter des filtres de recherche
- [ ] Améliorer la sécurité

## 🤝 Contribution
1. Forkez le projet
2. Créez votre branche (`git checkout -b feature/amelioration`)
3. Committez vos changements
4. Pushez vers la branche
5. Ouvrez une Pull Request

## 📫 Support
Pour toute question ou problème, ouvrez une issue sur le repository GitHub.
