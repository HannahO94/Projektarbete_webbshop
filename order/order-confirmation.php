<?php
require_once "../second_header_extern.php";
require_once "send-order.php";
?>
</header>

<?php 

//HÄMTA ORDERINFO FRÅN DATABASEN (hämtar bara senaste beställningen baserat på orderid)
$sql = "SELECT * FROM webshop_orders ORDER BY orderid DESC LIMIT 1";
$stmt = $db->prepare($sql);
$stmt->execute();

//Skapa tabellhuvud med rubriker
$orderedProducts;
$table = "<table class='table_orders>
            <tbody>
               <tr class='table_orders-row'>
                  <th class='table_orders-head'>Orderid</th>
                  <th class='table_orders-head'>Orderdatum</th>
                  <th class='table_orders-head'>Kunduppgifter</th>
                  <th class='table_orders-head'>Produkter</th>
                  <th class='table_orders-head'>Summa</th>
               </tr>";


//För varje orderrad i databasen - hämta all orderinfo och spar ner i variabler
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $orderId = htmlspecialchars($row['orderid']);
  $orderDate = htmlspecialchars($row['orderdate']);
  $orderDate = substr($orderDate, 0, 10); //Hämtar de 10 första tecknen = bara datumet, utan tidsangivelsen)
  $totalPrice = htmlspecialchars($row['totalprice']);
  $name = htmlspecialchars($row['name']);
  $email = htmlspecialchars($row['email']);
  $phone = htmlspecialchars($row['phone']);
  $street = htmlspecialchars($row['street']);
  $zip = htmlspecialchars($row['zip']);
  $city = htmlspecialchars($row['city']);
  $products = json_decode($row['products'], true);

  //Hämta värden från produktarrayen för att kunna skriva ut dem i orderbekräftelsen
  $orderedProducts = ""; //fylls på med titel, antal och pris för varje produkt
  foreach ($products as $key => $value) {
    // print_r($value);
    foreach ($value as $ky => $val) {
      if ($ky == "title") {
        $orderedProducts .= $val;
      }
      if ($ky == "cartQty") {
        $orderedProducts .= $val . "st ";
      }
      if ($ky == "price") {
        $orderedProducts .= " pris " . $val;
      }
    }
    $orderedProducts .= "<br>";
  }

  //Uppdatera lagersaldot i databasen 
  require_once "update-quantity.php";


  //Skapa en tabell med orderdetaljerna som hämtats från databasen
  $table .= "
        <tr class='table_orders-row'>
            <td class='table_orders-cell'> $orderId</td>
            <td class='table_orders-cell'> $orderDate</td>
            <td class='table_orders-cell' style='width: 20%'>
                $name <br> 
                $email <br> 
                $phone <br> 
                $street, $zip $city
            </td>
            <td class='table_orders-cell products' style='width: 20%'> $orderedProducts </td>
            <td class='table_orders-cell'> $totalPrice kr</td>
        </tr>";
}

$table .= "</tbody></table>";
?>

<section class="order-confirmation-page">
<h1>Orderbekräftelse</h1>
<br>
<br>
<h2>Tack för din beställning!</h2>
<br>
<section class='table_container'>
  <!-- här skrivs tabellen ut med all orderinfo -->
  <?php echo $table ?>
</section>
<br><br>
<button id="print-order-btn">Skriv ut orderbekräftelsen</button>
</section>
</main>
<?php

require_once "../footer.php"
?>