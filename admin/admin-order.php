<?php
 require_once "header.php";
 require_once "../config/db.php";

$sql = $sql = "SELECT
O.orderid    AS Ordernummer,
O.name  AS Kund,
O.street AS Gata,
O.zip  AS Postnummer,
O.city AS Ort,
Q.quatity AS Antal,
Q.orderid AS Orderid,
Q.productid AS Produktid,
P.productid AS Productid,
P.title AS Spelnamn,
P.price AS Pris
FROM
webshop_orderinfo    AS O,
webshop_orderproducts AS Q,
webshop_products    AS P
WHERE
O.orderid = Q.orderid 
AND 
Q.productid = P.productid";

$stmt = $db->prepare($sql);
$stmt->execute();



$table = "<table><tr><th>Orderid</th><th>Namn</th><th>Spelnamn</th><th>Antal</th><th>Pris</th></tr>";

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $orderid = htmlspecialchars($row['Ordernummer']);
    $name = htmlspecialchars($row['Kund']);
    $qty = htmlspecialchars($row['Antal']);
    $game = htmlspecialchars($row['Spelnamn']);
    $price = htmlspecialchars($row['Pris']);
    $table .= "<tr><td> $orderid </td><td> $name </td><td> $game </td><td> $qty </td><td> $price </td></tr>";
   

    

  
}
$table .= "</table>";

echo $table;


//den här sql:n selectar endast de produkter som har samma produktid som de beställda produkternna. 
//SELECT * FROM `webshop_orderproducts` LEFT JOIN webshop_products ON webshop_orderproducts.productid = webshop_products.productid 
// den här sqlen hämtar all order info + alla beställda produkter(endast id på produkterna). 
//SELECT * FROM `webshop_orderinfo` LEFT JOIN webshop_orderproducts ON webshop_orderinfo.orderid = webshop_orderproducts.orderid 