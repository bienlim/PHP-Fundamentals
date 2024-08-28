<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<script>
		$(document).ready(function(){
			$.get( 
				"Students/partial" , 
				function(res) {
          			$('#usertable').html(res);
        		}
			);	
		}); 
 		 $(document).on('submit','form', function()

			{
				//alert('tesst');

				var card=$(this);
				$.post(card.attr("action"),card.serialize(),function(res) {
					$('#usertable').html(res);}
				);
				return false;
			}
		)	 
    </script>
</head>
<body>
    <form action="Students/new" method="POST">
        <input type="text" name="name_first">
        <input type="text" name="name_last">
         <input type="radio" name="gender" value="male">
        <input type="radio" name="gender" value="female">
        <select name="class">
            <option>Regular</option>
            <option>Part-time</option>
            <option>Probationary</option>
        </select>
         <!-- <input type="password" name="password"> -->
        <input type="submit" value="Sign Up">
    </form>
    <div id="usertable">
    </div>
</body>
</html>