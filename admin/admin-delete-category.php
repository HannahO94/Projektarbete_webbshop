<?php
require_once '../config/db.php';


if(isset($_GET['id'])){
    
    $id = htmlspecialchars($_GET['id']);

    $sql = "DELETE FROM webshop_categories WHERE categoryid = :id";
    $stmn = $db->prepare($sql);
    $stmn->bindParam(':id', $id);
    $stmn->execute();
    header('Location:admin-category.php');
   
    }
    