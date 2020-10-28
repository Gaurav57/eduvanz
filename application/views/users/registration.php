<!DOCTYPE html>
<html lang="en">  
<head>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="<?php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' />
  <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script>
        $(document).ready( function() {
            $('#dob').change( function(){
                var dob = $('#dob').val();
                dob = new Date(dob);
                var today = new Date();
                var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                $('#age').val(age);
            });
        });
    </script>
</head>
<body>
<div class="container">
    <h2 class="alert alert-info">Meetup Registration</h2>
    <?php
    if(!empty($success_msg)){
        echo '<p class="statusMsg">'.$success_msg.'</p>';
    }elseif(!empty($error_msg)){
        echo '<p class="statusMsg">'.$error_msg.'</p>';
    }
    ?>
    <form action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name" required="" value="<?php echo !empty($user['name'])?$user['name']:''; ?>">
          <?php echo form_error('name','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
          <input type="number" maximum="99" class="form-control" name="age" id="age" placeholder="Age" required="" value="<?php echo !empty($user['age'])?$user['age']:''; ?>" readonly>
        </div>
        <div class="form-group">
          <input type="date" class="form-control" name="dob" placeholder="Date of Birth" id="dob" required="" value="<?php echo !empty($user['dob'])?$user['dob']:''; ?>">
          <?php echo form_error('dob','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
          <select name="profession" class="form-control">
            <option value="student">Student</option>
            <option value="employed">Employed</option>
            </select>
          <?php echo form_error('profession','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="locality" placeholder="Locality" required="" value="<?php echo !empty($user['locality'])?$user['locality']:''; ?>">
           <?php echo form_error('locality','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
          <select name="guest_no" class="form-control">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            </select>
          <?php echo form_error('profession','<span class="help-block">','</span>'); ?>
        </div>
        
        <div class="form-group">
            <input type="text" class="form-control" name="address" placeholder="Address" value="">
            <span class="help-block">Maximum 50 characters allowed</span>
        </div>

        <div class="form-group">
            <input type="submit" name="regisSubmit" class="btn btn-success" value="Submit"/>
        </div>
    </form>
</div>
</body>
</html>