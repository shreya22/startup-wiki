<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Registration Form Template</title>

    <?php
        include('require_form.php');
    ?>


    </head>

    <body style="background: url('<?php echo base_url(); ?>assets/img/backgrounds/1.jpg');
        background-position: center;
        background-repeat: no-repeat; background-attachment: fixed;
     ">

		
        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7 text">
                            <h1>Reset your Password</h1>
                            <div class="description">
                            	<p>
                                    "People dont buy what you do, they buy why you do it".
	                            </p>-Simon Sinek
                            </div>
                            
                        </div>
                        <div class="col-sm-5 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h2>Reset Password</h2>
                            		
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-pencil"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			          
					  <form role="form" action="<?php echo base_url(); ?>index.php/login/resetsubmit" method="post" class="registration-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-reset">New Password</label>
			                  <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Re-type Password</label>
			                        	<input type="password" name="repassword" placeholder="Re-Type Password..." class="form-password form-control" id="form-password">
			                        </div>
			                       
			                        <button type="submit" class="btn">Reset!</button>
                                    <br><br>
                                    
                                    <div style="background-color: #f8f8f8; padding-left:10px; color:#000;">
                                        
                                        <p>
                                        <?php if ($this->session->userdata('forget_errors')!=null) echo $this->session->userdata('register_error'); 
                                        $this->session->unset_userdata('forget_errors');
                                    ?></p>
                                    </div>
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.backstretch.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/retina-1.1.0.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="<?php echo base_url(); ?>assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>