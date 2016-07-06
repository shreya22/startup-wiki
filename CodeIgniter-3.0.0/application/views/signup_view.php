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

    <body style="background:url('<?php echo base_url(); ?>/img/a10.jpeg');
        background-position: center;
        background-repeat: no-repeat; background-attachment: fixed;
        -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
     ">

	
        <!-- Top content -->
        <div class="top-content">
        	
            <div clas="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7 text" style="color:#000;">
                            <h1 style="color:#000">Create your Startupwiki Account</h1>
                            <div class="description">
                            	<p>
	                            	Having an account gives you additional features as adding your own startup page and commenting on any startup or blog..
								</p>
                            </div>
                            <div class="top-big-link">
                            	<a class="btn btn-block btn-social btn-twitter btn-link-2" style="background-color: #2D4373; width:230px">
                                    Join with &nbsp;<i class="fa fa-facebook"></i> 
                                </a><br>

                                <a class="btn btn-block btn-social btn-twitter btn-link-2" style="background-color: #C23321; width:230px">
                                    Join with &nbsp;<i class="fa fa-google-plus"></i> 
                                </a><br>

                                <a class="btn btn-block btn-social btn-twitter btn-link-2" style="background-color: #005983; width:230px">
                                   Sign in with &nbsp; <i class="fa fa-linkedin"></i> 
                                </a><br>

                                <a class="btn btn-link-2" href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home"></span>&nbsp;Back to home</a>
                            </div>
                        </div>
                        <div class="col-sm-5 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h2>Sign up now</h2>
                            		
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-pencil"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			          
					  <form role="form" id="signupForm" action="Verifysignup" method="post" class="registration-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" name="username" placeholder="Username..." class="form-first-name form-control" id="form-username">
			                        </div>
									<div class="form-group">
			                        	<label class="sr-only" for="form-email">Email</label>
			                        	<input type="email" name="email" placeholder="Email..." class="form-email form-control" id="form-email">
			                        </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-fb">Email</label>
                                        <input type="text" name="fb" placeholder="Facebook link..." class="form-email form-control" id="form-email">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-email">Email</label>
                                        <input type="text" name="gplus" placeholder="Google+ Link..." class="form-gplus form-control" id="form-email">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-email">Email</label>
                                        <input type="text" name="ln" placeholder="Linkedin Link..." class="form-ln form-control" id="form-email">
                                    </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Re-type Password</label>
			                        	<input type="password" name="repassword" placeholder="Re-Type Password..." class="form-password form-control" id="form-password">
			                        </div>
			                       
			                        <button type="submit" class="btn">Sign me up!</button>

<br><br>
<div style="background-color: #f8f8f8; padding-left:10px; color:#000;" id="signupError">
    
</div>
                                     <input id="reloadValue" type="hidden" name="reloadValue" value="" />
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>



        <?php
            include('require_form_js.php');
        ?>

        <script>
            $('document').ready(function(){
                console.log('document loaded');

                var d = new Date();
                d = d.getTime();
                if ($('#reloadValue').val().length == 0)
                {
                        $('#reloadValue').val(d);
                        $('body').show();
                }
                else
                {
                        $('#reloadValue').val('');
                        location.reload();
                }

            });

            $("#signupForm").submit(function(e){
                e.preventDefault();
                console.log('form not submitted normally!');

                var signupdata= $("#signupForm").serialize();
                    console.log(signupdata);
                
                //alert(signupdata);


                $.ajax({
                    dataType: "json",
                        type:"POST",
                        data:signupdata,
                        url:"<?php echo base_url(); ?>index.php/Verifysignup",
                        success:function(msg){
                            console.log(msg);
                        if(msg.status == 'true')
                            {
                                //redirect to the mailing controller.
                                window.location.href = "<?php echo base_url(); ?>index.php/Startup_signup/page_done";

                                console.log('signed up!');
                             //   window.location.href = "<?php echo base_url(); ?>/index.php/SendEmail";

                            }else
                            {
                                console.log('msg false');
                                $("#signupError").html(msg.msg);
                            }
                        }
                    });
                    return false;



            });
        

        </script>

    </body>

</html>