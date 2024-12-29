
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<main class="container">
        <section id="new-task-form" class="section" >
            <h2>Nouvelle Tâche</h2>
            <form action="../controllers/TaskController.php" method="post" id="task-form">
                <div class="form-group">
                    <label for="task-title">Titre</label>
                    <input type="text" id="task-title" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="task-type">Type</label>
                    <select id="task-type" name="type" class="form-control" required>
                        <option value="basic">Tâche basique</option>
                        <option value="bug">Bug</option>
                        <option value="feature">Feature</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="task-assignee">Assigné à</label>
                    <select id="task-assignee" name="assignee" class="form-control" name="assignee" >
                    <option value="">Sélectionner un utilisateur</option>
                    <?php include_once "../controllers/display_users.php"; ?>
                    </select>
                </div>
                <button type="submit" name="btn_task" value="submit" class="btn btn-primary">Créer</button>
            </form>
        </section>
        </main>
        <script>

         
        document.querySelectorAll('nav a').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const sections = document.querySelectorAll('.section');
                sections.forEach(section => section.style.display = 'none');

                switch(e.target.id) {
                    case 'nav-new-task':
                        document.getElementById('new-task-form').style.display = 'block';
                        break;
                    case 'nav-my-tasks':
                    case 'nav-tasks':
                    default:
                        document.getElementById('tasks-list').style.display = 'block';
                        refreshTasksList();
                        break;
                }
            });
        });

       


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