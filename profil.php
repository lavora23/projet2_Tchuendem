<?php
require_once 'database.php';
require_once 'user.php';

$db = new Database();
$user = new User($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $loggedInUser = $user->login($username, $password);

    if ($loggedInUser) {
        // Authentification réussie, redirigez vers la page d'accueil ou autre
        header("Location: home.php");
        exit();
    } else {
        // Authentification échouée, redirigez vers la page de login avec un message d'erreur
        header("Location: login_form.php?error=1");
        exit();
    }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login_process.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
