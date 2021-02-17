<?php
include('db.php');

if(isset($_POST['save_task'])){
  $title = $_POST['title'];
  $description = trim($_POST['description']);
  $query = "INSERT INTO task(title,description) VALUES('{$title}','{$description}')";
  $response = mysqli_query($conn,$query);
  if(!$response){
    //finish my app
    die('Query failed');
  }
  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  //Redirect
  header('Location: index.php');
}

?>