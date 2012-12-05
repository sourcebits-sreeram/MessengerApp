<?php
    include 'google_shorten.php';
    session_start();
        if ($_FILES["file"]["error"] > 0)
        {
            echo "Error: " . $_FILES["file"]["error"] . "<br />";
        }
        else
        {
          //  echo "Upload: " . $_FILES["file"]["name"] . "<br />";
          //  echo "Type: " . $_FILES["file"]["type"] . "<br />";
         //   echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
          //  echo "Stored in: " . $_FILES["file"]["tmp_name"];
            
            $destination = $_POST["to"];
            if($destination != null)
            {
                $source = $_SESSION['username'];
                $file = $destination."/". $_FILES["file"]["name"];
                $status = "ACTIVE";
                $connection = mysql_connect(':/Applications/MAMP/tmp/mysql/mysql.sock','root','root');
                //    $connection = mysql_connect('192.168.21.47','root','root');
            
                $db = mysql_select_db('messenger');
                if($db == null)
                {
                    echo "hello";
                }
                move_uploaded_file($_FILES["file"]["tmp_name"], $destination."/". $_FILES["file"]["name"]);
                $key = 'AIzaSyB-ZewmeWfzdjM1Leih6Cj4DsVf8Z3nSH8';
                $googer = new GoogleURLAPI($key);
            
                // Test: Shorten a URL
                $shortDWName = $googer->shorten("http://192.168.21.47:8888/Messenger/".$file);
                //echo $shortDWName;
            
                $sendMessageQuery = "insert into FileUpload values('','$source','$destination','$shortDWName','$status')";
                $result = mysql_query($sendMessageQuery);
            }

        }
     header("location:home.php");
?>
