<div id="wrapper">
    <?php $this->load->view('layout/nav'); ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add New Image</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Add New Images
                        </div>
                        <div class="panel-body">
                            <?php if(validation_errors() || isset($error)) : ?>
                                <div class="alert alert-danger" role="alert" align="center">
                                    <?=validation_errors()?>
                                    <?=(isset($error)?$error:'')?>
                                </div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php echo form_open_multipart('gallery/add');?>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="caption" placeholder="Caption">
                                    </div>

                                    <div class="form-group">
                                        <textarea class="form-control" name="description" placeholder="Description of image"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="userfile">Choose Image File</label>
                                        <input type="file" class="form-control" name="userfile">
                                    </div>

                                    <button type="submit" class="btn btn-outline btn-primary col-lg-5 pull-left">Submit</button>
                                    <a href="/gallery" type="button" class="btn btn-outline btn-warning col-lg-5 pull-right">Cancel</a>
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
