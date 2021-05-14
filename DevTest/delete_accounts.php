<?php

require_once("../PHPToolkit/NetSuiteService.php");

$service = new NetSuiteService();

$array = ["1933", "1932", "1833", "1832", "1732", "1632", "1534", "1533"];
for($i = 0; $i < count($array); $i++){
	$recordRef = new RecordRef();
	$recordRef->internalId = $array[$i];
	$recordRef->type = RecordType::account;

	$request = new DeleteRequest();
	$request->baseRef = $recordRef;

	$delResponse = $service->delete($request);
	var_dump($delResponse);
}


?>

