<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row" style="display: inline-block;" >
    <div class="tile_count">
        <div class="col-md-12 col-sm-12 tile_stats_count">
            <div class="count">User Roles</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel" style="border-radius: 8px">
            <div class="x_content">
                <?php if (isset($error_message)): ?>
                    <p class="text-center" style="color: red;"><?php echo $error_message; ?></p>
                <?php endif; ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="dataRoles" class="table table-striped table-bordered text-center nowrap" width="100%">
                                <thead>
                                    <tr>
                                        <th>Role</th>
                                        <th>Input</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <th>Approval</th>
                                        <th>Status</th>
                                        <?php if($userdata['is_sa']) : ?>
                                        <th>Action</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if(isset($role_list) && !empty($role_list)) : 
                                        $no = 1;
                                        foreach ($role_list as $role) {
                                            $acl_yes = '<i class="fa fa-check text-success"></i>';
                                            $acl_no = '<i class="fa fa-remove text-danger"></i>';

                                            echo '<tr>';
                                            echo '<td>'.ucwords($role->role_name).'</td>';
                                            echo '<td>'.($role->acl_input ? $acl_yes : $acl_no).'</td>';
                                            echo '<td>'.($role->acl_edit ? $acl_yes : $acl_no).'</td>';
                                            echo '<td>'.($role->acl_delete ? $acl_yes : $acl_no).'</td>';
                                            echo '<td>'.($role->acl_approve ? $acl_yes : $acl_no).'</td>';
                                            echo '<td>'.($role->is_active ? 'Aktif' : 'Tidak Aktif').'</td>';
                                            if($userdata['is_sa']) :
                                            echo '<td>';
                                            echo '<div class="row">';
                                            if($userdata['is_sa'] || $userdata['acl_edit']){
                                            echo '<div class="offset-sm-3 col-sm-3 col-md-3 ">';
                                            echo '<a href="'.site_url('roles/edit/'.$role->role_id).'" ><i class="fa fa-pencil" title="Edit"></i></a>';
                                            echo '</div>';
                                            }
                                            if(!$role->is_sa){
                                                if($userdata['is_sa'] || $userdata['acl_delete']){
                                                echo '<div class="col-sm-3 col-md-3">';
                                                echo '<a href="'.site_url('roles/remove/'.$role->role_id).'" onclick="return confirm(\'Are you sure to remove this?\')"><i id="deleteBtn" class="fa fa-trash" title="Hapus"></i></a>';
                                                echo '</div>';
                                                }
                                            }
                                            echo '</div>';
                                            echo '</td>';
                                            endif;

                                            $no++;
                                        }
                                    endif;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- /top tiles -->
    <br />
</div>
<!-- /page content-->
