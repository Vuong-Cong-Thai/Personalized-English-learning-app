<?php
// Khai báo thông tin kết nối đến cơ sở dữ liệu MySQL
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'english_app';
$port = 3306;
$charset = 'utf8mb4';

// Tạo chuỗi DSN (Data Source Name) để kết nối PDO với MySQL
$dsn = "mysql:host=$host;dbname=$database;charset=$charset";

// Thiết lập các tuỳ chọn cho PDO
$options = [
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Báo lỗi dưới dạng exception
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Kết quả trả về dạng mảng kết hợp
  PDO::ATTR_EMULATE_PREPARES   => false, // Tắt chế độ giả lập prepared statements để tăng bảo mật
];

try {
  // Tạo đối tượng PDO để kết nối đến cơ sở dữ liệu
  $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
  // Nếu có lỗi khi kết nối, ném ra ngoại lệ với thông báo lỗi
  throw new PDOException($e->getMessage(), (int)$e->getCode());
}
