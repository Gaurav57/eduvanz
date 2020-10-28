<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Learn CURD Operation On Web Preparations</title>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/buttons.bootstrap.min.css')?>" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
  </head>
  <body>
  <div class="container">
    <h1>Learn CURD Operation in CodeIgniter Framework with AJAX and Bootstrap</h1>
</center>
    <h3>Mobile Store</h3>
    <br />
    <button class="btn btn-success" onclick="add_mobile()"><i class="glyphicon glyphicon-plus"></i> Add Mobile</button>
    <button class="btn btn-success"><i class="glyphicon glyphicon-plus"></i><a href="<?php echo base_url(); ?>contactus">Export Excel</button>
    <br />
    <br />
    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
       <tr>
          <th>Mobile Id</th>
          <th>Model No.</th>
          <th>Mobile Name</th>
          <th>Company</th>
          <th>Mobile Category</th>
          <th style="width:125px;">Action
          </p></th>
        </tr>
      </thead>
      <tbody>
				<?php foreach($mobiles as $mobile){?>
				     <tr>
				         <td><?php echo $mobile->id;?></td>
				         <td><?php echo $mobile->model_no;?></td>
								 <td><?php echo $mobile->mobile_name;?></td>
								<td><?php echo $mobile->company;?></td>
								<td><?php echo $mobile->mobile_category;?></td>
								<td>
									<button class="btn btn-warning" onclick="edit_mobile(<?php echo $mobile->id;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
									<button class="btn btn-danger" onclick="delete_mobile(<?php echo $mobile->id;?>)"><i class="glyphicon glyphicon-remove"></i></button>
								</td>
				      </tr>
				     <?php }?>
      </tbody>
 
      <tfoot>
        <tr>
          <th>Mobile Id</th>
          <th>Model No.</th>
          <th>Mobile Name</th>
          <th>Company</th>
          <th>Mobile Category</th>
          <th>Action</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/dataTables.bootstrap.js')?>"></script>
  <script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );
    var save_method; //for save method string
    var table;
 
 
    function add_mobile()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }
 
    function edit_mobile(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
 
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('mobiles/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="mobile_id"]').val(data.id);
            $('[name="model_no"]').val(data.model_no);
            $('[name="mobile_name"]').val(data.mobile_name);
            $('[name="company"]').val(data.company);
            $('[name="mobile_category"]').val(data.mobile_category);
 
 
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Mobile'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
 
 
 
    function save()
    {
      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('mobiles/mobile_add')?>";
      }
      else
      {
        url = "<?php echo site_url('mobiles/mobile_update')?>";
      }
 
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }
 
    function delete_mobile(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('mobiles/mobile_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
 
      }
    }
 
  </script>
 
  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title alert alert-info">Mobile Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="mobile_id"/>
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Model No.</label>
              <div class="col-md-9">
                <input name="model_no" placeholder="Model No." class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Mobile Name</label>
              <div class="col-md-9">
                <input name="mobile_name" placeholder="Mobile Name" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Company</label>
              <div class="col-md-9">
								<input name="company" placeholder="Company" class="form-control" type="text">
 
              </div>
            </div>
						<div class="form-group">
							<label class="control-label col-md-3">Mobile Category</label>
							<div class="col-md-9">
								<input name="mobile_category" placeholder="Mobile Category" class="form-control" type="text">
 
							</div>
						</div>
 
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-success">Save</button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
 
  </body>
</html>