<!-- page content -->
            <div class="right_col" role="main">
                <br />
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Slider <small>Setings</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-md-4 text-left">
                                            <?php echo anchor(site_url('slider/create'), 'Tambah', 'class="btn btn-primary"'); ?>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <div style="margin-top: 4px"  id="message">
                                                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Gambar</th>
                    <th>Keterangan1</th>
                    <th>Keterangan2</th>
                    <th>Action</th>
                </tr>
            </thead>
        <tbody>
            <?php
            $start = 0;
            foreach ($slider_data as $slider)
            {
                ?>
                <tr>
            <td><?php echo ++$start ?></td>
            <td> <img width="100px" heigt="40px" src="<?php echo base_url('assets/images/slider/'.$slider->gambar) ?>"> </td>
            <td><?php echo $slider->keterangan1 ?></td>
            <td><?php echo $slider->keterangan2 ?></td>
            <td style="text-align:center" width="200px">
            <?php 
            echo anchor(site_url('slider/update/'.$slider->id),'Update'); 
            echo ' | '; 
            echo anchor(site_url('slider/delete/'.$slider->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
            ?>
            </td>
            </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>