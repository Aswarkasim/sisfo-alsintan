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
                ?>

                <form action="<?= base_url($add) ?>" method="post">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Nama Kecamatan</label>
                            </div>
                            <div class="col-md-9">
                                <select name="id_kecamatan" required class="form-control select2" id="">
                                    <option value="">---- Kecamatan ----</option>
                                    <?php foreach ($kecamatan as $row) { ?>
                                        <option value="<?= $row->id_kecamatan; ?>"><?= $row->nama_kecamatan; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Tahun</label>
                            </div>
                            <div class="col-md-9">
                                <select name="tahun" class="form-control select2">
                                    <option value="none">--Tahun--</option>
                                    <?php for ($i = 2017; $i <= 2024; $i++) { ?>
                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Luas Sawah</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" placeholder="Luas Sawah(ha)" class="form-control" name="luas_sawah">
                                <small>*Gunakan titik(.) sebagai koma</small>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Traktor Tersedia</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" placeholder="Traktor Tersedia" class="form-control" name="tersedia">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Asumsi Penggunaan Traktor (dalam %)</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="asumsi_penggunaan" class="form-control" placeholder="Dalam persen(%)">
                                <small>*Gunakan titik(.) sebagai koma</small>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-9">
                                <a href="<?= base_url($back) ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                    </div>

                </form>



            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>