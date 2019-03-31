<div id="wrapper">
    <?php $this->load->view('layout/nav') ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">TOKO ONLINE</h1>
                </div>
            </div>

            <div class="row">
                <?php foreach ($barang->result() as $data):?>
                <div class="col-sm-3 col-sm-9">
                    <div class="thumbnail">
                        <img src="/<?php echo $data->thumb_image; ?>">
                        <div class="caption">
                            <h4><center><?php echo $data->nama_barang; ?></center></h4>
                            <hr>
                            <a type="button" class="btn btn-outline btn-primary btn-xs pull-left" href="<?php echo base_url('pelanggan/detail/').'/'.$data->id; ?>">BELI</a>
                            <div class="pull-right">
                                <div class="text-danger"><strong> Rp.<?php echo number_format($data->harga_barang); ?> </strong></div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>

