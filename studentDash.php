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
    ?>
    <div class="content">
        <div class="header">
            <h2> PLA Dashboard </h2>
            <a><h2> Sign Out </h2></a> 
        </div>
        <div class="stdMain">
            <div class="col-md-12 column welcomeCol">
                <h2> <?php print welcome($user);?> </h2>
            </div>
            <div class="col">
                <div class="signIn blueRect">
                    <form>
                        <h2>PLA Hours Sign In</h2>
                        <label for="start">Start:</label>
                        <input type="text" id="start" name="start"> <br>
                        <label for="end">End:</label>
                        <input type="text" id="end" name="end"> <br>
                        <label for="date">Date:</label>
                        <input type="text" id="date" name="date"> <br>
                        <input type="submit" value="Submit">
                    </form>
                </div>
                <div class="blueRect"> 
                    <h2>Your Recorded PLA Sessions </h2>
                    <br>
                    <?php getPastShifts($user, $db); ?>
                </div>
            </div>
            
            <div class="col">
                <div class="helpSignIn blueRect"> 
                    <form>
                        <h2>Help Sign In</h2>

                        <label for="students">Student:</label>
                        <select name="students" id="students">
                            <option value="stu1">1</option>
                            <option value="stu2">2</option>
                            <option value="stu3">3</option>
                            <option value="stu4">4</option>
                        </select>
                        <br><br>
                        <label for="topic">Topic:</label>
                        <input type="text" id="topic" name="topic"> <br>
                        <label for="question">Question:</label>
                        <input type="text" id="question" name="question"> <br>
                        <input type="submit" value="Submit">
                    </form>
                </div>
                <div class="blueRect">
                    <h2>Help Recorded </h2>
                    <br>
                    <?php getAskedQuestions($user, $db); ?>
                </div>

            </div>
        </div>
    </div>
</body>
</html>