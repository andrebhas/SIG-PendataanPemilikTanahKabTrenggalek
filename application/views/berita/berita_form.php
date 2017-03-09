<!-- page content -->
<script src="<?php echo base_url()?>assets/js/ckeditor/ckeditor.js"></script>
            <div class="right_col" role="main">
                <br />
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form <small><?php echo $button ?> Berita</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form action="<?php echo $action; ?>" method="post">
                                        <div class="form-group">
                                            <label for="varchar">Judul <?php echo form_error('judul') ?></label>
                                            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="isi">Isi <?php echo form_error('isi') ?></label>
                                            <textarea class="form-control ckeditor" rows="3" name="isi" id="isi" placeholder="Isi"><?php echo $isi; ?></textarea>
                                        </div>
                                        <input type="hidden" name="id_berita" value="<?php echo $id_berita; ?>" /> 
                                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                        <a href="<?php echo site_url('berita') ?>" class="btn btn-default">Cancel</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
