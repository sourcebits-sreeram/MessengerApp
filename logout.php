<?php
    session_start();
    $connection = mysql_connect(':/Applications/MAMP/tmp/mysql/mysql.sock','root','root');
    $db = mysql_select_db('messenger');
    if($db == null) 
    {
        echo "DateBase Error.....";   
    }

    $user = $_SESSION['username'];
    $userOfflineQuery = "delete from Online where username = '$user'";
    $result = mysql_query($userOfflineQuery);
    session_destroy();
//if(isset($_SESSION['username']))
//{
//    unset($_SESSION['username']));
//    unset($_SESSION['password']));
//}
    header("location:login.php");
?>
