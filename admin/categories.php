<?php include('admin-includes/header.php'); ?>
<?php include('admin-includes/navigation.php'); ?>

<?php
delete_category();
update_category();
?>

<div id="wrapper">
  <div id="page-wrapper">
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">
            Categories
          </h1>
          <div class="col-xs-4">
            <?php
            insert_new_category();
            ?>
            <p>Add category</p>
            <form action="categories.php" method="post" class="form">
              <div class="form-group">
                <input type="text" name="new-category" id="new-category" class="form-control">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary" name="submit">Add</button>
              </div>
            </form>

            <p>Edit category</p>

            <?php
            if (isset($_GET['edit_title'])) {
              $changing_category = $_GET['edit_title'];
              $changing_cat_id = $_GET['edit_id'];
            } else {
              $changing_category = '';
              $changing_cat_id = '';
            }
            ?>

            <form action="categories.php" method="post" class="form">
              <div class="form-group">
                <input type="hidden" name="changing_category_id" value="<?= $changing_cat_id ?>">
                <input type="text" name="changing_category" id="changing_category" class="form-control" value="<?= $changing_category ?>">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary" name="submit_changing">Edit</button>
              </div>
            </form>
          </div>
          <div class="col-xs-8">

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Category</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $categories = findAllCategories();
                while ($row = mysqli_fetch_array($categories)) {
                  echo "<tr>
                          <td scope='col'>{$row['cat_id']}</td>
                          <td scope='col'>{$row['cat_title']}</td>
                          <td scope='col'><a href='categories.php?edit_title={$row['cat_title']}&edit_id={$row['cat_id']}'>Edit</a></td>
                          <td scope='col'><a href='categories.php?delete_category={$row['cat_id']}'>Delete</a></td>
                        </tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /#page-wrapper -->

</div>

<?php include('admin-includes/footer.php'); ?>