<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row" style="display: inline-block;" >
    <div class="tile_count">
        <div class="col-md-12 col-sm-12 tile_stats_count">
            <div class="count">Lead Report</div>
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
                                        <th>Nama Prospect</th>
                                        <th>Jenis Nasabah</th>
                                        <th>Alamat</th>
                                        <th>Contact Person</th>
                                        <th>No. Contact</th>
                                        <th>Potensi Dana Masuk</th>
                                        <th>Produk Sumber Dana</th>
                                        <th>Kategori Nasabah</th>
                                        <th>Additional Info</th>
                                        <th>Date & Time Inputted</th>
                                        <th>Action</th>	  
                                        <th>FU Call</th>	  
                                        <th>FU Meet</th>	  
                                        <th>FU Close</th>	   
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if(isset($lead_report_data) && !empty($lead_report_data)) : 
                                        $no = 1;
                                        foreach ($lead_report_data as $lead_report) {
                                            echo '<tr>';
                                            echo '<td width="5%">'.$no.'</td>';
                                            echo '<td>'.$lead_report->nama_prospek.'</td>';
                                            echo '<td>'.($lead_report->jenis_nasabah==1?'Perorangan':'Institusi').'</td>';
                                            echo '<td>'.$lead_report->alamat.'</td>';
                                            echo '<td>'.$lead_report->kontak_person.'</td>';
                                            echo '<td>'.$lead_report->no_kontak.'</td>';
                                            echo '<td>'.number_format($lead_report->potensi_dana).'</td>';
                                            echo '<td>'.$lead_report->product_name.'</td>';
                                            echo '<td>'.($lead_report->kategori_nasabah==1?'New':'Existing').'</td>';
                                            echo '<td>'.$lead_report->additional_info.'</td>';
                                            echo '<td>'.date('d-m-Y',strtotime($lead_report->created_date)). ' ' .date('H:i:s',strtotime($lead_report->created_date)). ' by ' . $lead_report->created_by . '</td>';
                                            echo '<td>'.date('d-m-Y',strtotime($lead_report->fu_call_date)).'</td>';
                                            echo '<td>'.date('d-m-Y',strtotime($lead_report->fu_meet_date)).'</td>';
                                            echo '<td>'.date('d-m-Y',strtotime($lead_report->fu_close_date)).'</td>';                                            
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