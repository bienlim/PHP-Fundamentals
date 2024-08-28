                <div class="card p-2 position-fixed" style="right:50% ; top:20% ; width:35rem; margin-right:-17rem;">
                    <div class="card-body py-3 px-5">
                        <h3 class="fw-bold ls-tight text-center ">
                            Are you sure you want to remove?
                        </h3>
                        <form action="<?=base_url('products/remove_product_confirm') ?>" method="POST">
                                <div style="transform: rotate(0);"> 

                                    <div class="card-body m-0 pb-0">
                                        <div class="text-center">
                                            <img
                                                src="<?=$product_remove['img_product'] ?>"
                                                class="img-thumbnail m-auto"
                                                alt="<?=$product_remove['name_product'] ?>"
                                                style = "width: 10rem;"
                                            />
                                            <h4 class="card-title mb-3" style="height: 3rem"><?=$product_remove['name_product'] ?></h4>
                                        </div>
                                        <h6 class="card-title">SALE PRICE: PHP <?=$product_remove['price'] ?><a type="submit" class="btn stretched-link"><a></h6>
                                        <p> Product added on: <?=$product_remove['created_at'] ?></p>
                                        <p> Current stock: <?=$product_remove['count_stock'] ?></p>
                                        <p> Sold units: <?=$product_remove['count_sold'] ?></p>
                                        <input type="hidden" name="id_product" value="<?=$product_remove['id_product'] ?>">
                                    </div>
                                </div>
                            <!-- Submit button -->
                            <div class="text-end">
                                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                                <input type="submit" class="btn btn-light btn-block mb-4" value="Cancel" formaction="<?=base_url('products') ?>">
                                <input type="submit" class="btn btn-danger btn-block mb-4" value="Remove">
                            </div>
                        </form>
                    </div>
                </div>