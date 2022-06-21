<?php
  global $connection;
  if (isset($_GET['post_id'])) {
  $post_id = $_GET['post_id'];
  $sql = "SELECT * 
          FROM `posts` 
          WHERE `post_id` = '$post_id'
          LIMIT 1";

  $query = mysqli_query($connection, $sql);
  checkQueryFailed($query);
  }
?>

<form action="" method="POST" enctype="multipart/form-data">
  <?php while ($row = mysqli_fetch_assoc($query)):?>
    <?php var_dump($row); ?>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" value="<?= $row['post_title']; ?>">
  </div>

  <div class="form-group">
    <label for="post_category">Category</label>
    <input type="text" name="category_id" class="form-control" id="post_category" value="<?= $row['post_category_id']; ?>">
  </div>

  <div class="form-group">
    <label for="author">Author</label>
    <input type="text" name="author" id="author" class="form-control" value="<?= $row['post_author']; ?>">
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
    <input type="text" name="tags" id="tags" class="form-control" value="<?= $row['post_tags']; ?>">
  </div>

  <div class="form-group">
    <label for="status">Content</label>
    <textarea name="content" id="content" cols="30" rows="10" class="form-control"><?=$row['post_content'];?></textarea>
  </div>
  <?php endwhile; ?>
  <button type="submit" class="btn btn-primary" name="create_post">Submit</button>

</form>