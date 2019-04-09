<?php

require_once 'dbConfig.php';

$id = $_GET['ID'];
$query = "DELETE FROM Book
          WHERE ID = :ID";
$result = $db_connection->prepare($query);
$result->execute([
  'ID'  =>  $id
]);

$rowsDeleted = $result->rowCount();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Deleted</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
  <div class="container">

<?
if($rowsDeleted==1){
  ?>
    <br>
  <div class='alert alert-primary' role='alert'>
  Record has been deleted!
</div>
    <?
} else {
  echo "Record not deleted - Please try again";
}
  ?>
  
</div>
</body>
</html>
