<?php ?>

<!DOCTYPE html>
<HTML>
    <HEAD>
    <TITLE>Professor Dashboard</TITLE>
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@500;600;700&display=swap" rel="stylesheet"> 


    <?php 
    include('bootstrap.php');
    include_once('db_connect.php');
    session_start();
    $uid = $_SESSION['user'];
    ?>

    <STYLE>
    body {
        margin: 0px;
        position: relative;
        min-height: 100vh;
        background-image: url('glatfelter3.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }

    h1  {
        font-family: 'Lora', serif;
        font-weight : 700;
        font-size: 60px;
        color: #00008B;
    }

    body {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .landingContent{
        /* position: relative; */
        /* top: 40%; */
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        background: rgba(235, 235, 255, 0.8);
    }

    .landingTitle {
        display: flex;
        flex-direction: column;

        width: 60%;
        /* max-width: 800px; */
    }
    .landingTitle p {
        width: 90%;
    }
    
    .landingButtons {
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        width: 20%;
        min-width: 100px;

    }

    .landingButton {
        height: 100%;
        width: 100%;
        font-size: 15px;
        color: white;
        background: #00008B;
        border: none;
        border-radius: 5px;
    }

    .landingButtons form {
        height: 40%;
        padding:0px;
        margin: 0px;
    }


    </STYLE>
</HEAD>
<BODY>
    <div class="page">
        <div class="landingContent">
            <DIV class="landingTitle">
                    <h1>Computer Science Department</h1>
                    <h1>PLA Timesheet System</h1>
                    <p>
                    A service for Gettysburg College computer Science  
                    Department to best operate Peer Learning Assistant hours. 
                    This website allows PLAs to record their hours, who they've assisted, 
                    and what questions they've answered all in one place. It also allows 
                    professors to set up PLA permissions easily and see how PLA hours are 
                    going. This ensures that each PLA is being utilized most effectively, 
                    which leads to more useful PLA hours for students taking 100 level CS
                    classes.
                    
                    </p>
            </DIV>
            <div class="landingButtons">
                <form action="Login.php">
                    <input class="landingButton" type="submit" value="Sign In" />
                </form>
                <form action="register.php">
                    <input class="landingButton" type="submit" value="Register" />
                </form>
            </div>
        </div>
    </div>
</BODY>
</HTML>