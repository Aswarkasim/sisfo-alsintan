<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $title ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <?php
                echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i> ', '</div>');

                if (isset($error)) {
                    echo $error;
                }

                echo form_open_multipart($edit . $file->id_download);
                ?>


                <form action="" method="post">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Nama File</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" value="<?= $file->nama_download; ?>" name="nama_download" placeholder="Nama File" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">File</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" name="file" class="form-control"><br>
                                <a href="<?= base_url('admin/download/download/' . $file->id_download); ?>"><i class="fa fa-download"></i> Download</a>

                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-9">
                                <a href="<?= base_url($back) ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </div>
                    </div>

                </form>

                <?php echo form_close() ?>



            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>