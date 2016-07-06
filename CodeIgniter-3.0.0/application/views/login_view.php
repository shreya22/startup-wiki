<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Startup Wiki</title>

<!-- include stylesheets and js files. -->

    
    <?php
        include('require.php');
    ?>   

</head>

<body id="page-top home">

    <!-- include nav bar -->
    <?php
        include('require_navbar.php');
    ?>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 style="text-shadow: #19B9E7 0px 0px 1px,   #19B9E7 0px 0px 1px,   #19B9E7 0px 0px 1px,
             #19B9E7 0px 0px 1px,   #19B9E7 0px 0px 1px,   #19B9E7 0px 0px 1px;">Startup Wiki</h1>
                <hr>
                <p style="color:#000">The one place to find all startups. Find & interact wit startups, or show the world your startup through Startupwiki!</p>
                <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Startups</a>
            </div>
        </div>
    </header>

     <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">At Your Service</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond wow bounceIn text-primary"></i>
                        <h3>View Startups</h3>
                        <p class="text-muted">Search startups page will open up.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <a href="<?php if($this->session->has_userdata('logged_in')){ 
                                 echo base_url(); ?>index.php/Startup_signup
                                <?php }else{ echo '#';
                                }?>"   
                                             

                    style="text-decoration:none;" class="not_loggedin">
                        <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3>Add your startup</h3>
                        <p class="text-muted">Add startup Page will open up</p>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
                        <h3>About startupmantra</h3>
                        <p class="text-muted">Startumantra website link</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <a href="<?php echo base_url(); ?>index.php/Events" style="text-decoration:none;">
                        <div class="service-box">
                            <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>
                            <h3>View Events</h3>
                            <p class="text-muted">Get updated with the latest startup events and Activities!</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">StartupWiki, the Startup Coalition. </h2><br>
                    <h4>Success comes from sharing. We serve a platform for startups from all over to join and interact with other startups. 
                        Become a member of StartupWiki.. Let the world know you!
                    </h4>
                    <hr class="light">
                    <p class="text-faded">for more search options, visit our advanced search page here!</p>
                    <a href="<?php echo base_url(); ?>index.php/Startup_page" class="btn btn-default btn-xl">Search startups!</a>
                </div>
            </div>
        </div>
    </section>

   

<!--modal that will pop up wen the user is not logged in and tries to create startup page -->
    <div class="modal fade" id="myLoginModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
          <p>You need to Login to create an awesome page for you!.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


    
<section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="<?php echo base_url(); ?>img/portfolio/1.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Sponsers
                                </div>
                                <div class="project-name">
                                    Sponser 1
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="<?php echo base_url(); ?>img/portfolio/2.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Sponsers
                                </div>
                                <div class="project-name">
                                    Sponser 2
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="<?php echo base_url(); ?>img/portfolio/3.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Sponsers
                                </div>
                                <div class="project-name">
                                    Sponser 3
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
        </div>
    </section>

    <aside class="bg-primary">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>Feeling Excited? Create your Startup Page NOW! </h2>

                <a href="<?php if($this->session->has_userdata('logged_in')){ 
                                 echo base_url(); ?>index.php/startup_signup
                                <?php }else{ echo '#';
                                }?>"                                             
                    style="text-decoration:none;" class="not_loggedin btn btn-default btn-xl wow tada">Create page</a>

               <!-- <a href="<?php echo base_url(); ?>index.php/startup_signup" class="btn btn-default btn-xl wow tada">Create page</a> -->
            </div>
        </div>
    </aside>

    <section id="contact">
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
    </section>

    <?php
        include('require_js.php');
    ?>

    <script type="text/javascript">
    $('document').ready(function(){
        


//Need Modification, its popping up even if theuser is logged in 



            
            $(".not_loggedin").click(function(){
		
               <?php if(!$this->session->has_userdata('logged_in')){ ?>
				
                     $("#myLoginModal").modal();

                     setTimeout(function(){
                     $("#myLoginModal").modal('hide');}, 2000);
                	
			<?php }else{ ?>
                     window.location.href = "<?php echo base_url(); ?>index.php/Startup_signup";
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
					
					if(msg.msg == 'yes')
                    {
                        window.location.href = "<?php echo base_url(); ?>";

                    }

                    //alert(msg.msg);
                    else
                    {
                        $("#login_error").html(msg.msg);
                    }
                    
				}
               });

            });




	 });
 </script>


</body>

</html>