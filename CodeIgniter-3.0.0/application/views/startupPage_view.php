<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $name; ?></title>

    <?php
        include('require.php');
    ?>

</head>

<body style="background:url('<?php echo base_url(); ?>/img/a10.jpeg');
        background-position: center;
        background-repeat: no-repeat; background-attachment: fixed;
        -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
    padding-top:50px;
     ">


 <!-- Page Content -->
 <!--   <div class="container"> -->

     

      <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            <!-- if user's session set, display logout, else display create account and login -->
            <?php if($this->session->has_userdata('logged_in') && $owner == "true")
                

                {
                    $logged_user= $this->session->userdata('logged_in');
            ?>
            <a class="navbar-brand page-scroll" href="#" data-toggle="modal">&nbsp; <span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $logged_user['name']; ?></a>
            <a class="navbar-brand page-scroll" href="<?php echo base_url(); ?>index.php/home/logout">(Logout)</a>
            <?php 
                }else{
            ?>
            <a class="navbar-brand page-scroll" href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-heart"></span>&nbsp;Seems cool! I too want one!</a>
            <?php
                }
            ?>
                            
                
                
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                    
                    <!-- if user's session set, display logout, else display create account and login -->
                    <?php if($this->session->has_userdata('logged_in') && $owner == "true")
                    {
                            
                    ?>
                    <li>
                        <a class="page-scroll" href="<?php echo base_url(); ?>index.php/Startup_page/edit/<?php echo str_replace(" ", "_", $name); ?>"> <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit</a>
                    </li>
                    <?php 
                        }
                    ?>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <div class="row">
        <div class="container">
                <!-- Blog Entries Column -->
                <div class="col-md-8">

                    <div class="row">
                        <div class="col-md-3">
                            <img class="img-responsive" src="http://placehold.it/170x170" alt="">
                        </div>
                        <div class="col-md-9">
                            <h1>
                               <b><?php echo $name; ?></b>
                            </h1>
                            <p class="lead">
                                <?php echo $tagline; ?>
                            </p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

            <hr class="primary">
            <div class="row">
                <div class="container">

                <div class="col-md-9">
                    <ul class="tabs">
                        <li class="tab-link current" data-tab="tab-1">Overview</li>
                        <li class="tab-link" data-tab="tab-2">Accomplishments</li>
                        <li class="tab-link" data-tab="tab-3">Location</li>
                    </ul>

                    <div id="tab-1" class="tab-content current">
                        <h3><b><?php echo $tagline; ?></b></h3><br>
                        <p><?php echo $idea; ?></p> 
                    </div>
                    <div id="tab-2" class="tab-content">
                        <h3><b>Activities and Achievements</b></h3><br>
                        <p><?php echo $accomplishments; ?></p>
                    </div>
                    <div id="tab-3" class="tab-content">
                        <h3><b>Head Office and areas of functioning</b></h3><br>
                         <p><?php echo $location; ?></p>
                    </div>
                   </div>
                <div class="col-md-3">
                    <div class="well well-lg">
                    <p>Posted under <a href="#"><?php echo $sector; ?></a></p><br>
                    <u><b>Contact Us</b></u><br><br>
                    <p><?php echo $contactus; ?></p>
                    </div>
                </div>

            </div>
            </div>

        

        <!-- Team Members Row -->
        <div class="row">
            <div class="container">
                <div class="col-lg-12">
                    <h2 class="page-header">Our Team</h2>
                </div>


                <?php
                    for($x=0; $x< sizeof($cofounders); ++$x)
                    {
                ?>

                    <div class="col-lg-4 col-sm-6 text-center">
                        <img class="img-circle img-responsive img-center" src="<?php echo base_url(); ?>/img/icons/p2.png" alt="">
                        <h3 class="spage_h3">
                            <a href="#" class="spage_a"><?php echo $cofounders[$x]['name']; ?></a>
                        </h3>
                        <p><a class="spage_a" href="<?php echo $cofounders[$x]['fb']; ?>"><i class="fa fa-facebook"></i></a>
                        &nbsp;<a class="spage_a" href="<?php echo $cofounders[$x]['gplus']; ?>"><i class="fa fa-google"></i>&nbsp;</a>
                        <a class="spage_a" href="<?php echo $cofounders[$x]['ln']; ?>"><i class="fa fa-linkedin"></i></a></p>
                    </div>

                <?php
                    }
                ?>

               
            </div>
        </div>

        <hr>

        <!-- Footer -->
        <aside class="bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Let's Get In Touch!</h2>
                    <hr class="primary">
                    <p>This div will include social media links to startupmantra and startup wiki</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p>123-456-6789</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a></p>
                </div>
            </div>
        </div>
    </aside>

 <!--    </div>
   -- /.container -->

    

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.backstretch.min.js"></script>


    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>js/jquery.easing.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.fittext.js"></script>
    <script src="<?php echo base_url(); ?>js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>js/creative.js"></script>
    <!-- Styling js -->
    <script src="<?php echo base_url(); ?>js/tabs.js"></script>

    <script type="text/javascript">
    $('document').ready(function(){
                    
            $(".not_loggedin").click(function(){
		
               <?php if(!$this->session->has_userdata('logged_in')){ ?>
				
                     $("#myLoginModal").modal();

                     setTimeout(function(){
                     $("#myLoginModal").modal('hide');}, 2000);
                	
			<?php }else{ ?>
                     window.location.href = "<?php echo base_url(); ?>index.php/startup_signup";
                 <?php } ?>
            }); 
           
                		
        $("#loginbtn").click(function(e){
               
           
        //           $("#login_model").submit(function(e){
                       e.preventDefault();
                       		
                       var logindata= $("#login_model").serialize()+"&login=yes";

        		    console.log(logindata);

                       $.ajax({
        				dataType: "json",
                            type: "POST",
                            data:logindata,
                            url:"http://localhost/startupwiki/final/CodeIgniter-3.0.0/index.php/verifylogin",
                            success:function(msg){
                                console.log(msg);
        					if(msg.msg != 'yes')
        					{
        					//alert(msg.msg);
        					$("#login_error").html(msg.msg);
        					}
        					else
        					{
        						window.location.href = "index.php/home";

        					}
                            }
                       });

                    });

        $("#forgotbtn").click(function(e){
               
           
        //           $("#login_model").submit(function(e){
                       e.preventDefault();
                       		
                       var logindata= $("#login_model").serialize()+"&forgot=yes";

        		    console.log(logindata);

                       $.ajax({
        				dataType: "json",
                            type: "POST",
                            data:logindata,
                            url:"http://localhost/startupwiki/final/CodeIgniter-3.0.0/index.php/verifylogin",
                            success:function(msg){
                                console.log(msg);
        					
        					//alert(msg.msg);
        					$("#login_error").html(msg.msg);
        				}
                       });

                    });




	 });
 </script>


</body>

</html>