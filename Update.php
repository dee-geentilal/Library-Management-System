<?php

require_once 'dbConfig.php';

$query =  "UPDATE Customer
           SET Forename = 'Keyaan', Email = 'keyaanpatel@gmail.com'
           WHERE ID = 6";

$db_connection->prepare($query);

try {
if  ($db_connection->exec($query)){
        echo "You have successfully updated the records.";
}   else {
        echo "Failed to update the records.";
} }
catch(PDOException $e) {
    
    header('Location: ErrorPage.php');
   exit();
}
$db_connection = NULL;
