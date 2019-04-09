 <?php
      require_once 'dbConfig.php';
      
      $query = "SELECT * FROM Book";
      $results = $db_connection->query($query);
  
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>List of Books</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
        
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>ISBN</th>
                        <th>CATEGORY</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                       
                    </tr>
                </thead> 
                <tbody>
                    <?php

                    foreach($results AS $result){

                    ?>
                        <tr>
                            <td><?php echo $result['ID']?></td>
                            <td><?php echo $result['Title']?></td>
                            <td><?php echo $result['ISBN']?></td>
                            <td><?php echo $result['Category']?></td>
                            <td><a href="Edit.php?ID=<?php echo $result['ID'] ?>"><i class="fas fa-edit"></i></a></td>
                            <td><a href="Delete.php?ID=<?php echo $result['ID'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                           
                        
                        </tr>
                        
                        
          
        <?php 
        }
        ?>

      </tbody>
    </table>
  </div>
    <center> ADD A NEW BOOK<h1><a href="NewBook.php"><i class="fas fa-folder-plus"></i></a></h1></center>
    
</body>
</html>