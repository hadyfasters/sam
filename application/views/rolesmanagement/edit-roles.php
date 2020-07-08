<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <!-- <div class="row" style="display: inline-block;" >
        <div class="tile_count">
            <div class="col-md-12 col-sm-12 tile_stats_count">
                <div class="count">Form Edit User Position</div>
            </div>
        </div>
    </div> -->

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel" style="border-radius: 8px">
            <div class="x_title">
                <h2 class="font-weight-bold" style="font-size: 2em">Form Edit Role</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php if (isset($error_message)): ?>
                    <p class="text-center" style="color: red;"><?php echo $error_message; ?></p>
                <?php endif; ?>
                <form id="formInputUserRoles" method="POST" action="<?php echo site_url('roles/edit_process'); ?>" data-parsley-validate class="form-horizontal form-label-left">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="role_name">User Role</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="role_name" name="role_name" class="form-control" style="border-radius: 6px" placeholder="User Role" data-error=".errorTxt1" value="<?php echo $data->role_name; ?>">
                            <div class="errorTxt1" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="status">Status</label>
                        <div class="col-md-6 col-sm-6 ">
                            <div class="radio">
                                <label>
                                    <input type="radio" class="status" name="status" data-error=".errorTxt3" value="1" <?php echo ($data->is_active==1? 'checked' : '') ?>> Aktif
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" class="status" name="status" data-error=".errorTxt3" value="0" <?php echo ($data->is_active==0? 'checked' : '') ?>> Tidak Aktif
                                </label>
                            </div>
                            <div class="errorTxt3" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Hak Akses</label>
                        <table class="table table-striped table-bordered nowrap">
                            <tr>
                                <th>Input</th>
                                <td>
                                    <input type="checkbox" name="acl_input" <?php echo $data->acl_input ? 'checked':''; ?>>
                                </td>
                            </tr>
                            <tr>
                                <th>Edit</th>
                                <td>
                                    <input type="checkbox" name="acl_edit" <?php echo $data->acl_edit ? 'checked':''; ?>>
                                </td>
                            </tr>
                            <tr>
                                <th>Delete</th>
                                <td>
                                    <input type="checkbox" name="acl_delete" <?php echo $data->acl_delete ? 'checked':''; ?>>
                                </td>
                            </tr>
                            <tr>
                                <th>Approval</th>
                                <td>
                                    <input type="checkbox" name="acl_approve" <?php echo $data->acl_approve ? 'checked':''; ?>>
                                </td>
                            </tr>
                            <tr>
                                <?php if($userdata['is_sa']) : ?>
                                <th>SA Only</th>
                                <td>
                                    <input type="checkbox" name="sa_only" <?php echo $data->is_sa ? 'checked':''; ?>>
                                </td>
                                <?php endif; ?>
                            </tr>
                        </table>
                    </div>
                    <div id="salesSelected"></div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-sm-12 col-md-12 text-center">
                            <button class="btn btn-secondary" type="button" value="Cancel" id="btnCancel" form="formInputUserRoles">Cancel</button>
                            <button class="btn btn-success" type="submit" value="Submit" form="formInputUserRoles">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>    