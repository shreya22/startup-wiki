<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Startup Wiki</title>

    <?php
        include('require_form.php');

    ?>

    <!-- angular include script -->
    <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>


</head>

<body id="page-top home">

    

    <section>
        <div class="header-content">
            <div class="header-content-inner">
                <h4><p>Bit more you can do with your startup page..</p></h4>
                <h2><p>Add members to your startup...</p></h2>

            </div>
        </div>



    </section>
<br>
    <div ng-app="home">

        <h4><p>Select the startup to add member in...</p></h4>

        <div class="container"  ng-controller="one" >

            <div ng-repeat="x in startups">
                <div class="radio">
                  <label><input type="radio" name="radiobtn" value="{{x.name}}" ng-model="startup.name">{{x.name}}</label>
                </div>
            </div>

            <h4> SELECTED STARTUP: {{startup.name}}  </h4>
            <br><br>

            {{users}}

            <input id="autocomplete" class="form-control auto" placeholder="Start Typing name of registered user..">


        </div>        

    </div>

  
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

     <script src="<?php echo base_url(); ?>js/jquery.easing.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.fittext.js"></script>
    <script src="<?php echo base_url(); ?>js/wow.min.js"></script>

    <!-- Custom Theme JavaScript --><!-- Plugin JavaScript -->
   
    <script src="<?php echo base_url(); ?>js/creative.js"></script>
    <script src="ui/angular-ui.min.js"></script>

    <!-- typeahead script file-->
    <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>

    <!-- jquery autocomplete api -->
            <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
            <script src="//code.jquery.com/jquery-1.10.2.js"></script>
            <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


    <script> 

        

        console.log('page loaded');
        var app = angular.module('home', []);

        app.controller('one', function($scope, $http) {

            $scope.startup={
                name:'none'
            };

            //get startups registered under the current logged in user.
             $http({
                  dataType: "json",
                  method: 'POST',
                  url: '<?php echo base_url(); ?>index.php/Startup_add_member/get_startups',
              }).success(function(data){
                    console.log(data[0].name);

                    $scope.startups= data;
              });

            //get details of all registered users
               $http({
                  dataType: "json",
                  method: 'POST',
                  url: '<?php echo base_url(); ?>index.php/Startup_add_member/get_users',
              }).success(function(data){
                    console.log(data[0].name);

                    $scope.users= data;
              }); 

        /*      $( "#autocomplete" ).autocomplete({             
                  source: $scope.users[0].name
                });
         */   
        });

         


    </script>

</body>

</html>

