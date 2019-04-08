
<?php

//session_start();

$servername = "localhost";
$dbname = "LibraryV2";

if(!empty($_POST) && !empty($_POST['search-member'])) {
    $usertype = "root";
    $password = "";
   
    
        try {
            $conn = new PDO("mysql:host=$servername; dbname=$dbname", $usertype, $password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = ("SELECT Forename, Surname, Email, Phone
                    FROM `Customer`
                    WHERE ID = ? ");
            
            
            $customerId = $_POST['membership'];
//            $results = [];
   
            $stmt = $conn->prepare($sql);
            $stmt->execute([$customerId]);
            $result = $stmt->fetch();
           
           
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
        <link rel="stylesheet" href="Styles.css"/>
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    </head>
    
    <body class="staff">
<!--        <h1>Welcome!</h1>
        <h3>Search book by:</h3>
        <div> 
            <form class="book-search" method="post" >
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" />
                </div>
                
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" class="form-control" id="author" name="author" />
                </div>
                
                <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="number" class="form-control" id="isbn" name="isbn" />
                </div>
                
                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" class="form-control" id="category" name="category" />
                </div>
                
                <input type="submit" value="Search" />
            </form>-->
            
            <h3>Search Customer by Membership Number:</h3>
            
            <form class="customer-search" method="post">
                <div>
                    <label for="membership">Membership Number</label>
                    <input type="number" class="form-control" id="membership" name="membership"/>
                </div>
                
                <input type="submit" value="Search" name="search-member"/>
            </form>
      
            <div>
                <br>
                <br>
                <br>
            </div>
        <div>
            <?php
                    if (isset($result) && isset($customerId)) {
                        ?>
            
            <form class="editresults" method="post">
               
                <div>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $customerId;?>"/>
                </div>
                <div class="form-group">
                    <label for="forename">Forename</label>
                    <input type="text" class="form-control" id="forename" name="forename" value="<?php echo $result['Forename'];?>"/>
                </div>
                <div class="form-group">
                    <label for="surname">Surname</label>
                    <input type="text" class="form-control" id="surname" name="surname" value="<?php echo $result['Surname'];?>"/>
                </div> 

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $result['Email'];?>"/>
                </div> 

                <div class="form-group">
                    <label for="name">Phone</label>
                    <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $result['Phone'];?>"/>
                </div> 
                
                <div>
                    <input type="submit" class="btn btn-primary" name="update-record" value="Update"/>
                </div>
            </form>
            <?php
                }
            ?>
                    
            
        </div>
         
        <?php
        if(!empty($_POST) && !empty($_POST['update-record'])) {
            
            $usertype = "root";
            $password = "";
             
            $customerId = $_POST['id'];
            $forename = $_POST['forename'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
        
            
    
            try {
                $conn = new PDO("mysql:host=$servername; dbname=$dbname", $usertype, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = ("UPDATE `Customer` SET Forename = ?, Surname = ?, Email = ?, Phone = ?
                        WHERE ID = ? ");

                $stmt = $conn->prepare($sql);
                $stmt->execute([$forename, $surname, $email, $phone, $customerId]);
                echo "Record successfully updated.";
                
            } catch (PDOException $ex) {
                $ex->getMessage();
                echo $ex;
            } catch (Exception $ex) {
                $ex->getMessage();
                echo $ex;
            }
        }
        ?>
            
    </body>
</html>
