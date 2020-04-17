<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/main.css" />
    <link rel="stylesheet" type="text/css" href="../styles/main.css" />
    <title>Adminpanelen</title>
</head>

<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="index.php">Admin - Hem</a>
  <a href="admin-category.php">Kategorier</a>
  <a href="admin-products.php">Produkter</a>
  <a href="#">Beställningar</a>
  <a href="../index.php">WEBBSHOPPEN</a>
</div>

<button id="toggle-menu" onclick="openNav()">Meny</button>


    <!-- <div class="btn-wraper">
        <button id="toggle-menu">Meny</button>
    </div>

    <div id="admin-menu-wraper" class="hide admin-menu-wraper">
        <nav>
            <ul class="admin-menu-wraper__link-list"> 
                <li class="admin-menu-wraper__link"><a href="index.php">Admin - Hem</a></li>
                <li class="admin-menu-wraper__link"><a href="admin-category.php">Kategorier</a></li>
                <li class="admin-menu-wraper__link"><a href="admin-products.php">Produkter</a></li>
                <li class="admin-menu-wraper__link"><a href="">Beställningar</a></li>
                <li class="admin-menu-wraper__link web"><a href="../index.php">WEBBSHOPPEN</a></li>
            </ul>
        </nav>
    </div> -->
    
    <main>
        <!-- Ska denna section vara här? -->
        <section class="admin_container">
    </main>

<script>

/* Set the width of the side navigation to 250px */
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

// let toggleMenuBtn = document.querySelector("#toggle-menu");
// let menu = document.querySelector("#admin-menu-wraper");

// toggleMenuBtn.addEventListener('click', function(event) {
//   if (menu.classList.contains('hide')) {
//     menu.classList.remove('hide')
//     toggleMenuBtn.textContent = 'Göm meny'
//   } else {
//     menu.classList.add('hide')
//     toggleMenuBtn.textContent = 'Meny'
//   }
// })

</script>
        

