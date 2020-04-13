<?php

//Säkerställer att fel visas under utvecklingsskedet
//OBS! Ta bort innan webbsidan går live
ini_set('display_errors', '1');
error_reporting(E_ALL);

//Uppgifter om databasen
$db_server = "localhost"; //mysql:host (se new PDO i try-catch-satsen) är nästan alltid localhost (90% av fallen)
$db_database = "webshop";
$db_username = "root";
$db_password = ""; // password för XAMPP = ""
//$db_password = "root" //password för MAMP = "root"

//Skapar ny uppkoppling mot databasen, eller visar felmeddelande vid ev. fel
try {
  $db = new PDO("mysql:host=$db_server;dbname=$db_database;charset=utf8", $db_username, $db_password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDO är ett objekt. 
  echo "<h2>Connected successfully</h2>";
} catch (PDOException $e) {
  echo "<h2>Error: " . $e->getMessage() . "</h2>";
}
