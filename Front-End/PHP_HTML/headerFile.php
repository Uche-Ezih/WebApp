<?php

echo '
<style type="text/css">
/*Universal selector for adjusting box size automatically*/
 * {
  box-sizing: border-box;
}
html, body{
  margin: 0;
  padding: 0;
}
header {
  background-color: #383838;
  margin: 0;
  padding: 7px 0px;
  padding-bottom: 2px;
}
.fat-header{
  position: fixed;
  width: 100%;
}
header nav ul{
  list-style: none;
  margin-bottom: 4px;
  padding-left: 0;
}
/* Menu bar contents*/
header nav ul li {
  display: inline-block;
  font-size: 1.2em;
  color: #999999;
  border-right: solid 1px;
  padding: 0 60px;
  margin: 0;
}

/* Search box */
input{
  width: 350px;
}
/* unvisited link */
header nav ul li a {
  color: #999999;
  text-decoration: none;
}
/* mouse over link */
header nav ul li a:hover {
  background-color: #454343;
  color: white;
}
/* selected link */
header nav ul li a:active {
    color: #9FBFF5;
}
/*horizontaL rule*/
hr{
  margin-top: 3px;
  border: 2px solid #383838;
  background-color: #383838;
}

    </style>
    <div class="fat-header">
      <header>
        <nav>
          <ul>
            <li><a href="logged.php">Home</a></li> <li><a href="makepost.php">Post Help</a></li>
            <li><form name="search-box" action="" method="GET">
              <input type="search" placeholder="Search questions" name="query" autocomplete="off">
            </form></li>
            <li><a href="manageAccount.php">Manage account</a></li>
            <li><a href="index.php" onclick = "signOut()">sign-out</a></li>
          </ul>
        </nav>
      </header>
      <hr>
    </div>';

?>
