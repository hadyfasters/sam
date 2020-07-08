<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row" style="display: inline-block;" >
    <div class="tile_count">
        <div class="col-md-12 col-sm-12 tile_stats_count">
            <div class="count">Menu Permission Setting</div>
        </div>
    </div>
</div>

<div class="row" id="listUser">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel" style="border-radius: 8px">
            <div class="x_title">
                <h2>User Role</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="roles" style="width: 200%">List User Role</label>
                    <div class="col-md-6 col-sm-6 ">
                        <select style="color: #495057;" id="roles" class="form-control" data-error=".errorTxt1" >
                            <option value="">Pilih..</option>
                            <?php 
                            if(isset($roles_list) && !empty($roles_list)) : 
                                foreach ($roles_list as $up) {
                                    echo '<option value="'.$up->role_id.'">'.$up->role_name.'</option>';
                                }
                            endif;
                            ?>
                        </select>
                        <div class="errorTxt1" style="color:red"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" id="UserSelected">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel" style="border-radius: 8px">
            <div class="x_title">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <h2>Menu Permission</h2>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 text-right">
                        <button id="select_all" class="btn btn-light btn-sm">Select All</button>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php if (isset($error_message)): ?>
                    <p class="text-center" style="color: red;"><?php echo $error_message; ?></p>
                <?php endif; ?>
                <div class="row" style="margin-top: -10px">
                    <div class="col">
                        <h1 style="font-size: 27px;"><span class="badge badge-success" id="selected"></span></h1>
                    </div>
                </div>
                <form id="formMenu" method="POST" action="<?php echo site_url('menu_permission/process'); ?>">
                    <div class="row mt-3">
                        <div class="col-md-12 col-sm-12">
                            <h5> Menu: </h5>
                        </div>
                        <?php if(isset($menu_list) && !empty($menu_list)) : ?>
                        <?php foreach($menu_list as $mn) : ?>
                        <div class="col-md-4 col-sm-4 mb-3">
                            <div class="form-check">
                                <input class="form-check-input parent" type="checkbox" name="menu[]" value="<?php echo $mn->parent->id_menu; ?>" id="<?php echo $mn->parent->id_menu; ?>">
                                <label class="form-check-label" for="<?php echo $mn->parent->id_menu; ?>">
                                    <strong><?php echo $mn->parent->nama_menu; ?></strong>
                                </label>
                            </div>
                            <?php if(!empty($mn->sub)) : ?>
                            <?php foreach ($mn->sub as $sub) : ?>
                            <div class="form-check mt-2 ml-4">
                                <input class="form-check-input sub" type="checkbox" name="menu[]" value="<?php echo $sub->id_menu; ?>" id="<?php echo $sub->id_menu; ?>">
                                <label class="form-check-label" for="<?php echo $sub->id_menu; ?>">
                                    <?php echo $sub->nama_menu; ?>
                                </label>
                            </div>
                            <?php endforeach; endif; ?>
                        </div>
                        <?php endforeach; endif; ?>
                    </div>
                    <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-1 col-sm-1">
                                <input id="btn_save" class="btn btn-success" type="submit" value="Submit" form="formMenu" disabled>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="roles" value="<?php echo (isset($_GET['roles'])?$_GET['roles']:''); ?>">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /page content