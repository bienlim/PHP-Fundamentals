        <div class="col-12 mt-4 p-1">
<?php foreach($orders as $order){
?>
                    <div class="card d-inline-block m-2 align-top p-3 text-center bg-light" style="width: 15rem; height: 15rem">
						<p><?=$order['content']?></p>
                    </div>
<?php }
?>      
        </div>
