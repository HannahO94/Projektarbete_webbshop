<?php

require_once '../config\db.php';
//require_once 'index.html';

  $sql = "SELECT * FROM webshop_products";
  $stmt = $db->prepare($sql);
  $stmt->execute();

  $games = [];

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
   // print_r($row);
    $games[] = htmlspecialchars($row['title']);
    $games[] = htmlspecialchars($row['description']);
 
  };
 // print_r($games);

  echo json_encode($games);
?>

