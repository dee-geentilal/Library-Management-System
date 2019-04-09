<!DOCTYPE html>
<?php
$servername = "localhost";
$dbname = "LibraryV2";

if(!empty ($_POST)){
    $usertype = "root";
    $password = "";
    
    try {
        $conn = new PDO("mysql:host=$servername; dbname=$dbname", $usertype, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "INSERT INTO CUSTOMER (Forename, Surname, Email, Phone, Password)
          VALUES (?, ?, ?, ?, MD5(?))";
        
        $forename = $_POST['forename'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        
        $stmt=$conn->prepare($sql);
        $success = $stmt->execute([$forename, $surname, $email, $phone, $password]);
            
        
        if ($success) {
            echo("Record successfully created.". "      <a href='Login.php'>Login</a>");
        } else {
            throw new Exception("Something went wrong! Please try again.");
            echo '';
        }
        
    } catch (Exception $ex) {
        $ex->getMessage();
        exit("Something went wrong!");
    }
            
            
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration</title>
        <link rel="stylesheet" href="Styles.css"/>
        <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
    </head>
    <body class="registration">
        <h2>Please complete the form to create an account:</h2>
        <div> 
            <form class="registration" method="post">
                <div class="form-group">
                    <label for="forename">Forename</label>
                    <input type="text" class="form-control" id="forename" name="forename" />
                </div>
                
                <div class="form-group">
                    <label for="surname">Surname</label>
                    <input type="text" class="form-control" id="surname" name="surname" />
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" />
                </div>
                
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" class="form-control" id="phone" name="phone" />
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" />
                </div>
                <input type="submit" value="Submit" />
            </form>
    </body>
</html>
