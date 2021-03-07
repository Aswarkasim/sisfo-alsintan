<div class="row">
  <?php foreach ($alat as $row) { ?>
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <img src="<?= base_url($row->gambar); ?>" width="100%" alt="">
          <a href="<?= base_url('home/alat/detail/' . $row->id_alat); ?>">
            <h5><b><?= $row->nama_alat; ?></b></h5>
          </a>
        </div>
      </div>
    </div>
  <?php } ?>
</div>