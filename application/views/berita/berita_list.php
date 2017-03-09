<!-- page content -->
            <div class="right_col" role="main">
                <br />
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Brita </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php echo anchor(site_url('berita/create'), '<i class="fa fa-plus-square"></i> Tambah', 'class="btn btn-primary"'); ?>
                                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                    <table class="table table-bordered table-striped" id="mytable">
                                        <thead>
                                            <tr>
                                                <th width="80px">No</th>
                                                <th>Judul</th>
                                                <th>Isi</th>
                                                <th>Penulis</th>
                                                <th>Tanggal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $start = 0;
                                            foreach ($berita_data as $berita)
                                            {
                                                ?>
                                                <tr>
                                            <td><?php echo ++$start ?></td>
                                            <td><?php echo $berita->judul ?></td>
                                            <td><?php $isi = word_limiter($berita->isi, 30);
                                                    echo $isi ?></td>
                                            <td><?php echo $berita->penulis ?></td>
                                            <td><?php echo $berita->tanggal ?></td>
                                            <td style="text-align:center" width="200px">
                                            <?php 
                                            echo anchor(site_url('berita/update/'.$berita->id_berita),'Update'); 
                                            echo ' | '; 
                                            echo anchor(site_url('berita/delete/'.$berita->id_berita),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                            ?>
                                            </td>
                                            </tr>
                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
