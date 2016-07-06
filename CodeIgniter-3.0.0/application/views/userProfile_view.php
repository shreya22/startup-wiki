<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
   
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <style type="text/css">
        body {
            paddig-top: 70px; /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */

            font-family: 'Roboto', sans-serif;
            font-weight: 300;
            text-align: center;
            background:url('<?php echo base_url(); ?>img/a10.jpeg'); background-position: center;
               background-position: center;
                background-repeat: no-repeat; background-attachment: fixed;
                -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }

        .col-md-8 p{
            font-size: 13px;
            font-weight:bold;
        }

        #sidebar {
            position:absolute;
            z-index:1;
        }

        #sidebar.fixed {
            position:fixed;
            top:0;
        }
        z-index:5;

        #maintab{
            position: absolute;
        }

        a:hover{
            text-decoration: none;
        }

        a.list-group-item{
            font-weight:bold;
            font-size: 15px;
        }

        #collapse1 .col-md-5{
            border-left:1px solid #000;
        }

        #collapse1 .col-md-2{
            border-left:1px solid #000;
            background-color:green;
        }

        table{
            text-align: left;
            marin:40px;
        }

        .heading{
            font-weight: bold;
        }

        .lead{
            font-size: 12px;
            font-weight: bold;
        }
    </style>

    <!-- include stylesheets and js files. -->

    
    <?php
        //include('require.php');

    ?>   

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/creative.css" type="text/css">


</head>

