<?php

require_once '../PHPToolkit/NetSuiteService.php';


$service = new NetSuiteService();

$service->setSearchPreferences(false, 1000);


	$recordRef = new RecordRef();
	$recordRef->internalId = 1;


$searchField = new SearchMultiSelectField();
$searchField->operator = "anyOf";
$searchField->searchValue = $recordRef;

$search = new TransactionSearchBasic();
$search->internalId = $searchField;

$request = new SearchRequest();
$request->searchRecord = $search;

$searchResponse = $service->search($request);


// $searchId = $searchResponse['searchId'];
// $request = new SearchMoreWithIdRequest();
// $request->searchId = $searchId;
// $request->pageIndex = 2;
// $moreSearchResponse = $service->searchMoreWithId($request);

print_r("<pre>");
print_r($searchResponse);
// for($i = 0; $i < count($searchResponse->searchResult->recordList->record); $i++){
// 	$records = $searchResponse->searchResult->recordList->record[$i];
// 	print_r("internnalID: ".$records->internalId." Name: ".$records->name."<br>");
// }
