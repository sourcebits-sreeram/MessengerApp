<?php
    session_start();
    if((isset($_SESSION['username']))&&(isset($_SESSION['password'])))
    {
        header("location:home.php");
    }
    else
    {
        $user = $_POST["Username"];
        $password = md5($_POST["Password"]);    
        $connection = mysql_connect(':/Applications/MAMP/tmp/mysql/mysql.sock','root','root');
        $db = mysql_select_db('messenger');
        if($db == null) 
        {
            echo "DateBase Error.....";   
        }
        if(($user == null)||($password == null))    
        {
            echo "Fields Empty";
            header("location:login.php");
        }
        else
        {
            $checkUserQuery = "select * from Account where username = '$user' && password = '$password'";
            $result = mysql_query($checkUserQuery);
            $no_rows = mysql_num_rows($result);
            if($no_rows)
            {
                $_SESSION['username'] = $user;
                $_SESSION['password'] = $password;
                $userOnlineQuery = "insert into Online values('$user')";
                $result = mysql_query($userOnlineQuery);
                header("location:home.php");
            
            }    
            else
            {
                header("location:login.php");
            }   
        } 
        mysql_close();
    }
?>

