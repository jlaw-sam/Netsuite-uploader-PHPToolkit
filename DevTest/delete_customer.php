<?php

require_once("../PHPToolkit/NetSuiteService.php");

$service = new NetSuiteService();

$recordRef = new RecordRef();
$recordRef->internalId = "628";
$recordRef->type = RecordType::customer;

$request = new DeleteRequest();
$request->baseRef = $recordRef;

$delResponse = $service->delete($request);
var_dump($delResponse);

?>

