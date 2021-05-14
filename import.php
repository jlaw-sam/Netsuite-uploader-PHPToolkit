<?php
require_once './config/env.php';
require_once './PHPToolkit/NetSuiteService.php';

$service = new NetSuiteService();
$date = date("Y-m-d H:i:s");
$file_data = $_SESSION['file_data'];

unset($_SESSION['file_data']);

$i = 0;

$file_data = array_map('array_filter', $file_data);
$file_data = array_filter($file_data);

$acctType = !empty($_POST["acctType"]) ? $_POST["acctType"] : "";
$unitsType= !empty($_POST["unitsType"]) ? $_POST["unitsType"] : "";
$unit= !empty($_POST["unit"]) ? $_POST["unit"] : "";
$acctNumber= $_POST["acctNumber"];
$acctName = !empty($_POST["acctName"]) ? $_POST["acctName"] : "";
$legalName = !empty($_POST["legalName"]) ? $_POST["legalName"] : "";
$includeChildren = !empty($_POST["includeChildren"]) ? $_POST["includeChildren"] : "";
$currency = !empty($_POST["currency"]) ? $_POST["currency"] : "";
$exchangeRate = !empty($_POST["exchangeRate"]) ? $_POST["exchangeRate"] : "";
$generalRate= !empty($_POST["generalRate"]) ? $_POST["generalRate"] : "";
$subacc = !empty($_POST["subacc"]) ? $_POST["subacc"] : "";
$parent = !empty($_POST["parent"]) ? $_POST["parent"] : "";
$cashFlowRate = !empty($_POST["cashFlowRate"]) ? $_POST["cashFlowRate"] : "";
$billableExpensesAcct = !empty($_POST["billableExpensesAcct"]) ? $_POST["billableExpensesAcct"] : "";
$deferralAcct = !empty($_POST["deferralAcct"]) ? $_POST["deferralAcct"] : "";
$description = !empty($_POST["description"]) ? $_POST["description"] : "";
$curDocNum = !empty($_POST["curDocNum"]) ? $_POST["curDocNum"] : "";
$isInactive= !empty($_POST["isInactive"]) ? $_POST["isInactive"] : "";
$department = !empty($_POST["department"]) ? $_POST["department"] : "";
$location= !empty($_POST["location"]) ? $_POST["location"] : "";
$restrictToAccountingBookList = !empty($_POST["restrictToAccountingBookList"]) ? $_POST["restrictToAccountingBookList"] : "";
$inventory = !empty($_POST["inventory"]) ? $_POST["inventory"] : "";
$eliminate= !empty($_POST["eliminate"]) ? $_POST["eliminate"] : "";
$subsidiaryList= !empty($_POST["subsidiaryList"]) ? $_POST["subsidiaryList"] : "";
$category1099misc= !empty($_POST["category1099misc"]) ? $_POST["category1099misc"] : "";
$localizationsList= !empty($_POST["localizationsList"]) ? $_POST["localizationsList"] : "";
$openingBalance= !empty($_POST["openingBalance"]) ? $_POST["openingBalance"] : "";
$tranDate= !empty($_POST["tranDate"]) ? $_POST["tranDate"] : "";
$revalue= !empty($_POST["revalue"]) ? $_POST["revalue"] : "";
$customFieldList= !empty($_POST["customFieldList"]) ? $_POST["customFieldList"] : "";
$internalId = !empty($_POST["internalId"]) ? $_POST["internalId"] : "";
$externalId= !empty($_POST["externalId"]) ? $_POST["externalId"] : "";



$subsidiaries = [
"IHS Holding" => "1", 
"Ada Care Center LLC" => "2", 
"Ada Real Estate LLC" => "3", 
"BK Strategies" => "4", 
"Ballard Nursing Center" => "5", 
"Ballard Retirement Village" => "6", 
"HCR, Inc. dba Halo Hospice" => "7", 
"CNC Maintenance Construction" => "8", 
"Commercial Property Investments" => "9", 
"Epecho Associates" => "10", 
"Nursing Facilities" => "11", 
"IHS Management" => "12", 
"Thunder Care and Rehabilitation LLC" => "13", 
"Moore Hillcrest Real Estate" => "14", 
"24th Place LLC" => "15", 
"Norman Cedar Creek Real Estate" => "16", 
"Paradise Air" => "17", 
"Purcell Care Center LLC" => "18", 
"Purcell Real Estate" => "19", 
"The Village Retirement" => "20", 
"IHS Patient Trust Fund" => "21"
];


