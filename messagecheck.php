<?php
    session_start();
    $user = $_SESSION['username'];
    $connection = mysql_connect(':/Applications/MAMP/tmp/mysql/mysql.sock','root','root');
    //    $connection = mysql_connect('192.168.21.47','root','root');
    $db = mysql_select_db('messenger');
    if($db == null)
    {
        echo "hello";
    }
  

    $messagecheck = "select * from Messages where destination = '$user' && status = 'ACTIVE'";
    $result = mysql_query($messagecheck);
    $no_rows = mysql_num_rows($result);
    if($no_rows)
    {
        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
            echo "FROM:     ";
            echo $line['source'];
            echo "<br>\n";
            echo "MESSAGE: ";
            echo $line['message'];
            echo "<br>\n";
            echo "<br>\n";
        }
        $changeQuery = "update Messages SET STATUS = 'EXPIRED' where destination = '$user' && status = 'ACTIVE'";
        $result = mysql_query($changeQuery);
        $messagecheck = "select * from Messages where status = 'EXPIRED'";
        $result = mysql_query($messagecheck);
        $no_rows = mysql_num_rows($result);
        if($no_rows>10)
        {
            $changeQuery = "delete from Messages where STATUS = 'EXPIRED'";
            $result = mysql_query($changeQuery);     
        }
    }
    echo "<br>\n";
    echo "<br>\n";
    echo "<br>\n";
    echo "ONLINE USERS:";
    echo "<br>\n";
   
    $OnlineUserQuery = "select * from Online";
    $result = mysql_query($OnlineUserQuery);
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
        echo $line['username'];
        echo "<br>\n";
    }
    
?>