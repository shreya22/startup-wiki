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

	 <body>

	 	<?php 
			if($this->session->has_userdata('logged_in'))
			{
				$loggedin= $this->session->userdata('logged_in');
			}else
			{
				redirect('');
			}

		?>

		 <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-sm-4 text" >
                            <h1 style="color:#000">Get your own startupwiki page!</h1>
                            <div class="description">
                            	
                            </div>
                            <div class="top-big-link">
                            	<a class="btn btn-link-2" href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home"></span>&nbsp;Back to home</a>
                            </div>
                        </div>
                        <div class="col-sm-8 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h2>Fill up your startup details</h2>
                            		
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-pencil"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="<?php echo base_url(); ?>index.php/Startup_signup/startup_validate" method="post" id="makeStartupPage" class="registration-form" enctype="multipart/form-data">

			                    	
			                    	<!-- the validatoin errors will be displayed here. -->
								
			                        		<!--dropdown for city -->
			                    	<div class="form-group">
			                    		<h5>City <span style="color:red;">*</span></h5>
			                        <!--	<input type="text" name="form-city" placeholder="enter city..." value="<?php echo set_value('form-city'); ?>" class="form-city form-control" id="form-city">  -->
			                        	<select class="form-control form-city" name="form-city" id="form-city">
										    <option value="one">One</option>
										    <option value="two">Two</option>
										    <option value="three">Three</option>
										    <option value="four">Four</option>
										    <option value="five">Five</option>
										</select>
			                        </div><br>
									<div class="form-group">

			                        	<h5>Name <span style="color:red;">*</span></h5>
			                        	<input type="text" name="form-name" placeholder="Enter Name of startup..." value="<?php echo set_value('form-name'); ?>" class="form-name form-control" id="form-name">
			                        	<span id="name_verify" class="verify"></span>
			                        	
			                        </div><br>

			                        <div class="form-group">
			                        	<h5>Tagline <span style="color:red;">*</span></h5> (Or a one line description, max 50 characters.)
			                        	<input type="text" name="form-tagline" placeholder="Enter one line description of your startup..." value="<?php echo set_value('form-tagline'); ?>" class="form-tagline form-control" id="form-tagline">
			                        	<span id="tagline_verify" class="verify"></span>
			                        </div><br>

									<!--sector, as a dropdown -->
									<div class="form-group">
			                        	<h5>Sector <span style="color:red;">*</span></h5> (The category you group your startup in.)
			                        	
			                        	<select class="form-control form-sector form-text" name="form-sector" id="form-cat">
										    <option value="3D Printing">3D Printing</option>
										    <option value="Advertising">Advertising</option>
										    <option value="Cloud Services">Cloud Services</option>
										    <option value="Commerce">Commerce</option>
										    <option value="Consumer Electronics">Consumer Electronics</option>
										    <option value="Data & Analytics">Data & Analytics</option>
										    <option value="Dating">Dating</option>
										    <option value="Education">Education</option>
										    <option value="Enterprise Software">Enterprise Software</option>
										    <option value="Events">Events</option>
										    <option value="Fashion">Fashion</option>
										    <option value="Finantial Services">Finantial Services</option>
										    <option value="Games">Games</option>
										    <option value="Green">Green</option>
										    <option value="Hardware">Hardware</option>
										    <option value="Healthcare">Healthcare</option>
										    <option value="Local">Local</option>
										    <option value="Media">Media</option>
										    <option value="Mobile">Mobile</option>
										    <option value="Music">Music</option>
										    <option value="Payments">Payments</option>
										    <option value="Photos">Photos</option>
										    <option value="Productivity Tools">Productivity Tools</option>
										    <option value="Recruiting">Recruiting</option>
										    <option value="Robotics">Robotics</option>
										    <option value="Small Buisnesses">Small Buisnesses</option>
										    <option value="Smart Home">Smart Home</option>
										    <option value="Social Impacts">Social Impacts</option>
										    <option value="Sports">Sports</option>
										    <option value="Transportation">Transportation</option>
										    <option value="Travel">Travel</option>
										    <option value="Video">Video</option>
										    <option value="Wearable Tech">Wearable Tech</option>
										    
										</select>
			                        </div><br>


			                        <!--idea description -->
									<!-- these headings constitute the main text as details of the startup -->
									<div class="form-group">
			                        	<h5>Idea <span style="color:red;">*</span></h5>(Maximum 1000 characters) 
			                        	<textarea name="form-idea" class="form-text form-control" id="form-text_h1" rows="5" placeholder="WHat your startup is all about!"></textarea>
			                        	<span id="idea_verify" class="verify"></span>
			                        </div><br>
									
			                        
									<div class="form-group">
			                        	<h5>Location <span style="color:red;">*</span></h5> (Maximum 1000 characters)
			                        	<textarea name="form-location" class="form-text form-control" id="form-text_h2" rows="5" placeholder="Origin of your startup, and curren areas of functioning."></textarea>
			                        	<span id="location_verify" class="verify"></span>
			                        </div><br>
									
									
									<div class="form-group">
			                        	<h5>Accomplishments <span style="color:red;">*</span></h5>(Maximum 1000 characters)
			                        	<textarea name="form-accomplishments" class="form-text form-control" id="form-text_h3" rows="5" placeholder="Brief your accomplishments and activities till date.."></textarea>
			                        	<span id="acc_verify" class="verify"></span>
			                        </div><br>

			                        <div class="form-group">
			                        	<h5>Cotact Us <span style="color:red;">*</span></h5>(Maximum 1000 characters)
			                        	<p>Enter your contact No, Address, And all other stuff people would need to reach you!</p>
			                        	<textarea name="form-contactus" class="form-text form-control" placeholder="Enter All people would need to reach you.." id="form-text_h4" rows="5"></textarea>
			                        	<span id="contactus_verify" class="verify"></span>
			                        </div><br>
									
									<!-- headings over -->

									<!-- co-founders names -->
									<h5>Co-founded by: </h5>
									<span id="mem" ></span>

									<div class="connect">
										<div class="form-group row">
											<div class="col-md-6 col-sm-6">
												<input id="autocomplete" class="form-control auto" placeholder="Start Typing name of registered user..">
											</div>
											<div class="col-md-6 col-sm-6">
												<a href="#" class="connectbtn btn btn-link-2"><b>CONNECT</b></a>
											</div>
											
										</div><br>
									</div>
									
									<a class="btn btn-link-2 addmem" ><i class="fa fa-plus"></i>&nbsp;&nbsp;Add member</a>
									<br><br><br>

									<!-- upload logo and cover pic -->
								   <div class="form-group">
										<h5>Upload Logo &nbsp;(optional)</h5> 
										<span class="btn btn-default btn-file">
											<input type="file" name="logo" value="upload logo" class="form-img_logo form-control" id="form-logo">
										</span>
									</div><br>
									
								    <button type="button" name= "viewpage" class="btn" href="#page-top" data-toggle="modal" data-target="#myModal">View Demo Page</button>
								<!--    <a class="navbar-brand page-scroll" href="#page-top" data-toggle="modal" data-target="#myModal">&nbsp; Login</a> -->
			                        <button type="submit" name="makepage" class="btn">Make my Page!</button>
