<?php createNewPost(); ?>
<?php 
  $categories = findAllCategories();
?>
<form action="" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control">
  </div>

  <div class="form-group">
    <label for="post_category">Category</label>
    <select name="category_id" class="form-control" id="">
      <?php while ($row = mysqli_fetch_assoc($categories)) : ?>
        <option value="<?=$row['cat_id']?>"><?=$row['cat_title']?></option>
      <?php endwhile; ?>
    </select>
  </div>

  <div class="form-group">
    <label for="author">Author</label>
    <input type="text" name="author" id="author" class="form-control">
  </div>

  <div class="form-check form-group">
    <label class="form-check-label" for="exampleCheck1">Published </label>
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="status" unchecked>
  </div>

  <div class="form-group">
    <img src="" class="editPostCurrentImage" height="200px">
  </div>

  <div class="form-group">
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