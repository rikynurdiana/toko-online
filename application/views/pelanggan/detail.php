<div id="wrapper">
    <?php $this->load->view('layout/nav') ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $data->nama_barang; ?></h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9">
                    <div class="col-sm-7">
                        <div class="thumbnail">
                            <img src="/<?php echo $data->ori_image; ?>" />
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <strong><h1> Rp.<?php echo number_format($data->harga_barang); ?> </h1></strong><br>
                        <small>Stok Barang ada <?php echo $data->stock_awal; ?> lagi!</small><br>
                        <div class="input-group col-sm-6">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[2]">
                                <span class="glyphicon glyphicon-minus"></span>
                                </button>
                            </span>
                            <input type="text" name="quant[2]" class="form-control input-number" value="1" min="1" max="100">
                            <span class="input-group-btn">
                            <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                            </span>
                        </div>
                        <br>Metode Pembayaran : <?php echo  $data->payment_method; ?><hr><br>
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-outline btn-success btn-lg btn-block">Beli</button><br>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-outline btn-primary btn-lg btn-block pull-left">Message</button><br>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-outline btn-danger btn-lg btn-block pull-right">Laporkan</button><br>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <img src="/<?php echo $query->image; ?>" width="150px" class="thumbnail"/>
                    <p><h4><strong><i class="fa fa-shopping-cart"> <a href="<?php echo base_url('pelanggan/profile/').'/'.$result->id; ?>">Toko <?php echo  $query->uname; ?></a></i></strong></h4></p>
                    <p><i class="fa fa-map-marker"> <?php echo  $query->addr; ?></i></p>
                    <p><i class="fa fa-user"> Terdaftar dari <?php echo  date('d M Y',$query->created_on); ?></i></p>
                    <?php if ($query->last_login == ''): ?>
                        <p><i class="fa fa-clock-o"> Tidak ada Aktifitas Terakhir</i></p>
                    <?php else: ?>
                        <p><i class="fa fa-clock-o">  Aktivitas terakhir pada <?php echo  date('d M Y',$query->created_on); ?></i></p>
                    <?php endif ?>
                    <p><i class="fa fa-envelope-o"> <?php echo  $query->email; ?></i></p>
                    <?php if ($query->active == 1): ?>
                        <p><i class="fa fa-list-alt"> Member Aktif </i></p>
                    <?php else: ?>
                        <p><i class="fa fa-list-alt"> Member Tidak Aktif</i></p>
                    <?php endif ?>
                </div>
            </div>
            <br>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab" aria-expanded="true">Detail Barang</a>
                            </li>
                            <li class=""><a href="#messages" data-toggle="tab" aria-expanded="false">Feedback</a>
                            </li>
                            <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Barang lain nya</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="home"><br>
                            <h4><p><strong>Spesifikasi Barang</strong></p></h4>
                            <p><?php echo $data->spesifikasi?></p>
                            <h4><p><strong>Kondisi</strong></p></h4>
                            <p><?php echo $data->kondisi?></p>
                            <h4><p><strong>Berat</strong></p></h4>
                            <p><?php echo $data->berat?></p>
                            <h4><p><strong>kategori</strong></p></h4>
                            <p><?php echo $data->kategori?></p>
                            <h4><p><strong>minimal pemesanan</strong></p></h4>
                            <p><?php echo $data->min_pemesanan?></p>
                            </div>
                            <div class="tab-pane fade" id="messages">
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
                            <div class="tab-pane fade" id="settings">
                                <h4>Barang Sejenis</h4>
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
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<script type="text/javascript">
//plugin bootstrap minus and plus
//http://jsfiddle.net/laelitenetwork/puJ6G/
$('.btn-number').click(function(e){
    e.preventDefault();

    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {

            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            }
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {

    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());

    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }


});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>

