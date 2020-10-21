
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
        $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
        $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
        $phoneno = $_POST['phoneno'];
        $aadharno = $_POST['aadharno'];
        $housename = filter_var($_POST['housename'], FILTER_SANITIZE_STRING);
        $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
        $state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
        $pincode = $_POST['pincode'];
        $wages = $_POST['wages'];
        $specialization = filter_var($_POST['specialization'], FILTER_SANITIZE_STRING);
        $password = md5($_POST['password']);
        date_default_timezone_set('Asia/Kolkata');
        $created_at  = date('Y-m-d H:i:s', time());
        $register_at = date('Y-m-d H:i:s', time());
        $account_type = 2;

        //Check whether the entered account already exists
        $data = [
            'emailid' => $emailid
        ];
        $sql = 'SELECT * FROM labour_register WHERE emailid = :emailid';
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute($data);
        $count = $stmt -> rowCount();
        
        if($count > 0){
            //Labourer account already exists
            $_SESSION['errmsg'] = 'Account already exists.';
        } else {
            //Insert data into the labour_register table
            $data = [
                'emailid' => $emailid,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'phoneno' => $phoneno,
                'aadharno' => $aadharno,
                'housename' => $housename,
                'city' => $city,
                'state' => $state,
                'pincode' => $pincode,
                'wages' => $wages,
                'specialization' => $specialization,
                'created_at' => $created_at
            ];
            $sql = 'INSERT INTO labour_register(emailid, first_name, last_name, phoneno, aadharno, housename, city, state, pincode, wages, specialization, created_at) VALUES (:emailid, :first_name, :last_name, :phoneno, :aadharno, :housename, :city, :state, :pincode, :wages, :specialization, :created_at)';
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute($data);
            $count = $stmt -> rowCount();
            if($count > 0){
                //Labourer data successfully inserted. Now copy the email and password into the login table.
                $data = [
                    'emailid' => $emailid, 
                    'password' => $password, 
                    'account_type' => $account_type, 
                    'register_at' => $register_at
                ];
                $sql = 'INSERT INTO login_details(emailid, password, account_type, register_at) VALUES (:emailid, :password, :account_type, :register_at)';
                $stmt = $pdo -> prepare($sql);
                $stmt -> execute($data);
                $count = $stmt -> rowCount();
                if($count > 0){
                    $_SESSION['succmsg'] = 'New profile has been created.';
                } else {
                    //Failed to Insert data
                    $_SESSION['errmsg'] = 'Oops..Something Happened! Please try again Later!';
                }
            } else {
                //Failed to Insert data
                $_SESSION['errmsg'] = 'Oops..Something Happened! Please try again Later!';
            }
        }
    }
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Farm Assist - Register</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">

    <!-- Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script>
        var check = function() {
            if (document.getElementById('password').value ==
                document.getElementById('confirm_password').value) {
                document.getElementById('message').innerHTML = '';
            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Passwords is not matching';
            }
        }
    </script>

</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Labourer Registration</h2>
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
                    <form method="POST">
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="EMAIL ID" name="emailid">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="FIRST NAME" name="first_name">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="LAST NAME" name="last_name">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="PHONE NO" name="phoneno">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="AADHAR NO" name="aadharno">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="HOUSE NAME" name="housename">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="CITY" name="city">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="STATE" name="state">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="PINCODE" name="pincode">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="WAGES" name="wages">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="SPECIALIZATION" name="specialization">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="password" placeholder="PASSWORD" id="password" name="password" required>
                            <span id='message'></span>
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="password" placeholder="RE-ENTER PASSWORD" id="confirm_password" name="password_confirmation" onkeyup='check();' required>
                        </div>

                        <div class="p-t-20">
                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

                        <!--div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1 js-datepicker" type="text" placeholder="BIRTHDATE" name="birthday">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option disabled="disabled" selected="selected">GENDER</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="class">
                                    <option disabled="disabled" selected="selected">CLASS</option>
                                    <option>Class 1</option>
                                    <option>Class 2</option>
                                    <option>Class 3</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="REGISTRATION CODE" name="res_code">
                                </div>
                            </div>
                        </div>-->
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
