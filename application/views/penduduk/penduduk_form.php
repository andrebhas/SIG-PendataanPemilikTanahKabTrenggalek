<!-- page content -->
            <div class="right_col" role="main">
                <br />
                <div class="">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form <small>Penduduk <?php echo $button ?></small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form action="<?php echo $action; ?>" method="post">
                                        <div class="form-group">
                                            <label for="int">No Induk <?php echo form_error('no_induk');?> </label>
                                            <?php if ($cek == 1): ?>
                                                <input type="text" class="form-control" placeholder="No Induk" value="<?php echo $no_induk; ?>" disabled/>
                                                <input type="hidden" class="form-control" name="no_induk" id="no_induk" placeholder="No Induk" value="<?php echo $no_induk; ?>" />
                                            <?php else: ?>
                                                <input type="text" class="form-control" name="no_induk" id="no_induk" placeholder="No Induk" value="<?php echo $no_induk; ?>" />
                                            <?php endif ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
                                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
                                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="varchar">No Telepon <?php echo form_error('no_telepon') ?></label>
                                            <input type="text" class="form-control" name="no_telepon" id="no_telepon" placeholder="No Telepon" value="<?php echo $no_telepon; ?>" />
                                        </div>
                                        <input type="hidden" name="id_penduduk" value="<?php echo $id_penduduk; ?>" /> 
                                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                                        <a href="<?php echo site_url('penduduk') ?>" class="btn btn-default">Batal</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>