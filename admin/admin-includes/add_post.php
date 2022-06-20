<?php
if (isset($_POST['create_post'])) {

  global $connection;

  $title = $_POST['title'];
  $category_id = $_POST['category_id'];
  $author = $_POST['author'];

  $status = isset($_POST['status']) ? 'Draft' : 'Ready';

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
}
?>

<form action="" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control">
  </div>

  <div class="form-group">
    <label for="post_category">Category</label>
    <input type="text" name="category_id" class="form-control" id="post_category">
  </div>

  <div class="form-group">
    <label for="author">Author</label>
    <input type="text" name="author" id="author" class="form-control">
  </div>

  <!-- <div class="form-group">
    <label for="status">Status</label>
    <input type="text" name="status" id="status" class="form-control">
  </div> -->

  <div class="form-check form-group">
    <label class="form-check-label" for="exampleCheck1">Draft </label>
    <input type="checkbox" class="form-check-input" id="exampleCheck1" checked name="status">
  </div>

  <div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" id="image" class="form-control-file">
  </div>

  <div class="form-group">
    <label for="tags">Tags</label>
    <input type="text" name="tags" id="tags" class="form-control">
  </div>

  <div class="form-group">
    <label for="status">Content</label>
    <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
  </div>

  <button type="submit" class="btn btn-primary" name="create_post">Submit</button>

</form>