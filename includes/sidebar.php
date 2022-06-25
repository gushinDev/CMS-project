<div class="col-md-4">

  <!-- Blog Search Well -->
  <div class="well">
    <h4>Blog Search</h4>

    <!-- Search Form -->
    <form action="index.php" method="post">
      <div class="input-group">
        <input type="text" class="form-control" name="search">
        <span class="input-group-btn">
          <button class="btn btn-default" type="submit" name="submit">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
    </form>
    <!-- /.input-group -->

  </div>

  <!-- Blog Categories Well -->
  <div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
      <div class="col-lg-12">
        <ul class="list-unstyled">

          <?php
          $sql = "SELECT * FROM `categories`;";
          $categories = mysqli_query($connection, $sql);

          while ($row = mysqli_fetch_assoc($categories)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            echo "<li><a href='index.php?cat_id=$cat_id'>{$cat_title}</a></li>";
          } ?>

        </ul>
      </div>
    </div>
    <!-- /.row -->
  </div>

  <!-- Side Widget Well -->
  <?php include('includes/widgets.php'); ?>

</div>