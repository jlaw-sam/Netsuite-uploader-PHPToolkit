<?php
// include($_SERVER["DOCUMENT_ROOT"]."/Netsuite-uploader-PHPToolkit/config/env.php");
require_once $_SERVER["DOCUMENT_ROOT"]."/Netsuite-uploader-PHPToolkit/PHPToolkit/NetSuiteService.php";
$sql = "SELECT * FROM accountsinternalid";
$query = mysqli_query($conn, $sql);
?>
<?php include("../../header.php"); 
$url =  "{$_SERVER['REQUEST_URI']}";
$title = explode("/", $url);

$service = new NetSuiteService();

$service->setSearchPreferences(false, 1000);

$totalPages = 1000;
if(!empty($_GET["records"])){
    $rowsperpage = $_GET["records"];
}else{
     $rowsperpage = 1;
}

$numpages = ceil($totalPages/$rowsperpage);
if(!empty($_GET["pagenumber"])){
    $currpage = $_GET["pagenumber"];
}else{
    $currpage = 1;
}

$prevpage = $currpage - 1;

$k = 0;
for($x = $prevpage * $numpages; $x < $numpages * $currpage; $x++){
    // $service->setSearchPreferences(false, 1000);
        $recordRef[$k] = new RecordRef();
        $recordRef[$k]->internalId = $x;
        $k++;

}
    $searchField = new SearchMultiSelectField();
    $searchField->operator = "anyOf";
    $searchField->searchValue = $recordRef;

    $search = new TransactionSearchBasic();
    $search->internalId = $searchField;

    $request = new SearchRequest();
    $request->searchRecord = $search;

    $searchResponse = $service->search($request);
    print_r("<pre>");
    print_r($searchResponse);
    die();

?>

<a href="/Netsuite-uploader-PHPToolkit/index.php" class="uk-button uk-button-link uk-icon tm-back"><span uk-icon="icon: chevron-left; " class="uk-icon"></span>Back</a>
<h2 class="uk-h3 uk-margin-medium-top"><?php echo str_replace("Upload", "", urldecode($title[3])); ?></h2><br>

<div class="alert"></div>
<div class="uk-overflow-auto">
    <table class="uk-table uk-table-hover uk-table-striped uk-table-middle uk-table-divider uk-table-responsive">
        <thead>
            <tr>
                <th class="uk-table-shrink"><input class="uk-checkbox" id="checkall" type="checkbox" value=""></th>
                <th class="uk-table-expand">Internal ID</th>
                <th class="uk-table-expand">Number</th>
                <th class="uk-width-small">Account Name</th>
                <th class="uk-table-expand">Type</th>
                <th class="uk-table-expand">Description</th>
                <th class="uk-table-expand">Currency</th>
                <th class="uk-table-expand">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php for($i = 0; $i < count($searchResponse->searchResult->recordList->record); $i++){
            $records = $searchResponse->searchResult->recordList->record[$i];
         ?>
            <tr class="data<?php echo $records->internalId; ?>">
                <td><input class="uk-checkbox removeAccount" type="checkbox" value="<?php echo $records->internalId; ?>"></td>
                <td>
                    <a class="uk-link-reset" href=""><?php echo $records->internalId; ?></a>
                </td>
                <td><?php echo $records->acctNumber;?></td>
                <td class="uk-text-nowrap"><?php echo $records->acctName;?></td>
                <td><?php echo $records->acctType; ?></td>
                <td><?php echo $records->description; ?></td>
                <td><?php echo !empty($records->currency->name) ? $records->currency->name : ""; ?></td>
                <td>
<ul class="uk-iconnav">
    <li><a href="#" uk-icon="icon: file-edit"></a></li>
    <li><a href="#" uk-icon="icon: copy"></a></li>
    <li><a href="#" uk-icon="icon: trash"></a></li>
</ul>
</td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="7"><button class="uk-button uk-button-danger" href="#modal-delete" uk-toggle>Delete Selected Records</button></td>

            <div id="modal-delete" uk-modal>
                <div class="uk-modal-dialog">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <div class="uk-modal-header">
                        <h3>Alert Prompt</h3>
                    </div>
                    <div class="uk-modal-body">
                        <p class="uk-text-danger">Are you sure you want to Delete the Selected Records?</p>
                    </div>
                    <div class="uk-modal-footer uk-text-right">
                        <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                        <button class="uk-button uk-button-danger delete" type="button">Delete</button>
                    </div>
                </div>
            </div>
        </tr>
        </tbody>
    </table>
   <ul class="uk-pagination" uk-margin>
   
            
            <?php if($currpage <= 1){ ?>

            <?php }else { ?>
                 <li><a href="list.php?pagenumber=<?php echo $currpage - 1; ?>&records=<?php echo $rowsperpage; ?>"><span uk-pagination-previous></span></a></li>
               
            <?php } 
            print_r("<div style='display:none;'>".$numpages."</div>");
            if($numpages >= 10){
                $checking = $currpage - 4;
                $start = 0;
                $rspage = 1;
                if($checking < 1){
                $start = 1;
                }else{
                $start = $currpage - 4;
                }
                $end = $start + 9;
                if($currpage >= $numpages || $currpage+4 >= $numpages){ 
                $end = $numpages;
                }

                $resultStart = $end - 9;

            }else{
            $resultStart = 1;
            $end = $numpages;
            }

            for($resultpage = $resultStart; $resultpage <= $end; $resultpage++) {
            if($currpage == $resultpage){
                echo "<li class='uk-active'><span>".$resultpage."</span></li>";
            }else{ ?>  
                <li><a href="list.php?pagenumber=<?php echo $resultpage; ?>&records=<?php echo $rowsperpage; ?>"><?php echo $resultpage; ?></a></li>
    
            <?php
            }
    }
?>
            <?php if($currpage >= $numpages){  } else {?>
                <li><a href="list.php?pagenumber=<?php echo $currpage + 1; ?>&records=<?php echo $rowsperpage; ?>"><span uk-pagination-next></span></a></li>
      
            <?php } ?>
          
</div>


<script>
$("#checkall").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
}); 


$(".delete").click(function(){
    var selected = [];
        $('.removeAccount:checked').each(function(i) {
            selected[i] = $(this).val();
        });

    $.ajax({
            url:"delete.php",
            method: "POST",
            data: {
                checkbox: selected
            },
            dataType: "json",
            success:function(data){
                if(data[0].status == "error"){
                    $(".alert").css({"display": "block"});
                    $(".msg").text(data[0].msg);
                    $(".alert").html("");
                }else if(data[0].status == "success"){
                    var html = "";
                    for(var i = 0; i < data.length; i++){
                        $(".data"+data[i].msg).remove();
                        html += "<div class='uk-alert-danger' uk-alert>"+
                                    "<a class='uk-alert-close' uk-close></a>"+
                                    "<p class='msg'><strong>Removed: </strong> Record Internal ID `"+data[i].msg+"`</p>"+
                                "</div>";
                      
                    }
                    $(".alert").css({"display": "block"});
                    $(".alert").append(html);
                }
            }
    });
});

</script>

   <?php include("../../footer.php"); ?>
