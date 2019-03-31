<div id="wrapper">
    <?php $this->load->view('layout/nav') ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo lang('create_user_heading');?></h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div id="infoMessage"><?php echo $message;?></div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo lang('create_user_subheading');?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php echo form_open("/auth/create_user");?>
                                    <div class="form-group hidden">
                                        <input class="form-control" name="user_code" id="user_code" value="<?php  echo rand(11111,99999) ?>">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="First Name" name="fname" id="fname" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Last Name" name="lname" id="lname" required>
                                    </div>

                                    <?php
                                      if($identity_column!=='email') {
                                          echo '<p>';
                                          echo lang('create_user_identity_label', 'identity');
                                          echo '<br />';
                                          echo form_error('identity');
                                          echo form_input($identity);
                                          echo '</p>';
                                      }
                                      ?>

                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Address" name="addr" id="addr" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="telepon" name="tlp" id="tlp" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="User Name" name="uname" id="uname" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="email" name="email" id="email" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="password" name="password" id="password"  required>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="password confirm" name="password_confirm" id="password_confirm"  required>
                                    </div>

                                    <button type="submit" class="btn btn-outline btn-primary col-lg-5 pull-left"><?php echo lang('create_user_submit_btn');?></button>
                                    <a href="/auth" type="button" class="btn btn-outline btn-warning col-lg-5 pull-right">Cancel</a>
                                    <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

