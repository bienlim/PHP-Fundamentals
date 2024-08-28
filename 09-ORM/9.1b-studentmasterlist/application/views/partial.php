<table>
    <thead>
        <tr>
            <td>ID</td>
            <td>Last Name</td>
            <td>First Name</td>
            <td>Gender</td>
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
            <td><?=$user->created_at?></td>
            <td>
                <form action="Students/remove_user" method="POST">
                    <input type="hidden" name="id" value="<?=$user->id?>">
                    <input type="submit" name="remove" value="remove">
                </form>
            </td>
        </tr>

<?php   }
?>
</table>