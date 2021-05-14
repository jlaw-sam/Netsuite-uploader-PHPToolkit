<?php
// include($_SERVER["DOCUMENT_ROOT"]."/public_html/config/env.php");
require_once $_SERVER["DOCUMENT_ROOT"]."/public_html/PHPToolkit/NetSuiteService.php";

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

	        echo  $delResponse->writeResponse->status->statusDetail[0]->message."<br>";

	    } else {
	        // echo "DELETED FROM ACCOUNTS INTERNAL ID ".$delResponse->writeResponse->baseRef->internalId."<br>";
	        $array[] = ["internalId" => $delResponse->writeResponse->baseRef->internalId];
	        echo json_encode($array);
	         // mysqli_query($conn, "DELETE FROM accountsinternalid WHERE internalId = '".$delResponse->writeResponse->baseRef->internalId."'");
	    }
	 }
}


	
   
	



	

	

	


?>