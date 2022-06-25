<?php include('admin-includes/header.php'); ?>
<?php include('admin-includes/navigation.php'); ?>

<div id="wrapper">
  <div id="page-wrapper">
    <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="page-header">Users</h1>
      <div class="row">
        <div class="col-lg-12">
          <?php
          $sourse = '';
          if (isset($_GET['source'])) {
            $sourse = $_GET['source'];
          }
          switch ($sourse) {
            case 'add_user':
              include "./admin-includes/users/add_new_user.php";
              break;
            case 'delete_user':
              deleteUser();
              break;
            case 'change_status':
              changeUserStatus();
              break;
            default:
              include('./admin-includes/users/view_all_users.php');
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