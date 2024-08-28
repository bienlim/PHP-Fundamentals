<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <form class="add" action="<?=base_url('Students/edit_confirm/'.$user->id)?>" method="POST">
        <label class="d-block">First Name: 
			<input type="text" name="name_first" value="<?=$user->name_first?>">
		</label>
		<label class="d-block">Last Name:
        	<input type="text" name="name_last" value="<?=$user->name_last?>">
		</label>
		<span class="d-block">
			Gender:
			<label>
				<input type="radio" name="gender" value="male" <?= $male ?>>
				Male
			</label>
			<label>
				<input type="radio" name="gender" value="female" <?= $female ?>>
				Female
			</label>
		</span>
		<label class="d-block">
			Classifiation
			<select name="class" value="<?=$user->class?>">
				<option>Regular</option>
				<option>Part-time</option>
				<option>Probationary</option>
        	</select>
		</label>
		<label class="d-block" value="<td><?=$user->course_id?></td>"> Course:
			<select name="course_id">
				<option value="1">MS Chemical Egnineering</option>
				<option value="2">BS Information Technology</option>
				<option value="3">BS Computer Science</option>
			</select>
		</label>
        <a href="<?=base_url()?>" class='btn btn-light'>Cancel</a>
        <input type="submit" value="Update">
    </form>
</body>