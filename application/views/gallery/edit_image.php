<div id="wrapper">
    <?php $this->load->view('layout/nav'); ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Image</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Edit Image
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
                                    <?php echo form_open_multipart('gallery/edit/'.$image->id);?>
                                    <div class="form-group">
                                        <label for="userfile">Image File</label>
                                        <div class="row" style="margin-bottom:5px"><div class="col-xs-12 col-sm-6 col-md-3"><?=img(['src'=>$image->file,'width'=>'100%'])?></div></div>
                                        <input type="file" class="form-control" name="userfile">
                                    </div>

                                    <div class="form-group">
                                        <label for="caption">Caption</label>
                                        <input type="text" class="form-control" name="caption" value="<?php echo $image->caption; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description"><?php echo $image->description; ?></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-outline btn-primary col-lg-5 pull-left">Update</button>
                                    <a href="/gallery" type="button" class="btn btn-outline btn-warning col-lg-5 pull-right">Cancel</a>
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
