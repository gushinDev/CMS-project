<?php include('admin-includes/header.php'); ?>
<?php include('admin-includes/navigation.php'); ?>

<div id="wrapper">
  <div id="page-wrapper">
    <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="page-header">Comments</h1>
      <div class="row">
        <div class="col-lg-12">
          <?php
          $sourse = '';
          if (isset($_GET['source'])) {
            $sourse = $_GET['source'];
          }
          switch ($sourse) {
            case 'delete_comment':
              deleteComment();
              break;
            case 'edit_comment':
              include "admin-includes/edit_post.php";
              break;
            case 'change_status':
              changeCommentStatus();
              break;
            default:
              include('./admin-includes/comments/view_all_comments.php');
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