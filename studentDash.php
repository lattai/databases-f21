<!DOCTYPE html>
<html>
    <head>
        <title>Student Dashboard</title>
       
        <link rel="stylesheet" href="style.css">
        <?php 
            include_once('db_connect.php'); 
            include_once('bootstrap.php'); 
            include_once('studentDashUtil.php');
            session_start();
            $user = $_SESSION['user'];
        ?>  
    </head>
    <style>
     .header {
        background-color: #00008B;
        color: goldenrod;
        display: flex;
        justify-content: space-between;
        flex-direction: row;
        padding-left: 50px;
        padding-right: 50px;
        font-family: 'Lora', serif;
        font-weight : 600;
        font-size: 25px;
    }
    .head {
	width: 100%;
	margin:  0px;
	color: white;
	background: #00008B;
	text-align: center;
	border: 1px solid #00008B;
	border-bottom: none;
	border-radius: 10px 10px 0px 0px;
	padding: 20px;
	
	font-family: 'Lora', serif;
	font-weight : 600;
	font-size: 25px;
	}
     .menu a, .header h3{
	  color: goldenrod;
	  padding: 20px;
    }
    .box{
	width: 100%;
	margin: 0px;
	color: #00008B;
	background: skyblue;
	text-align: center;
	margin-bottom: 5px;

	border-radius: 10px 10px 0px 0px;
}
body {
    margin: 0px;
    position: relative;
    min-height: 100vh;
    background-image: url('glatfelter3.jpg');
    background-repeat: no-repeat;
    background-size: cover;
}
    </style>
    <body>
    <?php
        // Get current user data
       /* $user   = $_GET['uid'];
        if($user == null) {
            $user = 123;
        } */
        submitSignIn($user, $db);
        submitQuestion($user, $db);

    ?>

        <div class="header">
            <div><h3> PLA Dashboard </h3></div>
            <div class = "menu"> <h3><A href="index.php" style="color: goldenrod;"> Logout</a> </h3></div> 
        </div>
        
        <div class="content">
        <!--div class="col-md-12 column welcomeCol">
            <h2> <?php print welcome($user, $db);?> </h2>
        </div-->
        <div class="stdMain">
            <div class="col">
             <DIV class="box">
             <DIV class="head"> PLA Hours Sign In </DIV>
                <!--div class="signIn blueRect"-->
                    <?php 
                        getSignInForm($user, $db); 
                    ?>
                <!--/div-->
                </div>
                
                <DIV class="box">
                <DIV class="head"> Your Recorded PLA Sessions </DIV>
                <!--div class="blueRect"--> 
                    <br> 
                    <center><?php getPastShifts($user, $db); ?></center>
                <!--/div-->
            </div>
            </div>
            
            <div class="col">
            	 <div class="box">
            	 <DIV class="head"> Help Sign In </DIV>
                <!--div class="helpSignIn blueRect"--> 
                    
                <center><?php getQuestionForm($user, $db); ?></center>
                <!--/div-->
                </div>
                
                <DIV class="box">
                <DIV class="head"> Help Recorded </DIV>
                <!--div class="blueRect"-->
                    <br>
                    <center>
                    <?php 
                        getAskedQuestions($user, $db);
                    ?>
                    </center>
                <!--/div-->
                </div>

            </div>
        </div>
    </div>
</body>
</html>
