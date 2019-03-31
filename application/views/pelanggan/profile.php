<div id="wrapper">
    <?php $this->load->view('layout/nav') ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Profile User</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>| <i class="fa fa-shopping-cart"> Toko <?php echo  $data->uname; ?> </i> | <i class="fa fa-map-marker"> <?php echo  $data->addr; ?></i> | <i class="fa fa-phone"> <?php echo  $data->tlp; ?></i> | </h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <div class="thumbnail">
                                        <center><img src="/<?php echo  $data->image; ?>"></center>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="col-sm-5">
                                        <p><i class="fa fa-envelope-o"> <?php echo  $data->email; ?></i></p>
                                        <p><i class="fa fa-user"> Terdaftar dari <?php echo  date('d M Y',$data->created_on); ?></i></p>
                                            <?php if ($data->last_login == ''): ?>
                                                <p><i class="fa fa-clock-o"> Tidak ada Aktifitas Terakhir</i></p>
                                            <?php else: ?>
                                                <p><i class="fa fa-clock-o">  Aktivitas terakhir pada <?php echo  date('d M Y',$data->created_on); ?></i></p>
                                            <?php endif ?>
                                            <?php if ($data->active == 1): ?>
                                                <p><i class="fa fa-list-alt"> Member Aktif </i></p>
                                            <?php else: ?>
                                                <p><i class="fa fa-list-alt"> Member Tidak Aktif</i></p>
                                            <?php endif ?>
                                        <br><button type="button" class="btn btn-outline btn-primary btn-lg btn-block">Kirim Pesan</button><br>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#home" data-toggle="tab" aria-expanded="true">Produk</a>
                                                </li>
                                                <li class=""><a href="#profile" data-toggle="tab" aria-expanded="false">Review</a>
                                                </li>
                                                <li class=""><a href="#messages" data-toggle="tab" aria-expanded="false">Messages</a>
                                                </li>
                                                <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Informasi Toko</a>
                                                </li>
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane fade active in" id="home">
                                                    <h4>Produk Yang Dijual</h4>
                                                    <?php foreach ($lainnya as $data):?>
                                                    <div class="col-sm-3 col-sm-9">
                                                      <div class="thumbnail">
                                                            <img src="/<?php echo $data->thumb_image; ?>" />
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
                                                <div class="tab-pane fade" id="profile">
                                                    <h4>Review Dari Pembeli</h4>
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading">
                                                            Nama User
                                                        </div>
                                                        <div class="panel-body">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                                                        </div>
                                                        <div class="panel-footer">
                                                            <!-- <input id="rating-system" type="number" class="rating" min="1" max="5" step="1"> -->
                                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading">
                                                            Nama User
                                                        </div>
                                                        <div class="panel-body">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                                                        </div>
                                                        <div class="panel-footer">
                                                            <!-- <input id="rating-system" type="number" class="rating" min="1" max="5" step="1"> -->
                                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading">
                                                            Nama User
                                                        </div>
                                                        <div class="panel-body">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                                                        </div>
                                                        <div class="panel-footer">
                                                            <!-- <input id="rating-system" type="number" class="rating" min="1" max="5" step="1"> -->
                                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="messages">
                                                    <h4>Pesan Dari Pelanggan</h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                </div>
                                                <div class="tab-pane fade" id="settings">
                                                    <h4>Informasi Lengkap Toko</h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.panel-body -->
                                    </div>
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

