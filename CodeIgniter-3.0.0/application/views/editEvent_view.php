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
                            <h1 style="color:#000">Edit your event!</h1>
                            
                            <div class="top-big-link">
                            	<a class="btn btn-link-2" href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home"></span>&nbsp;Back to home</a>
                            </div>
                        </div>
                        <div class="col-sm-8 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h2>Edit your event details</h2>
                            		
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-pencil"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="<?php echo base_url(); ?>index.php/Events/event_validate" method="post" id="makeEvent" class="registration-form" enctype="multipart/form-data">

			                    	
			                    	<!-- the validatoin errors will be displayed here. -->
								
			                        		<!--dropdown for city -->
			                    	<div class="form-group">
			                    		<h5>Location <span style="color:red;">*</span></h5>
			                        
			                        	<select class="form-control form-city" name="form-city" id="form-city">
										    <option value="one">One</option>
										    <option value="two">Two</option>
										    <option value="three">Three</option>
										    <option value="four">Four</option>
										    <option value="five">Five</option>
										</select>
			                        </div><br>

									<div class="form-group">

			                        	<h5>Event Name <span style="color:red;">*</span></h5>
			                        	<input type="text" name="form-name" placeholder="Enter Name of event..." value="<?php echo $name; ?>" class="form-title form-control" id="form-title">
			                        </div><br>

			                        <div class="form-group">
			                        	<h5>Company Name <span style="color:red;">*</span></h5> (Company conduncting the event.)
			                        	<input type="text" name="form-companyname" placeholder="Name of comapny conducting the event" value="<?php echo $organisation; ?>" class="form-title form-control" id="form-title">
			                        </div><br>

			                        <div class="form-group">
			                        	<h5>Tagline <span style="color:red;">*</span></h5> (Or a one line description, max 50 characters.)
			                        	<input type="text" name="form-tagline" placeholder="Enter one line description of your event..." value="<?php echo $tagline; ?>" class="form-title form-control" id="form-title">
			                        </div><br>


			                        <!--event description -->
									<!-- these headings constitute the main text as details of the startup -->
									<div class="form-group">
			                        	<h5>Event Description <span style="color:red;">*</span></h5>(Maximum 1000 characters) 
			                        	<textarea name="form-description" class="form-text form-control" id="form-text_h1" rows="5" placeholder="WHat your event is all about!">
			                        		<?php echo $description; ?>
			                        	</textarea>
			                        </div><br>
									
			                        <div class="form-group">
			                        	<h5>Cotact Us <span style="color:red;">*</span></h5>(Maximum 1000 characters)
			                        	<p>Enter your contact No, Address, And all other stuff people would need to reach you!</p>
			                        	<textarea name="form-contactus" class="form-text form-control" placeholder="Enter All people would need to reach you.." id="form-text_h3" rows="5">
			                        		<?php echo $contactus; ?>
			                        	</textarea>
			                        </div><br>

			                        <div class="form-group">
			                        	<h5>How many days?</h5>
			                        	<div class="row">
			                        		<div class="col-md-3">
			                        			<input name="form-numdays" type="number" class="form-title form-control" id="numDays" value="<?php echo $numdays; ?>">
			                        		</div>
			                        		<div class="col-md-2">
			                        			<a id="enterNumDays" class="btn" style="padding:5px 10px 5px 10px; background:rgba(0, 0, 0, 0.3); color:#fff;">enter</a>
			                        		</div>
			                        	</div>
			                        	
			                        </div>

			                        <div id="numDays1">
			                        	<div class="form-group">
				                        	<h5>Enter Date<span style="color:red;">*</span></h5>
				                        	<input type="text" name="form-numday1" class="datepicker" id="dp1" value="<?php echo $dateone; ?>" />
				                        </div><br>
			                        </div>

			                        <div id="numDays2">
			                        	<div class="form-group">
				                        	<h6>Events Starts from<span style="color:red;">*</span></h6>
				                        	<input type="text" name="form-numday2" class="datepicker" id="dpfrom" value="<?php echo $datefrom; ?>" />
				                        </div>
				                        <div class="form-group">
				                        	<h6>Events Ends on<span style="color:red;">*</span></h6>
				                        	<input type="text" name="form-numday3" class="datepicker" id="dpto" value="<?php echo $dateto; ?>" />
				                        </div><br>
			                        </div>
									
									<!-- headings over -->
									
									
								   <!-- upload logo and cover pic -->
								   <div class="form-group">
										<h5>Upload Event Poster &nbsp;(optional)</h5> 
										<span class="btn btn-default btn-file">
											<input type="file" name="poster" value="upload event poster" class="form-img_poster form-control" id="form-poster">
										</span>
									</div><br>
									
								    
			                        <button type="submit" name="makepage" class="btn" style="background-color:rgba(0, 0, 0, 0.3);">Make my Event!</button>
<br><br>
			                        <div style="background-color: #f8f8f8; padding-left:10px; color:#000;">
			                        <p class="form-validation-errors"></p>
			                       	</div>

