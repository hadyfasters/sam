<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row" style="display: inline-block;" >
    <div class="tile_count">
        <div class="col-md-12 col-sm-12 tile_stats_count">
            <div class="count">Outlet Management Cabang</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel" style="border-radius: 8px">
            <div class="x_title">
                <button style="border-radius: 6px" type="submit" class="btn btn-primary mb-1 mt-2"><i class="fa fa-plus-circle "></i><a style="color: white;" href="<?php echo site_url('outlet/add_outlet_cabang') ?>"> New Data</a></button>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php if (isset($error_message)): ?>
                    <p class="text-center" style="color: red;"><?php echo $error_message; ?></p>
                <?php endif; ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="dataOutletCabang" class="table table-striped table-bordered text-center" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode Cabang</th>
                                        <th>Nama Cabang</th>
                                        <th>Wilayah</th>
                                        <th>Start Date</th>
                                        <!-- <th>End Date</th> -->
                                        <th>Action</th>  
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if(isset($branch_list) && !empty($branch_list)) : 
                                        $no = 1;
                                        foreach ($branch_list as $brc) {
                                            echo '<tr>';
                                            echo '<td>'.$no.'</td>';
                                            echo '<td>'.strtoupper($brc->code).'</td>';
                                            echo '<td>'.$brc->name.'</td>';
                                            echo '<td>'.$brc->region_code.'</td>';
                                            echo '<td>'.$brc->start_date.'</td>';
                                            // echo '<td>'.$brc->end_date.'</td>';
                                            echo '<td>';
                                            echo '<div class="row">';
                                            echo '<div class="offset-sm-3 col-sm-3 col-md-3 ">';
                                            echo '<a href="'.site_url('outlet/edit_outlet_cabang/'.$brc->id_branch).'" ><i class="fa fa-pencil" title="Edit"></i></a>';
                                            echo '</div>';
                                            // if($up->up_level <> 99 || ($up->up_level<>$userdata['level'])){
                                            // echo '<div class="col-sm-3 col-md-3">';
                                            // echo '<a href="'.site_url('userposition/remove/'.$reg->id_region).'" onclick="return confirm(\'Are you sure to remove this?\')"><i id="deleteBtn" class="fa fa-trash" title="Hapus"></i></a>';
                                            // echo '</div>';
                                            // }
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
