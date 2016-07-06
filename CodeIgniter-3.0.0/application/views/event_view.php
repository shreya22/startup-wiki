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

    </style>

    <!-- include stylesheets and js files. -->    
    <?php
        include('require.php');
    ?>   


</head>

<body style="padding-top: 70px;">

    <?php include('require_navbar.php'); ?>

    <!-- Page Content -->
    <div class="container">

<?php


    $a= json_decode($eData); 
    $b= json_decode($cityName);

 //   print_r($a);
  
    $flag=0; //0 means no of events is even, 1 means odd.
 ?> 

        
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

                <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/Events/addEvent"><span class="glyphicon glyphicon-plus"></span> Add Event :)</a>
                

            </div>

            <!-- Blog Entries Column -->
            <div class="col-md-9 col-sm-4 col-xsm-12" id="maintab">

                <h1 class="page-header" >
                    Events
                </h1><br>

                <!-- First Blog Post -->

                <?php

                    $numrows= $a->numrows;
                    if($numrows %2 == 1)
                    {
                        $flag=1;
                        $numrows--;
                    }

                    for($i=0; $i<$numrows; $i++)
                    {
                ?>  

                        <div class="row" >
                            <div class="col-md-5">
                                <div class="row well">
                                    <div class="col-md-4" >
                                        <img class="img-responsive" src="http://placehold.it/120x120" alt="">
                                    </div>
                                    <div class="col-md-8">
                                        <h4>
                                            <b><a href="<?php echo base_url(); ?>index.php/Events/eventDescription/<?php echo $a->eData[$i]->event_id; ?>" style="text-decoration: none;"><?php echo $a->eData[$i]->name;?></a></b>
                                        </h4>
                                        <b><p style="font-size:12px;"><?php echo $a->eData[$i]->tagline; ?></p></b>
                                        <p>
                                            by <a href="index.php"><?php echo $a->eData[$i]->organisation; ?></a>
                                        </p>
                                        <p><span class="glyphicon glyphicon-road"></span> <a href=""><?php echo $b[$i]; ?></a></p>
                                        <p><span class="glyphicon glyphicon-chevron-right"></span>&nbsp;For <?php echo $a->eData[$i]->numdays; ?> days</p>

                                        <?php 

                                            if($a->eData[$i]->numdays == 1) 
                                            {
                                        ?>
                                            <p><span class="glyphicon glyphicon-equalizer"></span> On&nbsp;<a href=""><?php echo $a->eData[$i]->dateone; ?></a></p>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                            <p><span class="glyphicon glyphicon-equalizer"></span> From &nbsp;<a href=""><?php echo $a->eData[$i]->datefrom; ?></a>&nbsp;to <a href=""><?php echo $a->eData[$i]->dateto; ?></a></p>
                                        <?php 
                                            }

                                        ?>

                                        <a class="btn btn-primary viewMore" id="<?php echo $a->eData[$i]->event_id; ?>"  href="<?php echo base_url(); ?>index.php/Events/eventDescription/<?php echo $a->eData[$i]->event_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-1"></div>

                    <?php $i++; ?>

                            <div class="col-md-5">
                                <div class="row well">
                                    <div class="col-md-4">
                                        <img class="img-responsive" src="http://placehold.it/120x120" alt="">
                                    </div>
                                    <div class="col-md-8">
                                        <h4>
                                            <b><a href="<?php echo base_url(); ?>index.php/Events/eventDescription/<?php echo $a->eData[$i]->event_id; ?>" style="text-decoration: none;"><?php echo $a->eData[$i]->name; ?></a></b>
                                        </h4>
                                        <b><p style="font-size:12px;"><?php echo $a->eData[$i]->tagline; ?></p></b>
                                        <p>
                                            by <a href="index.php"><?php echo $a->eData[$i]->organisation; ?></a>
                                        </p>
                                        <p><span class="glyphicon glyphicon-road"></span> <a href=""><?php echo $b[$i]; ?></a></p>
                                        <p><span class="glyphicon glyphicon-chevron-right"></span>&nbsp;For <?php echo $a->eData[$i]->numdays; ?> days</p>

                                        <?php 

                                            if($a->eData[$i]->numdays == 1) 
                                            {
                                        ?>
                                            <p><span class="glyphicon glyphicon-equalizer"></span> On&nbsp;<a href=""><?php echo $a->eData[$i]->dateone; ?></a></p>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                            <p><span class="glyphicon glyphicon-equalizer"></span> From &nbsp;<a href=""><?php echo $a->eData[$i]->datefrom; ?></a>&nbsp;to <a href=""><?php echo $a->eData[$i]->dateto; ?></a></p>
                                        <?php 
                                            }
                                        ?>

                                        <a class="btn btn-primary viewMore" id="<?php echo $a->eData[$i]->event_id; ?>" href="<?php echo base_url(); ?>index.php/Events/eventDescription/<?php echo $a->eData[$i]->event_id; ?>" >Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                                    </div>


                                </div>
                            </div>

                        </div>      

                <?php

                    } //for loop over

                    if( $flag == 1)
                    {
                        $flag=0;
                ?>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row well">
                                    <div class="col-md-4" >
                                        <img class="img-responsive" src="http://placehold.it/120x120" alt="">
                                    </div>
                                    <div class="col-md-8">
                                        <h4>
                                            <b><a href="<?php echo base_url(); ?>index.php/Events/eventDescription/<?php echo $a->eData[$i]->event_id; ?>" style="text-decoration: none;"><?php echo $a->eData[$i]->name; ?></a></b>
                                        </h4>
                                        <b><p style="font-size:12px;"><?php echo $a->eData[$i]->tagline; ?></p></b>
                                        <p>
                                            by <a href="index.php"><?php echo $a->eData[$i]->organisation; ?></a>
                                        </p>
                                        <p><span class="glyphicon glyphicon-road"></span> <a href=""></a><?php echo $b[$i]; ?></p>
                                        <p><span class="glyphicon glyphicon-chevron-right"></span>&nbsp;For <?php echo $a->eData[$i]->numdays; ?> days</p>

                                        <?php 

                                            if($a->eData[$i]->numdays == 1) 
                                            {
                                        ?>
                                            <p><span class="glyphicon glyphicon-equalizer"></span> On&nbsp;<a href=""><?php echo $a->eData[$i]->dateone; ?></a></p>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                            <p><span class="glyphicon glyphicon-equalizer"></span> From &nbsp;<a href=""><?php echo $a->eData[$i]->datefrom; ?></a>&nbsp;to <a href=""><?php echo $a->eData[$i]->dateto; ?></a></p>
                                        <?php 
                                            }

                                            $eventFullPage= array(
                                                    'eventFullPage' => $a->eData[$i]
                                                );
                                            $this->session->set_userdata($eventFullPage);
                                        ?>

                                        <a class="btn btn-primary viewMore" id="<?php echo $a->eData[$i]->event_id; ?>"  href="<?php echo base_url(); ?>index.php/Events/eventDescription/<?php echo $a->eData[$i]->event_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                                    </div>
                                </div>
                            </div>
                            

                        </div>
                    

                <?php } ?>




                <hr>

                
                
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
            $('#maintab').css('margin-top', '')
        }

        
    </script>

</body>

</html>
