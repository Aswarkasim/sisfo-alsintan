<h2><strong><i class="fa fa-star" style="color: orange;"></i> SELAMAT DATANG</strong></h2>
<?php foreach ($berita as $row) { ?>
  <center>
    <h3><strong>
        <br> <?= $row->judul_berita; ?>
      </strong></h3>
  </center>
  <p><?= $row->isi; ?></p>
<?php } ?>