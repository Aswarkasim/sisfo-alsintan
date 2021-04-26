<h3><strong>Data Pada Tahun</strong></h3>
<form action="<?= base_url('home/traktor'); ?>" method="POST">
  <div class="row">
    <div class="col-md-4">
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

<br>
<table class="table DataTable">
  <thead>
    <tr>
      <th width="40px">No</th>
      <th>Nama Kecamatan</th>
      <th>Tahun</th>
      <th>Produktivitas Gabah Kering</th>
      <th>Traktor Tersedia</th>
      <th>Kebutuhan Traktor</th>
      <th>Selisih</th>
      <th width="100px">Status</th>
    </tr>
  </thead>
  <tbody id="targetData">
    <?php $no = 1;
    foreach ($traktor as $row) {
      if ($row->kebutuhan_traktor != null) { ?>
        <tr>
          <td><?= $no ?></td>
          <td>
            <strong><?= $row->nama_kecamatan ?></strong><br>
          </td>
          <td><?= $row->tahun; ?></td>
          <td><?= $row->produksi_gabah_kering . ' (Ton)'; ?></td>
          <td><?= $row->tersedia_traktor . ' Unit'; ?></td>
          <td><?= $row->kebutuhan_traktor . ' Unit'; ?></td>
          <td><?= $row->selisih_traktor . ' Unit'; ?></td>
          <td><?= $row->status_traktor; ?></td>
        </tr>
    <?php $no++;
      }
    } ?>
  </tbody>
</table>