<!-- page content -->
            <div class="right_col" role="main">

                <br />
                <div class="">

                    <div class="row top_tiles">
                    <?php $group = 3; 
                        if ($this->ion_auth->in_group($group)): ?>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="count"><?php echo $total_penduduk ?></div>

                                <h3>Penduduk </h3>
                                <p>Terdaftar di Sistem</p>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="count"><?php echo $total_tanah ?></div>

                                <h3>Data Tanah</h3>
                                <p>Terdaftar di Sistem</p>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="count"><?php echo $total_berita ?></div>

                                <h3>Berita</h3>
                                <p>Diterbitkan di situs</p> 
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="count"><?php echo $total_jenis ?></div>

                                <h3>Jenis Bangun</h3>
                                <p>Terdaftar di Sistem</p>
                            </div>
                        </div>


                    <?php else: ?>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="count"><?php echo $total_penduduk ?></div>

                                <h3>Penduduk </h3>
                                <a href="<?= base_url('penduduk') ?>"><p>Terdaftar di Sistem</p></a>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="count"><?php echo $total_tanah ?></div>

                                <h3>Data Tanah</h3>
                                <a href="<?= base_url('data_tanah') ?>"><p>Terdaftar di Sistem</p></a>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="count"><?php echo $total_berita ?></div>

                                <h3>Berita</h3>
                                <a href="<?php echo base_url('berita') ?>"> <p>Diterbitkan di situs</p> </a>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="count"><?php echo $total_jenis ?></div>

                                <h3>Jenis Bangun</h3>
                                <a href="<?= base_url('jenis_bangunan') ?>"><p>Terdaftar di Sistem</p></a>
                            </div>
                        </div>
                    <?php endif ?>
                        
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">

                                <div class="x_title">
                                    <h2>Peta <small>Data Tanah Penduduk</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">
                                    <?php echo $map['js']; ?>
                                    <?php echo $map['html']; ?>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>