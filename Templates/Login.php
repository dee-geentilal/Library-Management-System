<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="Styles.css"/>
        <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
    </head>
    <body class="login">
        <div> 
            <form class="customer" method="post" action="CustomerPage.php">
                <div class="form-group">
                    <label for="username">Username/Email</label>
                    <input type="text" class="form-control" id="username" name="username" />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" />
                </div>
                <input type="submit" value="Login" />
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
                <input type="submit" value="Login" />
            </form>
        </div>
        <div>
            <form class="guest" action="ErrorPage.php" >
                <input type="submit" value="Continue as Guest" />
            </form>        
        </div>
                
                
        <?php
           /* if(!empty($_SESSION)){
                echo "Welcome " . $_SESSION['username'] . '<br>';
                echo "You favourite colour is " . $_SESSION['color'] . '<br>';
                echo "You favourite animal is " . $_SESSION['animal'] . '<br>';
                echo "<a href='SessionPostPage2.php'>Go to Page 2</a><br>";

            }*/
        ?>
    </body>
</html>
