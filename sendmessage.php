<?php
    session_start();
    $to_message = $_POST["to"];
    $from_message = $_SESSION['username'];
    $message = $_POST["msg"];
    $status = "ACTIVE";
    $connection = mysql_connect(':/Applications/MAMP/tmp/mysql/mysql.sock','root','root');
    //    $connection = mysql_connect('192.168.21.47','root','root');
    $db = mysql_select_db('messenger');
    if($db == null)
    {
        echo "hello";
    }
    if(($to_message != null) && ($message != null))
    {
        $sendMessageQuery = "insert into Messages values('','$from_message','$to_message','$message','$status')";
        $result = mysql_query($sendMessageQuery);
    }
    header("location:home.php");
?>
