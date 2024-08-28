            <div class="card p-2 position-fixed" style="right:50% ; top:15% ; width:35rem; margin-right:-17rem;">
                    <div class="card-body py-3 px-5">
                        <h3 class="fw-bold ls-tight text-center ">
                            Editing: <?=$product_edit['name_product'] ?>
                        </h3>
                        <form action="<?=base_url('products/edit_product_confirm') ?>" method="POST">
                                <div style="transform: rotate(0);"> 

                                    <div class="card-body pb-0">
                                        <div class="text-center mb-3">
                                            <img
                                                src="<?=$product_edit['img_product'] ?>"
                                                class="img-thumbnail m-auto"
                                                alt="<?=$product_edit['name_product'] ?>"
                                                style = "width: 10rem;"
                                            />
                                        </div>
                                        <div class="error text-center text-danger mb-3"><?=$this->session->flashdata('input_errors');?></div>

                                        <div class="mb-3 row">
                                            <label class="col-3 col-form-label">Name</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="name_product" value="<?=$product_edit['name_product'] ?>">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-3 col-form-label">Price</label>
                                            <div class="col-9">
                                                <input type="number" class="form-control" name="price" value="<?=$product_edit['price'] ?>">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-3 col-form-label">Stock</label>
                                            <div class="col-9">
                                                <input type="number" class="form-control" name="count_stock" value="<?=$product_edit['count_stock'] ?>">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-3 col-form-label">Sold</label>
                                            <div class="col-9">
                                                <input type="numbr" class="form-control" name="count_sold" value="<?=$product_edit['count_sold'] ?>">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-3 col-form-label">Created on</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="created_at" value="<?=$product_edit['created_at'] ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-3 col-form-label">Updated on</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="updated_at" value="<?=$product_edit['updated_at'] ?>" disabled>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id_product" value="<?=$product_edit['id_product'] ?>">
                                    </div>
                                </div>
                            <!-- Submit button -->
                            <div class="text-end">
                                <input type="hidden" name="img_product" value="<?=$product_edit['img_product'] ?>" />
                                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                                <input type="submit" class="btn btn-light btn-block mb-4" value="Cancel" formaction="<?=base_url('products') ?>">
                                <input type="submit" class="btn btn-light btn-block mb-4" value="Save">
                            </div>
                        </form>
                    </div>
                </div>