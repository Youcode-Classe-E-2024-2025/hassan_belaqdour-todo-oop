<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Gestionnaire de Tâches</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md my-8">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Créer un compte</h1>
            <p class="text-gray-600 mt-2">Rejoignez notre gestionnaire de tâches</p>
        </div>

        <form action="../controllers/get_users_infos.php" method="post" class="space-y-6">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="firstname" class="block text-sm font-medium text-gray-700">Prénom</label>
                    <input type="text" id="firstname" name="firstname" required 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label for="lastname" class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" id="lastname" name="lastname" required 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" required 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input type="password" id="password" name="password" required 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                <input type="password" id="confirm-password" name="confirm-password" required 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="flex items-center">
                <input type="checkbox" id="terms" name="terms" required
                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                <label for="terms" class="ml-2 block text-sm text-gray-700">
                    J'accepte les <a href="#" class="text-indigo-600 hover:text-indigo-500">conditions d'utilisation</a>
                </label>
            </div>

            <div>
                <button name="btn_sign_up" value="submit" type="submit" 
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    S'inscrire
                </button>
            </div>
        </form>

        <div class="mt-6 text-center text-sm">
            <span class="text-gray-600">Déjà un compte?</span>
            <a href="login _form.php" class="font-medium text-indigo-600 hover:text-indigo-500">
                Se connecter
            </a>
        </div>
    </div>
</body>
</html>