<!-- page content -->
            <div class="right_col" role="main">
                <br />
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Group <small>List</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-md-4 text-left">
                                        <?php echo anchor(site_url('groups/create'), '<i class="fa fa-plus-square"></i> Tambah', 'class="btn btn-primary"'); ?>
                                        </div>
                                        <div class="col-md-8 text-right">
                                            <div style="margin-top: 4px"  id="message">
                                                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-bordered table-striped" id="mytable">
                                        <thead>
                                            <tr>
                                                <th width="80px">No</th>
                                                <th>Nama</th>
                                                <th>Deskripsi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $start = 0;
                                            foreach ($groups_data as $groups)
                                            {
                                                ?>
                                            <tr>
                                                <td><?php echo ++$start ?></td>
                                                <td><?php echo $groups->name ?></td>
                                                <td><?php echo $groups->description ?></td>
                                                <td style="text-align:center" width="200px">
                                                <?php 
                                                echo anchor(site_url('groups/update/'.$groups->id),'Update'); 
                                                echo ' | '; 
                                                echo anchor(site_url('groups/delete/'.$groups->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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