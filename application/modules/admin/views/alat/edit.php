<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-cogs"></i> <?= $title ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <?php
                echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i> ', '</div>');

                echo form_open_multipart('admin/alat/edit/' . $this->uri->segment('4'))
                ?>

                <form action="" method="post">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-1">
                                <label for="" class="pull-right">Nama Alat</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama_alat" value="<?= $alat->nama_alat; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-1">
                                <label for="" class="pull-right">Gambar</label>
                            </div>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="gambar">
                                <br>
                                <img src="<?= base_url($alat->gambar); ?>" width="150px" alt="">
                            </div>
                        </div>
                    </div>

                    <div class=" form-group">
                        <div class="row">
                            <div class="col-md-1">
                                <label for="" class="pull-right">Bantuan</label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="deskripsi" class="form-control" id="editor1"><?= $alat->deskripsi ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>

                </form>
                <?= form_close(); ?>


            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>


<script src="<?= base_url('assets/admin/') ?>bower_components/ckeditor/ckeditor.js"></script>
<script>
    $(function() {
        CKEDITOR.replace('editor1');

    })
</script>