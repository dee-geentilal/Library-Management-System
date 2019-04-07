<?php

require_once 'dbConfig.php';

$query =  "DELETE FROM Customer
           WHERE ID = 7";
$db_connection->prepare($query);
try {
if  ($db_connection->exec($query)){
        echo "You have successfully deleted the records.";
}   else {
        echo $db_connection->getmessage() . "Failed to delete the records.";
}}
catch(PDOException $e) {
     header('Location: ErrorPage.php');
   exit();
}
$db_connection = NULL;

