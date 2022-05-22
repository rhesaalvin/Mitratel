<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-arrow-down"></i>  Pengembalian</h1>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Data Pengembalian</h2>
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
                                <th>Tanggal Pinjam</th>
                                <th>No. Identitas</th>
                                <th>Instansi</th>
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
                                <td><?php echo $dt->Id?></td>
                                <td><?php echo $dt->nama_peminjam?></td>
                                <td><?php echo $dt->telp_peminjam?></td>
                                <td><?php echo $dt->tgl_pinjam?></td>
                                <td><?php echo $dt->no_identitas?></td>
                                <td><?php echo $dt->nama_ins?></td>
                                <td><?php echo $dt->status?></td>
                                <td>
                                    <?php if($dt->status == 'Sudah Kembali'): ?>
                                    <a href="<?=base_url('index.php/pengembalian/deletePeminjaman/'.$dt->id_peminjaman)?>" class="btn btn-danger" data-toggle="modal" onclick="return confirm(\'Anda yakin megahpus data ini?\')">Delete</a></td>
                                    <?php else: ?>
                                    <a class="btn btn-success" href="<?=base_url('index.php/pengembalian/kembali/'.$dt->id_peminjaman.'/'.$dt->Id)?>" id="kembali" name="kembali">Kembali</a>
                                    <?php endif; ?>
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

<script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>