<!-- this input field will supply event id in hidden text -->
			                       	<input type="hidden" value="<?php echo $eid; ?>" name="eventId">
			                       	<input id="reloadValue" type="hidden" name="reloadValue" value="" />
			                       			                        
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
            
        <!-- jquery autocomplete api -->
            <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
			<script src="//code.jquery.com/jquery-1.10.2.js"></script>
			<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

		<!-- datepicker api-->
			 <!-- Load jQuery UI Main JS  -->
			    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
			    
			    <!-- Load SCRIPT.JS which will create datepicker for input field  -->
			    <script src="<?php echo base_url(); ?>assets/js/datepicker.js"></script>
 
 	     
        <script>
        	$('document').ready(function(){ //alert('on');

        		var flag=0;

        	$("#makeEvent").submit(function(e){
        		//alert("hell");

	       			e.preventDefault();

	       			var numdays= parseInt($("#numDays").val());
	       			console.log(numdays);

	       			if(numdays>0)
	       			{
	       				var dp1, dpfrom, dpto;
	       				if(numdays == 1)
	       				{
	       					//checkig for validity of date wen no of days =1

	       					if(!$("#dp1").val())
	       					{
	       						//no entry in date
	       						alert("Choose a date from calender!");
	       						flag=1;
	       					}
	       					else
	       					{
	       						if(!checkdate($("#dp1").val()))
	       						{
	       							alert("invalid date entered!");
	       							flag=1;
	       						}
	       					}
	       				}
	       				else
	       				{
console.log('numdays > 1');
	       					//checking for validity of date wen no of days >1
	       					//date from
	       					if(!$("#dpfrom").val())
	       					{
	       						//no entry in date
	       						flag=1;
	       						alert("Choose a date from calender!");
	       					}
	       					else
	       					{
	       						if(!checkdate($("#dpfrom").val()))
	       						{
	       							alert("invalid date entered!");
	       							flag=1;
	       						}
	       					}

	       					//date to
	       					if(!$("#dpto").val())
	       					{
	       						//no entry in date
	       						alert("Choose a date from calender!");
	       						flag=1;
	       					}
	       					else
	       					{
	       						if(!checkdate($("#dpto").val()))
	       						{
	       							alert("invalid date entered!");
	       							flag=1;
	       						}
	       					}

	       					if(flag == 0)
	       					{
	       						var arr1= $("#dpfrom").val().split("-");
	       						var arr2= $("#dpto").val().split("-");

	       						var oneDay = 24*60*60*1000;    // hours*minutes*seconds*milliseconds
								var firstDate = new Date(parseInt(arr2[2]), parseInt(arr2[1]), parseInt(arr2[0]));
								var secondDate = new Date(parseInt(arr1[2]), parseInt(arr1[1]), parseInt(arr1[0]));

								var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay)));
							//	alert(diffDays);


								if(diffDays != numdays)
								{
									//invalid dates entered!
									flag=1;
									alert("dates dont verify with the no of days!");
								}
	       					}
	       				}
	       			}
	       			else
	       			{
	       				alert("Fill up No of Days with a valid Entry!");
	       				flag=1;
	       			}
console.log(flag);
        			if(flag== 0)
        			{
        				var signupdata= $("#makeEvent").serialize();
        				console.log(signupdata);

	        			$.ajax({
							dataType: "json",
	        				type:"POST",
	        				data:signupdata,
	        				url:"<?php echo base_url(); ?>index.php/Events/updateEvent",
	        				success:function(msg){
							
								//alert("kuch to hua hai!");
	        					console.log(msg); 
	        					
								if(msg.status == 'true')
	        					{
	        						alert('Editing successful! yoo :)');
	        						window.location.href = "<?php echo base_url(); ?>index.php/Events/eventDescription/<?php echo $eid; ?>";
	        					}else
	        					{
	        						console.log('msg false');

	        						
	        						//alert(msg.msg);
	        						
	        					$(".form-validation-errors").html(msg.msg);
	        					
	        					}
	        				}
	        			});




        			}
        			else
        			{
        				alert("ghanta submit the form!");
        				flag=0;
        			}

        			return false;
        		});
        		
        		$("#numDays1").hide();
        		$("#numDays2").hide();
        		
				
				//handling the number of days till which event will last.
				$("#enterNumDays").click(function(){

					console.log("enter clicked.");

					var numdays= parseInt($("#numDays").val());
					//console.log(numdays);

					if(numdays>0)
					{
						if(numdays == 1)
						{
							//display field to enter date
							$("#numDays1").show(600);

						}else
						{
							//display field to enter date from and to
							$("#numDays2").show(600);
						} 
					}else
					{
						alert("please enter valid number of days of event");
					}  
				});

				 
			function checkdate(date)
			{
				console.log(date);	//alert(date);
				var arr= date.split("-");
				if((parseInt(arr[1]) > 12) || parseInt(arr[1]) < 1)
				{
					return false;
				}else
				{
					var date= parseInt(arr[0]);
					var month= parseInt(arr[1]);

					if((month == 1) || (month== 3) || (month== 5) || (month=7) || (month=8) || (month=10) || (month=12))
					{
						if((date > 31) || date<1)
						{
							return false;
						}

					}
					else if((month== 4) || (month==6) || (month==9) || (month== 11))
					{
						if((date > 30) || (date<1))
						{
							return false;
						}

					}else 
					{
						if(parseInt(arr[2])%4 == 0)
						{
							if((date > 29) || date<1)
							{
								return false;
							}
						}else
						{
							if((date > 28) || date<1)
							{
								return false;
							}
						}
					}
				}

				return true;
			}


              //refresh when got into page from back button
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
        </script>




        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>
