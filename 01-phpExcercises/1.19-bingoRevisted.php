<html>
    <style>
        td      { border-style: solid; }
        td.blue { color: blue; }
        td.red  { color: red;}
    </style>
<body style="width:100px; margin: auto">
    <h1> BINGO </h1>     
    <table style="border-style: solid; border-collapse: collapse">
<?php for($row=1;$row<5;$row++){ ?>
        <tr>
<?php for($col=0;$col<5;$col++){  ?>
            <td class="<?= $row%2==0?($col%2==0?'red':'blue'):($col%2==0?'blue':'red') ?>">
                    <?= rand(5,30) ?>
            
            </td>
<?php  } ?>
        </tr>
<?php } ?>
    </table>
</body>
</html>