<br><br>
			                        <div style="background-color: #f8f8f8; padding-left:10px; color:#000;">
			                        <p class="form-validation-errors"></p>
			                       	</div>

			                       	<!-- modal for view demo button -->

			                       		<!-- Modal for user login -->
											  <div class="modal fade sPageModal" id="myModal" role="dialog">
												<div class="modal-dialog modal-lg">
												
												  <!-- Modal content-->
												  <div class="modal-content">
													<div class="modal-header">
													  <button type="button" class="close" data-dismiss="modal">&times;</button>
													  <h2 class="modal-title" > <span class="glyphicon glyphicon-login"></span>&nbsp;Demo Startup Page</h2> 
													  
													</div>
													<div class="modal-body">
													  	<img src="<?php echo base_url(); ?>/img/happy.jpg">
													</div>
													
													<div class="modal-footer">
													  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												  </div>

							                      
												  
												</div>
											  </div>
											<!--modal over -->

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
        <script sr c="<?php echo base_url(); ?>assets/js/jquery.backstretch.min.js"></script>
            
        <!-- jquery autocomplete api -->
            <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
			<script src="//code.jquery.com/jquery-1.10.2.js"></script>
			<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

			<script>
        	$('document').ready(function(){ 
        		console.log('page loaded');

        		//boolean variables for validation..
        		var aName= 0, aTagline=0, aIdea=0, aLocation=0, aAcc=0, aContact=0;

//script for name validation
        		$("#form-name").keyup(function(){
        			if($("#form-name").val().length >= 4)
					  {
						  $.ajax({
							   type: "POST",
							   url: "<?php echo base_url(); ?>index.php/Startup_signup/name_validate",
							   data: "form-name="+$("#form-name").val(),
							   success: function(msg){
							     var a= $.parseJSON(msg);
							     
							     if(a.status == 'true')
							     {		
							     	$("#name_verify").html("<p class='valid'>"+a.msg+"</p>");											     	
					   	  			console.log('valid name');
					   	  			aName=1;
							     }else
							     {
							     	  $("#name_verify").html("<p class='verify'>"+a.msg+"</p>");
								   	  console.log('invalid name');
								   	  aName=0;
							     }

							   }
					  	  });
					  }
					  else 
					  {
					   	  $("#name_verify").html("not enough info");
					   	  console.log('not enough info');
					   	  aName=0;
					  }
        		});


//script for tagline validation

        		$("#form-tagline").keyup(function(){
        			if($("#form-tagline").val().length < 5)
					  {
						  $("#tagline_verify").html("minimum 5 characters reqired!");
						  aTagline =0;
					  }
					  else if($("#form-tagline").val().length > 50)
					  {
					   	  $("#tagline_verify").html("maximum 50 characters!");
					   	  aTagline =0;
					  }
					  else
					  {
					  	  $("#tagline_verify").html("<p class='valid'>That seems an impressive tagline..</p>");
					  	  aTagline =1;
					  }
        		});

//script for idea validation

        		$("#form-text_h1").keyup(function(){
        			if($("#form-text_h1").val().length == 0)
					  {
						  $("#idea_verify").html("Idea cant be left empty!");
						  aIdea=0;
					  }
					  else if($("#form-text_h1").val().length >1000)
					  {
					   	  $("#idea_verify").html("maximum 1000 characters permitted!");
					   	  aIdea=0;
					  }
					  else
					  {
					  	  $("#idea_verify").html("<p class='valid'>Surely a great idea...</p>");
					  	  aIdea=1;
					  }
        		});

//script for location validation

        		$("#form-text_h2").keyup(function(){
        			if($("#form-text_h2").val().length == 0)
					  {
						  $("#location_verify").html("Location cant be left empty!");
						  aLocation=0;
					  }
					  else if($("#form-text_h2").val().length >1000)
					  {
					   	  $("#location_verify").html("maximum 1000 characters permitted!");
					   	  aLocation=0;
					  }
					  else
					  {
					  	  $("#location_verify").html("<p class='valid'>Pretty nice location...</p>");
					  	  aLocation=1;
					  }
        		});


//script for accomplishments validation

        		$("#form-text_h3").keyup(function(){
        			if($("#form-text_h3").val().length == 0)
					  {
						  $("#acc_verify").html("Accomplishments cant be left empty!");
						  aAcc=0;
					  }
					  else if($("#form-text_h3").val().length >1000)
					  {
					   	  $("#acc_verify").html("maximum 1000 characters permitted!");
					   	  aAcc=0;
					  }
					  else
					  {
					  	  $("#acc_verify").html("<p class='valid'>You definitely have achieved a lot!...</p>");
					  	  aAcc=1;
					  }
        		});

//script for Contactus validation

        		$("#form-text_h4").keyup(function(){
        			if($("#form-text_h4").val().length == 0)
					  {
						  $("#contactus_verify").html("Contact field cant be left empty!");
						  aContact=0;
					  }
					  else if($("#form-text_h4").val().length >1000)
					  {
					   	  $("#contactus_verify").html("maximum 1000 characters permitted!");
					   	  aContact=0;
					  }
					  else
					  {
					  	  $("#contactus_verify").html("<p class='valid'>Looking forward to get in touch soon!...</p>");
					  	  aContact=1;
					  }
        		});

        		//submitting the form
				$("#makeStartupPage").submit(function(e){
	       			e.preventDefault();

        			var signupdata= $("#makeStartupPage").serialize();
        			console.log(signupdata);
                                var foormData = new FormData(this);
//console.log(foormData);

        			if(aName==0 || aTagline==0 || aIdea==0 || aLocation==0 || aAcc==0 || aContact==0)
        			{
        				$("*").keyup();
        			}
        			else
        			{
        				alert('ready steady go');

        				$.ajax({
					dataType: "json",
        				type:"POST",
        				data:foormData,
        				url:"<?php echo base_url(); ?>index.php/Startup_signup/startup_validate",
        				async: false,
					cache: false,
                                        contentType: false,
                                        processData: false,
				success:function(msg){
        					console.log(msg);
						if(msg.status == 'true')
        					{
					           alert('your page has been generated!.');

                                                   console.log('msg true');
                                                   //session has been set, move to sendmail. 
                                                   window.location.href = "<?php echo base_url(); ?>/index.php/SendEmail"; 
        					}
                        else
        					{
        						console.log('msg false');

        						
        						//alert(msg.msg);
        						//form validation errors are not being displayed.   harish . issue solved

        					$(".form-validation-errors").html(msg.msg);
        					//$(".form-validation-errors").html("errors should be displayed here");
        				

        					
        					}
        				}
        			});
	        			return false;

        			}
				});


				var a=new Array();
        		
        		
				
			var a=[], memNameList=[], b=[], memNameId=[], memDetails=[];
			$("#autocomplete").bind("keyup", function(){
			//	alert("haww");

				var str= $(this).val(); 

			
				function getUserArray(callback){
					$.ajax({
						dataType:"json",
						type:"post",
						url:"<?php echo base_url(); ?>index.php/startup_signup/getUserNames",
						success:function(user){
							console.log("response");
							if(user.status== 'true')
							{
								//alert('yeah');
								a= user.name;
								console.log(a);

								b= user.user_id;
								callback(a, b);
							}else
							{
								//alert('no');
							}
						}
					});
				}
					

				getUserArray(function(a,b){
					memNameList= a;
					memNameId= b;
					//autocomplete api
					$( "#autocomplete" ).autocomplete({
						
					  source:a
					});
				});
			
			});	

			//	alert(memNameList);

			//add more members
				$(".connect").hide();

				$(".addmem").click(function(){
					$(".connect").toggle(500);

				});

				var memName, memId;

				//on click on connect, values stored in members table, and name displayed.
				$(".connectbtn").click(function(e){
				//	alert('clicked');
					e.preventDefault();

					memName = $("#autocomplete").val(); console.log(memName);
					storeMember(memName);

					//on btn click, values should be stored in members table
					function storeMember(memName){
						var index= $.inArray(memName, memNameList);
					//	alert(memNameId);

						var memId= memNameId[index];
						console.log(memId);

						if(memId)
						{
							var memDetails={
								'user_id': memId,
								'startup_id': "<?php echo $loggedin['uid']; ?>"
							};

							console.log(memDetails);

							$.ajax({
								dataType: "json",
						        type: "post",
						        data: {info:memDetails},
						        url: "<?php echo base_url(); ?>index.php/startup_signup/insertIntoMembers",
						        success: function(data){
						        	console.log(data.status);

						        	if(data.status=='true'){

						        		//get id of inserted member
						        		var id= data.memid;
						        		var divId, Rid;

						        		divId= 'mem'+id;
						        		Rid= 'remove'+id;

						        		//display the added member on the list.
										var x= $("#autocomplete").val();
										$("#mem").append("<span id='"+divId+"'><h3><a href='#' class='memLink'>"+x+"</a><img src='<?php echo base_url(); ?>/assets/img/s1.png' style='height:50px; width:50px;'></h3></span>");
												
										$("#autocomplete").val("");	
										$(".connect").hide(500);
						        	}else{
						        		alert(data.msg);
						        		$("#autocomplete").val("");
						        	}

						       		 
						        }	
						    });	
						}else{
							alert('Please Connect to a registered user.');
							$("#autocomplete").val("");	
						}

								
					}


					
				});

				//on clicking remove button
		
				$("p.removebtn").click(function(e){
					alert('haww');
					e.preventDefault();
				});

		

        	});


        

        </script>

         <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>




