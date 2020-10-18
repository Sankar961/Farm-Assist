<?php
    /*session_start();
    if (!$_SESSION['logged_in'])
    {
        header('Location: http://localhost/FARMASSIST');

    }*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('./includes/head.html'); ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php include('./includes/body.html'); ?>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Add New Post</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Add New Post</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <div style="padding-left: 30px;">
    <!-- Main content Add your contents here -->
    
    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue"></h4><br>
						</div>
						<div>
							<?php
							    if (!empty($_SESSION['errmsg'])) {
							        echo '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
							        echo $_SESSION['errmsg'];
							        echo '</div>';
							        unset($_SESSION['errmsg']);
							    }
							    if (!empty($_SESSION['succmsg'])) {
							        echo '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
							        echo $_SESSION['succmsg'];
							        echo '</div>';
							        unset($_SESSION['succmsg']);
							    }
							?>
						</div>
					</div>
					<form method="post">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Text Box</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="name" required="">
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-12 col-md-10">
								<button class="btn btn-info btn-lg" type="submit" name="membership">Add POST</button>
							</div>
						</div>
					</form>
				</div>
							</div>
  






    <!-- /.content -->
    <?php include('./includes/footer.html'); ?>
</body>
</html>
