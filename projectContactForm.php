<?php

	#Creating a contact form using php, bootstrap and javascript.
	
	$error = "";
	$successMsg = "";

	if($_POST){


		if(!$_POST["email"]){

			$error .= "Kindly enter the email address!!<br>";
		}

		if(!$_POST["subject"]){

			$error .= "The subject is required!!<br>";
		}

		if(!$_POST["content"]){

			$error .= "Please enter the content for the email!!<br>";
		}

		if($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false){

			$error .= "The email is invalid<br>";

		}

		if($error != ""){

			$error = '<div class="alert alert-danger" role="alert"><strong>There were some errors in the form.<br></strong>' . $error . '</div>';

		}else{

			$emailTo = "lokesh.jadhav10@gmail.com";

			$subject = $_POST['subject'];

			$content = $_POST['content'];

			$headers = "From: ".$_POST['email'];

			if(mail($emailTo, $subject, $content, $headers)){

				$successMsg = '<div class="alert alert-success" role="alert"> Your message was sent, we will get back to you ASAP!</div>'; 

			}else{

				$error =  '<div class="alert alert-danger" role="alert"> Your message was  not sent, please try again later</div>'; 

			}





		}

	}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
  </head>
  <body>
  	<div class="container">
	    <h1>Get in Touch!</h1>
	    <div id="error">
	    	<?php
	    		echo $error.$successMsg;
	    	?>
	    </div>
	    <form method="POST">
		  <div class="form-group">
		    <label for="email">Email address</label>
		    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
		  </div>
		  <div class="form-group">
		    <label for="subject">Subject</label>
		    <input type="text" class="form-control" id="subject" name="subject">
		  </div>
		  <div class="form-group">
		    <label for="content">What would you like to ask us?</label>
		    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
		  </div>
		  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

    <script type="text/javascript">
		
		$("form").submit(function(e){

    		//e.preventDefault(); this creates problem of double click hence use return true and false method instead.

    		var error = "";

    		if($("#email").val() == ""){

    			error += "Kindly enter the email address.<br>";
    		}

    		if($("#subject").val() == ""){

    			error += "The subject is mandatory.<br>";
    		}

    		if($("#content").val() == ""){

    			error += "Please enter the content of the email.";
    		}

  			
  			if(error != ""){

  				$("#error").html('<div class="alert alert-danger" role="alert"><strong>There were some errors in the form.<br></strong>' + error + '</div>');

  				return false;

  			}else{

  				//$("form").unbind("submit").submit(); this creates problem of double click hence use return true and false method instead.

  				return true;

  			}

    	});
		    	
    </script>


  </body>
</html>