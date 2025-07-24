<?php
require_once __DIR__ . '/../../config/DatabaseConfig.php';

class User
{
  private $pdo;
  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }

  public function findByUsername($username)
  {
    $stmt = $this->pdo->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute([$username]);
    return $stmt->fetch();
  }

  public function findByEmail($email)
  {
    $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    return $stmt->fetch();
  }

  public function create($username, $email, $password)
  {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $this->pdo->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
    return $stmt->execute([$username, $email, $hash]);
  }

  public function verifyPassword($usernameOrEmail, $password)
  {
    if (filter_var($usernameOrEmail, FILTER_VALIDATE_EMAIL)) {
      $user = $this->findByEmail($usernameOrEmail);
    } else {
      $user = $this->findByUsername($usernameOrEmail);
    }
    if ($user && password_verify($password, $user['password'])) {
      return $user;
    }
    return false;
  }
}
