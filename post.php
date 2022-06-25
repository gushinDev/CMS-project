<?php include('includes/header.php'); ?>
<?php include('includes/navigation.php'); ?>


<?php
if (isset($_GET['id'])) {
  $post_id = $_GET['id'];
  $sql = "SELECT * FROM `posts` WHERE `post_id` = $post_id";
  $query = mysqli_query($connection, $sql);
  // checkQueryFailed($query);
  $sql_comments = "SELECT * FROM `comments` WHERE `comment_post_id` = $post_id AND `comment_status` = 'Published'";
  $query_comments = mysqli_query($connection, $sql_comments);
}
if (isset($_POST['submit'])) {
  $comment_post_id = $_POST['comment_post_id'];
  $comment_author = $_POST['comment_author'];
  $comment_email = $_POST['comment_email'];
  $comment_content = $_POST['comment_content'];
  $comment_date = date('d-m-y');
  $sql = "INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) 
          VALUES (NULL, '$comment_post_id', '$comment_author', '$comment_email', '$comment_content', 'Not published', '$comment_date')";
  $query = mysqli_query($connection, $sql);
  header("Location: ./post.php?id=$comment_post_id");
}
?>
<!-- Page Content -->
<div class="container">

  <div class="row">
    <div class="col-lg-8">
      <!-- Title -->
      <?php while ($row = mysqli_fetch_assoc($query)) : ?>
        <h1><?= $row['post_title']; ?></h1>
        <p class="lead">
          by <a href="#"><?= $row['post_author'] ?></a>
        </p>
        <hr>
        <p>
          <span class="glyphicon glyphicon-time"></span> Posted on <?= $row['post_date'] ?>
        </p>
        <hr>
        <img class="img-responsive" src="./img/<?= $row['post_image']; ?>" alt="">
        <hr>
        <!-- Post Content -->
        <p>
          <?= $row['post_content']; ?>;
        </p>

      <?php endwhile; ?>

      <hr>

      <!-- Blog Comments -->

      <!-- Comments Form -->
      <div class="well">
        <h4>Leave a Comment:</h4>
        <form action="post.php" method="POST">
          <input type="hidden" name="comment_post_id" value="<?= $post_id; ?>">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Name" name="comment_author">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" name="comment_email">
          </div>
          <div class="form-group">
            <textarea class="form-control" rows="3" name="comment_content"></textarea>
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
      </div>

      <hr>

      <!-- Posted Comments -->
      <?php while ($comment = mysqli_fetch_assoc($query_comments)) : ?>
        <div class="media">
          <a href="#" class="pull-left">
            <img src="./img/user.jpeg" alt="" class="media-object" height="80px">
          </a>
          <div class="media-body">
            <h4 class="media-heading">
              <?= $comment['comment_author'] ?>
              <small>
                <?= $comment['comment_date'] ?>
              </small>
            </h4>
            <p>
              <?= $comment['comment_content'] ?>
            </p>
          </div>

        </div>
        <hr>
      <?php endwhile; ?>

    </div>

    <!-- Blog Sidebar Widgets Column -->
    <?php include('includes/sidebar.php'); ?>

  </div>
  <hr>

  <?php include('includes/footer.php'); ?>