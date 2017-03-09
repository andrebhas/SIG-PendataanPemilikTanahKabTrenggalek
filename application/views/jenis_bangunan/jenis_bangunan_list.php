<!-- page content -->
            <div class="right_col" role="main">
                <br />
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Data <small>Jenis Bangunan</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-md-4">
                                            <?php echo anchor(site_url('jenis_bangunan/create'),'<i class="fa fa-plus-square"></i> Tambah', 'class="btn btn-primary"'); ?>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div style="margin-top: 8px" id="message">
                                                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-1 text-right">
                                        </div>
                                        <div class="col-md-3 text-right">
                                            <form action="<?php echo site_url('jenis_bangunan/index'); ?>" class="form-inline" method="get">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                                    <span class="input-group-btn">
                                                        <?php 
                                                            if ($q <> '')
                                                            {
                                                                ?>
                                                                <a href="<?php echo site_url('jenis_bangunan'); ?>" class="btn btn-default">Reset</a>
                                                                <?php
                                                            }
                                                        ?>
                                                      <button class="btn btn-primary" type="submit">Search</button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <table class="table table-bordered" style="margin-bottom: 10px">
                                        <tr>
                                            <th>No</th>
                                    <th>Nama Bangunan</th>
                                    <th>Icon Marker</th>
                                    <th>Action</th>
                                        </tr><?php
                                        foreach ($jenis_bangunan_data as $jenis_bangunan)
                                        {
                                            ?>
                                            <tr>
                                        <td width="80px"><?php echo ++$start ?></td>
                                        <td><?php echo $jenis_bangunan->nama_bangunan ?></td>
                                        <td> <img src="<?php echo base_url('gambar/marker/'.$jenis_bangunan->icon_marker) ?>"></td>
                                        <td style="text-align:center" width="200px">
                                            <?php 
                                            echo anchor(site_url('jenis_bangunan/update/'.$jenis_bangunan->id_jenis_bangunan),'<i class="fa fa-edit"></i> update', 'class="btn btn-warning btn-xs"');  
                                            echo anchor(site_url('jenis_bangunan/delete/'.$jenis_bangunan->id_jenis_bangunan),'<i class="fa fa-trash"></i> delete','class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                            ?>
                                        </td>
                                    </tr>
                                            <?php
                                        }
                                        ?>
                                    </table>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
                                    </div>
                                        <div class="col-md-6 text-right">
                                            <?php echo $pagination ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>