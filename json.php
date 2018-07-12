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
//mysqli_query($DBcon, "SET NAMES 'utf8'");
//mysqli_query($DBcon, "set character_set_server='utf8'");
include "function.php";
$Gapp = isv("app");
if($Gapp == "login"){
    $S = Sel('Client','where username="'.Cstr(isv("user")).'" and password="'.Cstr(isv("password")).'"  and  active=1 ');
    if(!$S->serial)
    UpDate("Client","serial",isv("serial"),"where id=".$S->id);
   die(json_encode(array("data"=>(($S && isv("serial") ==  $S->serial)?$S:false),"serial"=>$S)));    
   
}







?>
