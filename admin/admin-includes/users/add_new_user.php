<?php
if (isset($_POST['create_user'])) {
  $user_name = $_POST['user_name'];
  $user_password = $_POST['user_password'];
  $user_first_name = $_POST['user_first_name'];
  $user_last_name = $_POST['user_last_name'];
  $user_email = $_POST['user_email'];
  $user_role = $_POST['user_role'];

  $sql = "INSERT INTO `users` (`user_name`, `user_password`, `user_first_name`, `user_last_name`, `user_email`, `user_role`) 
            VALUES ('$user_name', '$user_password', '$user_first_name', '$user_last_name', '$user_email', '$user_role')";
  $query = mysqli_query($connection, $sql);
  checkQueryFailed($query);
  header('Location: ./users.php');
}
?>

<form action="" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label for="user_name">Username</label>
    <input type="text" name="user_name" id="user_name" class="form-control">
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="user_password" id="password" class="form-control">
  </div>

  <div class="form-group">
    <label for="first_name">Firstname</label>
    <input type="first_name" name="user_first_name" id="first_name" class="form-control">
  </div>

  <div class="form-group">
    <label for="last_name">Lastname</label>
    <input type="last_name" name="user_last_name" id="last_name" class="form-control">
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="user_email" id="email" class="form-control">
  </div>

  <div class="form-group">
    <input type="file" name="user_image" id="image" class="form-control-file">
  </div>

  <div class="form-group">
    <label for="role">Role</label>
    <select name="user_role" id="role" class="form-control">
      <option value="Admin">Admin</option>
      <option value="Subscriber" selected>Subscriber</option>
    </select>
  </div>


  <button type="submit" class="btn btn-primary" name="create_user">Submit</button>

</form>