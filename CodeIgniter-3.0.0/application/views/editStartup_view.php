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
    padding-top:50px;
     ">

        
    


        <!-- Top content -->
        <div class="top-content">
            
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-sm-9 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h2 style="color:#000;">Edit your startup details</h2>
                                    
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-pencil"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form role="form" action="<?php echo base_url(); ?>index.php/Startup_edit/validate" method="post" id="editPage" class="registration-form" enctype="multipart/form-data">

                                    
                                    <!-- the validatoin errors will be displayed here. -->
                                
                                            <!--dropdown for city -->
                                    <div class="form-group">
                                        <h5>City <span style="color:red;">*</span></h5>

                                        <select class="form-control form-city" name="form-city" id="form-city" value="<?php echo $city; ?>">
                                            <option value="one">One</option>
                                            <option value="two">Two</option>
                                            <option value="three">Three</option>
                                            <option value="four">Four</option>
                                            <option value="five">Five</option>
                                        </select>
                                    </div><br>
                                    <div class="form-group">

                                        <h5>Name <span style="color:red;">*</span></h5>
                                        <input type="text" name="form-name" value="<?php echo $name; ?>" class="form-title form-control" id="form-title">
                                    </div><br>

                                    <div class="form-group">
                                        <h5>Tagline <span style="color:red;">*</span></h5> (Or a one line description, max 50 characters.)
                                        <input type="text" name="form-tagline" value="<?php echo $tagline; ?>" class="form-title form-control" id="form-title">
                                    </div><br>

                                    <!--sector, as a dropdown -->
                                    <div class="form-group">
                                        <h5>Sector <span style="color:red;">*</span></h5> (The category you group your startup in.)
                                        
                                        <select class="form-control form-sector form-text" name="form-sector" id="form-h1" value="<?php echo $sector; ?>">
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
                                        <textarea name="form-idea" class="form-text form-control" id="form-text_h1" rows="5"><?php echo $idea; ?></textarea>
                                    </div><br>
                                    
                                    
                                    <div class="form-group">
                                        <h5>Location <span style="color:red;">*</span></h5> (Maximum 1000 characters)
                                        <textarea name="form-location" class="form-text form-control" id="form-text_h2" rows="5"><?php echo $location; ?></textarea>
                                    </div><br>
                                    
                                    
                                    <div class="form-group">
                                        <h5>Accomplishments <span style="color:red;">*</span></h5>(Maximum 1000 characters)
                                        <textarea name="form-accomplishments" class="form-text form-control" id="form-text_h3" rows="5"><?php echo $accomplishments; ?></textarea>
                                    </div><br>
                                    
                                    <!-- headings over -->
                                                                    
                                   
                                   <!-- upload logo and cover pic -->
                                   <div class="form-group">
                                        <h5>Upload Logo &nbsp;(optional)</h5> 
                                        <span class="btn btn-default btn-file">
                                            <input type="file" name="logo" value="upload logo" class="form-img_logo form-control" id="form-logo">
                                        </span>
                                    </div><br>
                                    
                                    <input type="hidden" name="startup_id" value="<?php echo $startup_id; ?>" class="form-m form-control">

                                   <button type="submit" name="editStartupPage" class="btn">Edit my Page!</button>
<br><br>
                                    <div style="background-color: #f8f8f8; padding-left:10px; color:#000;">
                                    <p class="form-validation-errors"></p>
                                    </div>


                                    
                                    
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-3 text" >
                            <h1 >Edit your Page!</h1>
                            <div class="description">
                                
                            </div>
                            <div class="top-big-link">
                                <a class="btn btn-link-2" href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home"></span>&nbsp;Back to home</a>
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
 
       
        <script>
            $('document').ready(function(){ //alert('on');

                $("#editPage").submit(function(e){
                    e.preventDefault();

                    var editdata= $("#editPage").serialize();
                    console.log(editdata);

                    $.ajax({
                    dataType: "json",
                        type:"POST",
                        data:editdata,
                        url:"<?php echo base_url(); ?>index.php/Startup_edit/validate",
                        success:function(msg){
                            console.log(msg);
                        if(msg.status == 'true')
                            {
                                console.log('msg true');
                                alert('editing successful!.');
                                window.location.href = "<?php echo base_url(); ?>index.php/Startup_page/page/<?php echo str_replace(" ", "_", $name); ?>";
                            }else
                            {
                                console.log('msg false');

                                //alert(msg.msg);

                            $(".form-validation-errors").html(msg.msg);
                            //$(".form-validation-errors").html("errors should be displayed here");
                        

                            
                            }
                        }
                    });
                    return false;
                });

            });
        </script>



        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>
