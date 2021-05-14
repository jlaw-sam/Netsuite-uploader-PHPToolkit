<?php
// include($_SERVER["DOCUMENT_ROOT"]."/Netsuite-uploader-PHPToolkit/config/env.php");
require_once $_SERVER["DOCUMENT_ROOT"]."/Netsuite-uploader-PHPToolkit/PHPToolkit/NetSuiteService.php";

$service = new NetSuiteService();

if(isset($_POST["checkbox"])){
	foreach($_POST["checkbox"] as $internalId)
	 {
	 $recordRef = new RecordRef();
		$recordRef->internalId = $internalId;
		$recordRef->type = RecordType::account;

		$request = new DeleteRequest();
		$request->baseRef = $recordRef;

		$delResponse = $service->delete($request);
		if (!$delResponse->writeResponse->status->isSuccess) {

			$array[] = ["msg" => $delResponse->writeResponse->status->statusDetail[0]->message, "status" => "error"];
	        

	    } else {
	        // echo "DELETED FROM ACCOUNTS INTERNAL ID ".$delResponse->writeResponse->baseRef->internalId."<br>";
	        $array[] = ["msg" => $delResponse->writeResponse->baseRef->internalId, "status" => "success"];

	         // mysqli_query($conn, "DELETE FROM accountsinternalid WHERE internalId = '".$delResponse->writeResponse->baseRef->internalId."'");
	    }
	 }
	 echo json_encode($array);
}

if(isset($_POST["single"])){
	foreach($_POST["checkbox"] as $internalId)
	 {
	 $recordRef = new RecordRef();
		$recordRef->internalId = $internalId;
		$recordRef->type = RecordType::account;

		$request = new DeleteRequest();
		$request->baseRef = $recordRef;

		$delResponse = $service->delete($request);
		if (!$delResponse->writeResponse->status->isSuccess) {

			$array[] = ["msg" => $delResponse->writeResponse->status->statusDetail[0]->message, "status" => "error"];
	        

	    } else {
	        // echo "DELETED FROM ACCOUNTS INTERNAL ID ".$delResponse->writeResponse->baseRef->internalId."<br>";
	        $array[] = ["msg" => $delResponse->writeResponse->baseRef->internalId, "status" => "success"];

	         // mysqli_query($conn, "DELETE FROM accountsinternalid WHERE internalId = '".$delResponse->writeResponse->baseRef->internalId."'");
	    }
	 }
	 echo json_encode($array);
}


	
   
	



	

	

	


?>