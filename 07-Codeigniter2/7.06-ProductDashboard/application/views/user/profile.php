
            <div class="p-3 col-4 mt-4">
                <h3> Hello <?=$user['name_first']?>!</h3>
                <p class="blockquote mb-3"> 
                    These are the current information we have on you. tbh its not much so youre account is safe here. In situations that you need to change your information, feel free to edit them.
                </p>

                <h4> First Name: <?=$user['name_first']?> </h4>
                <h4> Last Name: <?=$user['name_last']?> </h4>
                <h4> Email: <?=$user['email']?> </h4><br>
                <figcaption class="blockquote-footer mt-3"> 
                    For security purposes, we also recommend you change your password monthly!
                </figcaption>
            </div>
            <div class="p-3 col-4 mt-4">
                <form action="<?=base_url('users/update')?>" method="post">
                    <h2 class="text-center">Edit Information</h2>

                    <div class="error text-center text-danger mb-3"><?=$this->session->flashdata('input_errors_edit');?></div>

                    <div class="form-floating mb-3">
                        <input type="text" name="name_first" class="form-control" value="<?=$user['name_first']?>">
                        <label>First Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="name_last" class="form-control" value="<?=$user['name_last']?>">
                        <label for="floatingInput">Last Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="email" class="form-control" value="<?=$user['email']?>">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingInput">
                        <label for="floatingInput">Enter you password to save edit</label>
                    </div>
                    <div class="d-flex justify-content-end">
                        <input type="hidden" name="id_user" value="<?=$user['id_user']?>">
                        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />

                        <input type="submit" class="btn btn-light me-3" value="Save">
                    </div>
                </form>
            </div>
            <div class="p-3 col-4 mt-4">
                <form action="<?=base_url('users/reset')?>" method="post">
                    <h2 class="text-center">Change Password</h2>
                    <div class="error text-center text-danger mb-3"><?=$this->session->flashdata('input_errors_reset');?></div>

                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control">
                        <label for="floatingInput">Old Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password_new" class="form-control">
                        <label for="floatingInput">New Password</label>
                    </div>         
                    <div class="form-floating mb-3">
                        <input type="password" name="password_new_confirm" class="form-control">
                        <label for="floatingInput">Confirm New Password</label>
                    </div>         
                    <div class="d-flex justify-content-end">
                        <input type="hidden" name="id_user" value="<?=$user['id_user']?>">
                        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />

                        <input type="submit" class="btn btn-light me-3" value="Save">
                        
                    </div>
                </form>
            </div>
