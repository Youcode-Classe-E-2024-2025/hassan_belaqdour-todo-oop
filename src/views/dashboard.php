<?php
class DatabaseConnection
{
    private $host = 'localhost';
    private $dbname = 'flowstack';
    private $username = 'root';
    private $password = '';
    private $pdo;


    public function connect()
    {
        if ($this->pdo === null) {
            try {
                $this->pdo = new PDO(
                    "mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
                    $this->username,
                    $this->password
                );

                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {

                die("Erreur de connexion à la base de données : " . $e->getMessage());
            }
        }
        return $this->pdo;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="path/to/your/styles.css">
</head>
<body>
    <header>
        <h1>Dashboard</h1>
    </header>
    <main>
        <section>
            <h2>Welcome to your dashboard</h2>
            <p>Here you can manage your application.</p>
        </section>
        <!-- Add more sections as needed -->
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Your Company</p>
    </footer>
</body>
</html>