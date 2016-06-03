
<?php
/*Needed to get Username of the signed in user*/
session_start();
$title=$_POST["postTitle"];
  if($title){
    
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
    
    $primaryKey = "SELECT PostID FROM Posts ORDER BY PostID DESC LIMIT 1\n". "";
    $pkresult = (mysqli_query($db, $primaryKey));
    
    //$row = mysqli_fetch_assoc($result) ;
    $row = mysqli_fetch_assoc($pkresult);
  
    if ($row){
      $result = $row['PostID'];
   
      $primaryKey1 = $result + 1;
    }
    else{
      $primaryKey1 = 0;
    }
    
    $title=$_POST["postTitle"];
    $description=$_POST["description"];
    $category=$_POST["tag"];
      $university=$_POST["university"];
    //$userID is result of following querry against  session username
  //SELECT `UserID` FROM `Users` WHERE `Username` = [Session username]
  // $_SESSION['username']
  //$category from the drop down
  // $sql = "INSERT INTO test_database.Posts (PostID, UserID, Title, Description, Category, DateCreated) VALUES ($primaryKey1, '$userID', '$postName', '$description','Computer Science', CURRENT_TIMESTAMP);";
   
   $user = $_SESSION['username'];
   $sql = "INSERT INTO test_database.Posts (PostID, UserID, Title, Description, Category, University, DateCreated) VALUES ($primaryKey1, '$user', '$title', '$description','$category', '$university', CURRENT_TIMESTAMP);";
    
    if (mysqli_query($db, $sql)) {
      //echo "New record created successfully";
    } else {
      echo "Error: " ."<br>" . mysqli_error($db);
    }
  
    mysqli_close($db);
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Reply Post</title>
    <link rel="stylesheet" href="../CSS/response.css" type="text/css" />
  </head>
  <body>
    <?php
    //include this to avoid code repitition; foster modularity
     include('headerFile.php');
    ?>
    <!-- NOTE: Side profle content begins here || container for left column-->
    <div id="container">
        <h3 style="margin-left: 10%">Reply to <?php ?></h3>
        <div class="new_response" style="text-align: center">
            <textarea style="height:200px; width: 80%; resize:none"></textarea>
            <button style="display:block; width: 10%; margin-left: 80%" type="sumbit" name="reply">Reply</button>
        </div></br>
        <small style="margin-left: 10%"><strong>*** Note: your response will be delivered to user's email address ***</strong></small>
        
    </div>
   
    <script src="../Javascript/jQuery.js"></script>
    <script src="../Javascript/script_one.js"  type="text/javascript" ></script>
  </body>
</html>
