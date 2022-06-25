<?php include('includes/header.php'); ?>
<?php include('includes/navigation.php'); ?>

<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

      <?php

      if (isset($_POST['submit'])) {

        $posts_filter = $_POST['search'];
        $sql_query = "SELECT * FROM `posts` WHERE `post_title` LIKE '%$posts_filter%'";
        $posts = mysqli_query($connection, $sql_query);

        if (!$posts) {
          die("Could not");
        }

        $rows = mysqli_num_rows($posts);

        if ($rows === 0) {
          $search_message = "No results found.";
        } else {
          $search_message = "There are " . $rows . " results found.";
        }

        echo "<h1 class='page-header'>
                {$search_message}
              </h1> ";
      } else if (isset($_GET['cat_id'])) {

        $cat_id = $_GET['cat_id'];
        $sql = "SELECT * FROM `posts` WHERE `post_category_id` = $cat_id";
        $posts = mysqli_query($connection, $sql);
      } else {

        $sql = "SELECT * FROM `posts` WHERE `post_status` = 'Published'";
        $posts = mysqli_query($connection, $sql);

        echo '<h1 class="page-header">
                Posts
              </h1>';
      }

      while ($row = mysqli_fetch_array($posts)) : ?>

        <h2>
          <a href="post.php?id=<?= $row['post_id']; ?>"><?= $row['post_title']; ?></a>
        </h2>
        <p class="lead">
          by <a href="index.php"><?= $row['post_author']; ?></a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?= $row['post_date']; ?></p>
        <a href="post.php?id=<?= $row['post_id']; ?>">
          <img class="" src="img/<?= $row['post_image']; ?>" alt="" height="250px">
        </a>
        <br>
        <br>
        <p><?= $row['post_content']; ?></p>
        <a class="btn btn-primary" href="post.php?id=<?= $row['post_id']; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
        <hr>

      <?php endwhile; ?>

    </div>

    <!-- Blog Sidebar Widgets Column -->
    <?php include('includes/sidebar.php'); ?>

  </div>
  <!-- /.row -->

  <!-- <hr> -->

  <?php include('includes/footer.php'); ?>