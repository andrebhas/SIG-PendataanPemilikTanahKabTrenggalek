<!-- page content -->
            <div class="right_col" role="main">
                <br />
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form <small><?php echo $button ?> Jenis Bangunan</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php echo form_open_multipart($action);?>
                                        <div class="form-group">
                                            <label for="varchar">Nama Bangunan <?php echo form_error('nama_bangunan') ?></label>
                                            <input type="text" class="form-control" name="nama_bangunan" id="nama_bangunan" placeholder="Nama Bangunan" value="<?php echo $nama_bangunan; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="varchar">Icon Marker <?php echo $this->session->flashdata('error_gambar'); ?></label>
                                            <input type="file" class="form-control" name="icon_marker" id="icon_marker" value="<?php echo $icon_marker; ?>" />
                                        </div>
                                        <input type="hidden" name="id_jenis_bangunan" value="<?php echo $id_jenis_bangunan; ?>" /> 
                                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                        <a href="<?php echo site_url('jenis_bangunan') ?>" class="btn btn-default">Cancel</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>