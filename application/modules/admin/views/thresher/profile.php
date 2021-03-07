<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Manajemen Data Thresher</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">

    <h4><strong><?= $alat->nama_alat; ?></strong></h4>

    <center>
      <img src="<?= base_url($alat->gambar); ?>" width="200px" alt="">
    </center>
    <br>
    <p><?= $alat->deskripsi; ?></p>

  </div>
  <!-- /.box-body -->
</div>