print_r($subacc);


 foreach($file_data as $row)
 {
  $sql = "INSERT INTO accounts (id, internalId, acctNumber, acctName, acctType, description, currency, subsidiary, parent, updated_at) VALUES (NULL, ";
  $account[$i] = new Account();

  if($internalId !== ""){
    $sql .= "'".$internalId."',";
  }else{
    $sql .= "'0',";
  }

  if($acctNumber !== ""){
    $sql .= "'".$row[$acctNumber]."',";
    $account[$i]->acctNumber = $row[$acctNumber];

  }else{
    $sql .= "'0',";
  }

  if($acctName !== ""){
    $sql .= "'".$row[$acctName]."',";
    $account[$i]->acctName = $row[$acctName];
    
  }else{
    $sql .= "'0',";
  }

  if($acctType !== ""){
    $sql .= "'".$row[$acctType]."',";
    $account[$i]->acctType = "_".lcfirst(str_replace(' ', '', $row[$acctType]));

  }else{
    $sql .= "'0',";
  }

  if($description !== ""){
    $sql .= "'".$row[$description]."',";
    $account[$i]->description = $row[$description];

  }else{
    $sql .= "'0',";
  }

  if($currency !== ""){
    $sql .= "'".$row[$currency]."',";
    //Add currency ex.$USD
    $payment = new RecordRef();
    $payment->internalId = $row[$currency];
    $payment->type  = RecordType::account;

    
    $account[$i]->currency = $payment;
    
  }else{
    $sql .= "'0',";
    //Add currency ex.$USD
    $payment = new RecordRef();
    $payment->internalId = "1";
    $payment->type  = RecordType::account;

    
    $account[$i]->currency = $payment;
  }

  if($subsidiaryList !== ""){
      $object = str_replace("IHS Holding : ", "", $row[$subsidiaryList]);
      $sql .= "'".$row[$subsidiaryList]."',";

      $recordRef = new RecordRef();
      $recordRef->internalId = $subsidiaries[$object];
      $recordRef->type = RecordType::subsidiary;


      $subsidiary = new RecordRefList();
      $subsidiary->recordRef = $recordRef;

      $account[$i]->subsidiaryList = $subsidiary;


  }else{
    $sql .= "'0',";
  }

  if($parent !== "" || $subacc !== ""){
       if($parent !== ""){

        $sql .= "'".$row[$parent]."',";
        $id = $row[$parent];

       }else if($subacc !== ""){

        $sql .= "'".$subacc."',";
        $id = $subacc;

       }
       

      //Add parent sublist
      $parent = new RecordRef();
      $parent->internalId = $id;
      $parent->type = RecordType::account;

      $account[0]->parent = $parent;

  }else{
    $sql .= "'0',";
  }
   $sql .= "'".$date."')";
    // mysqli_query($conn, $sql);
  $i++;
 }
print_r("<pre>");
 print_r($account);

// $addListRequest = new AddListRequest();
// $addListRequest->record = $account;
// $addListResponse = $service->addList($addListRequest);

// for($i=0; $i<count($addListResponse->writeResponseList->writeResponse); $i++)
// {
    
//     if (!$addListResponse->writeResponseList->writeResponse[$i]->status->isSuccess) {
    
//         echo "ADD LIST ERROR<br>";
//     } else {
//         $response = $addListResponse->writeResponseList->writeResponse[$i]->baseRef->internalId;
//         $sql = "INSERT INTO `accountsinternalid` (`id`, `internalId`, `acctNumber`, `updated_at`) VALUES (NULL, '".$response."', '0', '".$date."');";
//         mysqli_query($conn, $sql);
//         echo "ADD LIST SUCCESS ID " .$response."<br/>";
        
//     }
// }



// $addListRequest = new AddListRequest();
// $addListRequest->record = $customer;
// $addListResponse = $service->addList($addListRequest);

// for($i=0; $i<count($addListResponse->writeResponseList->writeResponse); $i++)
// {
    
//     if (!$addListResponse->writeResponseList->writeResponse[$i]->status->isSuccess) {
    
//         echo "ADD LIST ERROR";
//     } else {

//         echo "ADD LIST SUCCESS ID" . $addListResponse->writeResponseList->writeResponse[$i]->baseRef->internalId."\n";
        
//     }
// }

 

//  if(isset($data))
//  {
//   $query = "
//   INSERT INTO csv_file 
//   (first_name last_name email) 
//   VALUES ".implode("" $data)."
//   ";

//   $statement = $connect->prepare($query);

//   if($statement->execute())
//   {
//    echo 'Data Imported Successfully';
//   }
//  }
// }





?>
