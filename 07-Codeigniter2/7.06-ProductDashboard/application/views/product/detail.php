            <div class="col-4 mt-4 p-1">
                <div class="card d-inline-block m-2 align-top" style="width: 25rem; height: 42rem">
                        <div style="transform: rotate(0); height:630px;"> 
                            <img
                                src="<?=$product['img_product'] ?>"
                                class="card-img-top"
                                style="height:530px; object-fit: contain;"
                                alt="<?=$product['name_product'] ?>"
                            />
                        </div>
                </div>    
            </div>
<!----------------- Product Info ----------------------->
            <div class="col-4 mt-5 p-1">
                    <div style="height: 430px;">    
                        <h1 class="mb-3"><?=$product['name_product'] ?></h1>
                        <h1 class="mb-3 blockquote-footer">series no: 09-89-qwe-<?=$product['id_product'] ?></h1>
                        <h6 class="mb-3">PHP <?=$product['price'] ?></h6>
                        <h6 class="mb-3">ON STOCK: <?=$product['count_stock'] ?></h6>
                        
                        <div class="text-end pe-5">
                        <button class="btn btn-primary text-end"> Buy now!</button>
                        </div>
                    </div>
                    <div  class="text-end">
                        <h3 class="text-start"> Leave a review </h3>
                        <div class="error text-center text-danger mb-3"><?=$this->session->flashdata('input_errors_review');?></div>
                        <form action="<?= base_url('reviews/add') ?>" method="POST">
                            <textarea name="content" class="form-control w-100 mb-1" rows="6"></textarea>
                            <input type="hidden" name="id_user" value="<?=$_SESSION['id_user']?>">
                            <input type="hidden" name="id_product" value="<?=$product['id_product'] ?>">
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />

                            <input type="submit" Value="Post" class=" btn btn-light text-end">
                        </form>
                    </div>
            </div>
<!----------------- Product Reviews ----------------------->
            <div class="col-4 mt-4 p-3 border-start border-light-subtle ">
            <h3 class="text-end"> Reviews</h3>
            <div class="error text-center text-danger mb-3"><?=$this->session->flashdata('input_errors_comment');?></div>
<?php           foreach($inbox AS $review){
?>
                <div>
                    <p class="border-bottom border-light-subtle fw-semibold mb-3 pb-0"><?=$review['username']?> <span class="fw-light">said on <?=$review['review_date']?></span></p>
                    <p class="blockquote-footer mb-0 pb-0 text-end">Roughly <?=$review['time_diff']?> hours ago</p>
                    <p><?=$review['content']?></p>
                    <div class="ms-4">
<?php               foreach ($review['comments'] as $comments) {
    ?>                      <p class="border-bottom border-light-subtle fw-semibold"><?=$comments['username']?> 
                                <span class="fw-light">said on </span> 
                                <span class="fw-light"><?=$comments['review_date']?></span>
                            </p>
                            <p class="blockquote-footer mb-0 pb-0 text-end">Roughly <?=$comments['time_diff']?> hours ago</p>
                            <p><?=$comments['content']?></p>
<?php               }                     
?>                      <form action="<?= base_url('comments/add') ?>" method="POST">
                        <textarea name="content" class="form-control w-100 mb-1" rows="1"></textarea>
                        <input type="hidden" name="id_user" value="<?= $_SESSION['id_user'] ?>">
                        <input type="hidden" name="id_review" value="<?= $review['id_review'] ?>">
                        <input type="hidden" name="id_product" value="<?= $product['id_product'] ?>">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                        <p class="text-end">
                            <input type="submit" Value="Post" class=" btn btn-light text-end">
                        </p>
                        </form>
                    </div>
                </div>
<?php   }
?>
            </div>