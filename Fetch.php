<?php



require_once'dbconfig.php';

$id = 4;

$query = "SELECT * FROM Book WHERE id = :id LIMIT 1";

$result = $db_connection->prepare($query);

$result->execute([
  'id'  =>  $id
]);

$result = $result->fetch(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($result);

echo "<br>";
echo $result['Title'];