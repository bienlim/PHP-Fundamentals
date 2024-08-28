
                <div class="card p-2 position-fixed" style="right:0 ; top:8rem ; width:23rem">
                    <div class="card-body py-3 px-5">
                        <h3 class="fw-bold ls-tight text-center my-2">
                            The best offer
                            starts here
                        </h3>
                            <figcaption class="blockquote-footer mt-1 text-end">
                                <cite title="Source Title">Register here</cite>
                            </figcaption>

                            <div class="error text-center text-danger mb-3"><?=$this->session->flashdata('input_errors');?></div>
                            
                        <form action="<?=base_url('users/process_signup')?>" method="POST">
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                    <input type="text" class="form-control" name="name_first"/>
                                    <label class="form-label" for="name_first">First name</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                    <input type="text" class="form-control" name="name_last"/>
                                    <label class="form-label" for="name_last">Last name</label>
                                    </div>
                                </div>
  

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                <input type="email" class="form-control" name="email"/>
                                <label class="form-label" for="email">Email address</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                <input type="password" class="form-control" name="password"/>
                                <label class="form-label" for="">Password</label>
                                </div>

                                <div class="form-outline mb-4">
                                <input type="password" class="form-control" name="password_confirm"/>
                                <label class="form-label" for="password_confirm">Confirm Password</label>
                                </div>

                                <!-- Submit button -->
                                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                                <input type="submit" class="btn btn-primary btn-block mb-4" value="Sign Up">
                            </div> 
                        </form>            
                    </div>
                </div>