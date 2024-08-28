<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
	$(document).ready(function() {
		$('form').submit(function() {
			var url = $('#url').val();
			console.log(url);
			$.get(url, function(res) {

		 		/**** NEW */
				$('#http_response').val(res));
				var result = $(res);
				//var tag_list ={}:
				//$()
				console.log(result);

				/* -----parse get HTML result to an object  */
				//var result = $.parseHTML(res);

				var tags = [];

				//console.log(result);
																		//console.log(alltag);

				/*--------Push tags in TAGS array */
				result.find('*').map(function(map){
					tags.push(map.tagName);
					//console.log(result[i].tagName);
				});
				//console.log(tags);
				
            	$('#display').html(result);
																	///console.log(tags);

				/*--------Get unique tags from tags array  ------- */
				var unique = tags.filter((value, index, array) => array.indexOf(value) === index);
																	//console.log(unique);
																	//console.log(unique.length);
				/*--------Count uniqu	e tags from tags array  ------- */
				 for(i=0 ; i < unique.length; i++){
					var tag = unique[i];
					//console.log(tag);
					var pair = tags.filter(((value) => value == tag), tag);
					console.log(tag+':'+pair.length)
				} 
				
				/* if(res.length !== 0) {
					html_string = res; 
				} else {
					html_string = "Not Found";
				}
				//$('#results').html(html_string); */
				//console.log(html_string);
			}, 'html');
			
			return false;
    	});
	</script>

</head>
<body class="container">
<div class="row text-center m-3">
	<form action="" method="post">
		<input id="url" name="url" type="text">
		<input type="submit">
	</form>
</div>
<div id="display" class="row">

</div>
</body>
</html>