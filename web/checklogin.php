<?php
/* start the session */

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
 <title>Check Login</title>
 <meta charset = "utf8" />
</head>


<body>

<?php

 $host_db = 'localhost';
 $user_db = 'root';
 $pass_db = '';
 $db_name = 'couchInn';
 $tbl_name = 'users';

// Connect to server and select databse.
mysql_connect($host_db, $user_db, $pass_db)or die("Cannot Connect to Data Base.");

mysql_select_db($db_name)or die("Cannot Select Data Base");

// data enviada desde el formulario
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$_POST[nombre]' and password = '$_POST[password]'";

$result = mysql_query($sql);

// counting table row
$count = mysql_num_rows($result);
// If result matched $username and $password

if($count == 1){

 $_SESSION['loggedin'] = true;
 $_SESSION['username'] = $username;
 $_SESSION['start'] = time();
 $_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;

echo "Bienvenido! " . $_SESSION['username'];

}
 else {
 echo "Username o Password estan incorrectos.";

 echo "<a href='main_login.html'>Volver a Intentarlo</a>";
}

?>
