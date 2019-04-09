 <?php
     require_once 'dbConfig.php';
//     $id= $_GET['ID']??'';
//      
//     $query = "SELECT * FROM Book         
//               WHERE ID = :ID LIMIT 1";
//     $result = $db_connection->prepare($query);
//     $result->execute([
//         'ID'=> $id
//     ]);
//      $result = $result->fetch();
     
//      
     if(!isset($_GET['ID'])){
    header('Location: ListBooks.php');
    die();
  } else {
     $id = filter_var($_GET['ID'], FILTER_VALIDATE_INT);
    if(!$id){
      header('Location: ListBooks.php');
      die();
    } else {
        $query = "SELECT * FROM Book WHERE ID=:ID LIMIT 1";
        $result = $db_connection->prepare($query);
        $result->execute([
          'ID' => $id
        ]);
        $result = $result->fetch();
    }
  }

      
?>
<!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Edit a Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  </head>

  <body>

    <br>
    <div class="container">
      <form method="POST" action="Update.php">
        <div class="form-group row">
          <label for="id" class="col-sm-2 col-form-label">ID</label>
          <div class="col-sm-10">
            <input type="number" readonly class="form-control" id="id" name="ID" value="<?php echo $result['ID'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="title" class="col-sm-2 col-form-label">Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="Title" value="<?php echo $result['Title'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="isbn" name="ISBN" value="<?php echo $result['ISBN'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="category" class="col-sm-2 col-form-label">Category</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="category" name="Category" value="<?php echo $result['Category'] ?>">
          </div>
        </div>
     

        <button type="submit" name="updateRecord" class="btn btn-success">Update Record</button>

      </form>
    </div>


  </body>


  </html>