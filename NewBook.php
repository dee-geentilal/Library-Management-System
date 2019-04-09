 <?php
require_once 'dbConfig.php';
  
    
if (isset($_POST['addRecord'])) {
    try {
        $title = ($_POST['Title']);
        $isbn = ($_POST['ISBN']);
        $category = ($_POST['Category']);
        $query = "INSERT INTO Book (Title, ISBN, Category) 
              VALUES (:Title, :ISBN, :Category)";
        $result = $db_connection->prepare($query);
        $result->execute([
            'Title' => $title,
            'ISBN' => $isbn,
            'Category' => $category
        ]);
        echo "New Book Added Successfully." . "  <a href='ListBooks.php'></a>";

    } catch (Exception $ex) {
        header('Location: ErrorPage.php');
        exit();
    }
}
?>
<!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Add a Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  </head>

  <body>

    <br>
    <div class="container">
      <form method="post" action="">
          
<!--          <div class="form-group row">
          <label for="id" class="col-sm-2 col-form-label">ID</label>
          <div class="col-sm-10">
            <input type="number" readonly class="form-control" id="id" name="ID" value="">
          </div>
        </div>-->
        <div class="form-group row">
          <label for="title" class="col-sm-2 col-form-label">Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="Title" value="">
          </div>
        </div>
        <div class="form-group row">
          <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="isbn" name="ISBN" value="">
          </div>
        </div>
        <div class="form-group row">
          <label for="category" class="col-sm-2 col-form-label">Category</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="category" name="Category" value="">
          </div>
        </div>
       

        <button type="submit" name="addRecord" class="btn btn-success">Add Record</button>

      </form>
    </div>


  </body>


  </html>







