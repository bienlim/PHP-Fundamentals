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
	<div id="dialoghere">
	</div>

    <form class="add" action="Students/new" method="POST">
        <label class="d-block">First Name: 
			<input type="text" name="name_first">
		</label>
		<label class="d-block">Last Name:
        	<input type="text" name="name_last">
		</label>
		<span class="d-block">
			Gender: 
			<label>
				<input type="radio" name="gender" value="male">
				Male
			</label>
			<label>
				<input type="radio" name="gender" value="female">
				Famale
			</label>
		</span>
		<label class="d-block">
			Classifiation
			<select name="class">
				<option>Regular</option>
				<option>Part-time</option>
				<option>Probationary</option>
        	</select>
		</label>
		<label class="d-block"> Course:
			<select name="course_id">
				<option value="1">MS Chemical Egnineering</option>
				<option value="2">BS Information Technology</option>
				<option value="3">BS Computer Science</option>
			</select>
		</label>
        <input type="submit" value="Sign Up">
    </form>
    <div id="usertable" class="m-4">
    </div>
</body>
</html>