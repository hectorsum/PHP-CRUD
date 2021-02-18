<?php

  include('db.php');
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = {$id}";
    $response = mysqli_query($conn,$query);
    
    if (mysqli_num_rows($response) == 1){ //* Checking if there's a single row response
      $row = mysqli_fetch_array($response);
      $title = $row['title'];
      $description = $row['description'];
    }
  }
  //* looking for button name
  if (isset($_POST['update'])){
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE task SET title = '{$title}', description = '{$description}' WHERE id = {$id}";
    mysqli_query($conn,$query);
    
    $_SESSION['message'] = 'Task Updated Successfully';
    $_SESSION['message_type'] = 'warning';
    //Redirect
    header('Location: index.php');
  }
?>

<?php include("includes/header.php") ?>
  <div class="container ">
    <div class="row">
      <div class="col-md-4 mx-auto p-4">
        <div class="card card-auto p-4">
          <form action="edit_task.php?id=<?php echo $_GET['id']; ?>" method="POST">
            <div class="form-group mb-3">
              <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Update title">
            </div>
            <div class="form-group mb-3">
              <textarea name="description" rows="2" class="form-control" placeholder="Update description" required><?php echo $description ?></textarea>
            </div>
            <button type="submit" class="btn btn-success" name="update">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php include("includes/footer.php") ?>