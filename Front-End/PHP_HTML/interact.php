<?php
/*Needed to get Username of the signed in user*/
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <style type="text/css">
            #returnedPost{
                cursor: pointer;
            }
            
            #returnedPost:hover{
                background-color: #d1dfec;
            }
        </style>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        
    </head>
<?php
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
    
    
    $postDisplay=$_POST["postsBy"];
    $tagsGotten=$_POST["tags"];
 
             
        //echo '<script>document.getElementById("'.$postDisplay.'").style.backgroundColor = "blue";</script>';
        switch($postDisplay)
        {
            
            case "all":
                  //And now to perform a simple query to make sure it's working
                $query = "SELECT * FROM Posts";
                $result = mysqli_query($db, $query);
                $found = false;
                
                while ($row = mysqli_fetch_assoc($result) ){
                    echo '<div id="returnedPost" onclick="window.location.href=\'response.php\';" title="Reply">';
                    echo '<strong>'.$row['Title'].'</strong><br>';
                    echo $row['Description']."<br></br>";
                    echo '<em>tag: '.$row['Category'].'</em></br>';
                    echo '<em> university: '.$row['University'].'</em><br>';
                    echo '</div>';
                    echo '<div id="author">by: '.$row['UserID'].'</div>';
                    echo '</br>';
                    echo '</br>';
                }
                          //  echo '<div id="returnedPost" > auto post from database</div>';
                //
                /* To Do: Display text*/
                break;
            
            case "byTags":
                /* if user has selected tags to send*/
                if($tagsGotten){
                     
                    foreach ($tagsGotten as $value) {
                       /*NB: Variable '$tagsGotten' is an array containing the tags chosen by the user;
                       So, you SHOULD Perform the correct SQL request here...
                       Basically, query the DB to give you the corresponding Posts that has these tags associated
                       with them.... That would mean that the "POST HELP" page WILL send both
                       --> The post, The Post title, The tag for the Post, The Uni..*/
                       
                        $query = "SELECT * FROM Posts WHERE Category = '$value'";
                        
                        $result = mysqli_query($db, $query);
                        if ($result){
                            $found = false;
                            while ($row = mysqli_fetch_assoc($result) ){
                                echo '<div id="returnedPost" onclick="window.location.href=\'response.php\';">'; //this echo is for tesing purposes ONLY
                                echo '<strong>'.$row['Title'].'</strong><br>';
                                echo $row['Description']."<br></br>";
                                echo '<em>tag: '.$row['Category'].'</em></br>';
                                echo '<em> university: '.$row['University'].'</em><br>';
                                echo '</div>';
                                echo '<div id="author"> by: '.$row['UserID'].'</div></br></br>';
                            }
                        }
                        else{
                            echo  'Error accessing database';
                        }
                        
                    }
                     
                    break;
                }
                else{
                    echo 'No tags selected</br>';
                    echo '<strong style="text-align: center;">Select <em>tags</em> to display from selection box on control pane on left</strong>';
                }
                /* To Do: Display text*/
                break;
            
            case "byUniversity":
                
                /* To Do: Get the user's university*/
                $user = $_SESSION['username'];
                $uniSql = "SELECT `University` FROM `Users` WHERE `Username` =  '$user';";
                $uniQuery = (mysqli_query($db, $uniSql));
                $row = mysqli_fetch_assoc($uniQuery);
                $university = $row['University'];
                $value = $university; //for testing, should be user's uni
                $query = "SELECT * FROM Posts WHERE University = '$value'";
                        
                    $result = mysqli_query($db, $query);
                    if ($result){
                        $found = false;
                        while ($row = mysqli_fetch_assoc($result) ){
    
                            echo '<div id="returnedPost" onclick="window.location.href=\'response.php\';">'; //this echo is for tesing purposes ONLY
                                echo '<strong>'.$row['Title'].'</strong><br>';
                                echo $row['Description']."<br></br>";
                                echo '<em>tag: '.$row['Category'].'</em></br>';
                                echo '<em> university: '.$row['University'].'</em><br>';
                                echo '</div>';
                                echo '<div id="author"> by: '.$row['UserID'].'</div></br></br>';
                        }
                    }
                    else{
                        echo  'Error accessing database';
                    }
               break;
            default:
                break;
        }
?>
  <script src="../Javascript/jQuery.js"></script>
</html>