                    <div class="card-body py-3 px-5 bg-light form-control mt-3">
                        <h3 class="fw-bold ls-tight text-center ">
                            Add new product
                        </h3>
                        <form action="<?=base_url('products/add_product_confirm') ?>" method="POST">
                                <div style="transform: rotate(0);"> 

                                    <div class="card-body pb-0">
                                        <div class="error text-center text-danger mb-3"><?=$this->session->flashdata('input_errors');?></div>

                                        <div class="mb-3 row">
                                            <label class="col-3 col-form-label">Name</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="name_product" value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-3 col-form-label">Image link</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="img_product" value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-3 col-form-label">Price</label>
                                            <div class="col-9">
                                                <input type="number" class="form-control" name="price" value="">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-3 col-form-label">Stock</label>
                                            <div class="col-9">
                                                <input type="number" class="form-control" name="count_stock" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- Submit button -->
                            <div class="text-end">
                                <input type="hidden" name="count_sold" value="0" />
                                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                                <input type="submit" class="btn btn-light btn-block mb-4" value="Cancel" formaction="<?=base_url('products') ?>">
                                <input type="submit" class="btn btn-light btn-block mb-4" value="Save">
                            </div>
                        </form>
                    </div>
                