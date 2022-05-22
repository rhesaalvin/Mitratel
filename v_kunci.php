<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-key"></i>  List kunci</h1>
        </div>
    </div>
    <a href="<?php echo base_url() ?>index.php/kunci/add" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah kunci</a>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Data Kunci</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <!-- Notif -->
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>No Kunci</th>
                                <th>Nama Site</th>
                                <th>Operator</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data_kunci as $kunciList):?>
                            <tr>
                                <td><?php echo $kunciList->Id ?></td>
                                <td><?php echo $kunciList->no_kunci ?></td>
                                <td><?php echo $kunciList->nama_site ?></td>
                                <td><?php echo $kunciList->nama_operator ?></td>
                                <td><?php echo $kunciList->stts ?></td>
                                <td>
                                    <a href="<?php echo base_url() ?>index.php/kunci/edit?idtf=<?php echo $kunciList->Id ?>" class="btn btn-info btn-xs">
                                        <i class="fa fa-edit"> Edit</i>
                                    </a>
                                    <button class="btn btn-danger btn-xs" onclick="sweets('<?php echo $kunciList->Id ?>')">
                                        <i class="fa fa-trash"> Delete</i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        


<script>
function sweets(Id) {
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
            window.location.href = "<?php echo base_url() ?>index.php/kunci/delete/"+Id;
        });
}
</script>


