<?php
session_start();

// Nếu đã đăng nhập, chuyển đến dashboard
if (isset($_SESSION['user_id'])) {
  header('Location: src/Views/pages/dashboard.php');
  exit();
} else {
  header('Location: src/Views/pages/home.php');
  exit();
}


// Nếu có POST (tức là submit form login)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require_once __DIR__ . '/config/DatabaseConfig.php';
  require_once __DIR__ . '/src/Controllers/AuthController.php';

  $usernameOrEmail = isset($_POST['usernameOrEmail']) ? $_POST['usernameOrEmail'] : '';
  $password = isset($_POST['password']) ? $_POST['password'] : '';
  $auth = new AuthController($pdo);

  if ($auth->login($usernameOrEmail, $password)) {
    // Đăng nhập thành công, chuyển đến dashboard
    header('Location: src/Views/pages/dashboard.php');
    exit();
  } else {
    // Đăng nhập thất bại, quay về home
    header('Location: src/Views/pages/login.php');
    exit();
  }
} else {
  // Nếu chưa đăng nhập và chưa submit form, chuyển đến trang login
  header('Location: src/Views/auth/login.php');
  exit();
}
