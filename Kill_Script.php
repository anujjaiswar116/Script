<?php
 $ress='information_schema';
 date_default_timezone_set('Asia/Kolkata');
$conn=mysqli_connect("localhost","punctualiti","hs5TSG#FZioK",$ress);
//$conn= mysqli_connect('localhost', 'root', 'Qd5s$5(6Y[',$ress);
 $sql="SELECT `Id` AS PID,User, Host,db,Time FROM $ress.processlist 
WHERE Command='Sleep' AND TIME > 500 ";

//  $sql="SELECT `Id` AS PID,User, Host,db,Time FROM $ress.processlist 
// WHERE Command IN ('Sleep','Execute','Query') AND TIME > 120 ";


$res=$conn->query($sql);
$i = 0;
while($row=mysqli_fetch_assoc($res)){

$processid=$row["PID"];
$User=$row["User"];
$Host=$row["Host"];
$dbname=$row["db"];
$Time=$row["Time"];

$sql1[]="KILL ".$processid;
$currentDateTime = date('Y-m-d H:i:s');
$contents[] = PHP_EOL . $currentDateTime . "  ". $processid . "   ".$User . "    ".$Host . "   ".$dbname . "   ".$Time;
}

for($i=0;$i<count($sql1);$i++) {
	$result=$conn->query($sql1[$i]);	
}

$file="KillScriptLog/kill_log_".date('Ymd').".txt";
file_put_contents($file, $contents,FILE_APPEND | LOCK_EX);

?>

