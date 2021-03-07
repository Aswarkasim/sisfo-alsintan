<h4><strong>Download File</strong></h4>

<?php foreach ($download as $row) { ?>

  <div class="row">
    <div class="col-md-1">
      <i class="fa fa-folder fa-3x" style="color: orange;"></i>
    </div>
    <div class="col-md-10">
      <h5><strong><a href="<?= base_url('home/download/download/' . $row->id_download); ?>"><?= $row->nama_download; ?></a></strong></h5>
      <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p> -->
    </div>
  </div>
  <hr>
<?php } ?>