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
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<a href = "login.php">LOGIN</a>
<a href = "register.php">SIGN UP</a>    
</center> 
</body> 
</html> 
