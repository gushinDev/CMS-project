<?php include "db.php"; ?>

<?php session_start(); ?>

<?php
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $username = mysqli_real_escape_string($connection, $username);
  $password = mysqli_real_escape_string($connection, $password);

  $sql = "SELECT * from `users` WHERE `user_name` = '$username'";
  $query = mysqli_query($connection, $sql);
  if (!$query) {
    die('Query failed ' . mysqli_error($connection));
  }

  if($query->num_rows == 0) {
    header('Location: ../');
  }

  while ($row = mysqli_fetch_assoc($query)) {
    $db_user_name = $row['user_name'];
    $db_user_pass = $row['user_password'];
    $db_user_first_name = $row['user_first_name'];
    $db_user_last_name = $row['user_last_name'];
    $db_user_role = $row['user_role'];
  }

  if ($password == $db_user_pass) {
    $_SESSION['username'] = $db_user_name;
    $_SESSION['first_name'] = $db_user_first_name;
    $_SESSION['last_name'] = $db_user_last_name;
    $_SESSION['user_role'] = $db_user_role;

    header('Location: ../admin');
  } else {
    header('Location: ../');
  }
}
