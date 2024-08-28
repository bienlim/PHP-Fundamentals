
<?php foreach($messages AS $message){
?>          <div class="row">
                <div class="col-6 offset-3 <?=$message[1]?>">
                    <div >
                        <p class="border border-dark d-inline-block p-2 rounded bg-light">
                        <?= $message[0] ?>
                        </p>
                    </div>
                </div>
            </div>

<?php }
?>
