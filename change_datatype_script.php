<?php
include 'includes/connect.php';

$query="SELECT `DB_Name` FROM Sites  ";
		$result=$GLOBALS['connect_main']->rawQuery($query); 

		foreach($result as $data) {

			$db_name=$data['DB_Name'];
			//print_r($db_name); echo "<br>";

$GLOBALS['connect']  = new MysqliDb('localhost', 'punctualiti', 'hs5TSG#FZioK', $db_name);


			 $query_check_table="SELECT DISTINCT TABLE_NAME FROM INFORMATION_SCHEMA.COLUMNS
						WHERE TABLE_SCHEMA ='".$db_name."' ";  echo"<br>";
						$result2=$GLOBALS['connect']->rawQuery($query_check_table);

						foreach($result2 as $data2) {
         					$tablename=$data2['TABLE_NAME']; echo"<br>";  

			        			if($tablename=='pun_activity_master'){

			        			 $pun_activity_master="ALTER TABLE $db_name.$tablename CHANGE `Remarks` `Remarks` VARCHAR(500)";

			        			$result1243=$GLOBALS['connect']->rawQuery($pun_activity_master);

			        			echo $db_name.$tablename. "Success";


			        		}

			        			else if($tablename=='pun_alert_master'){

			        			 $pun_alert_master="ALTER TABLE $db_name.$tablename CHANGE `Message_Description` `Message_Description` VARCHAR(100)";

			        			$resultalert=$GLOBALS['connect']->rawQuery($pun_alert_master);


			        		}

			        			else if($tablename=='pun_form'){

			        			 $pun_form="ALTER TABLE $db_name.$tablename CHANGE `Form_Description` `Form_Description` VARCHAR(100)";

			        			$resultform=$GLOBALS['connect']->rawQuery($pun_form);


			        		}


			        		if($tablename=='pun_task_data_posting') {

			        			 $pun_task_data_posting="ALTER TABLE $db_name.$tablename
			        			 CHANGE `Value` `Value` VARCHAR(255), 
			        			 CHANGE `Remark` `Remark` VARCHAR(500)";

			        			$resultposting=$GLOBALS['connect']->rawQuery($pun_task_data_posting);


			        		}

			        		else if($tablename=='pun_meter_reading') {

			        			 $pun_meter_reading="ALTER TABLE $db_name.$tablename CHANGE `Reading` `Reading` VARCHAR(100)";

			        			$resultmeter=$GLOBALS['connect']->rawQuery($pun_meter_reading);


			        		}

			        		else if($tablename=='pun_task_details') {

			        		 $pun_task_details="ALTER TABLE $db_name.$tablename
			        			 CHANGE `Verified_Comment` `Verified_Comment` VARCHAR(100), 
			        			 CHANGE `Remarks` `Remarks` VARCHAR(500)";



			        			$resulttaskdetail=$GLOBALS['connect']->rawQuery($pun_task_details);


			        		}

			        			else if($tablename=='ker_user_master') {

			        		 $ker_user_master="ALTER TABLE $db_name.$tablename
			        			 CHANGE `Site_Label` `Site_Label` VARCHAR(100), 
			        			 CHANGE `Site_Value` `Site_Value` VARCHAR(100)";
							$resultusermaster=$GLOBALS['connect']->rawQuery($ker_user_master);


			        		}

			        			else if($tablename=='ker_user_site_linking') {

			        		 $ker_user_site_linking="ALTER TABLE $db_name.$tablename
			        			 CHANGE `Site_Name_label` `Site_Name_label` VARCHAR(100)";
							$resultlink=$GLOBALS['connect']->rawQuery($ker_user_site_linking);


			        		}

			        			else if($tablename=='ker_form') {

			        		 $ker_form="ALTER TABLE $db_name.$tablename
			        			 CHANGE `Form_Description` `Form_Description` VARCHAR(100)";
							$resultform=$GLOBALS['connect']->rawQuery($ker_form);


			        		}


			        		else if($tablename=='pun_section_master') {

			        		 $pun_section_master="ALTER TABLE $db_name.$tablename
			        			 CHANGE `Section_Description` `Section_Description` VARCHAR(100)";
							$resultsection=$GLOBALS['connect']->rawQuery($pun_section_master);


			        		}

			        			 if($tablename=='pun_alert_action') {

			        		 $pun_alert_action="ALTER TABLE $db_name.$tablename
			        			 CHANGE `Comment` `Comment` VARCHAR(500)";
							$resultalertaction=$GLOBALS['connect']->rawQuery($pun_alert_action);


			        		}

         				}
         			}
?> 