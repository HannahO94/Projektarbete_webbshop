<?php
require_once "../header_extern.php";
require_once "send-order.php";

//HÄMTA KUNDUPPGIFTER FRÅN DATABASEN 
//ELLER är det bättre att hämta från formuläret med eventlistener? (Se filen show-order-details.js)

// Hämta orderid (hur då??)
//$id = htmlspecialchars($_GET['id']);

// Hämtar alla kolumner från tabellen "webshop_orders" i db
// $stmt = $db->prepare("SELECT * FROM `webshop_orders` ORDER BY `webshop_orders`.`orderid` DESC "
//                    );
// // $stmt->bindParam(':orderid', $id);
// $stmt->execute();

// echo "<div class='product-info'>";

// // Hämtar raderna som finns i varje kolumn
// $row = $stmt->fetch(PDO::FETCH_ASSOC);

// $orderid = htmlspecialchars($row['orderid']);
// $orderdate = htmlspecialchars($row['orderdate']);
// $name = htmlspecialchars($row['name']);
// $email = htmlspecialchars($row['email']);
// $phone = htmlspecialchars($row['phone']);
// $street = htmlspecialchars($row['street']);
// $zip = htmlspecialchars($row['zip']);
// $city = htmlspecialchars($row['city']);
// $products = json_decode($row['products']);

// print_r($products); 


?>


<h1>Orderbekräftelse</h1>
<br>

<section>
  <h2>Din beställning</h2>
  <br>
  <!--Här kanske vi hellre vill rita ut ordernr, datum och totalpris som en tabell?
Likt den för produkterna? -->
  <h3>Ditt ordernummer: </h3>
  <br>
  <h3>Beställningsdatum: </h3>
  <br>
  <h3 id="order-total-price"></h3>
  <br>
  <table>
    <thead>
      <th>Produkt</th>
      <th>Antal</th>
      <th>Pris</th>
    </thead>
    <tbody id="ordered-products" class="">
      <!--här hämtas beställda produkter från localstorage 
    och ritas ut med hjälp av funktionen drawOrderedProducts()-->
    </tbody>
  </table>

  <br>
</section>

<section id="contact">
<h2>Dina kontaktuppgifter</h2>
<table>
    <thead>
      <th>Namn</th>
      <th>Email</th>
      <th>Telefonnummer</th>
      <th>Adress</th>
      <th>Postnummer</th>
      <th>Postort</th>
    </thead>
    <tbody id="contact-container" class="">
      <!--här hämtas beställda produkter från localstorage 
    och ritas ut med hjälp av funktionen drawOrderedProducts()-->
    </tbody>
  </table>
  

  <br>
  <!--här hämtas kund/kontaktdetaljer från orderformuläret-->
  <div id="customer-details"></div>
</section>


<?php
require_once "../footer.php"
?>