<?php
    function OpenCon()
     {
    //  $dbhost = "studmysql01.fhict.local";
    //  $dbuser = "dbi313818";
    //  $dbpass = "kip12345";
    //  $db = "dbi313818";

     $dbhost = "localhost";
     $dbuser = "root";
     $dbpass = "kip123";
     $db = "cmseffdb";

     $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

     if(!$conn) {
         echo "Not connected";
     }

     return $conn;
     }
     
    function CloseCon($conn)
     {
     $conn -> close();
     }
       
?>