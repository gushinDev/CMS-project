<?php

function insert_new_category()
{
  global $connection;
  if (isset($_POST['submit'])) {

    if (empty($_POST['new-category']) || ($_POST['new-category'] === '')) {
      echo ('<p>empty field</p>');
    } else {
      $new_category = $_POST['new-category'];
      $sql = "INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES (NULL, '{$new_category}');";
      $result = mysqli_query($connection, $sql);
      if (!$result) {
        die('Something went wrong. Please try again later.');
      }
      header('Location: ./categories.php');
    }
  }
}

function update_category()
{
  global $connection;
  if (isset($_POST['submit_changing'])) {
    $changing_cat_title = $_POST['changing_category'];
    $changing_cat_id = $_POST['changing_category_id'];

    $sql = "UPDATE `categories` 
          SET `cat_title` = '{$changing_cat_title}' 
          WHERE `cat_id` = '{$changing_cat_id}'";
    $query = mysqli_query($connection, $sql);
    if (!$query) {
      die(mysqli_error($connection));
    }
    header('Location: ./categories.php');
  }
}

function delete_category()
{
  global $connection;
  if (isset($_GET['delete_category'])) {
    $cat_id = $_GET['delete_category'];
    $sql = "DELETE FROM `categories` WHERE `cat_id` = '$cat_id'";
    $result = mysqli_query($connection, $sql);
    if (!$result) {
      die(mysqli_error($connection));
    }
    header('Location: ./categories.php');
  }
}

function findAllCategories()
{
  global $connection;

  $sql = "SELECT * FROM `categories`;";
  $categories = mysqli_query($connection, $sql);

  while ($row = mysqli_fetch_array($categories)) {
    echo "<tr>
            <td scope='col'>{$row['cat_id']}</td>
            <td scope='col'>{$row['cat_title']}</td>
            <td scope='col'><a href='categories.php?edit_title={$row['cat_title']}&edit_id={$row['cat_id']}'>Edit</a></td>
            <td scope='col'><a href='categories.php?delete_category={$row['cat_id']}'>Delete</a></td>
          </tr>";
  }
}

function findAllPosts(){
  global $connection;
  $sql = "SELECT * FROM `posts`";
  $posts = mysqli_query($connection, $sql);
  if(!$posts) {
    die('No posts finded');
  }
  return $posts;
}