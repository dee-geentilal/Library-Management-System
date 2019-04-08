<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Customer Results</title>
        <link rel="stylesheet" href="Styles.css"/>
        <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
    </head>
    <body>
        <h2>Customer Details</h2>
        
        <div class="form-group">
            <label for="membership">Membership Number</label>
            <input type="text" class="form-control" id="membership" name="membership" />
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" />
        </div> 
        
       <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" />
        </div> 
        
        <div class="form-group">
            <label for="name">Phone</label>
            <input type="number" class="form-control" id="phone" name="phone" />
        </div> 
        
        <div class="form-group">
            <label for="loans">Current Loans</label>
            <input type="text" class="form-control" id="loans" name="loans" />
        </div>
        
        
        <div>
            <input type="submit" value="Save" />
        </div>
        
        
        
        <a href="StaffPage.php">
            <button>Search again</button>
        </a>
        <br/>
        <a href="Logout.php">
            <button>Logout</button>
        </a>

</html>
