<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

  <style>
    #mapid {
      height: 400px;
    }
  </style>
</head>

<body>
  <h3><strong>Data Pada Tahun</strong></h3>
  <form action="<?= base_url('home/gis'); ?>" method="POST">
    <div class="row">
      <div class="col-md-3">
        <select name="alsintan" class="form-control" id="">
          <option value="">--Alsintan--</option>
          <option <?= $alsintan == 'traktor' ? 'selected' : ''; ?> value="traktor">Traktor</option>
          <option <?= $alsintan == 'thresher' ? 'selected' : ''; ?> value="thresher">Thresher</option>
        </select>
      </div>
      <div class="col-md-3">
        <select name="tahun" class="form-control" id="">
          <?php for ($i = 2017; $i <= 2024; $i++) { ?>
            <option value="<?= $i; ?>" <?= ($i == $tahun) ? 'selected' : ''; ?>><?= $i; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="col-md-3">
        <button class="btn btn-primary">Tampilkan</button>
      </div>
    </div>
  </form>
  <div class="row">
    <div class="col-md-11">
      <div class="mt-1" id="mapid"></div>
    </div>
    <div class="col-md-1">

    </div>
  </div>

</body>
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

<script src="<?= base_url(); ?>assets/js/leaflet.ajax.js"></script>

<script type="text/javascript">
  var lat = -5.31354
  var long = 119.5558472

  var mymap = L.map('mapid').setView([lat, long], 10);

  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
  }).addTo(mymap);

  var myStyle = {
    "color": "#ff7800",
    "weight": 5,
    "opacity": 0.65
  };
  /*

  Hijau : #1aa51e
  MMerah : #e50d01
  Kuning : #efc700
  */

  <?php foreach ($kecamatan as $row) {
    $warna = "#ff7800";

    $opacity = 1;

    if ($alsintan == 'thresher') {
      $status = $row->status_thresher;
      $selisih = $row->selisih_thresher;
    } else {
      $status = $row->status_traktor;
      $selisih = $row->selisih_traktor;
    }

    switch ($status) {
      case 'Kurang':
        $warna = "#e50d01";
        if ($selisih <= -1 && $selisih >= -10) {
          $opacity = 0.3;
        } else if ($selisih <= -11 && $selisih >= -20) {
          $opacity = 0.6;
        } else if ($selisih <= -21) {
          $opacity = 1;
        }
        break;
      case 'Cukup':
        $warna = "#0438c8";
        break;
      case 'Lebih':
        $warna = "#1aa51e";
        break;
      default:
        $warna = "#ff7800";
        break;
    }


  ?>
    var jsonTest = new L.GeoJSON.AJAX(["<?= base_url($row->geojson); ?>"], {
      // onEachFeature: popUp,
      onEachFeature: function(f, l) {
        var out = [];
        out.push("Kecamatan : " + "<?= $row->nama_kecamatan; ?>")
        out.push("Luas Sawah : " + "<?= $row->luas_sawah . ' Ha'; ?>")
        out.push("")
        out.push("Traktor Tersedia: " + "<?= $row->tersedia_traktor . ' Unit'; ?>")
        out.push("Kebutuhan Traktor : " + "<?= $row->kebutuhan_traktor . ' Unit'; ?>")
        out.push("Selisih Traktor : " + "<?= $row->selisih_traktor . ' Unit'; ?>")
        out.push("")
        out.push("Traktor Tersedia: " + "<?= $row->tersedia_thresher . ' Unit'; ?>")
        out.push("Kebutuhan Thresher : " + "<?= $row->kebutuhan_thresher . ' Unit'; ?>")
        out.push("Selisih Thresher : " + "<?= $row->selisih_thresher . ' Unit'; ?>")
        l.bindPopup(out.join("<br />"));
      },
      style: {
        "strokeColor": "#000",
        "fillColor": "<?= $warna; ?>",
        "weight": 5,
        "fillOpacity": <?= $opacity; ?>
      },

    }).addTo(mymap);
  <?php } ?>
</script>

</html>