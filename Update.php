<?php
 require_once 'dbConfig.php';

    if(!isset($_POST['updateRecord'])){
      header('Location: Edit.php');
      die();
    } else {
      if(!isset($_POST['ID'])){
        header('Location: Edit.php');
        die();
    } else {

        try{
        $id =$_POST['ID'];
        $title = $_POST['Title'];
        $isbn = $_POST['ISBN'];
        $category =$_POST['Category'];
    
        $query = "UPDATE Book 
                  SET Title = :Title,
                  ISBN = :ISBN,
                  Category = :Category
                  WHERE ID = :ID";

         $result =$db_connection->prepare($query);

        $result->execute([
                  'Title'    =>  $title,
                  'ISBN'     =>  $isbn,
                  'Category' =>  $category,
                  'ID'       =>  $id

        ]);
        echo "You have successfully updated the records.";
    }

    catch (Exception $e) {
        echo "There was a failure - " . $e->getMessage();

    }

    }
    }

