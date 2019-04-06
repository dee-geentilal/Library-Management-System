<?php
require_once 'dbConfig.php';
session_start();

$query = "SELECT Title, ISBN, Category FROM Love";
$db_connection->prepare($query);
try {
if ($results = $db_connection->query($query)){
    foreach($results AS $result){
       echo "This book is " . "<strong>" . $result['Title'] . "</strong> <br>" .
         "The ISBN for this is " . $result['ISBN'] . ". "
         . "The category is " . $result['Category'] . ". <br>";
    }   
    
}   else{
    echo "No results to display.";
} }
catch(PDOException $e) {
    header('Location: ErrorPage.php');
   exit();
}

unset ($results);
$db_connection = NULL; 
