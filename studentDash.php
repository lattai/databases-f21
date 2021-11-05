<?php
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Student Dashboard</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div class="content">
        <div class="header">
            <h2> PLA Dashboard </h2>
            <a><h2> Sign Out </h2></a> 
        </div>
        <div class="stdMain">
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
                    <p>9/1/21 7:00pm-9:00pm</p>
                    <p>9/1/21 7:00pm-9:00pm</p>
                    <p>9/1/21 7:00pm-9:00pm</p>
                    <p>9/1/21 7:00pm-9:00pm</p>
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
                    <p>Robin - For Loops</p>
                    <p>Robin - For Loops</p>
                    <p>Robin - For Loops</p>
                    <p>Robin - For Loops</p>

                </div>

            </div>
        </div>
    </div>
</body>
</html>