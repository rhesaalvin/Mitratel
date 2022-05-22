<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-area-chart"></i>  Transaksi</h1>
        </div>
    </div>
    <a href="<?=base_url()?>index.php/printpdf" target="_blank" class="btn btn-primary pull-right"><i class="fa fa-print"></i> Print Document</a>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Data Transaksi</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <!-- Notif -->
                <?php $announce = $this->session->userdata('announce') ?>
                <?php if(!empty($announce)): ?>
                    <?php if($announce == 'Berhasil menyimpan data'): ?>
                    <div class="alert alert-success fade in"><?php echo $announce; ?></div>
                    <?php else: ?>
                    <div class="alert alert-danger fade in"><?php echo $announce; ?></div>
                    <?php endif; ?>
                <?php endif; ?>
                <!-- Data -->
                <?php if($total == 0): ?>
                    <div class="alert alert-danger">Tidak ada data</div>
                    <?php else: ?>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Peminjaman</th>
                                <th>Kunci</th>
                                <th>Nama Peminjam</th>
                                <th>Telp. Peminjam</th>
                                <th>Instansi</th>
                                <th>Operator</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1;?>
                        <?php foreach ($datas as $dt):?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $dt->id_peminjaman ?></td>
                                <td><?php echo $dt->Id.' - '.$dt->nama_site?></td>
                                <td><?php echo $dt->nama_peminjam?></td>
                                <td><?php echo $dt->telp_peminjam?></td>
                                <td><?php echo $dt->nama_ins?></td>
                                <td><?php echo $dt->nama_operator?></td>
                                <td><?php echo $dt->tgl_pinjam. ' '. $dt->jam_pinjam ?></td>
                                <td><?php echo $dt->tgl_kembali?></td>
                                <td><?php echo $dt->status?></td>
                                <td><a onclick="sweets('<?php echo $dt->id_peminjaman ?>')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"> Delete</i> </a>
                                </td>
                                <!-- <td><button onclick="sweets(<?php $dt->id_peminjaman ?>)">delete</button> </td> -->
                                
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script> -->
<script>
function sweets(id_peminjaman) {
    swal({
            title: "Apakah anda yakin ingin menghapus data ?",
            text: "Data tidak bisa di kembalikan",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Delete",
            closeOnConfirm: false
        },
        function() {
            window.location.href = "<?php echo base_url() ?>index.php/transaksi/delete/"+id_peminjaman;
        });
}
</script>