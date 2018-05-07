<?php

// Text file on the root dir
// Cust1000002 1000002     ---customerid space deviceid

require_once('../wp-config.php');
global $wpdb;

$getDataFile = bluelily_useGlobal('upload-file');
$datafile=($getDataFile=="")?'clientFile.txt':$getDataFile;
$datafile="../".$datafile;
$getAdminEmail = bluelily_useGlobal('admin-email-address');
$adminEmail=($getAdminEmail=="")?'ask@bluelily.com.au':$getAdminEmail;

if (file_exists($datafile)) {
    $file = fopen($datafile, "r");
} else {
    sendErrorMsg($adminEmail,$getDataFile);
	echo "missing files";
    exit;
}

$progressText= "Using for : ".$getDataFile."<br/>";
$customerArray = array();
$userArray = array();

$SQL="update aurtraposts set post_status='trash' where post_type='company'";
$res=$wpdb->query($SQL);
$SQL="update aurtraposts set post_status='trash' where post_type='device'";
$res=$wpdb->query($SQL);

// create two arrays from the rows in the text file
// do check to remove empty lines from text file
$i=0;
while (!feof($file)) {
    $i++;
    $line = fgets($file);
    $item = explode(" ", $line);
//    echo var_dump($item)."<br/>";
    if(count($item)==2){
        $progressText.=  $i." ".$line."<br/>";
        $customerArray[] = $item[0];
        $deviceArray[]=$item[1];
		
		//check file contents;
		testData($adminEmail,$item[0],$item[1],$i);
     }
     unset($item);
}

//  get unique values & sort the array
$uCustomerArray = array_unique($customerArray);
$arrayCustomers = array_values($uCustomerArray);

for($i=0;$i<count($arrayCustomers);$i++){ 
    // check if client new.... if not create record AND return clientID
   $clientID = isCustomer($arrayCustomers[$i]);
    
    // get a list of devices for each unique client based on keys in arrays
   $uDevices = array_keys($customerArray, $arrayCustomers[$i]);
    
            for($j=0;$j<count($uDevices);$j++){
                   // check if devices exist...  if not create record                
                isDevice($clientID,  $deviceArray[$uDevices[$j]]);
            }
}

function testData($adminEmail,$customerID,$deviceID,$row){
	//  Cust1000002 1000002
    $customerID = rtrim($customerID);
    $deviceID = rtrim($deviceID);	
	if((strlen($customerID)<>11) || (strlen($deviceID)<>7) || (substr($customerID,0,4)<>"Cust")){
		sendDataCorrupMsg($adminEmail,$getDataFile,$row);
		echo "bad file";		
	}	
}
	
function isCustomer($customerID){
    $customerID = rtrim($customerID);
    global $wpdb;
    $SQL="select p.ID from aurtraposts p left join aurtrapostmeta m on p.ID=m.post_id where m.meta_key='customerID' and m.meta_value='".$customerID."'";
    $checkExists=$wpdb->get_var($SQL);
    if($checkExists){
        $SQL="update aurtraposts set post_status='publish' where ID ='".$checkExists."'";
        $res=$wpdb->query($SQL);
    }
    else{
        $wpdb->insert('aurtraposts', array(
             'post_author' => '1',
             'post_title' => 'New', 
             'post_name' => 'New',
             'post_type' => 'company',
             'post_status' => 'publish',
        ));
        $lastid = $wpdb->insert_id;
        
        $wpdb->insert('aurtrapostmeta', array(
             'post_id' => $lastid,
             'meta_key' => 'companyID',
             'meta_value' => $customerID,        
        ));
        $wpdb->insert_id;
    }

} 

function isDevice($customerID, $deviceID){
    $customerID = rtrim($customerID);
    $deviceID = rtrim($deviceID);
    $checkExists=0;
    global $wpdb;
    $SQL="select post_id from aurtrapostmeta where meta_key='deviceID' and meta_value='".$deviceID."'";
    $checkExists=$wpdb->get_var($SQL);

    $SQL="select p.ID from aurtraposts p left join aurtrapostmeta m on p.ID=m.post_id where m.meta_key='deviceID' and m.meta_value='".$deviceID."'";
    $checkExists=$wpdb->get_var($SQL);;
    if($checkExists<>0){
        $SQL="update aurtraposts set post_status='publish' where ID ='".$checkExists."'";
        $res=$wpdb->query($SQL);
    }else{
        $wpdb->insert('aurtraposts', array(
             'post_author' => '1',
             'post_title' => 'New', 
             'post_name' => 'New',
             'post_type' => 'device',
             'post_status' => 'publish',
        ));
       $lastid = $wpdb->insert_id;
        
        $wpdb->insert('aurtrapostmeta', array(
             'post_id' => $lastid,
             'meta_key' => 'companyID',
             'meta_value' => $customerID,        
        ));
        $wpdb->insert_id;        
        $wpdb->insert('aurtrapostmeta', array(
             'post_id' => $lastid,
             'meta_key' => 'deviceID',
             'meta_value' => $deviceID,        
        ));        
        $wpdb->insert_id;
    }
 } 

fclose($file);
sendSuccessMsg($adminEmail,$getDataFile,$progressText);
echo "done";
exit;

function sendDataCorrupMsg($adminEmail,$getDataFile,$row){
    $theSlug='data-file-corrupt';  
    $searchArray=array('{upload_file}','{errorRow}');
    $replaceArray=array($getDataFile, $row);
    $emailMsg = bluelily_getEmailTemplate($theSlug,$searchArray,$replaceArray);
    wp_mail($adminEmail,"Aurtra daily data update failed", $emailMsg);
}

function sendErrorMsg($adminEmail,$getDataFile){
    $theSlug='update-fail';  
    $searchArray=array('{upload_file}');
    $replaceArray=array($getDataFile);
    $emailMsg = bluelily_getEmailTemplate($theSlug,$searchArray,$replaceArray);
    wp_mail($adminEmail,"Aurtra daily data update failed", $emailMsg);
}

function sendSuccessMsg($adminEmail,$getDataFile,$progressText){
    $theSlug='update-success';  
    $searchArray=array('{upload_file}','{progress_log}');
    $replaceArray=array($getDataFile, $progressText);
    $emailMsg = bluelily_getEmailTemplate($theSlug,$searchArray,$replaceArray);
    wp_mail($adminEmail,"Aurtra daily data update complete", $emailMsg);
}
?>