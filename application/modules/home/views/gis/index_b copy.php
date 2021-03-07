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
  <div id="mapid"></div>
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


  <?php foreach ($kecamatan as $row) { ?>

    function popUp(f, l) {
      var out = [];
      if (f.properties) {
        // out.push("Kecamatan : " + f.properties['KECAMATAN'])
        out.push("Kecamatan : " + "<?= $row->nama_kecamatan; ?>")
        l.bindPopup(out.join("<br />"));
      }
    }
    // var jsonTest = new L.GeoJSON.AJAX(["<?= base_url(); ?>assets/geojson/gowa.geojson", "assets/geojson/patallassang.geojson"], {
    //   onEachFeature: popUp,
    //   style: myStyle
    // }).addTo(mymap);


    var jsonTest = new L.GeoJSON.AJAX(["<?= base_url($row->geojson); ?>"], {
      onEachFeature: popUp,
      style: myStyle,

    }).addTo(mymap);
  <?php } ?>
</script>

</html>