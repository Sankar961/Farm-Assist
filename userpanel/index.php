<?php
    session_start();
    if (!$_SESSION['logged_in'])
    {
        header('Location: http://localhost/FARMASSIST');

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('./includes/head.html'); ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php include('./includes/body.html'); ?>
    <!-- Main content Add your contents here -->
    

  Please add your necessary data here.







    <!-- /.content -->
    <?php include('./includes/footer.html'); ?>
</body>
</html>
