<?php
 require_once "header.php";
 require_once "../config/db.php";

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
$table = "<table><tr><th>Orderid</th><th>Namn</th><th>Email</th><th>Telefon</th><th>Adress</th><th>Postnummer</th><th>Ort</th><th>Status</th><th>Produkter</tr>";

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
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
    print_r($products);
    // $length = count($row);
    // for ($i=0; $i < $row.$length; $i++) { 
    //     print_r($products[$i]);
    // }
    // if (is_array($products) || is_object($products)){
    // foreach ($products as $key => $value) {
    //     $productsspec .= $key.$value;
    // }
// };
    
    $table .= "<tr><td> $orderid </td><td> $name </td><td> $email </td><td> $phone </td><td> $street </td><td> $zip </td><td> $city </td><td> $status </td><td> </td></tr>";
   

    

  
}

$table .= "</table>";

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