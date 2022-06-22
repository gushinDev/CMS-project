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
      checkQueryFailed($result);
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
    checkQueryFailed($query);
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
    checkQueryFailed($result);
    header('Location: ./categories.php');
  }
}

function findAllCategories()
{
  global $connection;

  $sql = "SELECT * FROM `categories`;";
  $categories = mysqli_query($connection, $sql);

  checkQueryFailed($categories);

  while ($row = mysqli_fetch_array($categories)) {
    echo "<tr>
            <td scope='col'>{$row['cat_id']}</td>
            <td scope='col'>{$row['cat_title']}</td>
            <td scope='col'><a href='categories.php?edit_title={$row['cat_title']}&edit_id={$row['cat_id']}'>Edit</a></td>
            <td scope='col'><a href='categories.php?delete_category={$row['cat_id']}'>Delete</a></td>
          </tr>";
  }
}

function findAllPosts()
{
  global $connection;
  $sql = "SELECT * FROM `posts`";
  $query = mysqli_query($connection, $sql);
  checkQueryFailed($query);
  return $query;
}

function deletePost()
{
  global $connection;
  if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
    $sql = "DELETE FROM `posts` WHERE `post_id` = '$post_id'";
    $query = mysqli_query($connection, $sql);
    checkQueryFailed($query);
    header('Location: ./posts.php');
  }
}

function checkQueryFailed($query)
{
  global $connection;
  if (!$query) {
    die('Query is failed' . mysqli_error($connection));
  }
}

function createNewPost() {
  if (isset($_POST['create_post'])) {

    global $connection;

    $title = $_POST['title'];
    $category_id = $_POST['category_id'];
    $author = $_POST['author'];
    $status = isset($_POST['status']) ? 'Published' : 'Not published';

    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];

    $tags = $_POST['tags'];
    $content = $_POST['content'];
    $date = date('d-m-y');
    $comment_count = 1;

    $sql_query_new_post =
      "INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) 
    VALUES (NULL, '$category_id', '$title', '$author', '$date', '$image', '$content', '$tags', '$comment_count', '$status')";

    $query = mysqli_query($connection, $sql_query_new_post);
    move_uploaded_file($image_temp, "../img/$image");
    
    header('Location: ./posts.php');

  }
}