 <?php
  $uri = $this->uri->segment('2');

  $general = $this->Crud_model->listingOne('tbl_general', 'type', 'sambutan');
  ?>

 <style>
   .bg-header {
     background-image: url("<?= base_url('assets/uploads/images/bg_header.jpg'); ?>");
     width: 100%;
     height: 200px;
     background-size: cover;
   }

   .text-judul {
     padding-top: 100px;
     padding-bottom: 10050px;
   }
 </style>

 <div class="bg-header">
   <div class="container">
     <h3 class="text-white text-judul">
       <strong>SELAMAT DATANG <br>
         <?= $general->judul; ?>
       </strong>
     </h3>
   </div>
 </div>

 <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
   <div class="container">
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>

     <div class="collapse navbar-collapse" id="navbarColor01">
       <ul class="navbar-nav mr-auto">
         <li class="nav-item <?= $uri == 'home' ? "active" : "" ?>">
           <a class=" nav-link" href="<?= base_url('home/home'); ?>">Halaman Utama
           </a>
         </li>
         <li class="nav-item <?= $uri == 'gis' ? "active" : "" ?>">
           <a class=" nav-link" href="<?= base_url('home/gis'); ?>">Web GIS</a>
         </li>
         <li class="nav-item <?= $uri == 'bantuan' ? "active" : "" ?>">
           <a class=" nav-link" href="<?= base_url('home/bantuan'); ?>">Bantuan</a>
         </li>
         <li class="nav-item <?= $uri == 'download' ? "active" : "" ?>">
           <a class=" nav-link" href="<?= base_url('home/download'); ?>">Download</a>
         </li>
       </ul>
     </div>
   </div>
 </nav>

 <main role="main" style="margin-top: 50px;">
   <div class="container">
     <div class="row">