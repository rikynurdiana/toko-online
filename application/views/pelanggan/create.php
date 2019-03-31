<div id="wrapper">
    <?php $this->load->view('layout/nav') ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Jual Barang</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Masukan barang yang mau di jual
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
                                    <?php echo form_open_multipart('pelanggan/tambahBarang');?>
                                    <div class="form-group">
                                        <label for="ori_image">Masukan gambar yang akan dijual</label>
                                        <input type="file" class="form-control" name="ori_image">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang">
                                    </div>

                                    <div class="form-group">
                                        <input type="number" class="form-control" name="harga_barang" placeholder="Harga Barang">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="kategori" placeholder="Kategori Barang">
                                    </div>

                                    <div class="form-group">
                                        <input type="number" class="form-control" name="stock_awal" placeholder="Stock Barang">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="kondisi" placeholder="Kondisi Barang">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="berat" placeholder="Berat Barang">
                                    </div>

                                    <div class="form-group">
                                        <input type="number" class="form-control" name="min_pemesanan" placeholder="Minimal Pemesanan Barang">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="spesifikasi" placeholder="Spesifikasi Barang">
                                    </div>

                                    <div class="form-group">
                                        <label>Metode Pembayaran</label>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="dompet" name="payment_method">Dompet
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="transver" name="payment_method">Transver Bank
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="cod" name="payment_method">COD
                                            </label>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-outline btn-primary col-lg-5 pull-left">Submit</button>
                                    <a href="/pelanggan" type="button" class="btn btn-outline btn-warning col-lg-5 pull-right">Cancel</a>
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

