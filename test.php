<?php

session_start();
require 'config.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $role = $_POST['role'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND role = ?");
    $stmt->execute([$username, $role]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header("Location: {$role}.php");
        exit;
    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
    <link rel="stylesheet" href="test.css">
</head>
<body>
    <div class="container">
        <img src="image/log.png" class="three-image" alt="Logo">
        <h1>Welcome</h1>
        <form action="" method="POST">
        <img src="image/etudiant.png" class="right-image" alt="Etudiant">
            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="responsable">Responsable de Stage</option>
                    <option value="maitre">Maitre de Stage</option>
                    <option value="etudiant">Étudiant</option>
                </select>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <a href="#">Forgot Password?</a>
            <br>
            <button type="submit">Login</button>
            
        </form>
        <?php if (!empty($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
