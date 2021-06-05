<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
   <div style="max-width:800px; padding:20px;margin:auto;text-align: left; font-size: 16px">
      <p><strong>Hello, <?php echo $username; ?></strong></p>
      <p style="margin-bottom:10px">You have requested to recover password. Click link below to recover password</p>
      <br><br>
      <a href="<?php echo base_url('auth/recover/'.$userid.'/'.$recoveryString);?>" style="padding:10px 30px; background-color: #005960; color: white; text-decoration: none; border-radius: 4px"> Recover password </a>
   </div>
</body>
</html>