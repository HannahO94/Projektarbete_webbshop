<?php 
require_once "config/db.php";

$stmt = $db->prepare("SELECT `categoryid`, `category`
                      FROM `webshop_categories`");
$stmt->execute();

$option_value = "";
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
  $categoryid = htmlspecialchars($row['categoryid']);
  $category = htmlspecialchars($row['category']);
  $option_value .=  "<a href='/Projektarbete_webbshop/categorypage/categorypage.php?id=" . $categoryid . "'>" . $category ."</a>";
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
<header>

<div class="menu-wraper">
      
        <div class="menu-wraper__logo-wrap">
        <img src="" alt="Logo" />
      </div>
      <nav>
        <ul class="menu-wraper__link-list">
          <li>
            <a class="menu-wraper__links" href="index.php">HEM</a>
          </li>
          <li>
            <div class="dropdown">
              <a class="menu-wraper__links" id="dropdown-categories" href="/index.php">KATEGORIER</a>
                <div class="dropdown-content">
                  <?php 
                  // foreach ($category as $value)
                  echo "$option_value";
                  ?>
                  <!-- <a href="">Familjespel</a>
                  <a href="">Barnspel</a>
                  <a href="">Strategispel</a>
                  <a href="">Partyspel</a> -->
                </div>
            </div>
          </li>
          <li>
            <a class="menu-wraper__links" href="">KONTAKT</a>
          </li>
          <li>
            <a class="menu-wraper__links" href="/search/index.php">SÖK</a>
          </li>
          <li>
            <a class="menu-wraper__links" href="/admin/index.php">ADMIN</a>
          </li>
        </ul>
      </nav>
    </div>
    
    </header>