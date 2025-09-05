<?php
//  Exemple pédagogique — vulnérable (NE PAS UTILISER EN PROD)
$user = $_POST['username'] ?? '';
$pass = $_POST['password'] ?? '';
$pdo  = new PDO("mysql:host=localhost;dbname=app;charset=utf8mb4", "root", "nokia");

$sql = "SELECT id FROM users WHERE username = '$user' AND password = '$pass'";
// Injection possible: ex: username = admin' --
$ok  = $pdo->query($sql)->fetch();
echo $ok ? "Connecté (vulnérable)" : "Échec";