<body style="padding-top: 70px;">

    <?php include('require_navbar.php'); ?>

    <?php 
    //    print_r($user);
    
    /*    foreach($involved as $a)
        {
            echo $a[0]->idea;
        }
    */
    

    ?>

    <h1>Welcome, <span style="text-transform: uppercase;"><?php echo $user[0]->name; ?></span></h1>
    <br>
    <!-- Page Content -->
    <div class="container">
  
         <div class="panel-group" id="accordion">

            <div class="panel panel-default">

              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"> Edit Profile</a>
                </h4>
              </div>

              <div id="collapse1" class="panel-collapse collapse">
                <div class="panel-body">
                    <table class="table table-condensed">

                        <tbody>
                          <div class="row">
                            <div class="col-md-4 heading">Name</div>
                            <div class="col-md-4 name aname"><?php echo $user[0]->name; ?></div>
                            <div class="col-md-4 bname"><input type="text" class="form-control name" value="<?php echo $user[0]->name; ?>"></div>
                            <div class="col-md-4"><button class="btn btn-info" id="name" type="submit"><span class="glyphicon glyphicon-edit"></span>&nbsp Edit</btton></div>


                          </div>
                          <div class="row">
                            <div class="col-md-4 heading">Password</div>
                            

                            <div class="col-md-4 name apassword"><?php echo $user[0]->password; ?></div>
                            <div class="col-md-4 bpassword"><input type="password" class="form-control password"></div>
                            <div class="col-md-4"><button class="btn btn-info" id="password" type="submit"><span class="glyphicon glyphicon-edit"></span>&nbsp Edit</btton></div>


                          </div>
                          <div class="row">
                            <div class="col-md-4 heading">Facebook Link</div>
                            

                            <div class="col-md-4 name afacebook"><?php echo $user[0]->facebook; ?></div>
                            <div class="col-md-4 bfacebook"><input type="text" class="form-control facebook" value="<?php echo $user[0]->facebook; ?>"></div>
                            <div class="col-md-4"><button class="btn btn-info" id="facebook" type="submit"><span class="glyphicon glyphicon-edit"></span>&nbsp Edit</btton></div>


                          </div>
                          <div class="row">
                            <div class="col-md-4 heading">Google+ Link</div>
                            

                            <div class="col-md-4 name agoogleplus"><?php echo $user[0]->googleplus; ?></div>
                            <div class="col-md-4 bgoogleplus"><input type="text" class="form-control googleplus" value="<?php echo $user[0]->googleplus; ?>"></div>
                            <div class="col-md-4"><button class="btn btn-info" id="googleplus" type="submit"><span class="glyphicon glyphicon-edit"></span>&nbsp Edit</btton></div>



                          </div>
                          <div class="row">
                            <div class="col-md-4 heading">Linkedin Link</div>
                            

                            <div class="col-md-4 name alinkedin"><?php echo $user[0]->linkedin; ?></div>
                            <div class="col-md-4 blinkedin"><input type="text" class="form-control linkedin" value="<?php echo $user[0]->linkedin; ?>"></div>
                            <div class="col-md-4"><button class="btn btn-info" id="linkedin" type="submit"><span class="glyphicon glyphicon-edit"></span>&nbsp Edit</btton></div>



                          </div>

                        </tbody>

                    </table>
                </div>
              </div>

            </div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">View my Startups</a>
                </h4>
              </div>
              <div id="collapse2" class="panel-collapse collapse">
                <div class="panel-body">

                <?php 

                    foreach($startups as $temp)
                    {


                ?>

                    <div class="row">
                        <div class="col-md-3">
                            <img class="img-responsive" src="http://placehold.it/100x100" alt="">
                        </div>
                        <div class="col-md-7" style="text-align:left">
                            <h4>
                                <b><a href="<?php echo base_url(); ?>index.php/Startup_page/page/<?php echo str_replace(" ", "_", $temp->name) ?>"><?php echo $temp->name; ?></a></b>
                            </h4>
                            <p class="lead">
                                <?php echo $temp->tagline; ?>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span> Posted by <a href=""><?php echo $temp->user_id; ?></a></p>
                        </div>
                        <div class="col-md-2">
                            <a href="<?php echo base_url(); ?>index.php/Startup_page/edit/<?php echo str_replace(" ", "_", $temp->name) ?>" class=""><span class="glyphicon glyphicon-edit">&nbsp;Edit</a>
                        </div>
                    </div>
                    <p class="lead"><?php echo $temp->idea; ?></p>
                    <hr>

                <?php 

                    }
                ?>

                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">View my Events</a>
                </h4>
              </div>
              <div id="collapse3" class="panel-collapse collapse">
                <div class="panel-body">
                    <?php
                        foreach ($events as $temp) {
                    ?>

                        <div class="row">
                            <div class="col-md-3">
                                <img class="img-responsive" src="http://placehold.it/100x100" alt="">
                            </div>
                            <div class="col-md-7" style="text-align:left">
                                <h4>
                                    <b><a href="<?php echo base_url(); ?>index.php/Events/eventDescription/<?php echo $temp->event_id; ?>"><?php echo $temp->name; ?></a></b>
                                </h4>
                                <p class="lead">
                                    <?php echo $temp->tagline; ?>
                                </p>
                                <p><span class="glyphicon glyphicon-time"></span> By <a href=""><?php echo $temp->organisation; ?></a></p>
                                <p><span class="glyphicon glyphicon-time"></span> For <a href=""><?php echo $temp->numdays; ?> </a>days

                                <?php 
                                    if($temp->numdays == 1)
                                    {
                                        echo "On <a href=''>".$temp->dateone."</a>";
                                    }else
                                    {
                                        echo "From <a href=''>".$temp->datefrom."</a> to <a href=''>".$temp->dateto."</a>";
                                    }
                                ?>

                                </p>
                            </div>
                            <div class="col-md-2">
                                <a href="<?php echo base_url(); ?>index.php/Events/EditEvent/<?php echo $temp->event_id; ?>"><span class="glyphicon glyphicon-edit">&nbsp;Edit</a>
                            </div>
                        </div>
                        <hr>


                    <?php
                        }

                    ?>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Startups m involved in</a>
                </h4>
              </div>
              <div id="collapse4" class="panel-collapse collapse">
                <div class="panel-body">
                    
                    <?php 

                        foreach($involved as $temp)
                        {


                    ?>

                        <div class="row">
                            <div class="col-md-3">
                                <img class="img-responsive" src="http://placehold.it/100x100" alt="">
                            </div>
                            <div class="col-md-7" style="text-align:left">
                                <h4>
                                    <b><a href="#"><?php echo $temp[0]->name; ?></a></b>
                                </h4>
                                <p class="lead">
                                    <?php echo $temp[0]->tagline; ?>
                                </p>
                                <p><span class="glyphicon glyphicon-time"></span> Posted by <a href=""><?php echo $temp[0]->user_id; ?></a></p>
                            </div>
                            <div class="col-md-2">
                                <a href="" class="btn btn-info"><span class="glyphicon glyphicon-edit">&nbsp;Edit</a>
                            </div>
                        </div>
                        <p class="lead"><?php echo $temp[0]->idea; ?></p>
                        <hr>

                    <?php 

                        }
                    ?>



                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-parent="#accordion" href="<?php echo base_url(); ?>/index.php/Home/logout">Logout</a>
                </h4>
              </div>
            </div>

          </div> 


    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

    <script type="text/javascript">

        $('document').ready(function(e){
           
            $('.bname, .bpassword, .bfacebook, .bgoogleplus, .blinkedin').hide();


            $(".btn").click(function(e){
                //alert($(this).attr('id'));
                e.preventDefault();

                var id= $(this).attr('id');
                var cls = '".'+id; 

                if(id == 'name')
                {
                      $('.aname').hide();
                      $('.bname').show();
                }else if(id == 'password')
                {
                      $('.apassword').hide();
                      $('.bpassword').show();
                }else if(id == 'facebook')
                {
                    $('.afacebook').hide();
                      $('.bfacebook').show();
                }else if(id == 'googleplus')
                {
                    $('.agoogleplus').hide();
                      $('.bgoogleplus').show();
                }else
                {
                    $('.alinkedin').hide();
                      $('.blinkedin').show();
                }
                 $(this).html("change!");


                $('.btn').click(function(e){
                
                //    alert($(this).text());
                    e.preventDefault();

                    if($(this).text() == 'change!')
                    {
                        var id= $(this).attr('id');
                        if(id == 'name')
                        {
                            //alert($('input.name').val());

                            if($('input.name').val() == "")
                            {
                                alert('please fill up a valid name!')
                            }else
                            {

                                window.location.href = "<?php echo base_url(); ?>index.php/UserProfile/edit/name/"+$('input.name').val();
                            }
                    
                        }else if(id == 'password')
                        {

                            if($('input.password').val() == "")
                            {
                                alert('please fill up a valid name!')
                            }else
                            {

                                window.location.href = "<?php echo base_url(); ?>index.php/UserProfile/edit/password/"+$('input.password').val();
                            }

                        }else if(id == 'facebook')
                        {
                            
                            window.location.href = "<?php echo base_url(); ?>index.php/UserProfile/edit/facebook/"+$('input.facebook').val();
                            

                        }else if(id == 'googleplus')
                        {
                            
                            window.location.href = "<?php echo base_url(); ?>index.php/UserProfile/edit/googleplus/"+$('input.googleplus').val();
                            

                        }else
                        {
                            window.location.href = "<?php echo base_url(); ?>index.php/UserProfile/edit/linkedin/"+$('input.linkedin').val();
                            
                        }

                    }
                });

            });

        });

    </script>

</body>

</html>
