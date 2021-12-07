<!DOCTYPE html>
<html>
    <head>
        <title>Student Dashboard</title>
        <link rel="stylesheet" href="style.css">
        <?php 
            include_once('db_connect.php'); 
            include_once('bootstrap.php'); 
            include_once('studentDashUtil.php');
        ?>  
    </head>
    <body>
    <?php
        // Get current user data
        $user   = $_GET['uid'];
        if($user == null) {
            $user = 123;
        }
        submitSignIn($user, $db);
        submitQuestion($user, $db);

    ?>
    <div class="content">
        <div class="header">
            <h2> PLA Dashboard </h2>
            <a><h2> Sign Out </h2></a> 
        </div>
        <div class="col-md-12 column welcomeCol">
            <h2> <?php print welcome($user, $db);?> </h2>
        </div>
        <div class="stdMain">
            <div class="col">
                <div class="signIn blueRect">
                    <?php 
                        getSignInForm($user, $db); 
                    ?>
                </div>
                <div class="blueRect"> 
                    <h2>Your Recorded PLA Sessions </h2>
                    <br> 
                    <center><?php getPastShifts($user, $db); ?></center>
                </div>
            </div>
            
            <div class="col">
                <div class="helpSignIn blueRect"> 
                    
                <center><?php getQuestionForm($user, $db); ?></center>
                </div>
                <div class="blueRect">
                    <h2>Help Recorded </h2>
                    <br>
                    <center>
                    <?php 
                        getAskedQuestions($user, $db);
                    ?>
                    </center>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
