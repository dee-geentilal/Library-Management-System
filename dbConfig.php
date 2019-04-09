<?php



$db_host = "localhost";
$db_name = "LibraryV2";
$db_username = "root";
$db_password = "";

$dsn = "mysql:host=$db_host; dbname=$db_name";

//Try and catch, to catch the PDO if there is an error 
//connecting with database
try {
$db_connection = new PDO($dsn, $db_username, $db_password);
}
catch(PDOException $e) {
    echo "There was a failure connecting with the database. 
         Please check your connection and try again." . $e->getMessage();
          
}

$db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
