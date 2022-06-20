<?php
  if (isset($_POST['create_post'])) {
    echo $_POST['create_post'] ;
  }
?>

<form action="posts.php" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control">
  </div>

  <div class="form-group">
    <label for="post_category">Category</label>
    <input type="text" name="post_category_id" class="form-control" id="post_category">
  </div>

  <div class="form-group">
    <label for="author">Author</label>
    <input type="text" name="author" id="author" class="form-control">
  </div>

  <div class="form-group">
    <label for="status">Status</label>
    <input type="text" name="status" id="status" class="form-control">
  </div>

  <div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" id="image" class="form-control-file">
  </div>

  <div class="form-group">
    <label for="status">Content</label>
    <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
  </div>

  <button type="submit" class="btn btn-primary" name="create_post">Submit</button>

</form>