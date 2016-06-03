
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
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../CSS/logged.css" type="text/css" >
    <link rel="stylesheet" href="../CSS/returnedPosts.css" type="text/css" />
  </head>
  <body>
    <?php
    //include this to avoid code repitition; foster modularity
     include('headerFile.php');
    ?>
    <!-- NOTE: Side profle content begins here || container for left column-->
    <div class="group">
      <div class="side_profile">
        <div style="background:#fff; padding:10px 5px 10px 10px;">
        <?php
        
        $getUser=$_SESSION['username'];
        echo 'hello <strong><em>'.$getUser.'!</em></strong>';
        ?>
        </div>
        <div id="tag_div">
                <strong style="margin-top: 50px; display: inline-block;">Tag(s)</strong>
                <select  id="list_of_tags">
                  <option value="">&lt;&lt;select&gt;&gt;</option>
                  <option value="gym">Gym</option><option value="economics">Economics</option>
                  <option value="post graduate">Post Graduate</option><option value="computing">Computing</option><option value="music">Music</option>
                  <option value="study buddy">Study Buddy</option><option value="adventure">Adventure</option><option value="books">Books</option>
                  <option value="accommodation">Accommodation</option><option value="travel">Travel</option><option value="study tips">Study Tips</option>
                  <option value="time management">Time management</option><option value="sports">Sports</option><option value="place">Places</option>
                </select>
                </div>
        <div id="tag_container" style="height:250px; overflow:auto; padding: 10px; background: #C6C6C6"></div></br>
        <strong class="side-texts">Rating points earned</strong><br>
        <span id="rating">0</span>
      </div>
      <!-- NOTE: || container for right column -->
      <div class="container">
        <ul class="search-by" id="choice">
          <li><a id="all"><strong>All Posts</strong></a></li>
          <li><a id="byTags" name="me"><strong>By Tags</strong></a></li>
          <li><a id="byUniversity" ><strong>By University</strong></a></li>
        </ul>
        <!-- NOTE: Posts section  begins here -->
        <div id="main-content">
          <div id="allUser" class="posts">
              <!-- NOTE: auto-populated div; will contain users' posts -->
          </div>
           <div class="posts" id="tagUser" style="display: none;" ></div>
           <div class="posts" id="uniUser" style="display:none;"></div>
        </div>
      </div>
    </div>
    
   
    <script src="../Javascript/jQuery.js"></script>
    <script src="../Javascript/script_one.js"  type="text/javascript" ></script>
  </body>
</html>
