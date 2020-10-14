<?php
    
  /*function connect () {
    $host = "localhost";
    $user = "root";
    $pass = null;
    $db = "farmassist";
    
    // Create the connection
    $conn = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);

    return $a;*/
    <?php
$a=mysqli_connect("localhost","root","","farmassist");
if($a)
{
	echo"Ok";
}
else{
echo"not";
error_reporting(E_ALL);
ini_set('display_errors','1');}
?>
  }