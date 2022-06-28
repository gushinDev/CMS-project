<?php include('admin-includes/header.php'); ?>

<div id="wrapper">

  <!-- Navigation -->
  <?php include('admin-includes/navigation.php'); ?>

  <div id="page-wrapper">
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">
            Blank Page
            <small>Subheading</small>
          </h1>
          <ol class="breadcrumb">
            <li>
              <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
              <i class="fa fa-file"></i> Blank Page
            </li>
          </ol>
        </div>
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-3">
                  <i class="fa fa-file-text fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                <?php 
                  $sql = "SELECT * FROM posts";
                  $query = mysqli_query($connection, $sql);
                  $post_count = mysqli_num_rows($query);
                ?>
                
                <div class='huge'><?=$post_count?></div>
                  <div>Posts</div>
                </div>
              </div>
            </div>
            <a href="posts.php">
              <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="panel panel-green">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-3">
                  <i class="fa fa-comments fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                <?php 
                $sql = "SELECT * FROM comments";
                $query = mysqli_query($connection, $sql);
                $comments_count = mysqli_num_rows($query);
                ?>  
                
                <div class='huge'><?= $comments_count ?></div>
                  <div>Comments</div>
                </div>
              </div>
            </div>
            <a href="comments.php">
              <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="panel panel-yellow">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-3">
                  <i class="fa fa-user fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">

                <?php 
                $sql = "SELECT * FROM users";
                $query = mysqli_query($connection, $sql);
                $users_count = mysqli_num_rows($query);
                ?>
                  <div class='huge'><?= $users_count ?></div>
                  <div> Users</div>
                </div>
              </div>
            </div>
            <a href="users.php">
              <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="panel panel-red">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-3">
                  <i class="fa fa-list fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                  <?php 
                  $sql = "SELECT * FROM categories";
                  $query = mysqli_query($connection, $sql);
                  $categories_count = mysqli_num_rows($query);
                  ?>
                  <div class='huge'><?= $categories_count ?></div>
                  <div>Categories</div>
                </div>
              </div>
            </div>
            <a href="categories.php">
              <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
              </div>
            </a>
          </div>
        </div>
      </div>


    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include('admin-includes/footer.php'); ?>