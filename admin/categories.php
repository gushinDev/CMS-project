<?php include('admin-includes/header.php'); ?>

<div id="wrapper">
  <?php include('admin-includes/navigation.php'); ?>

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

            if (isset($_POST['submit'])) {

              if (isset($_POST['new-category']) && $_POST['new-category'] !== '') {
                $new_category = $_POST['new-category'];
                $sql = "INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES (NULL, '{$new_category}');";
                $result = mysqli_query($connection, $sql);
                if (!$result) {
                  die('GG');
                }
                header('Location: ./categories.php');
              } else {
              echo '<p>empty field</p>';
              }
            }
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
                $sql = "SELECT * FROM `categories`;";
                $categories = mysqli_query($connection, $sql);

                while ($row = mysqli_fetch_array($categories)) : ?>
                  <tr>
                    <td scope='col'><?= $row['cat_id'] ?></td>
                    <td scope='col'><?= $row['cat_title'] ?></td>
                    <td scope='col'><a href="">Update</a></td>
                    <td scope='col'><a href="">Delete</a></td>

                  </tr>
                <?php endwhile; ?>
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