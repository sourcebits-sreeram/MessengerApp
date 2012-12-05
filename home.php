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

    $OnlineUserQuery = "select * from Online where username = '$user'";
    $result = mysql_query($OnlineUserQuery);
    $no_rows = mysql_num_rows($result);
    if($no_rows==0)
    {
        session_destroy();
        header("location:login.php");
    }
    if(!isset($_SESSION['username']))
    {
        header("location:login.php");
    }
?>

<html>
<head>
<script type="text/javascript">
function restart()
{
    var xmlhttp;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
//    xmlHttp.onreadystatechange = function()
//    {
//        if(xmlHttp.readyState == 4)
//        {
//            if(xmlhttp.responseText.length==0)
//            {
//                
//            }
//            else
//            {
//                alert(xmlhttp.responseText);
//            }
//        }
//    }
//    xmlhttp.open("GET","test.php",true);
//    xmlhttp.send();
    
    xmlhttp.open("GET","test.php",false);
    xmlhttp.send();
    if(xmlhttp.responseText.length==0)
    {
        
    }
    else
    {
       //alert(xmlhttp.responseText);
       myWindow=window.open("","Alert!!","width=200,height=100");
       myWindow.document.write(xmlhttp.responseText);
       myWindow.focus();
    }
    
}

function onlineusers()
{
    var xmlhttp;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    //    xmlHttp.onreadystatechange = function()
    //    {
    //        if(xmlHttp.readyState == 4)
    //        {
    //            if(xmlhttp.responseText.length==0)
    //            {
    //                
    //            }
    //            else
    //            {
    //                alert(xmlhttp.responseText);
    //            }
    //        }
    //    }
    //    xmlhttp.open("GET","test.php",true);
    //    xmlhttp.send();
    
    xmlhttp.open("GET","onlineusers.php",false);
    xmlhttp.send();
    if(xmlhttp.responseText.length==0)
    {
        
    }
    else
    {
        //alert(xmlhttp.responseText);
        //       myWindow=window.open("","Alert!!","width=200,height=100");
        //       myWindow.document.write(xmlhttp.responseText);
        //       myWindow.focus();
        document.getElementById("onlineusers").innerHTML=xmlhttp.responseText;
    }
    //document.getElementById("onlineusers").innerHTML="hi everyone";
    
}

function reLoad()
{
    restart();
    onlineusers();
}

setInterval(reLoad,1);
</script>
</head>
<body>
<center>
Welcome home         <?php echo $_SESSION['username']; ?>
<br/>
<br/>
</center>
<script>


</script>
<br/>
<br/>
<br/>
<br/>
<div id = "onlineusers">Hello World</div>
<center>



<form action="sendmessage.php" method="post">
TO:
<br/>
<input type="text" name="to">
<br/>
MESSAGE:
<br/>
<input type="text" name = "msg">
<br/>
<input type="submit" value = "send message">
</form>
<br/>
<br/>
<br/>

<form action="upload.php" method="post"
enctype="multipart/form-data">
TO:
<br/>
<input type="text" name="to">
<br/>
<label for="file">Filename:</label>
<input type="file" name="file" id="file" /> 
<br />
<input type="submit" name="submit" value="Submit" />
</form>

</center>

<form action="logout.php" method="post"> 
<input type="submit" value = "logout" />
</form>
<br/>
<br/>
</body>
</html>