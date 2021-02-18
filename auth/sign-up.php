<?php include ('../db.php')?>
<?php include ('../includes/login-header.php')?>
<?php
  if(!empty($_POST['username']) && !empty($_POST['password'])){
    $username = $_POST['username'];
    $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
    $query = "INSERT INTO user(username,password) VALUES('{$username}','{$password}')";
    $response = mysqli_query($conn,$query);
    if(!$response){
      //finish my app
      die('Query failed');
    }
  }
  $_SESSION['message'] = 'Your registration was successful';
  $_SESSION['message_type'] = 'success';
?>
<div class="container mx-auto p-4">
  <div class="col-md-12 p-4 w-50 mx-auto card card-body bg-dark">
    <?php if(isset($_SESSION['message'])){?>
      <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
        <strong><?= $_SESSION['message'] ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php 
    session_unset(); 
    } ?>
    <form action="sign-up.php" method="POST">
      <h1 class="display-5 mb-3" style="color:white; font-weight:bold;">SIGN UP</h1>
      <input type="text" name="username" placeholder="Your username" class="form-control mb-3">
      <input type="password" name="password" placeholder="Your password" class="form-control mb-3">
      <input type="password" name="confirm_password" placeholder="Confirm password" class="form-control mb-3">
      <input type="submit" name="send" value="Register" class="btn btn-success w-100 mb-2">
      <div class="w-100 d-flex justify-content-center align-items-center">
        <a 
          href="login.php" 
          style="text-align:center; text-decoration:none; color:yellow; font-weith:bold;">
          Go Back</a>
      </div>
    </form>
  </div>
</div>

<?php include ('../includes/footer.php')?>