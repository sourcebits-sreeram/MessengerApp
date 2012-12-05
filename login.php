<?php
    session_start();
    if(isset($_SESSION['username']))
    {
        header("location:home.php");
    }

?>
<html>
</title> 
<body>
<center> 
<form action="check_login.php" method="post"> 
Username: 
<input type="text" name="Username" id="username" /> 
<br />
 
Password:
<input type="password" name="Password" id="password" /> 

<br />


<input type="submit" /> 
</form> 
</center> 
</body> 
</html> 

