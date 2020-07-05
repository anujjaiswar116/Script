<?php
$ress='information_schema';
date_default_timezone_set('Asia/Kolkata');
$conn= mysqli_connect('localhost', 'punctualiti', 'hs5TSG#FZioK',$ress);

$query_dbname="SELECT DISTINCT table_schema FROM information_schema.tables WHERE table_schema NOT IN ( 'information_schema', 'mysql' )";
//echo $query_dbname."*****<br/><br/>";
$resultdb=$conn->query($query_dbname);
//print_r($resultdb);

foreach($resultdb as $data1){
	$table_schema=$data1['table_schema'];
	//echo $table_schema."<br/>";

	$query_tablename="SELECT DISTINCT TABLE_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='".$table_schema."' AND TABLE_NAME='pun_task_details' AND COLUMN_NAME='Started_At'";
	//echo $query_tablename."<br/>";
	$resulttb=$conn->query($query_tablename);

	//punctual_cbre_exl_c1  punctual_cbre_exl_c38    punctual_cbre_exl_c4       

	if (mysqli_num_rows($resulttb)==1) {
		
		$warning="<div style='color: #856404;background-color:#fff3cd;border-color: #ffeeba;'>DB name: ".$table_schema."&nbsp;&nbsp;&nbsp;&nbsp;Column Name exist !!!:)</div>";
		echo $warning;
	 
	 }else{
		
		$query_check_table="SELECT DISTINCT TABLE_NAME  FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='".$table_schema."' AND TABLE_NAME='pun_task_details'";

		$result_table=$conn->query($query_check_table);
		//print_r($result_table);
		if (mysqli_num_rows($result_table)==1) {
			
			$query_alter="ALTER TABLE $table_schema.pun_task_details ADD COLUMN `Started_At` BIGINT(20) NULL AFTER `Scheduled_Date`,ADD KEY `Started_At` (`Started_At`)";
			echo $query_alter."<br/>";
			//$resulttalter=$conn->query($query_alter);

			$query_update="UPDATE $table_schema.pun_task_details SET `Started_At` = DATE_FORMAT(`Task_Start_At`, '%Y%m%d%H%i%s')";
			echo $query_update."<br/>";
			//$resultupdate=$conn->query($query_update);	

			$success='<div style="color: #3c763d;background-color: #dff0d8;border-color: #d6e9c6;">Update Success:)</div>';
			$failed='<div style="color: #a94442;background-color: #f2dede;border-color: #ebccd1;">Failed to Update :(</div>';

			if ($resultupdate == false) {
				echo "&nbsp;&nbsp;&nbsp;Table Name:&nbsp;".$table_schema.$failed;

			}else {
				echo "Table Name:&nbsp;".$table_schema.$success;
			}

		
		}else{	
			$info="<div style='color:#0c5460;background-color:#d1ecf1;border-color: #bee5eb;'>Master DB: ".$table_schema."...</div>";
			echo $info;
		}
	}
	echo "<hr>";		
}


?>