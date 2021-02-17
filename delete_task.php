<?php

  include('db.php');
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM task WHERE id = {$id}";
    $response = mysqli_query($conn, $query);
    if (!$response){
      die('Query failed');
    }
    $_SESSION['message'] = 'Task Deleted Successfully';
    $_SESSION['message_type'] = 'danger';
    //Redirect
    header('Location: index.php');
  }

?>