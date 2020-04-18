<?php
require_once "config/db.php";

$stmt = $db->prepare("SELECT `categoryid`, `category`
                      FROM `webshop_categories`");
$stmt->execute();

$option_value = "";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $categoryid = htmlspecialchars($row['categoryid']);
  $category = htmlspecialchars($row['category']);
  $option_value .=  "<a href='/categorypage/categorypage.php?id=" . $categoryid . "'>" . $category . "</a>";
  $categories = strtoupper($option_value);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=
    , initial-scale=1.0">
  <!--här gissar jag att CSS för webb - extern ska hamna-->
  <link rel="stylesheet" type="text/css" href="styles/main.css" />
  <link rel="stylesheet" type="text/css" href="../styles/main.css" />
  <title>Spelshoppen</title>
</head>

<body>
  <header class="header__hero">

    <div class="menu-wraper">

<div class="menu-wraper">
      
       <!--- <div class="menu-wraper__logo-wrap">
        <img src="" alt="Logo" />
      </div>-->

      <nav class="menu_nav">
      <label for="hamburger" class="label_hamburger">&#9776;</label>
      <input type="checkbox" class="hamburger" >

        <ul class="menu-wraper__link-list">
          <li class="menu-wraper__link-item">
            <a class="menu-wraper__links" href="/index.php">HEM</a>
          </li>
          <li class="menu-wraper__link-item">
            <div class="dropdown">
              <a class="menu-wraper__links" id="dropdown-categories" href="#">KATEGORIER</a>
                <div class="dropdown-content">
                  <?php 
                  echo "$categories";
                  ?>
                </div>
            </div>
          </li>
          <li class="menu-wraper__link-item">
            <a class="menu-wraper__links" href="">KONTAKT</a>
          </li>
          <li class="menu-wraper__link-item">
            <a class="menu-wraper__links" href="/search/index.php">SÖK</a>
          </li>
          <li class="menu-wraper__link-item">
            <a class="menu-wraper__links" href="/admin/index.php">ADMIN</a>
          </li>
        </ul>
      </nav>
    </div>

  </header>

  <main>