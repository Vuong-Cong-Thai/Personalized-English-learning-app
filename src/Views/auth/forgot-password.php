<?php
require_once __DIR__ . '/../../../config/DatabaseConfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
</head>

<body>
  <div class="container">
    <h2>Forgot Password</h2>
    <form action="forgot-password.php" method="post" class="form-group">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Email" class="form-control">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Forgot Password</button>
        <a href="login.php" class="btn btn-secondary">Login</a>
      </div>
    </form>
  </div>
</body>

</html>
