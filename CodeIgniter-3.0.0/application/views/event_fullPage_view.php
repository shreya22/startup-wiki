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
            paddig-top:50px;
        }


        #sidebar {
            position:absolute;
            z-index:1;
        }

        #sidebar.fixed {
            position:fixed;
            top:0;
        }

        #maintab{
            position: absolute;
        }

        #join{
            padding:8px 20px 8px 20px;
        }

        .panel{
            text-align: center;
        }

        p{
            font-weight: bold;
        }

    </style>

    <!-- include stylesheets and js files. -->    
    <?php
        include('require.php');
    ?> 

</head>

<body style="padding-top: 70px;">

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
            <?php 

                if($this->session->has_userdata('logged_in') && $owner == 'true')
                {
                    $logged_user= $this->session->userdata('logged_in');
            ?>
                <a class="navbar-brand page-scroll dropdown-toggle" data-toggle="dropdown" href="#" >&nbsp; <span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $logged_user['name']; ?>   &nbsp;<span class="glyphicon glyphicon-collapse-down"></span></a>

                <!-- dropdown for user profile -->
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url(); ?>index.php/Startup_signup">Add Startup</a></li>
                  <li><a href="<?php echo base_url(); ?>index.php/Events/addEvent">Add Event</a></li>
                  <li><a href="<?php echo base_url(); ?>index.php/UserProfile">My Profile</a></li>
                  <li><a href="<?php echo base_url(); ?>index.php/Home/logout">Logout</a></li>
                </ul>

            <?php 
                }
                else{
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
                        <a class="page-scroll" href="<?php echo base_url(); ?>index.php/Events/EditEvent/<?php echo $data['eventFullPage'][0]->event_id; ?>"> <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit</a>
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
    
    <!-- Page Content -->
    <div class="container">

        <div class="row" >

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3 col-sm-3 col-xsm-12" id="sidebar">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Location</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <div class="well">
                    <h4>Search by Event Name</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>



            </div>

            <!-- Blog Entries Column -->
            <div class="col-md-8 col-sm-4 col-xsm-12" id="maintab">


                <!-- First Blog Post -->

                <div class="panel panel-info" >
                    
                    <div class="panel panel-heading">
                        <p><a href="#"><?php echo $data['eventFullPage'][0]->organisation; ?></a> presents</p>
                    </div>
                    <div class="panel panel-body">
                        <h1><b><?php echo $data['eventFullPage'][0]->name; ?></b></h1>
                        <b><p><?php echo $data['eventFullPage'][0]->tagline; ?></p></b><br>
                    </div>

                    <?php if($data['eventFullPage'][0]->numdays == 1)
                            { 
                        ?>
                            On <a href="#"><?php echo $data['eventFullPage'][0]->dateone; ?></a>
                        <?php 
                            }
                            else
                            {
                        ?>

                            From <a href="#"><?php echo $data['eventFullPage'][0]->datefrom; ?></a> to <a href="#"><?php echo $data['eventFullPage'][0]->dateto; ?></a>
                        <?php 
                            }
                        ?>

                            <br>
                            In <a href="#"><?php echo $data['cityName']; ?></a>
                        </p>

                        <a href="#"><span class="glyphicon glyphicon-download-alt"></span> download poster</a><br>
                        <button class="btn btn-default">Join</button>
                   
                        <p>
                            <b><h4>About the Event</h4></b>
                            <?php echo $data['eventFullPage'][0]->description; ?>
                        </p><br>
                        <p>
                            <b><h4>For more details, contact</h4></b>
                            <?php echo$data['eventFullPage'][0]->contactus; ?>
                        </p>

                    
                    <hr>
                    <div class="panel panel-footer">
                        <button class="btn btn-primary" id="join">Join</button>
                    </div>
                </div>

                

                

                


            </div>

            

        </div>
        <!-- /.row -->

        
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(window).scroll(function () {
            var threshold = 100;
            if ($(window).scrollTop() >= 100)
                $('#sidebar').addClass('fixed');
            else
                $('#sidebar').removeClass('fixed');
        });


        $(window).resize(function(){
            if ($(window).width() < 760) {
               $('#sidebar').css('right', '');
               $('#maintab').css('margin-top', '150px')
            }
            else {
                $('#sidebar').css('right', '30px');
            }
        });

        if ($(window).width() < 760) {
               $('#maintab').css('margin-top', '150px')
            }
        else{
            $('#sidebar').css('right', '30px');
        }

        
    </script>

</body>

</html>
