<?php include('admin-includes/header.php'); ?>
<?php include('admin-includes/navigation.php'); ?>

<div id="wrapper">
  <div id="page-wrapper">
    <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="page-header">Profile</h1>
      <div class="row">
        <div class="col-lg-12">
          <form action="" method="POST" enctype="multipart/form-data">

            <div class="form-group">
              <label for="user_name">Username</label>
              <input type="text" name="user_name" id="user_name" class="form-control" value="<?= $_SESSION['username'] ?>">
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="user_password" id="password" class="form-control">
            </div>

            <div class="form-group">
              <label for="first_name">Firstname</label>
              <input type="first_name" name="user_first_name" id="first_name" class="form-control" value="<?= $_SESSION['first_name']; ?>">
            </div>

            <div class="form-group">
              <label for="last_name">Lastname</label>
              <input type="last_name" name="user_last_name" id="last_name" class="form-control" value="<?= $_SESSION['last_name']?>">
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="user_email" id="email" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary" name="create_user">Submit</button>
          </form>

        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->
</div>

<?php include 'admin-includes/footer.php'; ?>