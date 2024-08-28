        <div class="col-3 p-2">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tag</th>
                        <th>Count</th>
                    </tr>
                </thead>
<?php               foreach($domset AS $key => $data){
?>                      <tr>
                            <td><?=$key?></td>
                            <td><?=$data?></td>

                        </tr>
<?php                }
?>
            </table>
        </div>
        <div class="col-8 p-2" style="height: 500px;">
            <p><?= $html ?></p>
        </div>  
