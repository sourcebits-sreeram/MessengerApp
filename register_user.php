<?php

function addUser()
{
    $user = $_POST["Username"];
    $password = md5($_POST["Password"]);
    $Name = $_POST["Name"];
    $connection = mysql_connect(':/Applications/MAMP/tmp/mysql/mysql.sock','root','root');
//    $connection = mysql_connect('192.168.21.47','root','root');
    $db = mysql_select_db('messenger');
    if($db == null)
    {
        echo "hello";
    }
    if(($user == null)||($password == null)||($Name == null))
    {
        echo "Fields Empty";
    }
    
    else
    {
        $checkUserExistsQuery = "select * from Account where username = '$user' && password = '$password'";
        $result = mysql_query($checkUserExistsQuery);
        $no_rows = mysql_num_rows($result);
        if($no_rows)
        {
            
            header("location:register.php");
        }    
        else
        {
            $addUserQuery = "insert into Account values('$user','$password','$Name')";
            $result = mysql_query($addUserQuery);
            exec("mkdir '$user'");
            header("location:login.php");
        }

        
    }
    mysql_close();
}
    addUser();
    
?>
