<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="col-md-7">

  <div class="box">


    <!-- /.box-header -->
    <div class="box-body">

      <a href="<?= base_url('admin/alat/edit/' . $this->uri->segment('4')); ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>

      <h4><strong><?= $alat->nama_alat; ?></strong></h4>

      <center>
        <img src="<?= base_url($alat->gambar); ?>" width="200px" alt="">
      </center>
      <br>
      <p><?= $alat->deskripsi; ?></p>

    </div>
    <!-- /.box-body -->
  </div>
</div>