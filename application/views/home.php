<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Web Preparations</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="<?php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' />
  <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</head>
<body>	

<div class="container">
    <div id ="home-title" class="alert alert-success"> Welcome On Meetup </div>	
    
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Welcome!</h4>
        <p>Yeah, you have successfully read this important alert message. Lets meet with an important agenda on given venue and date.</p>
        <p>Venue: XYZ Place, Mumbai</p>
        <p>Date: 9-9-9999</p>
        <hr>
        <p class="mb-0">Follow the link for confirmation of your presence: <a href="<?php echo base_url();?>users/registration" class="alert-link">Registration</a></p>
      </div>
</div>

</body>
</html>
