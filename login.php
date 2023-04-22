<?php
 $email = $_POST['email'];
 $senha = $_POST['senha'];


$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=sistemaweb_bd", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
  $stmt = $conn->prepare("SELECT codigo FROM usuario WHERE email=:email AND senha=md5 (:senha)");
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':senha', $senha);
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  print_r(|$result)
}
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
$conn = null;




?>