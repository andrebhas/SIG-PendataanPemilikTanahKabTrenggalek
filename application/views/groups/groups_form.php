<!-- page content -->
            <div class="right_col" role="main">
                <br />
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form <small><?php echo $button ?> Groups </small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form action="<?php echo $action; ?>" method="post">
                                        <div class="form-group">
                                            <label for="varchar">Name <?php echo form_error('name') ?></label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="varchar">Description <?php echo form_error('description') ?></label>
                                            <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="<?php echo $description; ?>" />
                                        </div>
                                        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                        <a href="<?php echo site_url('groups') ?>" class="btn btn-default">Cancel</a>
                                   </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>