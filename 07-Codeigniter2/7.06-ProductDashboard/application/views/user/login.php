          <!--   <div class="col-4 p-2 position-absolute" style="right:0 ; top:3"> -->



            <div class="card p-2 position-fixed" style="right:0 ; top:8rem ; width:23rem">
                    <div class="card-body py-3 px-5">
                        <h3 class="fw-bold ls-tight text-center ">
                            Seize the day
                        </h3>
                            <figcaption class="blockquote-footer mt-1 text-end">
                            <cite title="Source Title">Login here</cite>
                            </figcaption>
                            <div class="error text-center text-danger mb-3"><?=$this->session->flashdata('input_errors');?></div>

                        <form action="<?=base_url('users/process_login')?>" method="POST">

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" class="form-control" name="email"/>
                                <label class="form-label" for="email">Email address</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" class="form-control" name="password"/>
                                <label class="form-label" for="password">Password</label>
                            </div>
                            <!-- Submit button -->
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                            <input type="submit" class="btn btn-primary btn-block mb-4" value="Login">
                        </form>
                    </div>
                </div>
        <!-- </div> -->