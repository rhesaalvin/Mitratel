<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title ?> | Perpustakaan</title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href=".<?php echo base_url(); ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url(); ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url(); ?>assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Sweet Alert -->
    <script src="<?php echo base_url(); ?>assets/vendors/swal/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/swal/sweetalert.css">
    <!-- Select 2 -->
    <script src="<?php echo base_url(); ?>assets/vendors/select2/select2.min.js"></script>
    <style>
        body{
            background-color: white;
        }
    </style>
</head>

<body>
<br><br>
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_title">
    <h2>Laporan Data Peminjaman</h2>
    <div class="clearfix"></div>
</div>
<div class="x_content">
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
                <th>Tanggal Kembali</th>
                <th>Status</th>
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
                <td><?php echo $dt->tgl_pinjam. ' '. $dt->jam_pinjam ?></td>
                <td><?php echo $dt->tgl_kembali?></td>
                <td><?php echo $dt->status?></td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>
        </tbody>
        </table>
    <?php endif; ?>
    </div>
</div>

</body>
<script>
		window.print();
</script>