<!DOCTYPE html>
<html lang="en">  
<head>
<link href="<?php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h2>Registered User List</h2>
  <table class="table table-stripped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Date of Birth</th>
        <th>Profession</th>
        <th>Locality</th>
        <th>Guest</th>
      </tr>
    </thead>
    <tbody>
        <?php if(isset($user) && count($user) > 0) { 
             foreach($user as $users) {
        ?>
      <tr>
        <td><?php echo $users['name']?></td>
        <td><?php echo $users['dob']?></td>
        <td><?php echo $users['profession']?></td>
        <td><?php echo $users['locality']?></td>
        <td><?php echo $users['guest_no']?></td>
      </tr>
      <?php } } ?>
    </tbody>
  </table>
</div>
</body>
</html>