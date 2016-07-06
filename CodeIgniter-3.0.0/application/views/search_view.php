<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Search Startups - Startupedia</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>css/blog-home.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Find Startups
                    <small>Search Now!</small>
                </h1><br>

                <!-- Search Result -->

     <?php //................
		$loc=$this->input->post('loc');
		$name=$this->input->post('name');
		$query= $this->db->query("select startups.*,users.name as username from startups,users where startups.user_id=users.user_id and startups.location like '%".$loc."%' and startups.name like '%".$name."%'" );


		if($query->num_rows()>0)
		{	
			foreach($query->result_array() as $row) {
				
			$s_name= str_replace(" ", "_", $row['name']);


				echo "<div class='row'>        
					 <div class='col-md-3'>
<img class='img-responsive' src='".base_url(). "img/startup_logo/".$row['logo']."' alt=''>
                    		  </div>
                    		  <div class='col-md-9'>
                        	  <h3>
                             <b><a href='Startup_page/page/".$s_name."'>".$row['name']."</a></b>
                        	   </h3>
                        	   <p class='lead'>
                           by <a href=''>".$row['tagline']."</a>
                        	   </p>
                        <p><span class='glyphicon glyphicon-time'></span> Posted by <a href=''>".$row['username']."</a></p>
                    </div>
                </div><hr>
                <p>".$row['accomplishments']."</p>
                <a class='btn btn-primary' href='Startup_page/page/".$s_name."'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>

                <hr><hr>";





			}
		}
		else
			echo "failure";
			
 ?>
       
		    
<?php //............... ?>

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Location</h4>
	<form action="<?php echo base_url(); ?>index.php/search" method="post">
                    <div class="input-group">
                        <input type="text" name="loc" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>
                <div class="well">
                    <h4>Search by Startup Name</h4>
                    <div class="input-group">
                        <input type="text" name="name" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
</form>
                </div>


                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Present Sectors</h4>
                    <h6>All available sectors will be present here.</h6>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                  <!--  <p>Copyright &copy; Your Website 2014</p> -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

</body>

</html>
