<! DOCTYPE html>
<html>
    <head>
        <title>Make Post</title>
         <link href="../CSS/makepost.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
    <?php
    //include this to avoid code repitition; foster modularity
     include('headerFile.php');
    ?>
    <!-- Post settings outer box-->
    <div id="post_settings">
        <div id="post_settings_inner">
            <h2 style="text-align: center; color:#296fc1;">Post Settings</h2>
            <form id="post_form" onsubmit="return formSubmission()" action="logged.php" method="POST">
               
                <strong style="margin-top: 50px; display: inline-block;">Urgency</strong>
                 <select  class="check" name="urgencySelect" style="margin-left:50px;" id="list_of_urgency" onblur="validate(this,'needed')" onchange="validate(this, 'needed')">
                  <option value="">&lt;&lt;select&gt;&gt;</option>
                  <option value="one_day">1 day</option><option value="one_week">1 week</option><option value="two_weeks">2 weeks</option>
                  <option value="one_month">1 month</option><option value="three_months">3 months</option><option value="six_month">6 months</option>
                  <option value="nine_months">9 months</option><option value="one_year">1 year</option>>
                </select>
                <!-- value required* box-->
                <div id="needed" class="red" style="color:red;"></div>
                
                <div id="tag_div">
                <strong style="margin-top: 50px; display: inline-block;">Tag</strong>
                <select name = "tag" style="margin-left:65px;" id="list_of_tags">
                  <option value="">&lt;&lt;select&gt;&gt;</option>
                  <option value="gym">gym</option><option value="economics">Economics</option>
                  <option value="post graduate">Post Graduate</option><option value="computing">Computing</option><option value="music">Music</option>
                  <option value="study_buddy">Study Buddy</option><option value="adventure">Adventure</option><option value="books">Books</option>
                  <option value="accommodation">Accommodation</option><option value="travel">Travel</option><option value="study tips">Study Tips</option>
                  <option value="time management">Time management</option><option value="sports">Sports</option><option value="place">Places</option>
                </select>
                </div>
                
                <strong style="margin-top: 50px; display:inline-block;">University</strong>
                <select name = "university" style="margin-left: 25px;" id="list_of_tags">
                   <option value="">&lt;&lt;select&gt;&gt;</option><option value="bath">University of Bath</option><option value="bath spa">Bath Spa University</option>
                   <option value="bournemouth">Bournemouth University</option><option value="bristol">University of Bristol</option><option value="uwe">UWE</option>
                   <option value="cranfield">Cranfield University</option><option value="exeter">University of Exeter</option><option value="falmouth">Falmouth University</option>
                   <option value="gloucestershire">University of Gloucestershire</option><option value="oxford brookes">Oxford Brookes University</option><option value="plymouth">Plymouth University</option>
                   <option value="wolverhampton">University of Wolverhampton</option><option value="Worcester">University of Worcester</option>
                </select>
                
            </form>
            
        </div>
    </div>
    <!-- Post content outer box-->
    <div id="post_space">
        <div id="post_space_inner">
            <label for="title"><strong>Title</strong></label>
            <input class="check" id="title" maxlength="100" onblur="validateBox(this,'need_title')" onchange="validateBox(this, 'need_title')" style="width:70%; margin-top: 30px;  margin-left:105px; border: 5px;" form="post_form" type="text" name="postTitle"/>
            <!-- value required* box-->
            <div id="need_title" class="red" style="color:red;"></div>
            
            <label style="position:relative; bottom:100px;" for="text"><strong>Help Text</strong></label>
            <textarea class="check" id="text" onblur="validateBox(this,'need_helpText')" onchange="validateBox(this, 'need_helpText')" style="width:70%; height: 120px; resize:none; margin-left:70px; margin-top: 70px; border: 5px;" form="post_form" name = "description" ></textarea>
            <!-- value required* box-->
            <div id="need_helpText" class="red" style="color:red;"></div>
            
            <label for="post_url"><strong>Url</strong></label>
            <input id="post_url" placeholder="http://www." maxlength="100" style="width:70%; margin-top: 70px; margin-left:110px; border: 5px;" form="post_form" type="url" name="postURL"/>
        </div>
        <button id="post" form="post_form">Post</button> 
    
    </div>
    
    <script src="../Javascript/jQuery.js"></script>
    <script src="../Javascript/forms.js" type="text/javascript"></script>
    </body> 
<html>