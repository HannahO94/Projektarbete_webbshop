<?php
require_once "header.php";
require_once "../config/db.php";
?>
<h2 class="orders-head">Beställningar</h2>
<?php
// $sql = $sql = "SELECT
// O.orderid    AS Ordernummer,
// O.name  AS Kund,
// O.street AS Gata,
// O.zip  AS Postnummer,
// O.city AS Ort,
// Q.quantity AS Antal,
// Q.orderid AS Orderid,
// Q.productid AS Produktid,
// P.productid AS Productid,
// P.title AS Spelnamn,
// P.price AS Pris
// FROM
// webshop_orders    AS O,
// webshop_orderproducts AS Q,
// webshop_products    AS P
// WHERE
// O.orderid = Q.orderid 
// AND 
// Q.productid = P.productid";

$sql = "SELECT * FROM webshop_orders";

$stmt = $db->prepare($sql);
$stmt->execute();

$productsspec;
$table = "<section class='table_container'>
            <table class='table_orders>
                <tbody>
                    <tr class='table_orders-row'>
                        <th class='table_orders-head'>Orderid</th>
                        <th class='table_orders-head'>Namn</th>
                        <th class='table_orders-head'>Email</th>
                        <th class='table_orders-head'>Telefon</th>
                        <th class='table_orders-head'>Adress</th>
                        <th class='table_orders-head'>Postnummer</th>
                        <th class='table_orders-head'>Ort</th>
                        <th class='table_orders-head'>Produkter</th>
                        <th class='table_orders-head'>Ordersumma</th>
                        <th class='table_orders-head'>Status</th>
                        <th class='table_orders-head'>Ändra status</th>
                    </tr>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $orderid = htmlspecialchars($row['orderid']);
    $date = htmlspecialchars($row['orderdate']);
    $name = htmlspecialchars($row['name']);
    $email = htmlspecialchars($row['email']);
    $phone = htmlspecialchars($row['phone']);
    $street = htmlspecialchars($row['street']);
    $zip = htmlspecialchars($row['zip']);
    $city = htmlspecialchars($row['city']);
    $status = htmlspecialchars($row['status']);
    $products = json_decode($row['products'], true);
    $totalprice = htmlspecialchars($row['totalprice']);
    // print_r($products);
    // $length = count($row);
    // for ($i=0; $i < count($row); $i++) { 
    //     print_r($products[$i]);
    // }
    $productsspec = "";
    foreach ($products as $key => $value) {
        // print_r($value);
        foreach ($value as $ky => $val) {
            if ($ky == "title") {
                $productsspec .= $val;
            }
            if ($ky == "cartQty") {
                $productsspec .= $val . "st ";
            }
            // if ($ky == "outletprice"){
            //     $productsspec .= " reapris " . $val;
            // }
            if ($ky == "price") {
                $productsspec .= " pris " . $val;
            }
        }
        $productsspec .= "<br>";
    }

    // echo $productsspec . "<br>";
    // $keys = array_keys($products);

    // for($i = 0; $i < count($products); $i++) {

    //     echo $keys[$i] . "{<br>";

    //     // foreach($superheroes[$keys[$i]] as $key => $value) {

    //     //     echo $key . " : " . $value . "<br>";

    //     // }

    //     echo "}<br>";

    // }

    //Kontrollerar vilken status-siffra beställningen har i databasen,
    //för att skriva ut rätt statustext på sidan
    if ($status == 1) {
        $status = "Ny";
    } elseif ($status == 2) {
        $status = "Behandlas";
    } elseif ($status == 3) {
        $status = "Slutförd";
    }

    $table .= "
        <tr class='table_orders-row'>
            <td class='table_orders-cell'> $orderid</td>
            <td class='table_orders-cell'> $name </td>
            <td class='table_orders-cell'> $email </td>
            <td class='table_orders-cell'> $phone </td>
            <td class='table_orders-cell'> $street </td>
            <td class='table_orders-cell'> $zip </td>
            <td class='table_orders-cell'> $city </td>
            <td class='table_orders-cell products'> $productsspec </td>
            <td class='table_orders-cell'> $totalprice kr</td>
            <td class='table_orders-cell'> $status </td>
            <td class='table_orders-cell'><button class='btn_update-status'><a href='admin-update-status.php?id=$orderid'>Uppdatera</a></button>

        </tr>";
}

$table .= "</tbody></table></section>";

// foreach ($products as $key => $array) {
//     foreach ($array as $key => $value) {
//         if ($key == "title"){
//         echo "<p>$value</p>";
//     }
//     else if ($key == "cartQty"){
//         echo "<p>$value</p>";

//     }
//     }
// }

echo $table;



//den här sql:n selectar endast de produkter som har samma produktid som de beställda produkternna. 
//SELECT * FROM `webshop_orderproducts` LEFT JOIN webshop_products ON webshop_orderproducts.productid = webshop_products.productid 
// den här sqlen hämtar all order info + alla beställda produkter(endast id på produkterna). 
//SELECT * FROM `webshop_orderinfo` LEFT JOIN webshop_orderproducts ON webshop_orderinfo.orderid = webshop_orderproducts.orderid 
