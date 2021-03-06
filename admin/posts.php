<?php include('admin-includes/header.php'); ?>
<?php include('admin-includes/navigation.php'); ?>

<div id="wrapper">
  <div id="page-wrapper">
    <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="page-header">Posts</h1>
      <div class="row">
        <div class="col-lg-12">
          <?php
            $sourse = '';
            if(isset($_GET['source'])) {
              $sourse = $_GET['source'];
            }
            switch ($sourse) {
              case 'add_post':
                include "admin-includes/posts/add_post.php";
                break;
              case 'delete_post':
                deletePost();
                break;
              case 'edit_post':
                include "admin-includes/posts/edit_post.php";
                break;
              default:
                include('./admin-includes/posts/view_all_posts.php'); 
              break;
            }

          ?>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->
</div>

<?php include('admin-includes/footer.php'); ?>