<?php


require_once '../PHPToolkit/NetSuiteService.php';

$service = new NetSuiteService();


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

