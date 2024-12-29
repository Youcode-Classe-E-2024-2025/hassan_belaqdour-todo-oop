<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (empty($_SESSION)){
    header('location: ../../views/login_form.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow - Gestion de Tâches</title>
    <style>
        /* Reset et styles de base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            background-color: #f4f6f8;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header */
        header {
            background-color: #2c3e50;
            color: white;
            padding: 1rem;
        }

        nav {
            background-color: #34495e;
            padding: 0.5rem;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            margin-right: 1rem;
        }

        nav a:hover {
            background-color: #445566;
        }

        /* Tableaux */
        .task-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .task-table th, .task-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .task-table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        /* Formulaires */
        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn-primary {
            background-color: #3498db;
            color: white;
        }

        .btn-danger {
            background-color: #e74c3c;
            color: white;
        }

        /* Status badges */
        .status-badge {
            padding: 0.25rem 0.5rem;
            border-radius: 3px;
            font-size: 0.875rem;
        }

        .status-todo {
            background-color: #f39c12;
            color: white;
        }

        .status-in-progress {
            background-color: #3498db;
            color: white;
        }

        .status-done {
            background-color: #2ecc71;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>TaskFlow</h1>
        </div>
    </header>

    <nav>
        <div class="container">
            <a href="#" id="nav-tasks">Tâches</a>
            <a href="../../src/views/task_form.php" id="nav-new-task">Nouvelle Tâche</a>
        </div>
    </nav>

    <main class="container">
        <!-- Liste des tâches -->
        <section id="tasks-list" class="section">
            <h2>Liste des Tâches</h2>
            <table class="task-table">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Type</th>
                        <th>Statut</th>
                        <th>Assigné à</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                    <?php require_once "../controllers/display_tasks.php"; ?>
                    
            </table>
        </section>
    </main>

    <script>
       


        // Rafraîchir la liste des tâches
        function refreshTasksList() {

            const tbody = document.getElementById('tasks-table-body');
            tbody.innerHTML = '';

            taskManager.tasks.forEach(task => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${task.title}</td>
                    <td>${task.type || 'basic'}</td>
                    <td><span class="status-badge status-${task.status}">${task.status}</span></td>
                    <td>${task.assignee}</td>
                    <td>
                        <select onchange="updateStatus('${task.id}', this.value)">
                            <option value="todo" ${task.status === 'todo' ? 'selected' : ''}>À faire</option>
                            <option value="in-progress" ${task.status === 'in-progress' ? 'selected' : ''}>En cours</option>
                            <option value="done" ${task.status === 'done' ? 'selected' : ''}>Terminé</option>
                        </select>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        // Mettre à jour le statut d'une tâche
        function updateStatus(taskId, newStatus) {
            taskManager.updateTaskStatus(taskId, newStatus);
            refreshTasksList();
        }

        // Charger la liste initiale
        refreshTasksList();
    </script>
</body>
</html>