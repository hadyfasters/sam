<!-- page content -->
<div class="right_col" role="main"> 
    <!-- top tiles -->
    <div class="row" style="display: inline-block;" >
    <div class="tile_count">
        <div class="col-md-12 col-sm-12 tile_stats_count">
            <div class="count">Lead Activity Report</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel" style="border-radius: 8px">
            <div class="x_content mt-4">
                <div class="col-md-12 col-sm-12">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="datasummary">Data Summary</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select style="border-radius: 6px; color: #495057;" id="datasummary" name="datasummary" class="form-control" required>
                                    <option value="">Pilih Data Summary..</option>
                                    <option value="press">Data Success</option>
                                    <option value="net">Data Remain</option>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="rentangwaktu">Rentang Waktu</label>
                            <div class="col-md-9 col-sm-9">
                            <select style="border-radius: 6px; color: #495057;" id="rentangwaktu" name="rentangwaktu" class="form-control" required>
                                <option value="">Pilih Rentang Waktu..</option>
                                <option value="1">Year to Month</option>
                                <option value="2">Year to Date</option>
                                <option value="3">On Demand</option>
                            </select>
                            </div>
                        </div>
                        <div id="onDemandSelected"></div>
                        <!-- <div class="ln_solid"></div> -->
                        <div class="item form-group mt-2">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button type="submit" class="btn btn-primary" style="border-radius: 6px;">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>                
            </div>
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
                            <table id="dataActivityReport" class="table table-striped table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>User (NPP)</th>
                                        <th>Cabang (by kode cabang)</th>
                                        <th>Wilayah</th>
                                        <th>Jenis Nasabah</th>
                                        <th>Jumlah Lead</th>
                                        <th>Produk</th>
                                        <th>Potensi Dana Masuk</th>
                                        <th>Jumlah Call</th>
                                        <th>% Jumlah Call</th>
                                        <th>Jumlah Meet</th>
                                        <th>% Jumlah Meet</th>	  
                                        <th>Jumlah Close</th>	  
                                        <th>% Jumlah Close</th>	  
                                        <th>Realisasi Dana Masuk</th>	
                                        <th>% Realisasi Dana Masuk</th>      
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if(isset($activity_report_data) && !empty($activity_report_data)) : 
                                        $no = 1;
                                        foreach ($activity_report_data as $activity_report) {
                                            echo '<tr>';
                                            echo '<td width="5%">'.$no.'</td>';
                                            echo '<td>'.$activity_report->nama_prospek.'</td>';
                                            echo '<td>'.($activity_report->jenis_nasabah==1?'Perorangan':'Institusi').'</td>';
                                            echo '<td>'.$activity_report->alamat.'</td>';
                                            echo '<td>'.$activity_report->kontak_person.'</td>';
                                            echo '<td>'.$activity_report->no_kontak.'</td>';
                                            echo '<td>'.number_format($activity_report->potensi_dana).'</td>';
                                            echo '<td>'.$activity_report->product_name.'</td>';
                                            echo '<td>'.($activity_report->kategori_nasabah==1?'New':'Existing').'</td>';
                                            echo '<td>'.$activity_report->additional_info.'</td>';
                                            echo '<td>'.date('d-m-Y',strtotime($activity_report->created_date)). ' ' .date('H:i:s',strtotime($activity_report->created_date)). ' by ' . $activity_report->created_by . '</td>';
                                            echo '<td>';
                                            echo '<div class="dropdown">';
                                            echo '<a class="btn btn-secondary dropdown-toggle btn-sm" href="#" role="button" id="dropdownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gear"></i></a>';
                                            echo '<div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="dropdownLink">';
                                            echo '<a class="dropdown-item" href="'.site_url('lead/view/'.$activity_report->lead_id).'"><i class="fa fa-eye" title="Edit"></i> View</a>';
                                            echo '<a class="dropdown-item" href="'.site_url('lead/edit/'.$activity_report->lead_id).'"><i class="fa fa-pencil" title="Edit"></i> Edit</a>';
                                            echo '<a class="dropdown-item" href="'.site_url('lead/approve/'.$activity_report->lead_id).'" onclick="return confirm(\'Apakah Anda Yakin?\')"><i class="fa fa-check" title="Edit"></i> Approve</a>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</td>';
                                            echo '<td>'.date('d-m-Y',strtotime($activity_report->fu_call_date)).'</td>';
                                            echo '<td>'.date('d-m-Y',strtotime($activity_report->fu_meet_date)).'</td>';
                                            echo '<td>'.date('d-m-Y',strtotime($activity_report->fu_close_date)).'</td>';                                            
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