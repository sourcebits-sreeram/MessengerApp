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
    
    echo "<table border='1'> <tr>    <th>Online Users</th>       </tr>";
    
    $OnlineUserQuery = "select * from Online";
    $result = mysql_query($OnlineUserQuery);
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $line['username'] . "</td>";
        //echo $line['username'];
        echo "</tr>";
    } 
?>