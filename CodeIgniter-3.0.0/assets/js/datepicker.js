$(document).ready(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
    $( ".datepicker" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true, //this option for allowing user to select from year range
       dateFormat: "dd-mm-yy"
    });
    
  $('.days1, .days2').datepicker({
                    format: "dd/mm/yyyy"
                });
  }


);