<?php
  include "template.php";
  ?>  

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Connecting Students</title>
    <link rel="stylesheet" href="../CSS/index.css">
  </head>
  <body>
    <header>
      <nav>
        <h3><strong><a class="paint" href="index.php"><em>Connecting Students</em></a></strong></h3>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
          
          
          <label for="login_username">username</label>
          <input id="login_username" pattern = "/^*[a-zA-Z0-9 ]$/" title = "Letters, numbers and white space only." autocomplete class="login" type="text" name="username">
        
          <label for="login_password">password</label>
          <input id="login_password" pattern = "/^*[a-zA-Z0-9]$/" title = "Letters and numbers only." type="text" name="password" >
          <input class="signin_button login" type="submit" value="Log in"></br>
          <span style="color:red"  id="alert_username"><?php echo $nameErr;?></span>
          <span style="color:red" id="alert_password"><?php echo $passwordErr;?></span>
        </form>
      </nav>
    </header>
    <hr>
    <div class="topText">
      <span id="vision"><h1><em>Share and Receive Help With Other Students</em></h1></span>
      <form class="sign_up" action="addUser.php" method="POST">
        <input class="details" pattern = "/^*[a-zA-Z0-9 ]$/" title = "Letters, numbers and white space only." type="text" placeholder="username" name="user_name" required>
        <input class="details" type="email" placeholder="email" name="signup_email" required> <br>
        <input class="details" pattern = "/^*[a-zA-Z0-9]$/" title = "Letters and numbers only." type="password" placeholder="new password" name="first_pass" required><br>

        <select name = "university" class="details">
          <option value="">&lt;&lt;university&gt;&gt;</option><option value="bath">University of Bath</option><option value="bath_spa">Bath Spa University</option>
          <option value="bournemouth">Bournemouth University</option><option value="bristol">University of Bristol</option><option value="uwe">UWE</option>
          <option value="cranfield">Cranfield University</option><option value="exeter">University of Exeter</option><option value="falmouth">Falmouth University</option>
          <option value="gloucestershire">University of Gloucestershire</option><option value="oxford brookes">Oxford Brookes University</option><option value="plymouth">Plymouth University</option>
          <option value="wolverhampton">University of Wolverhampton</option><option value="Worcester">University of Worcester</option>
        </select><br>
        <button class="submit paint" type="sumbit" name="sign_up">Sign Up</button>
      </form></br>
      <small><em>**NOTE: responses are delivered to users sign up email address... you can update email on your account dashboard**</em></small>
    </div>
    <div class="how_to">
      <h1 style="display: inline;"><em>How It Works ==></em></h1>
      <span class="one circle">1.<strong>Sign Up</strong></span>
      <span class="two circle">2.<strong>Post Help</strong></span>
      <span class="three circle">3.<strong>Reply</strong></span>
      <span class="four circle">4.<strong>Rate Helper</strong></span>
    </div>
  </body>
</html>
