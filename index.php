<?php
    //start a session
    session_start();
    //include the dB connection 
    require($_SERVER["DOCUMENT_ROOT"]."/FARMASSIST/connection.php");
    //Cheks whether the submit button is clicked
    if (isset($_POST["login"]) && !empty($_POST))
    {
		//Collect all the datas entered by the user into variables.
		$emailid = $_POST['emailid'];
		$password = md5($_POST['password']);
		//Checks whether the user with given emailid and password exists
        $data = [
            'emailid' => $emailid,
            'password' => $password
        ];
        $sql = 'SELECT * FROM login_details WHERE emailid = :emailid AND password = :password';
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute($data);
		$count = $stmt -> rowCount();
        if ($count > 0) {
			//User Account with emailid and password exists
			$row = $stmt -> fetch();
			$account_type = $row['account_type'];
          //Set SESSION Variables
            $_SESSION['emailid'] = $username;
            $_SESSION['acctype'] = $acctype;
            $_SESSION['logged_in'] = true;
            if ($account_type == 0){
                    //Re-Direct: Adminpanel
                    header("location:".$_SERVER["DOCUMENT_ROOT"]."/FARMASSIST/adminpanel/index.php");
                } else  if ($account_type == 1){
                    //Re-Direct: customer panel
				   // header("location:".$_SERVER["DOCUMENT_ROOT"]."/FARMASSIST/userpanel/index.php");
				   header("Location: http://localhost/FARMASSIST/userpanel/");
                } else {
					//Re-Direct: labour panel
                    header("location:".$_SERVER["DOCUMENT_ROOT"]."/FARMASSIST/labourpanel/index.php");
				}
        } else {
          $_SESSION['errmsg'] = 'Enter valid Account Credientials';
        }
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Farm Assist - Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-55">
						Login
					</span>
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
					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="email" name="emailid" placeholder="Email" required>
					</div>

					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="password" name="password" placeholder="Password">
					</div>
					
					<div class="container-login100-form-btn p-t-25">
						<button type="submit" class="login100-form-btn" name="login">
							Login
						</button>
					</div>


					<div class="text-center w-full p-t-50">
						<span class="txt1">
							Not a member?
						</span>

						<a class="txt1 bo1 hov1" href=".\registration\customer">
							Customer						
						</a>&nbsp;
						<a class="txt1 bo1 hov1" href=".\registration\labour">
							Labourer						
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>