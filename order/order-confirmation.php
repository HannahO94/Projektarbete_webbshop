<?php
require_once "../second_header_extern.php";
require_once "send-order.php";

//HÄMTA ORDERINFO FRÅN DATABASEN (hämtar bara senaste beställningen baserat på orderid)
//Obs. Den här sql-satsen kan vi använda även för att skriva ut övriga uppgifter (som vi nu skriver ut med javascript från localstorage)
$sql = "SELECT * FROM webshop_orders ORDER BY orderid DESC LIMIT 1";
$stmt = $db->prepare($sql);
$stmt->execute();

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

  $orderedProducts = "";
  foreach ($products as $key => $value) {
    // print_r($value);
    foreach ($value as $ky => $val) {
      if ($ky == "title") {
        $orderedProducts .= $val;
      }
      if ($ky == "cartQty") {
        $orderedProducts .= $val . "st ";
      }
      // if ($ky == "outletprice"){
      //     $orderedProducts .= " reapris " . $val;
      // }
      if ($ky == "price") {
        $orderedProducts .= " pris " . $val;
      }
    }
    $orderedProducts .= "<br>";
  }

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


<h1>Orderbekräftelse</h1>
<br>
<h2>Alternativ 1 - skriv ut med PHP/hämta från databasen</h2>

<br>
<section class='table_container'> <?php echo $table ?></section>
<br><br><br>


<!--Koden nedan hör ihop med show-order-details.js-->
<h2>Alternativ 2 - skriv ut med javascript/hämta från localstorage</h2>
<br><br>
<!--Här kanske vi hellre vill rita ut ordernr, datum och totalpris som en tabell?
Likt den för produkterna? -->
<h3>Ditt ordernummer: <?php echo $orderId ?></h3>
<br>
<h3>Beställningsdatum: <?php echo $orderDate ?></h3>
<br>
<h3 id="order-total-price">Ordersumma: <?php echo $totalPrice ?> kr</h3>
<br><br>

<h2>Dina produkter</h2>
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

<br><br>
</section>

<section id="contact">
  <h2>Dina kontaktuppgifter</h2>
  <table>
    <thead>
      <th>Namn</th>
      <th>Email</th>
      <th>Telefon</th>
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