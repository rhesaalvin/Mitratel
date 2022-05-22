<script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">

//Buku 3
$(function() { 
$("#brow").change(function() {
    if(this.value != ''){
        //Get Data
        $.ajax({
            url: "<?php echo base_url() ?>index.php/peminjaman/searchNumberKey",
            type: "POST",
            data: "Id="+this.value,
            cache: false,
            success: function(data){
                $("#no_kunci").val(data);
            }
        })
        $.ajax({
            url: "<?php echo base_url() ?>index.php/peminjaman/searchOperator",
            type: "POST",
            data: "Id="+this.value,
            cache: false,
            success: function(data){
                $("#nama_site").val(data);
            }
        })
    }

    if(this.value == ''){
        $('#no_kunci').val('');
        $('#nama_site').val('');
    }
})
})
</script>



<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-arrow-up"></i>  Peminjaman</h1>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Masukkan data peminjaman</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <!-- Notif -->
                    <?php $announce = $this->session->userdata('announce') ?>
                    <?php if(!empty($announce)): ?>
                    <?php if($announce == 'Berhasil menyimpan data'): ?>
                    <div class="alert alert-success fade in">
                        <?php echo $announce; ?>
                    </div>
                    <?php else: ?>
                    <div class="alert alert-danger">
                        <?php echo $announce; ?>
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>
                    <form method="post" action="<?php echo base_url(); ?>index.php/peminjaman/submit" role="form" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kode Transaksi</label>
                                        <input name="id_peminjaman" id="id_peminjaman" type="text" class="form-control" value="<?php echo $id_peminjaman ?>" readonly="readonly" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Peminjam</label>
                                        <input id="nama_peminjam" name="nama_peminjam" class="form-control" placeholder="Nama Lengkap Peminjam">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tanggal Peminjaman</label>
                                                <input name="tgl_pinjam" id="tgl_pinjam" class="form-control" value="<?php echo date('d-m-Y'); ?>" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Pukul</label>
                                                <input name="jam_pinjam" id="jam_pinjam" class="form-control" value="<?php echo date("H:i:s"); ?>" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nomor Telepon Peminjam</label>
                                                <input type="text" name="telp_peminjam" id="telp_peminjam" class="form-control" placeholder="Nomor HP Peminjam">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nomor Identitas (KTP/SIM)</label>
                                                <input name="no_identitas" id="no_identitas" class="form-control" placeholder="Nomor Identitas Peminjam">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Petugas</label>
                                        <input name="nama_ptgs" class="form-control" placeholder="Nama Petugas">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Instansi Peminjam</label>
                                        <input name="nama_ins" id="nama_ins" class="form-control" placeholder="Nama Instansi Peminjam">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Id Kunci</label>
                                        <input name="brow" id="brow" list="myList" class="form-control" placeholder="Site Id Kunci">
                                        <datalist id="myList" >
                                            <?php foreach ($kunci as $kuncidata): ?>
                                            <option><?php echo $kuncidata->Id?></option>
                                            <?php endforeach; ?>
                                        </datalist>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>No Kunci</label>
                                        <input type="text" name="no_kunci" id="no_kunci" class="form-control" placeholder="No Kunci" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nama Site</label>
                                        <input type="text" name="nama_site" id="nama_site" class="form-control" placeholder="Nama Site" readonly="readonly">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
    $("input").click(function(){
            $(this).next().show();
            $(this).next().hide();
        });

    });
</script>