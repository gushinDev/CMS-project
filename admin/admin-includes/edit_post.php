<?php
if (isset($_GET['post_id'])) {
  $post_id = $_GET['post_id'];
  $updatedPost = findUpdatedPost($post_id);
  $categories = findAllCategories();
}

if (isset($_POST['update_post'])) {
  updateCurrentPost();
}
?>

<form action="" method="POST" enctype="multipart/form-data">

  <input type="hidden" name="post_id" value="<?= $post_id ?>">

  <?php while ($row = mysqli_fetch_assoc($updatedPost)) : ?>

    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" name="title" id="title" class="form-control" value="<?= $row['post_title']; ?>">
    </div>

    <div class="form-group">
      <label for="post_category">Category</label>
      <select name="category_id" class="form-control">
        <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
          <option value="<?= $category['cat_id'] ?>" <?= $category['cat_id'] === $row['post_category_id'] ? "selected" : "" ?>>
            <?= $category['cat_title'] ?>
          </option>
        <?php endwhile; ?>
      </select>
    </div>

    <div class="form-group">
      <label for="author">Author</label>
      <input type="text" name="author" id="author" class="form-control" value="<?= $row['post_author']; ?>">
    </div>

    <div class="form-check form-group">
      <label class="form-check-label" for="exampleCheck1">Published </label>
      <input type="checkbox" class="form-check-input" id="exampleCheck1" name="status" <?= $row['post_status'] === 'Published' ? 'checked' : 'unchecked' ?>>
    </div>

    <div class="form-group">
      <img src="../img/<?= $row['post_image']; ?>" class="editPostCurrentImage" height="200px">
    </div>

    <div class="form-group">
      <input type="file" name="image" id="image" class="form-control-file">
    </div>

    <div class="form-group">
      <label for="tags">Tags</label>
      <input type="text" name="tags" id="tags" class="form-control" value="<?= $row['post_tags']; ?>">
    </div>

    <div class="form-group">
      <label for="content">Content</label>
      <textarea name="content" id="content" cols="30" rows="10" class="form-control"><?= $row['post_content']; ?></textarea>
    </div>

  <?php endwhile; ?>
  <button type="submit" class="btn btn-primary" name="update_post">Submit</button>

</form>