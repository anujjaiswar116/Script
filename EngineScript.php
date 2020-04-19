<?php
 $ress='information_schema';
 date_default_timezone_set('Asia/Kolkata');

$conn= mysqli_connect('localhost', 'punctualiti', 'megtech239',$ress);

// $database='punctual_societygeneral_victor';
// $sql="SELECT TABLE_NAME,TABLE_SCHEMA 
// 		FROM $ress.TABLES 
//        	WHERE ENGINE <>'InnoDB' AND TABLE_SCHEMA='".$database."' AND TABLE_TYPE='BASE TABLE'";

 $sql="SELECT TABLE_NAME,TABLE_SCHEMA FROM $ress.TABLES 
       WHERE ENGINE <>'InnoDB' AND TABLE_SCHEMA like 'punctual_%'
       AND TABLE_TYPE='BASE TABLE'";

$res=$conn->query($sql);
//print_r($res);
$i=1;
while($row=mysqli_fetch_assoc($res)) {
	$TABLE_NAME=$row["TABLE_NAME"].PHP_EOL;

	//echo $TABLE_NAME."&nbsp;";
	$TABLE_SCHEMA=$row["TABLE_SCHEMA"].PHP_EOL;


	//$sql1="ALTER TABLE $TABLE_SCHEMA.$TABLE_NAME ENGINE='InnoDB'";
	$sql1="ALTER TABLE $TABLE_SCHEMA.$TABLE_NAME ENGINE='InnoDB'";
	
	//echo $sql1;
	$result=$conn->query($sql1);
	$success='<div style="color: #3c763d;background-color: #dff0d8;border-color: #d6e9c6;">Alter Success :)</div>';
	$failed='<div style="color: #a94442;background-color: #f2dede;border-color: #ebccd1;">Sorry there was an error, Please try again :(</div>';
	if ($result == false) {
		echo $i."&nbsp;&nbsp;&nbsp;Table Nane:&nbsp;".$TABLE_NAME.$failed;
	}else {
		echo "Table Nane:&nbsp;".$TABLE_NAME.$success;
	}
	echo "<hr>";
	$i++;
}
//print_r($res);


//}

?>

