<?php
include("header.php");
// CHECK FOR VALID UPLOADED FILE
	
 ?>
<br>
<!-- <form action="#" method="POST">
<div id="upload-drop" class="uk-placeholder">
    Info text... <a class="uk-form-file">Select a file<input id="upload-select" type="file"></a>.
</div>

<div id="progressbar" class="uk-progress uk-hidden">
    <div class="uk-progress-bar" style="width: 0%;">...</div>
</div>

<div id="progressbar" class="uk-progress uk-hidden">
    <div class="uk-progress-bar" style="width: 0%;">...</div>
</div>

<label>CSV Column Delimiter</label></br><br>
<select>
	<option value="comma">Comma</option>
	<option value="semicolon">Semicolon</option>
	<option value="tab">Tab</option>
	<option value="pipe">Pipe</option>
	<option value="space">Space</option>
</select>



<script>

    $(function(){

        var progressbar = $("#progressbar"),
            bar         = progressbar.find('.uk-progress-bar'),
            settings    = {

            action: '/', // upload url

            allow : '*.(jpg|jpeg|gif|png)', // allow only images

            loadstart: function() {
                bar.css("width", "0%").text("0%");
                progressbar.removeClass("uk-hidden");
            },

            progress: function(percent) {
                percent = Math.ceil(percent);
                bar.css("width", percent+"%").text(percent+"%");
            },

            allcomplete: function(response) {

                bar.css("width", "100%").text("100%");

                setTimeout(function(){
                    progressbar.addClass("uk-hidden");
                }, 250);

                alert("Upload Completed")
            }
        };

        var select = UIkit.uploadSelect($("#upload-select"), settings),
            drop   = UIkit.uploadDrop($("#upload-drop"), settings);
    });

</script>

</form> -->
<a href="index.php" class="uk-button uk-button-link uk-icon tm-back"><span uk-icon="icon: chevron-left; " class="uk-icon"></span>Back</a>
<h2 class="uk-h3 uk-margin-small-top">Upload Customer</h2><br>
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
              
            </div><br><br>
            <hr>

        <div id="message"></div>
      <div class="panel panel-default">
          <div class="panel-body">
           
            <h3 class="panel-title">CSV File Mapping</h3>
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
        if(data.error != '')
        {
          $('#message').html('<div class="alert alert-danger">'+data.error+'</div>');
        }
        else
        {
          $('#process_area').html(data.output);
          //$('#upload_area').css('display', 'none');
        }
      }
    });

  });

  var total_selection = 0;

  var first_name = 0;

  var last_name = 0;

  var email = 0;

  var column_data = [];

  $(document).on('change', '.set_column_data', function(){

    var column_name = $(this).val();

    var column_number = $(this).data('column_number');

    if(column_name in column_data)
    {
      alert('You have already define '+column_name+ ' column');

      $(this).val('');

      return false;
    }

    if(column_name != '')
    {
      column_data[column_name] = column_number;
    }
    else
    {
      const entries = Object.entries(column_data);

      for(const [key, value] of entries)
      {
        if(value == column_number)
        {
          delete column_data[key];
        }
      }
    }

    total_selection = Object.keys(column_data).length;

    if(total_selection == 3)
    {
      $('#import').attr('disabled', false);

      first_name = column_data.first_name;

      last_name = column_data.last_name;

      email = column_data.email;
    }
    else
    {
      $('#import').attr('disabled', 'disabled');
    }

  });

  $(document).on('click', '#import', function(event){

    event.preventDefault();
    console.log("fistname:"+first_name);
    console.log("lastname:"+last_name);
    console.log("email:"+email);
    // $.ajax({
    //   url:"import.php",
    //   method:"POST",
    //   data:{first_name:first_name, last_name:last_name, email:email},
    //   beforeSend:function(){
    //     $('#import').attr('disabled', 'disabled');
    //     $('#import').text('Importing...');
    //   },
    //   success:function(data)
    //   {
    //     console.log(data);
    //     $('#import').attr('disabled', false);
    //     $('#import').text('Import');
    //     $('#process_area').css('display', 'none');
    //     $('#upload_area').css('display', 'block');
    //     $('#upload_form')[0].reset();
    //     $('#message').html("<div class='uk-alert uk-alert-success'>"+data+"</div>");
    //   }
    // })

  });
  
});
</script>

    
   <?php include("footer.php"); ?>

