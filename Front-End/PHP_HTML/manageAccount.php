<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../CSS/accountmanagement.css" />
    </head>
    
    <body>
        <?php
            //include this to avoid code repitition; foster modularity
            include('headerFile.php');
        ?>
        <div id="main">
        <h1>Account Management</h1>
            
        <ul id="settingsList">
            <li class="settingsListItem">
            <span class="settingsListItemLabel">
                    Username
                </span>
                
                <div class="settingsListItemContent">
                    <input type="text" class="settingsListItemTextInactive" value="Capruce" readonly />
                </div>
            </li>
                
                <li class="settingsListItem">
                    <span class="settingsListItemLabel">
                        Name
                    </span>
                    
                    <div class="settingsListItemContent">
                        <input type="text" class="settingsListItemTextInactive" value="Luis Morera De La Cruz" readonly />
                    </div>
                </li>
                
                <li class="settingsListItem">
                    <span class="settingsListItemLabel">
                        Email
                    </span>
                    
                    <div class="settingsListItemContent">
                       <input type="text" class="settingsListItemTextInactive" value="capruce@gmail.com" readonly />
                    </div>
                </li>
                
                <li class="settingsListItem">
                    <span class="settingsListItemLabel">
                        Password
                    </span>
                    
                    <div class="settingsListItemContent">
                       <input type="password" class="settingsListItemTextInactive" value="password" readonly />
                    </div>
                </li>
                
                <li class="settingsListItem">
                    <span class="settingsListItemLabel">
                        Tags
                    </span>
                    
                    <div class="settingsListItemContent">
                        
                    </div>
                </li>
                
                <li class="settingsListItem" style="border-width: 0px;">
                    <span class="settingsListItemLabel">
                        Rating
                    </span>
                    
                    <div class="settingsListItemContent">
                        0/10
                    </div>
                </li>
            </ul>
        </div>
    </body>
</html>