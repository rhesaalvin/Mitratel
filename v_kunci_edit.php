<!-- EDIT DATA KUNCI -->

<div class="modal fade" id="edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Kunci</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/kunci/simpan_kunci')?>" method="post">
             No Kunci
             <input type="text" name="no_kunci" class="form-control"><br>
             Nama Site
             <input type="text" name="nama_site" class="form-control"><br>
             Operator
             <input type="text" name="operator" class="form-control"><br>
             <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-key"></i>  Edit Kunci</h1>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Ubah data kunci</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <form method="post" action="<?php echo base_url() ?>index.php/kunci/submit_edit" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID Kunci
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="Id" value="<?php echo $detail->Id?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No kunci
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" name="no_kunci" value="<?php echo $detail->no_kunci?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Site
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="nama_site" value="<?php echo $detail->nama_site?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Operator
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <select  name= "id_operator" class="form-control" value="<?php echo $detail->nama_site?>">
                                    <?php foreach ($data_operator as $item) { ?>
                                    <option value="<?= $item->id_operator ?>"
                                        <?php if ($detail->id_operator == $item->id_operator){
                                            echo "selected";
                                        } ?>
                                        ><?php echo $item->nama_operator ?>
                                    </option>
                                    <?php } ?>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                   <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/kunci">Kembali</a>
                                   <button class="btn btn-primary" type="reset">Reset</button>
                                   <input type="submit" class="btn btn-success" name="submit" value="Simpan">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
