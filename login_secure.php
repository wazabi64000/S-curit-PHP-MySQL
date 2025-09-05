<?php
//  Version protégée (exemple)
$user = $_POST['username'] ?? '';
$pass = $_POST['password'] ?? '';
$pdo  = new PDO("mysql:host=localhost;dbname=app;charset=utf8mb4", "root", "nokia", [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false
]);

$stmt = $pdo->prepare("SELECT id, password_hash FROM users WHERE username = :u");
$stmt->execute([':u' => $user]);
$row = $stmt->fetch();
if ($row && password_verify($pass, $row['password_hash'])) {
  session_start();
  session_regenerate_id(true);
  setcookie(session_name(), session_id(), ['httponly'=>true, 'secure'=>isset($_SERVER['HTTPS'])]);
  echo "Connecté (sécurisé)";
} else {
  echo "Échec";
}
