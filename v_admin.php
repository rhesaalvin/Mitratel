<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-users"></i>  Admin</h1>
        </div>
    </div>
        <a href="<?php echo base_url() ?>index.php/admin/add" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Admin</a>'
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Data Admin</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <?php $announce = $this->session->userdata('announce') ?>
                <?php if(!empty($announce)): ?>
                    <?php if($announce == 'Berhasil menyimpan data'): ?>
                    <div class="alert alert-success fade in"><?php echo $announce; ?></div>
                    <?php else: ?>
                    <div class="alert alert-danger fade in"><?php echo $announce; ?></div>
                    <?php endif; ?>
                <?php endif; ?>
                    <div class="row">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Admin</th>
                                    <th>Fullname</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Email</th>
                                    <th>No_HP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if($this->db->count_all('tb_admin') == 0){
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
                                        foreach ($list as $listAdmin) {
                                            ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td id="id_admin" name="id_admin" ><?php echo $listAdmin->id_admin ?></td>
                                    <td><a href="<?php echo base_url() ?>admin/detail?idtf=<?php echo $listAdmin->id_admin ?>"><?php echo $listAdmin->fullname ?></a></td>
                                    <td><?php echo $listAdmin->username ?></td>
                                    <td><?php echo $listAdmin->password ?></td>
                                    <td><?php echo $listAdmin->email ?></td>
                                    <td><?php echo $listAdmin->no_telp ?></td>
                                    <td>
                                        <a href="<?php echo base_url() ?>index.php/admin/edit?idtf=<?php echo $listAdmin->id_admin ?>" class="btn btn-success btn-xs">
                                            <i class="fa fa-edit"> Edit</i>
                                        </a>
                                            <a onclick="sweets(<?php echo $listAdmin->id_admin ?>)" class="btn btn-danger btn-xs">
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
function sweets(id_admin) {
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
            window.location.href = "<?php echo base_url() ?>index.php/admin/delete/"+id_admin;
        });
}
</script>

