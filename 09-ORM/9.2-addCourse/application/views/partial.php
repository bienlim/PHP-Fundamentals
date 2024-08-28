<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Last Name</td>
            <td>First Name</td>
            <td>Gender</td>
            <td>Course</td>
            <td>Date added</td>
            <td>Action</td>
        </tr>
    </thead>
<?php   foreach($users AS $user){
?>      <tr>
            <td><?=$user->id?></td>
            <td><?=$user->name_last?></td>
            <td><?=$user->name_first?></td>
            <td><?=$user->gender?></td>
            <td><?=$user->course_course?></td>

            <td><?=$user->created_at?></td>
            <td class="d-block"> 
                    <a href="Students/edit_dialog/<?=$user->id?>" class="btn btn-light d-inline" Value="Edit">Edit</a>
                <form action="Students/remove_user" method="POST" class="d-inline">
                    <input class="align-top d-inline" type="hidden" name="id" value="<?=$user->id?>">
                    <input  class="btn btn-light d-inline remove" type="submit" name="remove" value="Remove">
                </form>
            </td>
        </tr>
<?php   }
?>
</table>