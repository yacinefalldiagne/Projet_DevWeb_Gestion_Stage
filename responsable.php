<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'responsable') {
    header('Location: login.php?role=responsable');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Responsable de Stage</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h5>Bienvenue, <?php echo htmlspecialchars($_SESSION['user']['username']); ?></h5>
    </header>
    <main>
        <h2>Responsable de Stage</h2>
        <p>Contenu spécifique pour le responsable de stage.</p>
    </main>
    <footer>
        <p>&copy; 2024 École Supérieure Polytechnique</p>
    </footer>
</body>
</html>
