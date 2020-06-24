<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row" style="display: inline-block;" >
    <div class="tile_count">
        <div class="col-md-12 col-sm-12 tile_stats_count">
            <div class="count">User History</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel" style="border-radius: 8px">
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="dataUser" class="table table-striped table-bordered text-center" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <!-- <th>Changer</th> -->
                                        <th>Before</th>
                                        <th>After</th> 
                                        <th>Date</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if(isset($user_list) && !empty($user_list)) : 
                                        $no = 1;
                                        foreach ($user_list as $usr) {

                                            // $old = json_decode($usr->previous_data);

                                            // var_dump($old);exit;
                                            // $new = json_decode($usr->latest_data);

                                            // $old = array_diff_assoc($new, $old);

                                            // $new = array_diff_assoc($old, $new);


                                            echo '<tr>';
                                            echo '<td>'.$no.'</td>';
                                            echo '<td>'.$usr->previous_data.'</td>';
                                            echo '<td>'.$usr->latest_data.'</td>';
                                            echo '<td width="12%">'.$usr->date.'</td>';
                                            echo '<td width="8%">'.$usr->time.'</td>';
                                            echo '</tr>';

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
