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
// // //Add parent sublist
// //      $parent = new RecordRef();
// //      $parent->internalId = "2132";
// //      $parent->type = RecordType::account;

// // $account->parent = $parent;


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

$account = new RecordRef();
$account->internalId = "624";
$account->type = RecordType::account;

//Add currency ex.$USD
$currency = new RecordRef();
$currency->internalId = "1";
$currency->type  = RecordType::account;

$lines[0] = new JournalEntryLine();
$lines[0]->account = $account;
$lines[0]->memo = "Bank Transaction Entry";
$lines[0]->credit = "100.00";
// $lines[0]->debit = "";

$account = new RecordRef();
$account->internalId = "919";
$account->type = RecordType::account;

$lines[1] = new JournalEntryLine();
$lines[1]->account = $account;
$lines[1]->memo = "Bank Transaction Entry";
// $lines[1]->credit = "";
$lines[1]->debit = "100.00";
// $lines->totalAmount = "200.00";

$lineList = new JournalEntryLineList();
$lineList->line = $lines;

$subsidiary = new RecordRef();
$subsidiary->internalId = "1";
$subsidiary->type = RecordType::subsidiary;

$jEntry = new JournalEntry();
$jEntry->lineList = $lineList;
$jEntry->currency = $currency;
$jEntry->exchangeRate = "1.00";
$jEntry->approved = "true";
$jEntry->subsidiary = $subsidiary;
$jEntry->internalId = "31601";
// $jEntry->createdDate = new DateTime("04/18/2021");



$updateRequest = new UpdateRequest();
$updateRequest->record = $jEntry;

$updateResponse = $service->update($updateRequest);

if (!$updateResponse->writeResponse->status->isSuccess) {
    echo "UPDATE ERROR";
} else {
    echo "UPDATE SUCCESS, id " . $updateResponse->writeResponse->baseRef->internalId;
}

// $request = new AddRequest();
// $request->record = $jEntry;
// $addResponse = $service->add($request);

// if (!$addResponse->writeResponse->status->isSuccess) {
//     echo "ADD ERROR";
// } else {
//     echo "ADD SUCCESS, id " . $addResponse->writeResponse->baseRef->internalId;
// }

// $addListRequest = new AddListRequest();
// $addListRequest->record = $jEntry;
// $addListResponse = $service->addList($addListRequest);

// for($i=0; $i<count($addListResponse->writeResponseList->writeResponse); $i++)
// {
    
//     if (!$addListResponse->writeResponseList->writeResponse[$i]->status->isSuccess) {
    
//         echo "ADD LIST ERROR";
//     } else {

//         echo "ADD LIST SUCCESS ID" . $addListResponse->writeResponseList->writeResponse[$i]->baseRef->internalId."\n";
        
//     }
// }




// $account[1] = new Account();
// $account[1]->acctNumber = "2";
// $account[1]->acctName = "Balance Updates 2";

// //Add currency ex.$USD
// $currency = new RecordRef();
// $currency->internalId = "1";
// $currency->type  = RecordType::account;

// $account[1]->acctType = "_bank";
// $account[1]->currency = $currency;
// $account[1]->description = "Checking Balance";
// //Add parent sublist
// // $parent = new RecordRef();
// // $parent->internalId = "2132";
// // $parent->type = RecordType::account;

// // $account[0]->parent = $parent;


// $recordRef = new RecordRef();
// $recordRef->internalId = "2";
// $recordRef->type = RecordType::subsidiary;


// $subsidiary = new RecordRefList();
// $subsidiary->recordRef = $recordRef;

// $account[1]->subsidiaryList = $subsidiary;

// print_r("<pre>");
// print_r($account);


// $addListRequest = new AddListRequest();
// $addListRequest->record = $account;
// $addListResponse = $service->addList($addListRequest);

// for($i=0; $i<count($addListResponse->writeResponseList->writeResponse); $i++)
// {
    
//     if (!$addListResponse->writeResponseList->writeResponse[$i]->status->isSuccess) {
    
//         echo "ADD LIST ERROR";
//     } else {

//         echo "ADD LIST SUCCESS ID" . $addListResponse->writeResponseList->writeResponse[$i]->baseRef->internalId."\n";
        
//     }
// }



?> 

