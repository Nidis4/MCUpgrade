<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

include 'synch.php';
?>

<html>
<head>
	<style type="text/css">
		.action {
		    background: #004a86;
		    color: white;
		    padding: 10px;
		    max-width: 230px;
		    text-align: center;
		    margin: auto;
		    margin-bottom: 10px;
		    border-radius: 5px;
		    cursor:pointer;
		}
		body{
			margin:0px;
			padding: 0px;
			font-family: Verdana;
		}
	</style>
</head>
<body>
	<div class="action" id="Categories">Sync Categories</div>
	<div class="action" id="Applications">Sync Application</div>
	<div class="action" id="category">Sync Customers</div>
	<div class="action" id="category">Sync Professionals</div>
	<div class="action" id="category">Sync Appointments</div>
	<div class="action" id="category">Sync Reviews</div>

	<div id='output'></div>

	<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

  <script type="text/javascript">
  	$( ".action" ).click(function() {
	  //alert(this.id);
	  var funct = 'sync'+this.id;
	  //alert(funct);
	  $.ajax({
        type: "POST",
        url: 'synch.php',
        data: {
            fun: funct
        },
        success: function(data)
        {
            //alert("Tag saved!");
            //alert(data);
            $('#output').empty();
            $('#output').append(data);
        }
    	});
	});
  </script>
</body>
</html>
