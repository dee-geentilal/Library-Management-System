<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>N&S Library</title>
        <link rel="stylesheet" href="Styles.css"/>
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    </head>
    <body class="customer">
        <h1>Welcome!</h1>
        <h3>Search book by:</h3>
        <div> 
            <form class="book-search" method="post" action="CustomerResults.php">
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
            </form>
           
        </div>
    </body>
</html>
