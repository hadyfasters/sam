<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row" style="display: inline-block;" >
    <div class="tile_count">
        <div class="col-md-12 col-sm-12 tile_stats_count">
            <div class="count">Audit Trail - Activity Log</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel" style="border-radius: 8px">
            <div class="x_title">
                <h2>Kriteria Pencarian</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <img src="<?php echo base_url('assets/img/xls.png')?>" style="width: 20px; margin-top: 3px; margin-right: 7px;" />
                    <span style="padding-top:5px;">Download .xls </span>
                    
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="daterange1">Date Range</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="daterange1" name="daterange1" required="required" class="form-control" style="border-radius: 6px" placeholder="DD/MM/YYYY - DD/MM/YYYY">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="npp">NPP</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="npp" name="npp" required="required" class="form-control" style="border-radius: 6px" placeholder="NPP">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="name" name="name" required="required" class="form-control" style="border-radius: 6px" placeholder="Nama">
                        </div>
                    </div>
                    <!-- <div class="ln_solid"></div> -->
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-primary" type="button" id="save">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel" style="border-radius: 8px">
            <div class="x_title">
                Activity Log
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="dataActivityLog" class="table table-striped table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NPP</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Fungsi</th>
                                        <th>Service</th>
                                        <th>Old Value</th>
                                        <th>New Value</th>
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