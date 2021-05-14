<?php

require_once '../PHPToolkit/NetSuiteService.php';

$service = new NetSuiteService();

// $account = new Account();
// $account->acctNumber = "4";
// $account->acctName = "Balance Updates 4";

// //Add currency ex.$USD
//      $currency = new RecordRef();
//      $currency->internalId = "1";
//      $currency->type  = RecordType::account;

// $account->acctType = "_bank";
// $account->currency = $currency;
// $account->description = "Checking Balance";
// //Add parent sublist
//      $parent = new RecordRef();
//      $parent->internalId = "2132";
//      $parent->type = RecordType::account;

// $account->parent = $parent;


//      $recordRef = new RecordRef();
//      $recordRef->internalId = "2";
//      $recordRef->type = RecordType::subsidiary;


// $recordRefList = new RecordRefList();
// $recordRefList->recordRef = $recordRef;

// $account->subsidiaryList = $recordRefList;

// $request = new AddRequest();
// $request->record = $account;

// $addResponse = $service->add($request);

// if (!$addResponse->writeResponse->status->isSuccess) {
//     echo "ADD ERROR";
// } else {
//     echo "ADD SUCCESS, id " . $addResponse->writeResponse->baseRef->internalId;
// }



$account[0] = new Account();
$account[0]->acctNumber = "1";
$account[0]->acctName = "Balance Updates";

//Add currency ex.$USD
$currency = new RecordRef();
$currency->internalId = "1";
$currency->type  = RecordType::account;

$account[0]->acctType = "_bank";
$account[0]->currency = $currency;
$account[0]->description = "Checking Balance";
//Add parent sublist
// $parent = new RecordRef();
// $parent->internalId = "2132";
// $parent->type = RecordType::account;

// $account[0]->parent = $parent;


$recordRef = new RecordRef();
$recordRef->internalId = "2";
$recordRef->type = RecordType::subsidiary;


$subsidiary = new RecordRefList();
$subsidiary->recordRef = $recordRef;

$account[0]->subsidiaryList = $subsidiary;


$account[1] = new Account();
$account[1]->acctNumber = "2";
$account[1]->acctName = "Balance Updates 2";

//Add currency ex.$USD
$currency = new RecordRef();
$currency->internalId = "1";
$currency->type  = RecordType::account;

$account[1]->acctType = "_bank";
$account[1]->currency = $currency;
$account[1]->description = "Checking Balance";
//Add parent sublist
// $parent = new RecordRef();
// $parent->internalId = "2132";
// $parent->type = RecordType::account;

// $account[0]->parent = $parent;


$recordRef = new RecordRef();
$recordRef->internalId = "2";
$recordRef->type = RecordType::subsidiary;


$subsidiary = new RecordRefList();
$subsidiary->recordRef = $recordRef;

$account[1]->subsidiaryList = $subsidiary;

print_r("<pre>");
print_r($account);


$addListRequest = new AddListRequest();
$addListRequest->record = $account;
$addListResponse = $service->addList($addListRequest);

for($i=0; $i<count($addListResponse->writeResponseList->writeResponse); $i++)
{
    
    if (!$addListResponse->writeResponseList->writeResponse[$i]->status->isSuccess) {
    
        echo "ADD LIST ERROR";
    } else {

        echo "ADD LIST SUCCESS ID" . $addListResponse->writeResponseList->writeResponse[$i]->baseRef->internalId."\n";
        
    }
}



?> 

