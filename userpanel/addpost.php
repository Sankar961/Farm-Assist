<?php
    //start a session
    session_start();
    //include the dB connection 
    require($_SERVER["DOCUMENT_ROOT"]."/FARMASSIST/connection.php");
    //Cheks whether the submit button is clicked
    if (isset($_POST["submit"]) && !empty($_POST))
    {
        //Collect all the datas entered by the user into variables.
        $emailid = filter_var($_POST['emailid'], FILTER_SANITIZE_EMAIL);	
        $image = filter_var($_POST['image'], FILTER_SANITIZE_STRING);
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
        $price = $_POST['price'];
        $payment = filter_var($_POST['payment'], FILTER_SANITIZE_STRING);
		$quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_STRING);
		date_default_timezone_set('Asia/Kolkata');
        $created_at  = date('Y-m-d H:i:s', time());
        $starts_at = date('Y-m-d H:i:s', time());
        $ends_at = date('Y-m-d H:i:s', time());

        
            $data = [
                'emailid' => $emailid,
                'image' => $image,
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'payment' => $payment,
                'quantity' => $quantity,
                'created_at' => $created_at
            ];
            $sql = 'INSERT INTO post_list(emailid, image, name, description, price, payment, quantity, created_at) VALUES (:emailid, :image, :name, :description, :price, :payment, :quantity, :created_at)';
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute($data);
            $count = $stmt -> rowCount();
            
    }
?>


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
							<label class="col-sm-12 col-md-2 col-form-label">Email id</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="name" required="">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Image</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="file" name="file upload" accept="image">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="name" required="">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Description</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="name" required="">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Price</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="name" required="">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Payment</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="name" required="">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Quantity</label>
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
