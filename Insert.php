<?php

require_once 'dbConfig.php';
 
$query = "INSERT INTO CUSTOMER (ID, Forename, Surname, Email, Phone)
          VALUES (NULL, 'Shrihaan', 'Patel', 'Shrihaanpatel16@gmail.com', '441123445678')";
$db_connection->prepare($query);
try{
if  ($db_connection->exec($query)){
        echo "You have successfully made a new entry";
}   else {
        echo "Failed to update";
} }
catch(PDOException $e){
   header('Location: ErrorPage.php');
   exit();
}


$db_connection = NULL;


