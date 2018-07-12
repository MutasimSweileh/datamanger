<?php
$url = parse_url(getenv('JAWSDB_URL'));
$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$database = substr($url["path"], 1);
$DBcon = new mysqli($server, $username, $password, $database);
if ($DBcon->connect_error) {
    die("Connection failed: " . $DBcon->connect_error);
}
date_default_timezone_set("Africa/Cairo");
mysqli_query($DBcon, "SET NAMES 'utf8'");
mysqli_query($DBcon, "set character_set_server='utf8'");
include "function.php";
$Gapp = isv("app");
if($Gapp == "login"){
    $S = Sel('client','where username="'.Cstr(isv("user")).'" and password="'.Cstr(isv("password")).'"  and  active=1 ');
    die(json_encode(array("data"=>$S))); 
   
}







?>
