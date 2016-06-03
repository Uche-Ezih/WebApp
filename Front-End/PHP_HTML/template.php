<?php

$username = $_POST["username"];
if ($username) {
session_start();

$username = FALSE;
$password = FALSE;
$usernameRequried = FALSE;
$passwordRequired = FALSE;
 $servername = getenv('IP');
    $user = getenv('C9_USER');
    $pass = "";
    $database = "test_database";
    $dbport = 3306;

    // Create connection
    $db = new mysqli($servername, $user, $pass, $database, $dbport);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 
    $username = $password = "";



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $nameErr = "Name is required";
  } else {
    $username = test_input($_POST["username"]);
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$username)) {
       $nameErr = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["password"])) {
    $passwordErr = "password is required";
  } else {
    $password = test_input($_POST["password"]);
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$password)) {
      $passwordErr = "Only letters and white space allowed"; 
    }
  }
  
}
  //And now to perform a simple query to make sure it's working
$query = "SELECT * FROM Users";
$result = mysqli_query($db, $query);
$found = false;
while ($row = mysqli_fetch_assoc($result) ){
/*echo "The username is: " . $row['Username'] . " and the password is: " . $row['Password'];*/
  if ($username == $row['Username']){
    if($password == $row['Password']){
      $_SESSION['username'] = $_POST['username'];
      header("Location: logged.php");
    }
  }
}
if (!$found && $username!="" && $password!=""){
  $nameErr="*incorrect username";
  $passwordErr="*incorrect password";
}
}
?>