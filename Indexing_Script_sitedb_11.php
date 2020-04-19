<?php
include 'includes/connect.php';

$query="SELECT `Site_Name`,`DB_Name`,`Master_DB_Name` FROM Sites 
		WHERE DB_Name='punctual_matrix_malad_prism'";
		$result=$GLOBALS['connect_main']->rawQuery($query); 
		//print_r($result);
		foreach($result as $data) {
			$site_name=$data['Site_Name'];
			$db_name=$data['DB_Name'];
			$master_db=$data['Master_DB_Name'];


	$GLOBALS['connect']  = new MysqliDb('localhost', 'punctualiti', 'megtech239', $db_name);
	



	//This query bring all tables present in one db
	$query_check_table="SELECT DISTINCT TABLE_NAME FROM INFORMATION_SCHEMA.COLUMNS
						WHERE TABLE_SCHEMA ='".$db_name."' ";  echo"<br>";
						$result2=$GLOBALS['connect']->rawQuery($query_check_table);

						foreach($result2 as $data2) {
							$col=array("Record_Key","Auto_Id","Id");
         					$tablename=$data2['TABLE_NAME']; echo"<br>";  
         					//print_r($tablename);  					

//this query is used to bring column name of particular table
         	         $query22="SELECT COLUMN_NAME  
         	        		  FROM INFORMATION_SCHEMA.COLUMNS
					  		  WHERE TABLE_SCHEMA ='".$db_name."' 
					  		  AND TABLE_NAME ='".$tablename."' ";
			        		  $result214=$GLOBALS['connect']->rawQuery($query22);
			      $querydropautoid="ALTER TABLE $db_name.$tablename
									  DROP INDEX `Auto_Id`";
					 				 $resultdrop=$GLOBALS['connect']->rawQuery($querydropautoid);  

			        		  foreach ($result214 as $row) {

			        		  	$Column_Name=$row['COLUMN_NAME'];
			     				 //print_r($Column_Name);

			      //   		  	if($Column_Name="Auto_Id" && $Column_Name="Record_Status"
									// && $Column_Name="Record_Key" )  {

			        		  	if($Column_Name="Record_Status")  { 


			        		  		

								$query_primarykey="ALTER TABLE $tablename 
											ADD KEY `Record_Status` (`Record_Status`)";
									$resultt=$GLOBALS['connect']->rawQuery($query_primarykey);

									
								}
								if($Column_Name="Site_Location_Id"){

									$query_sitelocid="ALTER TABLE $tablename 
											ADD KEY `Site_Location_Id` (`Site_Location_Id`)";
									$result88=$GLOBALS['connect']->rawQuery($query_sitelocid);

								}

			        		  	
								if($tablename =="pun_activity_master") {
								 $pun_meter_reading11="ALTER TABLE $tablename 
								ADD KEY `Form_Id`(`Form_Id`) ";

								$result1=$GLOBALS['connect']->rawQuery($pun_meter_reading11);
								//print_r($resultt);

								}

								else if($tablename =="pun_asset_smart_place_master") {
								 $pun_asset_smart_place_masterr="ALTER TABLE $tablename
								
								ADD KEY `Asset_Type_Id`(`Asset_Type_Id`),
								ADD KEY `Asset_Status_Id`(`Asset_Status_Id`),
								ADD KEY `Asset_Category_Id`(`Asset_Category_Id`) ";
								$result5642=$GLOBALS['connect']->rawQuery($pun_asset_smart_place_masterr);
								//print_r($resultt);

								}

								else if($tablename =="pun_alert_master"){
									$pun_alert_master="ALTER TABLE $tablename
								ADD KEY `Task_Id`(`Task_Id`),
								ADD KEY `Form_Id`(`Form_Id`),
								ADD KEY `Form_Structure_Id`(`Form_Structure_Id`),
								ADD KEY `Parameter_Id`(`Parameter_Id`)";
								$result1243=$GLOBALS['connect']->rawQuery($pun_alert_master);
								}

								else if($tablename =="pun_asset_status_log"){
									$pun_asset_status_log="ALTER TABLE $tablename
								ADD KEY `Asset_Id`(`Asset_Id`),
								ADD KEY `Previous_Asset_Status_Id`(`Previous_Asset_Status_Id`),
								ADD KEY `Asset_Status_Id`(`Asset_Status_Id`) ";
								$result54754=$GLOBALS['connect']->rawQuery($pun_asset_status_log);
								}

								else if($tablename =="pun_meter_reading"){
									$pun_meter_reading="ALTER TABLE $tablename
								ADD KEY `Task_Id`(`Task_Id`),
								ADD KEY `Asset_Id`(`Asset_Id`),
								ADD KEY `Activity_Frequency_Id`(`Activity_Frequency_Id`),
								ADD KEY `Form_Structure_Id`(`Form_Structure_Id`)";
								$result5=$GLOBALS['connect']->rawQuery($pun_meter_reading);
								}

								else if($tablename =="pun_parameter_validation"){
									$pun_parameter_validation="ALTER TABLE $tablename
								ADD KEY `Asset_Activity_Linking_Id`(`Asset_Activity_Linking_Id`),
								ADD KEY `Form_Id`(`Form_Id`),
								ADD KEY `Activity_Frequency_Id`(`Activity_Frequency_Id`),
								ADD KEY `Form_Structure_Id`(`Form_Structure_Id`)";
								$result6=$GLOBALS['connect']->rawQuery($pun_parameter_validation);
								}

								else if($tablename =="pun_task_data_posting"){
									$pun_task_data_posting="ALTER TABLE $tablename
								ADD KEY `Task_Id`(`Task_Id`),
								ADD KEY `Form_Id`(`Form_Id`),
								ADD KEY `Section_Id`(`Section_Id`),
								ADD KEY `Parameter_Id`(`Parameter_Id`),
								ADD KEY `Form_Structure_Id`(`Form_Structure_Id`)";
								$result7=$GLOBALS['connect']->rawQuery($pun_task_data_posting);
								}

								else if($tablename =="pun_task_details"){
									$pun_task_details="ALTER TABLE $tablename
								ADD KEY `Asset_Id`(`Asset_Id`),
								ADD KEY `Activity_Id`(`Activity_Id`),
								ADD KEY `Form_Id`(`Form_Id`),
								ADD KEY `Assigned_To_User_Id`(`Assigned_To_User_Id`),
								ADD KEY `Assigned_To_User_Group_Id`(`Assigned_To_User_Group_Id`)";
								$result8=$GLOBALS['connect']->rawQuery($pun_task_details);
								}

								
								else if($tablename =="pun_ticket_created"){
									$pun_ticket_created="ALTER TABLE $tablename
								ADD KEY `Task_Id`(`Task_Id`),
								ADD KEY `Form_Ticket_Id`(`Form_Ticket_Id`),
								ADD KEY `Created_User_Id`(`Created_User_Id`),
								ADD KEY `User_Group_Id`(`User_Group_Id`)";
								$result9=$GLOBALS['connect']->rawQuery($pun_ticket_created);
								}
								
								else if($tablename =="pun_ticket_master"){
									$pun_ticket_master="ALTER TABLE $tablename
								ADD KEY `Asset_Id`(`Asset_Id`),
								ADD KEY `Task_Id`(`Task_Id`),
								ADD KEY `Assigned_To_User_Id`(`Assigned_To_User_Id`),
								ADD KEY `Assigned_To_User_Group_Id`(`Assigned_To_User_Group_Id`)";
								$result10=$GLOBALS['connect']->rawQuery($pun_ticket_master);
								}

								elseif($tablename =="pun_form_structure"){
									$pun_form_structure="ALTER TABLE $tablename
														ADD KEY `Form_Id`(`Form_Id`),
														ADD KEY `sections`(`sections`)";
								$resultpfs=$GLOBALS['connect']->rawQuery($pun_form_structure);
								}

								elseif($tablename =="pun_task_image"){
									$pun_task_image="ALTER TABLE $tablename
														ADD KEY `Task_Id`(`Task_Id`),
														ADD KEY `Form_Structure_Id`(`Form_Structure_Id`)";
								$resulttm=$GLOBALS['connect']->rawQuery($pun_task_image);
								}

								elseif($tablename =="pun_task_verification"){
									$pun_task_verification="ALTER TABLE $tablename
														ADD KEY `Task_Id`(`Task_Id`),
														ADD KEY `Verified_By_User_Id` (`Verified_By_User_Id`)
														";
								$resulttv=$GLOBALS['connect']->rawQuery($pun_task_verification);
								}

								elseif($tablename =="sync_info"){
									$sync_info="ALTER TABLE $tablename
														ADD KEY `User_Id`(`User_Id`)
														";
								$resultsyn=$GLOBALS['connect']->rawQuery($sync_info);
								}

								elseif($tablename =="pun_asset_activity_assigned_to"){
									$pun_asset_activity_assigned_to="ALTER TABLE $tablename
														ADD KEY `Assigned_To_User_Id`(`Assigned_To_User_Id`)
														";
								$resultaas=$GLOBALS['connect']->rawQuery($pun_asset_activity_assigned_to);
								}

								elseif($tablename =="pun_audit_log"){
									$pun_audit_log="ALTER TABLE $tablename
														ADD KEY `Record_Id`(`Record_Id`)
														";
								$resultaal=$GLOBALS['connect']->rawQuery($pun_audit_log);
								}	
								
								elseif($tablename =="pun_trend_state"){
								$pun_trend_state="ALTER TABLE $tablename
												 CHANGE `Id` `Id` INT NOT NULL AUTO_INCREMENT;
														";
								$resulttrend=$GLOBALS['connect']->rawQuery($pun_trend_state);
								}

								elseif($tablename=="pun_field_types"){
								$pun_field_types="ALTER TABLE $tablename  CHANGE `Auto_Id` `Auto_Id` VARCHAR(192)  
								   NOT NULL, CHANGE `Record_Key` `Record_Key` INT NOT NULL AUTO_INCREMENT,
								   ADD UNIQUE INDEX `Record_Key` (`Record_Key`), ADD PRIMARY KEY (`Auto_Id`)"; 
								  $resultpf=$GLOBALS['connect']->rawQuery($pun_field_types);	
								}

								elseif($tablename =="pun_task_edit_table"){
									$pun_task_edit_table="ALTER TABLE $tablename
														ADD KEY `TaskId`(`TaskId`)
														";
								$resultedit=$GLOBALS['connect']->rawQuery($pun_task_edit_table);
								}
								

					





						
                				
                				}
                			}
						//}
					}

?>
