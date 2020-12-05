<?php
    //start a session
	session_start();
    /*if (!$_SESSION['logged_in'])
    {
        header('Location: http://localhost/FARMASSIST');

    }*/
    //include the dB connection 
	require($_SERVER["DOCUMENT_ROOT"]."/FARMASSIST/connection.php");
	//function to Generate Random String like XX00000000
    function random_num($size) {
        $alpha_key = '';
        $keys = range('A', 'Z');

        for ($i = 0; $i < 2; $i++) {
            $alpha_key .= $keys[array_rand($keys)];
        }

        $length = $size - 2;

        $key = '';
        $keys = range(0, 9);

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $alpha_key . $key;
    }
    //Cheks whether the submit button is clicked
    if (isset($_POST["editpost"]) && !empty($_POST))
    {
		$postid = random_num(8);
		$userid = $_SESSION['emailid'];
		$emailid = $userid;
        //Collect all the datas entered by the user into variables.
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
        $price = number_format($_POST['price'], 2);
        $payment = filter_var($_POST['payment'], FILTER_SANITIZE_STRING);
		$quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_STRING);
		date_default_timezone_set('Asia/Kolkata');
        $created_at  = date('Y-m-d H:i:s', time());
		
		//Image file upload
		$file = $_FILES['photo'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $allowed) ) {
        	if ($fileError === 0) {
        		if ($fileSize < 1000000) {
        			$fileNameNew = "post".$userid.".".$fileActualExt;
        			$fileDestination = 'uploads/'.$fileNameNew;
        			if(move_uploaded_file($fileTmpName, $fileDestination)) {
						//$_SESSION['errmsg'] = "Your file has been successfully uploaded.";
						$data = [
							'post_id' => $postid,
							'emailid' => $emailid,
							'image' => $fileNameNew,
							'name' => $name,
							'description' => $description,
							'price' => $price,
							'payment' => $payment,
							'status' => 1,
							'created_at' => $created_at,
							'quantity' => $quantity
						];
						
						$sql='SELECT * FROM post_list WHERE emailid = :userid AND status = :status';
						$stmt=$pdo -> prepare($sql);
						$stmt -> execute(['userid' => $emailid, 'status' => 1]);
						while ( $rows = $stmt -> fetch(PDO :: FETCH_ASSOC)) 
						
						if(isset($_POST['update']))
                         {
	                      $image=$_POST['image'];
	                      $name=$_POST['name'];
	                      $description=$_POST['description'];
						  $price=$_POST['price'];
						  $payment=$_POST[ 'payment'];
						  $quantity=$_POST['quantity'];
	                     //echo $id;
	                     //echo $designation;
	                     $sql='UPDATE post_list set image='$image',name='$name',description='$description',price='$price',payment='$payment',quantity='$quantity' WHERE emailid=userid status=status");
	                     if($sql)
	                    {
		                 echo "<p>updated</p>";
	                     }
	                    else
	                    {
		                 echo "<p>not</p>";
	
	                     }
                        }

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
              <h1 class="m-0 text-dark">Edit Post</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit Post</li>
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
						<div class="col-sm-12 col-md-3">
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
					<form method="post" enctype="multipart/form-data">

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Image</label>
							<div class="col-sm-12 col-md-3">
								<input class="form-control" type="file" name="photo">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Name</label>
							<div class="col-sm-12 col-md-3">
								<input class="form-control" type="text" name="name" required="">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Description</label>
							<div class="col-sm-12 col-md-3">
								<textarea name="description" id="" cols="38" rows="5"></textarea>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Price</label>
							<div class="col-sm-12 col-md-3">
								<input class="form-control" type="text" name="price" required="">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Payment Method</label>
							<div class="col-sm-12 col-md-3">
								<input class="form-control" type="text" name="payment" required="">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Quantity</label>
							<div class="col-sm-12 col-md-3">
								<input class="form-control" type="text" name="quantity" required="">
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-12 col-md-3">
								<button class="btn btn-info btn-lg" type="submit" name="addpost">Add POST</button>
							</div>
						</div>
					</form>
				</div>
							</div>
    <!-- /.content -->
    <?php include('./includes/footer.html'); ?>
</body>
</html>
