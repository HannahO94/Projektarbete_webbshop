<?php

require_once '../config\db.php';
require_once 'index.html';

  $sql = "SELECT * FROM products";
  $stmt = $db->prepare($sql);
  $stmt->execute();

  $games = [];

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $title = htmlspecialchars($row['title']);
    $games[] = $title;
  };
?>

