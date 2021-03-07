<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Manajemen Data Thresher</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <p>
            <a href="<?= base_url($add) ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
            <a href="<?= base_url('admin/alat/detail/332'); ?>" class="btn btn-warning"><i class="fa fa-binoculars"></i> Lihat Profil Thresher</a>
        </p>

        <table class="table DataTable">
            <thead>
                <tr>
                    <th width="40px">No</th>
                    <th>Nama Kecamatan</th>
                    <th>Tahun</th>
                    <th>Produktivitas Gabah Kering</th>
                    <th>Thresher Tersedia</th>
                    <th>Kebutuhan Thresher</th>
                    <th>Selisih</th>
                    <th width="100px">Status</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody id="targetData">
                <?php $no = 1;
                foreach ($thresher as $row) {
                    if ($row->kebutuhan_thresher != null) { ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td>
                                <strong><?= $row->nama_kecamatan ?></strong><br>
                            </td>
                            <td><?= $row->tahun; ?></td>
                            <td><?= $row->produksi_gabah_kering . ' (Ton)'; ?></td>
                            <td><?= $row->tersedia_thresher . ' Unit'; ?></td>
                            <td><?= $row->kebutuhan_thresher . ' Unit'; ?></td>
                            <td><?= $row->selisih_thresher . ' Unit'; ?></td>
                            <td><?= $row->status_thresher; ?></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info"><i class="fa fa-cogs"></i></button>
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= base_url($edit . $row->id_data)  ?>"><i class="fa fa-edit"></i> Edit</a></li>
                                        <li><a class="tombol-hapus" href="<?= base_url($delete . $row->id_data)  ?>"><i class="fa fa-trash"></i> Hapus</a></li>
                                    </ul>
                                </div>


                            </td>
                        </tr>
                <?php $no++;
                    }
                } ?>
            </tbody>
        </table>

    </div>
    <!-- /.box-body -->
</div>



<!-- <script>
    userData();

    function userData() {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "admin/user/userData" ?>',
            dataType: 'json',
            success: function(data) {
                var baris = '';

                for (var i = 0; i < data.length; i++) {
                    baris += '<tr>' +
                        '<td>' + (i + 1) + '</td>' +
                        '<td><img width="50px" src="<?= base_url('assets/uploads/images/') ?>' + data[i].image + '" alt=""></td>' +
                        '<td>' +
                        '<strong>' + data[i].nama_user + '</strong><br>' +
                        '<p>' + data[i].email + ' - ' + data[i].role + '</p>' +
                        '</td>' +
                        '<td><a href="<?php
                                        ?>/' + data[i].id_user + '" class="btn btn-sm btn-primary"><i class="fas fa fa-edit"></i> Edit</a></td>' +
                        '</tr>';
                }

                $('#targetData').html(baris);
            }
        })
    }
</script> -->