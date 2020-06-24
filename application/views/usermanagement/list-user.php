<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row" style="display: inline-block;" >
    <div class="tile_count">
        <div class="col-md-12 col-sm-12 tile_stats_count">
            <div class="count">User Management</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel" style="border-radius: 8px">
            <div class="x_title">
                <button style="border-radius: 6px" type="submit" class="btn btn-primary mb-1 mt-2"><i class="fa fa-plus-circle "></i><a style="color: white;" href="<?php echo site_url('user/add') ?>"> New Data</a></button>   
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="dataUser" class="table table-striped table-bordered text-center" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NPP</th>
                                        <th>Nama</th>
                                        <th>Wilayah</th>
                                        <th>Cabang/Divisi</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Action</th>	  
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if(isset($user_list) && !empty($user_list)) : 
                                        $no = 1;
                                        foreach ($user_list as $usr) {
                                            echo '<tr>';
                                            echo '<td>'.$no.'</td>';
                                            echo '<td>'.$usr->npp.'</td>';
                                            echo '<td>'.$usr->nama.'</td>';
                                            echo '<td>'.$usr->region_code.'</td>';
                                            echo '<td>'.$usr->branch_code.'</td>';
                                            echo '<td>'.$usr->position_name.'</td>';
                                            echo '<td>'.($usr->is_active?'Aktif':'Tidak Aktif').'</td>';
                                            echo '<td>';
                                            echo '<div class="row">';
                                            echo '<div class="offset-sm-3 col-sm-3 col-md-3 ">';
                                            echo '<a href="'.site_url('user/edit/'.$usr->id_user).'" ><i class="fa fa-pencil" title="Edit"></i></a>';
                                            echo '</div>';
                                            echo '<div class="col-sm-3 col-md-3">';
                                            echo '<a href="'.site_url('user/remove/'.$usr->id_user).'" onclick="return confirm(\'Are you sure to remove this?\')"><i id="deleteBtn" class="fa fa-trash" title="Hapus"></i></a>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</td>';

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
