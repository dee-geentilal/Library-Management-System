<!DOCTYPE html>
<?php

//session_start();

$servername = "localhost";
$dbname = "LibraryV2";

if(!empty($_POST)) {
    $usertype = "root";
    $password = "";
   
    
        try {
            $conn = new PDO("mysql:host=$servername; dbname=$dbname", $usertype, $password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = ("SELECT Book.Title, Author.Forename, Author.Surname, Book.Category, Inventory.LoanStatus
                    FROM Book
                    INNER JOIN Author_Book
                    ON Author_Book.AuthorID = Book.ID
                    INNER JOIN Author
                    ON Author_Book.BookID = Author.ID
                    INNER JOIN Inventory
                    ON Inventory.BookID = Book.ID ");
            
            
            $title = "%".$_POST['title']."%";
            $author = "%".$_POST['author']."%";
            $category = "%".$_POST['category']."%";
            $searchParam = "";
            $results = [];
            
            
            if (!empty($_POST['title'])) {
                $sql = $sql."WHERE Book.Title LIKE ?";
                $searchParam = $title;
               
       
            } elseif (!empty($_POST['author'])) {
                $sql = $sql."WHERE Author.Surname LIKE ?";
                $searchParam = $author;
               
               
            } elseif (!empty($_POST['category'])) {
                $sql = $sql."WHERE Book.Category LIKE ?";
                $searchParam = $category;
        
            
            } else {
                throw new Exception ("Empty form.");
            }
   
            $stmt = $conn->prepare($sql);
            $stmt->execute([$searchParam]);
            $results = $stmt->fetchAll();
        

           
        } catch (Exception $ex) {
            $ex->getMessage();
            echo $ex;
        }

         $conn = null;
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>N&S Library</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="Styles.css"/>
        <link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
    </head>
    <body class="customer">
        <h1>Welcome!</h1>
        <h3>Search book by:</h3>
        <div> 
            <form class="book-search" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" />
                </div>
                
                <div class="form-group">
                    <label for="author">Author Surname</label>
                    <input type="text" class="form-control" id="author" name="author" />
                </div>
                
                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" class="form-control" id="category" name="category" />
                </div>
                
                <input type="submit" value="Search" />
            </form>
           
        </div>
        
        <div>
        
            <table class="table">
                <thead>
                    <tr>
                        <th>TITLE</th>
                        <th>AUTHOR</th>
                        <th>CATEGORY</th>
                        <th>STATUS</th>
                    </tr>
                </thead> 
                <tbody>
                    <?php
                    if (isset ($results)) {
                        
                    
                        foreach($results AS $result){
                        ?>
                            <tr>
                                <td><?php echo $result['Title']?></td>
                                <td><?php echo $result['Forename'] . " " .$result['Surname']?></td>
                                <td><?php echo $result['Category']?></td>
                                <td><?php echo $result['LoanStatus']?></td>

                            
                         
                    <?php   
                        }
                    }
                    ?>

                </tbody>
            </table>
        
        </div>   
        
        <a href="Logout.php" class="logout">
            <button>Logout</button>
        </a>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    
    </body>
</html>
