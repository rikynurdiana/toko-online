<div id="wrapper">
    <?php $this->load->view('layout/nav') ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">CRUD Management</h1>
                </div>
            </div>
        </div>

        <a type="button" class="btn btn-outline btn-primary" href="/gallery/add">Add New Image</a><br><br>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    List of all data images
                    </div>
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>caption</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th width="150px"><center>Action</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($images->result() as $img):?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $img->caption; ?></td>
                                        <td><?php echo $img->description; ?></td>
                                        <td>
                                            <div>
                                                <img src="<?= base_url($img->file) ?>" height="100px" width="100px">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="pull-left">
                                                <?=anchor('gallery/edit/'.$img->id,'Edit',['class'=>'btn btn-outline btn-warning', 'role'=>'button'])?>
                                            </div>
                                            <div class="pull-right">
                                                <?=anchor('gallery/delete/'.$img->id,'Delete',['class'=>'btn btn-outline btn-danger', 'role'=>'button','onclick'=>'return confirm(\'Are you sure?\')'])?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>

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
<script src="<?php echo base_url('assets/bower_components/datatables/media/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js'); ?>"></script>
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
            responsive: true
    });
});
</script>
