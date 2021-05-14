<?php include("header.php"); ?>
<br>
<a href="index.php" class="uk-button uk-button-link uk-icon tm-back"><span uk-icon="icon: chevron-left; " class="uk-icon"></span>Back</a>
<h2 class="uk-h3 uk-margin-small-top">Upload Chart of Accounts</h2><br>
 <div class="row" id="upload_area">
              <form method="post" id="upload_form" enctype="multipart/form-data">
                <div class="col-md-6">
                  <input type="file" name="file" id="csv_file" />
                </div>
                <br /><br /><br />
                <div class="col-md-12">
                  <input class="uk-button uk-button-primary" type="submit" name="upload_file" id="upload_file" class="btn btn-primary" value="Upload" />
                </div>
              </form>
              <br><br>
            </div>
            <hr>

        <div id="message"></div>
      <div class="panel panel-default">
          <div class="panel-body">
           
            <h3 class="panel-title">CSV File Mapping</h3>
            List of Required Maps:
            <div class="uk-text-danger">
              <small>Account Number required *</small><br>
              <small>Account Name required *</small><br>
              <small>Account Type required *</small><br>
              <small>Subsidiary required *</small><br><br>
            </div>
          
            <div class="table-responsive" id="process_area">
             <table class="uk-table uk-table-striped">
                <thead>
                    <tr>
                        <th>
    <select name="set_column_data" class="uk-select" data-column_number="'.$count.'" disabled>
     <option value="">Map Data</option>
     <option value="first_name">First Name</option>
     <option value="last_name">Last Name</option>
     <option value="company">Company name</option>
     <option value="phone">Phone</option>
     <option value="">Not Included</option>
    </select>
  </th>
                        <th>
                           <select name="set_column_data" class="uk-select" data-column_number="'.$count.'" disabled>
     <option value="">Map Data</option>
     <option value="first_name">First Name</option>
     <option value="last_name">Last Name</option>
     <option value="company">Company name</option>
     <option value="phone">Phone</option>
     <option value="">Not Included</option>
    </select>
                        </th>
                        <th>
                           <select name="set_column_data" class="uk-select" data-column_number="'.$count.'" disabled>
     <option value="">Map Data</option>
     <option value="first_name">First Name</option>
     <option value="last_name">Last Name</option>
     <option value="company">Company name</option>
     <option value="phone">Phone</option>
     <option value="">Not Included</option>
    </select>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>No Record</td>
                        <td>No Record</td>
                        <td>No Record</td>
                    </tr>
                  
                </tbody>
            </table>
            </div>
          </div>
        </div>


<script>
$(document).ready(function(){

  $('#upload_form').on('submit', function(event){

    event.preventDefault();
    $.ajax({
      url:"mapper.php",
      method:"POST",
      data:new FormData(this),
      dataType:'json',
      contentType:false,
      cache:false,
      processData:false,
      success:function(data)
      {
        if(data.error != ''){
          $('#message').html('<div class="alert alert-danger">'+data.error+'</div>');
        }else{
          $('#process_area').html(data.output);
          $('#upload_area').fadeOut(1000);
        }
      }
    });
  });
  var list = [];
  var type = [];
  //
  var acctType = 0,
  unitsType = 0,
  unit = 0,
  acctNumber = 0,
  acctName  = 0,
  legalName  = 0,
  includeChildren = 0,
  currency  = 0,
  exchangeRate  = 0,
  generalRate = 0,
  parent  = 0,
  cashFlowRate  = 0,
  billableExpensesAcct  = 0,
  deferralAcct = 0,
  description  = 0,
  curDocNum  = 0,
  isInactive = 0,
  department  = 0,
  location = 0,
  restrictToAccountingBookList  = 0,
  inventory  = 0,
  eliminate = 0,
  subsidiaryList = 0,
  category1099misc = 0,
  localizationsList = 0,
  openingBalance = 0,
  tranDate = 0,
  revalue = 0,
  customFieldList = 0,
  internalId  = 0,
  externalId = 0;

  $(document).on('change', '.set_column_data', function(){
    var val = $(this).val();
    var col_number = $(this).data('column_number');
      $(".remove").attr("disabled", "true");
    if(type.includes(val) == false){
      $(this).attr("disabled", true);
      list[val] = col_number;
      type.push(val);
    }else{
      alert("Data "+val + " Already exists!");
      $(this).val("");
    }

    if(type.includes("acctType") == true && type.includes("acctNumber") == true && type.includes("acctName") == true && type.includes("subsidiaryList") == true){
      $("#import").attr("disabled", false);
    }
    
  });

  $(document).on('click', '.remove', function(event){
    var check = [];
    var checkbox = $(".remove");
    for(var i = 0; i < checkbox.length; i++){
      if(checkbox[i].checked == true){
        check.push(checkbox[i].value);
      }
    }

    if(check.length > 0){
      $(".removeCol").attr("disabled", false);
    }else{
      $(".removeCol").attr("disabled", true);
    }
  });

  $(document).on('click', '.removeCol', function(event){
    var check = [];
    var checkbox = $(".remove");
    for(var i = 0; i < checkbox.length; i++){
      if(checkbox[i].checked == true){
        check.push(checkbox[i].value);
      }
    }

    for(var x = 0; x < check.length; x++){
      $(".col"+check[x]).remove();
    }
  });



  $(document).on('click', '#import', function(event){

    event.preventDefault();

    $.ajax({
      url: "import.php",
      method: "POST",
      data: {
        acctType: list.acctType,
        unitsType: list.unitsType,
        unit: list.unit,
        acctNumber: list.acctNumber,
        acctName: list.acctName,
        // legalName:,
        // includeChildren:,
        currency: list.currency,
        // exchangeRate:,
        // generalRate:,
        parent: list.parent,
        // cashFlowRate:,
        // billableExpensesAcct:,
        // deferralAcct:,
        description: list.description,
        // curDocNum:,
        // isInactive:,
        // department:,
        // location:,
        // restrictToAccountingBookList:,
        // inventory:,
        // eliminate:,
        subsidiaryList: list.subsidiaryList,
        // category1099misc:,
        // localizationsList:,
        // openingBalance:,
        // tranDate:,
        // revalue:,
        // customFieldList:,
        // internalId:,
        // externalId:;
      },
      beforeSend:function(){
        $('#import').attr('disabled', 'disabled');
        $('#import').text('Importing...');
      },
      success:function(data){
        console.log(data);
        $('#import').attr('disabled', false);
        $('#import').text('Import');
        $('#process_area').css('display', 'none');
        $('#upload_area').css('display', 'block');
        $('#upload_form')[0].reset();
        $('#message').html("<div class='uk-alert uk-alert-success'>"+data+"</div>");
      }
    });

  });
});
</script>

    
   <?php include("footer.php"); ?>

