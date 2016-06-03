<?php
session_start();
  
  $user_name = $_POST["user_name"];
  if($user_name){
    

    echo $user_name;
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
    
    $user_name = $_POST["user_name"];
    $first_pass = $_POST["first_pass"];
    $email = $_POST["signup_email"];
    $uni = $_POST["university"];
    
    $_SESSION['username'] = $user_name;
    
    $primaryKey = "SELECT UserID FROM Users ORDER BY UserID DESC LIMIT 1\n". "";
    
    $pkresult = (mysqli_query($db, $primaryKey));
    
    //$row = mysqli_fetch_assoc($result) ;
    $row = mysqli_fetch_assoc($pkresult);
  
    if ($row){
      $result = $row['UserID'];
   
      $primaryKey1 = $result + 1;
    }
    else{
      $primaryKey1 = 0;
    }
      
    $sql = "INSERT INTO test_database. Users (UserID, Username, Email, Password, University, Bio, ReputationRating, ReputationAmount, LastActive) VALUES ($primaryKey1, '$user_name', '$email', '$first_pass', '$uni','', '0', '0', CURRENT_TIMESTAMP);";
  
  
    if (mysqli_query($db, $sql)) {
      echo "New record created successfully";
      header("Location: logged.php");
    } else {
      echo "Error: " ."<br>" . mysqli_error($db);
    }

    mysqli_close($db);
  }
  ?>
  