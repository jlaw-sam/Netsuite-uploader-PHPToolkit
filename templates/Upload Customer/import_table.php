<?php
session_start();
unset($_SESSION['file_data']);
$types = array("AccountType",
    "AccountNumber",
    "AccountName" ,
    "includeChildren" ,
    "currency" ,
    "exchangeRate" ,
    "parent" ,
    "description" ,
    "Subsidiary",
    "internalId" ,
    "externalId");

$variableType = [
   "AccountType" => "Internal ID",
    "AccountNumber" => "string",
    "AccountName" => "string",
    "includeChildren" => "boolean",
    "currency" => "Internal ID",
    "exchangeRate" => "string",
    "parent" => "Internal ID",
    "description" => "string",
    "Subsidiary" => "Internal ID",
    "internalId" => "string",
    "externalId" => "string"];

$error = '';

$html = '';

if($_FILES['file']['name'] != '')
{
 $file_array = explode(".", $_FILES['file']['name']);

 $extension = end($file_array);

 if($extension == 'csv')
 {
  $file_data = fopen($_FILES['file']['tmp_name'], 'r');

  $file_header = fgetcsv($file_data);

  $html .= '<table class="uk-table uk-table-striped">';
   $html .= '<tr>';
  for($count = 0; $count < count($file_header); $count++)
  {
   $html .= '
   <th class="col'.$count.'">
    <select name="set_column_data" class="uk-select set_column_data" data-column_number="'.$count.'">
     <option value="">Set Column Data</option>';
     for($i = 0; $i < count($types); $i++){
      $html .= '<option value="'.$types[$i].'">'.ucwords($types[$i]).' <small><i>('.$variableType[$types[$i]].')</i></small></option>';
     }
    $html .= '</select>
   </th>
   ';
  }

  $html .= '</tr>';
  $html .= '<tr>';
  for($header = 0; $header < count($file_header); $header++)
  {
  $html .= '<th class="col'.$header.'">'.$file_header[$header].' <input class="uk-checkbox uk-float-right remove" style="margin: 0;" lid="'.$header.'" type="checkbox" value="'.$header.'"></th>';

  }
  $html .= '</tr>';

  $limit = 0;

  while(($row = fgetcsv($file_data)) !== FALSE)
  {
   $limit++;


    $html .= '<tr>';

    for($count = 0; $count < count($row); $count++)
    {
     $html .= '<td class="col'.$count.'">'.$row[$count].'</td>';
    }

    $html .= '</tr>';
   

   $temp_data[] = $row;
  }

  $_SESSION['file_data'] = $temp_data;

  $html .= '
  </table>
  <br />
  <div align="right">
   <a href="index.php" class="uk-button uk-button-default  uk-margin-medium-right">Reset</a>
   <button type="button" class="uk-button uk-button-danger uk-margin-medium-right removeCol" disabled>Remove Column</button>
   <button type="button" name="import" id="import" class="uk-button uk-button-primary" disabled>Import</button>
  </div>
  <br />
  ';
 }
 else
 {
  $error = 'Only <b>.csv</b> file allowed';
 }
}
else
{
 $error = 'Please Select CSV File';
}

$output = array(
 'error'  => $error,
 'output' => $html
);

echo json_encode($output);

?>