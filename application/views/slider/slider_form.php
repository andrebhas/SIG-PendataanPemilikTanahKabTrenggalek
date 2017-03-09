<!-- page content -->
            <div class="right_col" role="main">
                <br />
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form <small><?php echo $button ?> Slider </small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php echo form_open_multipart($action);?>
                                        <div class="form-group">
                                            <label for="varchar">Gambar <?php echo $this->session->flashdata('error_gambar'); ?></label>
                                            <input  type="file"  class="form-control" name="gambar" id="gambar" value="<?php echo $gambar; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="varchar">Keterangan 1 <?php echo form_error('keterangan1') ?></label>
                                            <input type="text" class="form-control" name="keterangan1" id="keterangan1" placeholder="Keterangan1" value="<?php echo $keterangan1; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="varchar">Keterangan  2 <?php echo form_error('keterangan2') ?></label>
                                            <input type="text" class="form-control" name="keterangan2" id="keterangan2" placeholder="Keterangan2" value="<?php echo $keterangan2; ?>" />
                                        </div>
                                        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                        <a href="<?php echo site_url('slider') ?>" class="btn btn-default">Cancel</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>