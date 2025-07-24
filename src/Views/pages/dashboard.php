<?php
require_once __DIR__ . '/../../../src/Controllers/AuthController.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $auth = new AuthController($pdo);
  $auth->logout();
  header('Location: ../pages/home.php');
  exit();
}
?>

<div class="logout">
  <form action="" method="post" style="display:inline;">
    <button type="submit" class="btn btn-danger">Log out</button>
  </form>
</div>
