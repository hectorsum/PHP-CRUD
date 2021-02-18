<?php include ('../includes/login-header.php')?>
<?php include ('../db.php')?>
<?php 
  if(!empty($_POST['username']) && !empty($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM user WHERE username='{$username}'";
    $response = mysqli_query($conn,$query);
    if(mysqli_num_rows($response) == 1){
      $row = mysqli_fetch_array($response);
      if(password_verify($password,$row['password'])){
        $_SESSION['message'] = "Welcome {$username}!";
        $_SESSION['message_type'] = 'success';
        header('Location: ../index.php');
      }else{
        header('Location: ./login.php');
      }
    }
  }
?>
<div class="container mx-auto p-4">
  <div class="col-md-12 p-4 w-50 mx-auto card card-body bg-dark">
    
    <form action="" method="POST">
      <h1 class="display-5 mb-3" style="color:white; font-weight:bold;">LOGIN</h1>
      <input type="text" name="username" placeholder="Username" class="form-control mb-3">
      <input type="password" name="password" placeholder="password" class="form-control mb-3">
      <input type="submit" name="send" value="Log in" class="btn btn-success w-100 mb-2">
      <!-- <input type="submit" name="send" value="Sign up" class="btn btn-primary w-100"> -->
      <div class="w-100 d-flex justify-content-center align-items-center">
        <a 
          href="sign-up.php" 
          style="text-align:center; text-decoration:none; color:yellow; font-weith:bold;">
          Sign Up</a>
      </div>
    </form>
  </div>
</div>

<?php include ('../includes/footer.php')?>