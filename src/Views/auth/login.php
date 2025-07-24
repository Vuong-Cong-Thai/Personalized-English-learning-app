<?php
require_once __DIR__ . '/../../../config/DatabaseConfig.php';
require_once __DIR__ . '/../../../src/Controllers/AuthController.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $usernameOrEmail = isset($_POST['usernameOrEmail']) ? $_POST['usernameOrEmail'] : '';
  $password = isset($_POST['password']) ? $_POST['password'] : '';
  $auth = new AuthController($pdo);
  if ($auth->login($usernameOrEmail, $password)) {
    header('Location: ../pages/dashboard.php');
    exit();
  } else {
    $error = 'Invalid username/email or password!';
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
  <div class="container">
    <h2>Login</h2>
    <?php if ($error): ?>
      <div style="color:red;"> <?= $error ?> </div>
    <?php endif; ?>
    <form action="login.php" method="post" class="form-group">
      <div class="form-group">
        <label for="usernameOrEmail">Username or Email</label>
        <input type="text" name="usernameOrEmail" placeholder="Username or Email" class="form-control">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" class="form-control">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
      <div class="form-group">
        <a href="register.php" class="btn btn-secondary">Register</a>
        <a href="forgot-password.php" class="btn btn-secondary">Forgot Password</a>
      </div>
    </form>
  </div>
</body>

</html>
