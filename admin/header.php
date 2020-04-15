<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<div class="admin-top">Admin</div>
<nav><ul>
    <!-- Ska sätta css display none i den inre listan som togglas men hjälp av javascript? -->
        <li><a href="admin-home.php">ADMIN<a></li>
            <ul id="hide-sub-list" style="display: none;"> 
                <li>Kategorier</li>
                <li><a href="admin-add-products.php">Produkter</a></li>
                <li>Beställningar</li>
            </ul>
        </li>
        <li>WEBBSHOPPEN</li>
    </ul>
</nav>
