<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-book"></i>  Operator</h1>
        </div>
    </div>
    <a href="<?php echo base_url() ?>index.php/operator/add" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah operator</a>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Data Operator</h2>
                    <div class="clearfix"></div>
                </div>
                <?php $announce = $this->session->userdata('announce') ?>
                <?php if(!empty($announce)): ?>
                    <?php if($announce == 'Berhasil menyimpan data'): ?>
                    <div class="alert alert-success fade in"><?php echo $announce; ?></div>
                    <?php else: ?>
                    <div class="alert alert-danger fade in"><?php echo $announce; ?></div>
                    <?php endif; ?>
                <?php endif; ?>
                <div class="x_content">
                    <div class="row">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Operator</th>
                                    <th>Nama Operator</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if($this->db->count_all('tb_operator') == 0){
                                        echo '
                                        <tr>
                                            <td colspan="6">
                                                <div class="alert alert-danger">
                                                    Tidak ada data
                                                </div>
                                            </td>
                                        </tr>
                                        ';
                                    }else{
                                        $no = 1;
                                        foreach ($list as $listOperator) {
                                ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $listOperator->id_operator ?></td>
                                    <td><a href="<?php echo base_url() ?>operator/detail?idtf=<?php echo $listOperator->id_operator ?>"><?php echo $listOperator->nama_operator ?></a></td>
                                    <td>
                                        <a href="<?php echo base_url() ?>index.php/operator/edit?idtf=<?php echo $listOperator->id_operator ?>" class="btn btn-info btn-xs">
                                            <i class="fa fa-edit"> Edit</i>
                                        </a>
                                        </a>
                                        <a onclick="sweets(<?php echo $listOperator->id_operator ?>)" class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash"> Delete</i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                            $no++;
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function sweets(id_operator) {
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
            window.location.href = "<?php echo base_url() ?>index.php/operator/delete/"+id_operator;
        });
}
</script>