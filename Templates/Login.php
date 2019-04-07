<!DOCTYPE html>
<?php
session_start();

$servername = "localhost";
$dbname = "LibraryV2";

?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="Styles.css"/>
        <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
    </head>
    <body class="login">
        <div> 
            <form class="customer" method="post">
                <div class="form-group">
                    <label for="username">Email</label>
                    <input type="text" class="form-control" id="username" name="username" />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" />
                </div>
                <input type="submit" value="Customer Login" />
            </form>
        </div>
        <div>
            <form class="staff" method="post" action="StaffPage.php" >
                <div class="form-group">
                    <label for="staff-id">Staff ID</label>
                    <input type="text" class="form-control" id="staff-id" name="staff-id" />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="staff-password" name="staff-password" />
                </div>
                <input type="submit" value="Staff Login" />
            </form>
        </div>
<!--        <div>
            <form class="guest" action="ErrorPage.php" >
                <input type="submit" value="Continue as Guest" />
            </form>        
        </div>-->
                
        <div>        
            <?php
            if(!empty($_POST)) {
                $usertype = "root";
                $password = "";

                $email = $_POST['username'];
                $customerPassword = $_POST['password'];
                //echo "got form";


                try {
                    $conn = new PDO("mysql:host=$servername; dbname=$dbname", $usertype, $password);

                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $sql = ("SELECT * FROM Customer WHERE `Email`= ? AND `Password` =MD5(?)");

                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$email, $customerPassword]);
                    $exists = $stmt->fetch();

                    if ($exists) {
                        header('Location: CustomerPage.php');
                    } else {
                        header('Location: ErrorPage.php');
                    }

                } catch (Exception $ex) {
                    $ex->getMessage();
                    echo $ex;
                }

                $conn = null;

            } 
            //else {
            //    echo "no form";
            //}
            ?>
        </div>
       
    </body>
</html>
