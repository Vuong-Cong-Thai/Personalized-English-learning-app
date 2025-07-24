<?php
require_once __DIR__ . '/../Models/User.php';
session_start();

class AuthController
{
  // Khai báo thuộc tính $userModel để lưu trữ đối tượng User.
  private $userModel;

  // Hàm khởi tạo nhận vào đối tượng PDO (kết nối CSDL) và tạo mới đối tượng User để thao tác với bảng users.
  public function __construct($pdo)
  {
    $this->userModel = new User($pdo);
  }

  public function login($usernameOrEmail, $password)
  {
    $user = $this->userModel->verifyPassword($usernameOrEmail, $password);
    if ($user) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['email'] = $user['email'];
      return true;
    }
    return false;
  }

  public function register($username, $email, $password)
  {
    if ($this->userModel->findByUsername($username) || $this->userModel->findByEmail($email)) {
      return false; // User exists
    }
    return $this->userModel->create($username, $email, $password);
  }

  public function forgotPassword($email)
  {
    $user = $this->userModel->findByEmail($email);
    if ($user) {
      // Ở đây chỉ trả về true giả lập, thực tế nên gửi email reset
      return true;
    }
    return false;
  }

  public function logout()
  {
    session_unset();
    session_destroy();
  }
}
