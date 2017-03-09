<!-- page content -->
            <div class="right_col" role="main">
                <br />
                <div class="">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>List Data</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-md-6">
                                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <?php echo anchor(site_url('penduduk/create'), '<i class="fa fa-plus-square"> </i> Tambah Penduduk', 'class="btn btn-primary"'); ?>
                                        <!--
                                            <?php echo anchor(site_url('penduduk/excel'), 'Excel', 'class="btn btn-primary"'); ?>
                                            <?php echo anchor(site_url('penduduk/word'), 'Word', 'class="btn btn-primary"'); ?>
                                        -->
                                        </div>
                                    </div>
                                    <table class="table table-bordered table-striped" id="mytable">
                                        <thead>
                                            <tr>
                                                <th width="80px">No</th>
                                                <th>No Induk</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>No Telepon</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $start = 0;
                                        foreach ($penduduk_data as $penduduk)
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo ++$start ?></td>
                                                <td><?php echo $penduduk->no_induk ?></td>
                                                <td><?php echo $penduduk->nama ?></td>
                                                <td><?php echo $penduduk->alamat ?></td>
                                                <td><?php echo $penduduk->no_telepon ?></td>
                                                <td style="text-align:center" width="200px">
                                                <?php 
                                                echo anchor(site_url('data_tanah/penduduk/'.$penduduk->id_penduduk),'<i class="fa fa-eye"></i> Data Tanah', 'class="btn btn-success btn-xs"'); 
                                                echo anchor(site_url('penduduk/update/'.$penduduk->id_penduduk),'<i class="fa fa-edit"></i>', 'class="btn btn-warning btn-xs"'); 
                                                echo anchor(site_url('penduduk/delete/'.$penduduk->id_penduduk),'<i class="fa fa-trash"></i>','class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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