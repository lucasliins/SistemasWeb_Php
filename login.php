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
  $stmt = $conn->prepare("SELECT FROM usuario WHERE lastname='Doe'");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }
}
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
$conn = null;




?>