
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
                        <table id="dataLeadMainReport" class="display" style="width:100%">
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
                                    if(isset($main_lead_report_data) && !empty($main_lead_report_data)) : 
                                        $no = 1;
                                        foreach ($main_lead_report_data as $main_lead_data) {
                                            echo '<tr>';
                                            echo '<td width="5%">'.$no.'</td>';
                                            echo '<td>'.$main_lead_data->npp.'</td>';
                                            echo '<td>'.$main_lead_data->branch_code.'</td>';
                                            echo '<td>'.$main_lead_data->region_code.'</td>';                                            
                                            echo '<td>'.($main_lead_data->jenis_nasabah==1?'Perorangan':'Institusi').'</td>';
                                            echo '<td>'.$main_lead_data->total_lead.'</td>';
                                            echo '<td>'.$main_lead_data->product_name.'</td>';
                                            echo '<td>'.$main_lead_data->potensi_dana_product.'</td>';
                                            echo '<td>'.$main_lead_data->total_call.'</td>';
                                            echo '<td>'.$main_lead_data->perc_total_call.'</td>';
                                            echo '<td>'.$main_lead_data->total_meet.'</td>';
                                            echo '<td>'.$main_lead_data->perc_total_meet.'</td>';    
                                            echo '<td>'.$main_lead_data->total_close.'</td>';
                                            echo '<td>'.$main_lead_data->perc_total_close.'</td>'; 
                                            echo '<td>'.$main_lead_data->realisasi_dana.'</td>';  
                                            echo '<td>'.$main_lead_data->perc_realisasi_dana.'</td>';                                                              
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