 <?php
  $uri = $this->uri->segment('2');
  ?>

 <div class="col-md-3">
   <div class="list-group">
     <a href="<?= base_url('home/home'); ?>" class="list-group-item list-group-item-action <?= $uri == 'home' ? "active" : "" ?>">Menu Utama</a>
     <a href="<?= base_url('home/alat'); ?>" class="list-group-item list-group-item-action <?= $uri == 'alsintan' ? "active" : "" ?>">Profil Alsintan</a>
     <a href=" <?= base_url('home/kontak'); ?>" class="list-group-item list-group-item-action <?= $uri == 'kontak' ? "active" : "" ?>">Kontak</a>
     <!-- <a href=" <?= base_url('home/pencarian'); ?>" class="list-group-item list-group-item-action <?= $uri == 'pencarian' ? "active" : "" ?>">Pencarian</a> -->
   </div>
 </div>

 <div class=" col-md-9">