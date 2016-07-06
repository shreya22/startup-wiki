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
            <?php if(!$this->session->has_userdata('logged_in'))
                

                {
            ?>
            <a class="navbar-brand page-scroll" href="<?php echo base_url(); ?>index.php/signup">Join</a>
            <a class="navbar-brand page-scroll" href="#page-top" data-toggle="modal" data-target="#myModal">&nbsp; Login</a>
            <?php 
                }else{
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
            ?>



                <!-- Modal for user login -->
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h2 class="modal-title" > <span class="glyphicon glyphicon-login"></span>&nbsp;Login</h2> 
                          
                        </div>
                        <div class="modal-body">
                          <!-- form begins -->
                                 <form role="form" action="<?php echo base_url(); ?>index.php/verifylogin" method="post" id="login_model">
                                      <div class="form-group">
                                        
                                        
                                        <input type="email" name="email" class="form-control" id="email" placeholder="email..">
                                      </div>
                                      <div class="form-group">
                                        
                                        <input type="password" name="password" class="form-control" id="pwd" placeholder="password..">
                                      </div>
                                      
                                      <div class="form-group">
                                        <button type="submit" id="loginbtn" name="login" value="yes" class="btn btn-default frm_log">
                                            Submit                                      </button>&nbsp;&nbsp;
                                        <button type="submit" name="forgot" value="yes" id="forgotbtn" class="btn btn-default frm_log">Forgot Password</button>

                                      </div>
                                      
                                </form>
                          <!-- form ends -->
    <div id="login_error"></div>
                        </div>
                        
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>

                      
                      
                    </div>
                  </div>
                <!--modal over -->
                
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="<?php echo base_url(); ?>">Home</a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Portfolio</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>