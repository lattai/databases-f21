
<!DOCTYPE html>
<html>
<head>
<title>Landing Page </title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link type='text/css' rel='stylesheet' href="LPageStyle.css" />

</head>

<body>


<div class="navbar">
  <a href="#home" onclick="openTab('Home', this, 'orange')" id="defaultOpen">HOME</a>
  <div class="dropdown">
    <button class="dropbtn">MENU
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#news" onclick="openTab('Signup', this)">Signup</a>
      <a href="#news" onclick="openTab('Login', this)">Login</a>
    </div>
  </div>
</div>


<img src='glatfelter2.jpg' /> 


<div id="Home" class="tabcontent">
  <h1><center>Event Brighter</center></h1>
  <h4>Featured Events:</h4>

  <div style="overflow-x:auto;">
    <table>
      <tr>
        <th>Artist</th>
        <th>Location</th>
        <th>Date</th>
        <th>Link</th>
      </tr>
      <tr>
        <td>Travis Porter</td>
        <td>Gettysburg College</td>
        <td>4/26/18</td>
        <td><button class="button" onclick="openTab('Events', this, 'blue')" style="vertical-align:middle" ><span>Purchase Tickets</span></button></td>
      </tr>
    </table>
  </div>

</div>
  
<div id="Signup" class="tabcontent">
  <p><h1>Signup:</h1></p>
  <FORM name ="fmSignup" method="POST" action="signup_f.php">
  <table id="t1">
<TR>
<TD>UserID</TD>
<TD> <INPUT type= "text" name="UserID" placeholder= "enter UserID"/> </TD>
</TR>

<TR>
<TD>Password</TD>
<TD> <INPUT type= "password" name="password" placeholder= "enter password"/> </TD>
</TR>

<TR>
<TD>Email</TD>
<TD> <INPUT type= "text" name="email" placeholder= "enter email"/> </TD>
</TR>
  
<TR>
<TD>Phone</TD>
<TD> <INPUT type= "tel" name="phone" placeholder= "enter phone number"/> </TD>
</TR>
  
<TR>
<TD>Fname</TD>
<TD> <INPUT type= "text" name="fname" placeholder= "enter first name"/> </TD>
</TR>
  
<TR>
<TD>Lname</TD>
<TD> <INPUT type= "text" name="lname" placeholder= "enter last name"/> </TD>
</TR>
  
<BR/>

<TD>
<INPUT type= "submit" value = "Sign Up" />
<INPUT type= "reset" value = "Clear" />
</TD>
  
</TABLE>
</FORM>
</div>

<div id="Login" class="tabcontent">
  <p><h1>Login:</h1></p>
  <FORM name ='fmLogin' action='login_f.php' method='POST'>
  <INPUT type='text' name='login' size='30' placeholder='Your Username' /> <BR /><BR />
  <INPUT type='password' name='password' size='30' placeholder='Your Password' /> <BR /><BR />

  <INPUT type='submit' value='Login'>
  <INPUT type='reset' value='Clear'>
  </FORM>
</div>



</body>
</html>

