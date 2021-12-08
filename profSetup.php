<!DOCTYPE html>
<html>
    <head>
        <title>Professor Setup</title>
        <link rel="stylesheet" href="style.css">
        <?php 
            include_once('db_connect.php'); 
            include_once('bootstrap.php'); 
            include_once('profSetupUtil.php');
        ?>  
    </head>
    <body>
    <?php
        // Get current user data
        $user   = $_GET['uid'];
        if($user == null) {
            $user = 5;
        }
        submitPlaForm($user, $db);
        submitClassForm($user, $db);
        submitRosterForm($user, $db);

    ?>
    <div class="header">
        <h2> Professor Setup </h2>
        <a><h2> Sign Out </h2></a> 
    </div>
    <div class="content">
        <div class="col-md-12 column welcomeCol">
            <h2> <?php print welcome($user, $db);?> </h2>
        </div>
        <div class="stdMain">
            <div class="col">
                <div class="blueRect">
                    <?php addPlaForm($user, $db); ?>
                </div>
            </div>
            <div class="col">
                <div class="helpSignIn blueRect"> 
                    <?php addClassForm($user, $db); ?>
                </div>
                <div class="blueRect">
                    <?php addRosterForm($user, $db); ?>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
