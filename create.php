<?php

function addUser()
{
    $user = $_POST["Username"];
    $password = $_POST["Password"];
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
        $addUserQuery = "insert into Account values('$user','$password','$Name')";
        $result = mysql_query($addUserQuery);
    }
    mysql_close();
}
    addUser();
    
?>
