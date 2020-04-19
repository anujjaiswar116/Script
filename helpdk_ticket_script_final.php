<?php

include_once 'includes/MysqliDb.php';

$sql = "SELECT `Site_Location_Name`,`Site_DB_Name`,`Auto_Id` FROM `pun_site_location_master` 
 WHERE `Site_DB_Name`NOT IN ('punctual_csmia_zone2_test','punctual_csmia_zone5_test','punctual_csmia_temp')";


$GLOBALS['connect_main'] = new MysqliDb('localhost', 'punctualiti', 'megtech239', 'punctual_csmia_master');
$result = $GLOBALS['connect_main']->rawQuery($sql);
//print_r($result);
foreach ($result as $data) {
    $siteid = $data['Auto_Id'];
     $Site_DB_Name = $data['Site_DB_Name'];
    


   $sql1 = "SELECT asset_id,building_id,floor_id,room_id
    FROM helpdk_tickets 
    WHERE building_id='' AND floor_id='' AND room_id=''AND site_id='" . $siteid . "'";
    $result1 = $GLOBALS['connect_main']->rawQuery($sql1);
   // echo json_encode($result1);
    //print_r(count($result1));
    foreach ($result1 as $data1) {
        $assetid = $data1['asset_id'];

     $sql2 ="SELECT Auto_Id,Building,Floor,Room_No FROM `pun_asset_smart_place_master` WHERE Site_Location_Id='$siteid' AND Auto_Id='$assetid'";
      //echo $Site_DB_Name;
      $GLOBALS['connect'] = new MysqliDb('localhost', 'punctualiti', 'megtech239', $Site_DB_Name);
      $result2=$GLOBALS['connect']->rawQuery($sql2);


        foreach ($result2 as $data2) {
        
            $Building = $data2['Building'];
            $Floor = $data2['Floor'];
            $Room_No = $data2['Room_No'];

   $sql3 = "UPDATE `helpdk_tickets` SET building_id='" . $Building . "',floor_id='" . $Floor . "',room_id='" . $Room_No . "'    WHERE site_id='" . $siteid . "' AND asset_id='" . $assetid . "'";
            $result3=$GLOBALS['connect_main']->rawQuery($sql3);
           //print_r($result3);
     
  }

    }


        


}
?>
