<?php

$id_user = $this->session->userdata('id_user');
$role = $this->session->userdata('role');

?>

<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>

            <li class="<?php if ($this->uri->segment(2) == "utama") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/utama')
                                        ?>"><i class="fa fa-home"></i> <span>Halaman Utama</span></a></li>


            <li class="<?php if ($this->uri->segment(2) == "thresher") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/thresher')
                                        ?>"><i class="fa fa-binoculars"></i> <span>Thresher</span></a></li>

            <li class="<?php if ($this->uri->segment(2) == "traktor") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/traktor')
                                        ?>"><i class="fa fa-hand-lizard-o"></i> <span>Traktor</span></a></li>

            <li class="<?php if ($this->uri->segment(2) == "download") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/download')
                                        ?>"><i class="fa fa-download"></i> <span>Download</span></a></li>

            <li class="<?php if ($this->uri->segment(2) == "bantuan") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/bantuan')
                                        ?>"><i class="fa fa-info"></i> <span>Bantuan</span></a></li>

            <li class="<?php if ($this->uri->segment(2) == "kontak") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/kontak')
                                        ?>"><i class="fa fa-phone"></i> <span>Kontak</span></a></li>


            <li class="<?php if ($this->uri->segment(2) == "kecamatan") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/kecamatan')
                                        ?>"><i class="fa fa-building"></i> <span>Kecamatan</span></a></li>


            <li class="treeview <?php if ($this->uri->segment(2) == "user") {
                                    echo "active";
                                } ?>">
                <a href="#"><i class="fa fa-user"></i> <span>Manajemen User</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if ($this->uri->segment(2) == "user") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('admin/user') ?>">List User</a></li>
                </ul>
            </li>

            <li class="<?php if ($this->uri->segment(2) == "konfigurasi") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/konfigurasi')
                                        ?>"><i class="fa fa-cogs"></i> <span>Konfigurasi</span></a></li>


        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content container-fluid">