<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row" style="display: inline-block;" >
    <div class="tile_count">
        <div class="col-md-12 col-sm-12 tile_stats_count">
            <div class="count">Performance Report</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel" style="border-radius: 8px">
            <div class="x_content mt-4">
                <div class="col-md-7 col-sm-7">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="datasummary">Data Summary</label>
                            <div class="col-md-9 col-sm-9 ">
                            <select style="border-radius: 6px; color: #495057;" id="datasummary" name="datasummary" class="form-control" required>
                                <option value="">Pilih Data Summary..</option>
                                <option value="press">Kategori Nasabah 1</option>
                                <option value="net">Kategori Nasabah 1</option>
                            </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="proses">Proses</label>
                            <div class="col-md-9 col-sm-9 ">
                            <select style="border-radius: 6px; color: #495057;" id="proses" name="proses" class="form-control" required>
                                <option value="">Pilih Proses..</option>
                                <option value="press">Kategori Nasabah 1</option>
                                <option value="net">Kategori Nasabah 1</option>
                            </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="rentangwaktu">Rentang Waktu</label>
                            <div class="col-md-9 col-sm-9">
                            <select style="border-radius: 6px; color: #495057;" id="rentangwaktu" name="rentangwaktu" class="form-control" required>
                                <option value="">Pilih Rentang Waktu..</option>
                                <option value="1">Year to Month</option>
                                <option value="2">Monthly</option>
                            </select>
                            </div>
                        </div>
                        <!-- <div id="onDemandSelected"></div> -->
                        <!-- <div class="ln_solid"></div> -->
                        <div class="item form-group mt-2">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button type="submit" class="btn btn-primary" style="border-radius: 6px;">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <div class="row" style="margin-bottom: -13px">
                                <div class="col-sm-12 col-md-12 d-flex justify-content-center"><img src="<?php echo base_url('assets/img/xls.png')?>" style="max-width: 30px;" /></div>
                                <div class="w-100"></div>
                                <div class="col-sm-12 col-md-12 d-flex justify-content-center pt-3"><h4 class="font-weight-bold">Lead</h4></div>
                                <div class="col-sm-12 col-md-12 d-flex justify-content-center" style="margin-top:-5px"><p>Download</p></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="row" style="margin-bottom: -13px">
                                <div class="col-sm-12 col-md-12 d-flex justify-content-center"><img src="<?php echo base_url('assets/img/xls.png')?>" style="max-width: 30px;" /></div>
                                <div class="w-100"></div>
                                <div class="col-sm-12 col-md-12 d-flex justify-content-center pt-3"><h4 class="font-weight-bold">Call</h4></div>
                                <div class="col-sm-12 col-md-12 d-flex justify-content-center" style="margin-top:-5px"><p>Download</p></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="row" style="margin-bottom: -13px">
                                <div class="col-sm-12 col-md-12 d-flex justify-content-center"><img src="<?php echo base_url('assets/img/xls.png')?>" style="max-width: 30px;" /></div>
                                <div class="w-100"></div>
                                <div class="col-sm-12 col-md-12 d-flex justify-content-center pt-3"><h4 class="font-weight-bold">Meet</h4></div>
                                <div class="col-sm-12 col-md-12 d-flex justify-content-center" style="margin-top:-5px"><p>Download</p></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="row" style="margin-bottom: -13px">
                                <div class="col-sm-12 col-md-12 d-flex justify-content-center"><img src="<?php echo base_url('assets/img/xls.png')?>" style="max-width: 30px;" /></div>
                                <div class="w-100"></div>
                                <div class="col-sm-12 col-md-12 d-flex justify-content-center pt-3"><h4 class="font-weight-bold">Close</h4></div>
                                <div class="col-sm-12 col-md-12 d-flex justify-content-center" style="margin-top:-5px"><p>Download</p></div>
                            </div>
                        </div>
                    </div>
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
                            <table id="dataPerformanceReport" class="table table-striped table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Prospect</th>
                                        <th>Jenis Nasabah</th>
                                        <th>Potensi Dana Masuk</th>
                                        <th>Realisasi Dana Masuk</th>
                                        <th>Realisasi</th>
                                        <th>Produk Dana</th>
                                        <th>Date & Time Close</th>
                                        <th>Date & Time Inputed</th>
                                        <th>Action</th>	  
                                        <th>Attach</th>	  
                                        <th>History Lead</th>	  
                                        <th>History Call</th>	  
                                        <th>History Meet</th>	  
                                    </tr>
                                </thead>
                                <tbody></tbody>
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