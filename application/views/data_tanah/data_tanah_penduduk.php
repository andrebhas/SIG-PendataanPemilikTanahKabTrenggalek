<?php echo $map['js']; ?>
<!-- page content -->
            <div class="right_col" role="main">
                <br />
                <div class="">
                    <h2><?php echo $this->session->flashdata('message'); ?></h2>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Data <small><?php echo $nama; ?></small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table class="table">
                                        <tr><td>No Induk</td><td><?php echo $no_induk; ?></td></tr>
                                        <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
                                        <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
                                        <tr><td>No Telepon</td><td><?php echo $no_telepon; ?></td></tr>
                                        <tr>
                                            <td><a href="<?php echo base_url('penduduk') ?>" class="btn btn-primary btn-md">Back</a></td>
                                            <td><a href="<?php echo base_url('data_tanah/cetak_per_id/'.$id_penduduk) ?>" class="btn btn-success btn-md">Cetak</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Data Tanah<small> <?php echo $nama; ?></small></h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <a href="<?php echo base_url('data_tanah/create/'.$id_penduduk) ?>" class="btn btn-primary btn-sm"> <i class="fa fa-plus-square"></i> Tambah Data Tanah</a>
                                        <?php if (!$data_tanah_data): ?>
                                            <?php echo $nama." Belum Meliliki Tanah atau Tanah Belum terdaftar" ?>
                                        <?php endif ?>
                                        <?php echo $map['html']; ?>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>