@extends('layout.master')

@push('plugin-styles')
  <!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
  {!! Html::style('/assets/css/datatables.min.css') !!}
@endpush

@section('content')
 <meta name="csrf-token" content="{{ csrf_token() }}">
<div class="row">
  <div class="col-lg-12 grid-margin">
    <div class="card">
	<div class="card-header d-flex justify-content-between">
        <div class="header-title">
            <h4 class="card-title">User List</h4>
        </div>
    </div>
      <div class="card-body">
        <h2 class="card-title"></h2>
		<header class="panel-heading" >&nbsp;&nbsp;&nbsp;
			<button type="button" class="btn btn-success" data-toggle="modal" style="margin-bottom: 0px;float:right; background-color: #32BDEA;
			border-color: #32BDEA; " data-target=".bd-example-modal-lg" onclick="modalView()">Add Uesr</button>
		</header>
        <div class="table-responsive1">
          <table class="table table-bordered" id="vendorsTable">
            <thead>
              <tr>
                <th>S.No</th>
				<th>Full Name</th>
				<th>Father Name</th>
                <th>Mother Name</th>
				<th>Email</th>
				<th>Mobile Number</th>
                <th>Action</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!------delete modal--->
<div class="modal fades" id="deletepettypeModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" style="display:none">
  <div class="modal-dialog">
  <div class="modal-content" style="background-color: #fff !important;">
    <div class="modal-header">
	<h5 class="modal-title" id="lineModalLabel">Delete</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"   onclick="closeform()"><span aria-hidden="true" >&times;</span></button>
    </div>
    <div class="modal-body">
      <form  id="deleteForm" method="post">
             <input type="hidden" name="delete_id" id="delete_id" value="">

            <div class="form-group"  align="center">
			<h5>Are you sure want to delete?</h5>
			  <button type="button" id="delete" onclick="deleteUserList()" class="btn btn-primary btn-md">Yes</button>
              <button type="button" class="btn  btn-md btn-danger" data-dismiss="modal"  onclick="closeform()" role="button">No</button>
            </div>
          
            </form>

    </div>
   
  </div>
  </div>
</div>
<script>
</script>
    <script src="assets/js/app.js"></script>
	 <!--<script src="assets/js/backend-bundle.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js" defer></script>

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"defer></script> 

<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" defer></script>
<script src="https://cdn.datatables.net/colreorder/1.5.4/js/dataTables.colReorder.min.js" defer></script>


 
   {!! Html::script('/assets/application/users.js') !!}

<script>
    var baseUrl= '<?php echo URL::to('/'); ?>';
    console.log(baseUrl);
	$('#baseUrl').val(baseUrl);
</script>



@endsection
<style type="text/css">
  .modal-header{
    color:#ffff;
    background: #393185;
  }
  .modal-body{
    background:#ffff;
  }
#first_name-error  		{color:red !important;}
#middle_name-error  	{color:red !important;}
#email-error  			{color:red !important;}
#last_name-error  		{color:red !important;}
#father_name-error  	{color:red !important;}
#mother_name-error  	{color:red !important;}
#mobile_number-error  	{color:red !important;}
#whatsapp_number-error  {color:red !important;}
  .tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

#tooltip .tooltiptext {
  visibility: hidden;
  width: 45px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}
#tooltip:hover .tooltiptext {
  visibility: visible;
}
  
</style>
<div class="modal fade" id="modal_form" style="display:none">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
	<div class="modal-header">
	<h4 class="modal-title" style="float: left;"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
	   <form id="vendors_form" style="padding: 4px 13px;">
				
					<div class="row">
					<input type="hidden" value="" id="id" name="id"/> 
					<input type="hidden" value="" id="baseUrl" name="baseUrl"/>
						
						<div class="col-md-4 roles">
                            <label for="roles">First Name</label>
                            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="" autocomplete="off" maxlength="50">
                        </div>
                       <div class="col-md-4 roles">
                            <label for="roles">Middle Name</label>
                            <input type="text" name="middle_name" class="form-control" id="middle_name" placeholder="" autocomplete="off" maxlength="50">
                        </div>
						<div class="col-md-4 roles">
                            <label for="roles">Last Name</label>
                            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="" autocomplete="off" maxlength="50">
                        </div>
                    </div>
					<div class="row">
					
					<div class="col-md-4 phone_number">
                            <label for="phone_number">Father Name</label>
                            <input type="text" name="father_name" class="form-control" id="father_name"  placeholder="" autocomplete="off" maxlength="50">
                        </div>
					 <div class="col-md-4 phone_number">
                            <label for="phone_number">Mother Name</label>
                            <input type="text" name="mother_name" class="form-control" id="mother_name" placeholder="" autocomplete="off" >
                        </div>
					<div class="col-md-4 phone_number">
                            <label for="phone_number">Email</label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="" autocomplete="off" maxlength="50">
                        </div>
					</div>
					<div class="row">
						
					<div class="col-md-4 phone_number">
                            <label for="phone_number">Mobile Number</label>
                            <input type="text" name="mobile_number" class="form-control" id="mobile_number"  placeholder=""  maxlength="50">
                        </div>
					<div class="col-md-4 phone_number">
                            <label for="phone_number">Whatsapp Number</label>
                            <input type="text" name="whatsapp_number" class="form-control" id="whatsapp_number"  placeholder="" autocomplete="off" maxlength="50">
                        </div>
						
					</div>
					 <div class="form-group"  align="center" style="margin-top:14px;" id="buttons">
                      <button type="submit" id="submit" class="btn btn-primary btn-md">Save</button>
                      <button type="button" class="btn  btn-md btn-danger" data-dismiss="modal" onclick="closeform()" role="button" onclick="formreload()">Close</button>
                    </div>
					</form>
					
    </div>
  </div>
</div>