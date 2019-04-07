<!DOCTYPE html>
<?php
include 'dbConfig.php';
?>
<html>
    <head>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
       <link href="LibraryStyles.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
        <title>404 Error!</title>
    </head>
    <body> 
        
            
        
            
    <h1>    Oops... There seems to be an error! </h1>
           
     
            <p> 
                The page you are looking for does not exist or is broken.
                Please report it <a href="#" onclick="return false;"> here </a>  
                and click <a href="#" onclick="return false;">HERE </a> 
                for the main page!
                
                <br> <br> Whilst you're here, have a look at the avialable books to borrow
                across all of our libraries!</p>
                
        <?php      
      $query = "SELECT Inventory.BookID, Book.Title, Author.Forename, 
       Author.Surname, Book.Category,
Inventory.LoanStatus, Inventory.BranchID,
Branch.Name, Branch.Address, Branch.Phone
FROM Inventory
INNER JOIN Book
ON Book.ID = Inventory.BookID
INNER JOIN Branch
ON BranchID = Branch.ID
INNER JOIN Author_Book
ON Author_Book.AuthorID = Book.ID
INNER JOIN Author
ON Author_Book.BookID = Author.ID
WHERE Inventory.LoanStatus='Available'";
      $db_connection->prepare($query);

      $results = $db_connection->query($query);

?>

        <div class="container">
        
            <table class="table">
                <thead>
                    <tr>
                        <th>BOOK TITLE</th>
                        <th>AUTHOR</th>
                        <th>LOAN STATUS</th>
                        <th>CATEGORY</th>
                        <th>BRANCH NAME</th>
                        <th>ADDRESS </th>
                        <th> NUMBER </th>

                    </tr>
                </thead> 
                <tbody>
                    <?php

                    foreach($results AS $result){

                    ?>
                        <tr>
                            <td><?php echo $result['Title']?></td>
                            <td><?php echo $result['Forename'] . " " .$result['Surname']?></td>
                            <td><?php echo $result['LoanStatus']?></td>
                            <td><?php echo $result['Category']?></td>
                            <td><?php echo $result['Name']?></td>
                            <td><?php echo $result['Address']?></td>
                            <td><?php echo $result['Phone']?></td>
                            
                         
                    <?php   
                    }   
                    ?>

                </tbody>
            </table>
        
        </div>   
    </body>
  
      
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
    </body>
</html>
