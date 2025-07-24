<?php
require_once __DIR__ . '/../../../config/DatabaseConfig.php';
require_once __DIR__ . '/../../../src/Controllers/AuthController.php';

$error = '';
$success = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm-password'];
  if ($password !== $confirmPassword) {
    $error = 'Password and confirm password do not match!';
    exit();
  }
  $auth = new AuthController($pdo);
  if ($auth->register($username, $email, $password)) {
    $success = true;
    header('Location: login.php');
    exit();
  } else {
    $error = 'Username or email already exists!';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
</head>

<body>
  <div class="container">
    <h2>Register</h2>
    <?php if ($error): ?>
      <div style="color:red;"> <?= $error ?> </div>
    <?php endif; ?>
    <form action="register.php" method="post" class="form-group">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Username" class="form-control">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Email" class="form-control">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" class="form-control">
      </div>
      <div class="form-group">
        <label for="confirm-password">Confirm Password</label>
        <input type="password" name="confirm-password" placeholder="Confirm Password" class="form-control">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Register</button>
        <a href="login.php" class="btn btn-secondary">Login</a>
      </div>
    </form>
  </div>
</body>

</html>
