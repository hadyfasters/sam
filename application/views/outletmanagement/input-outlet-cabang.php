<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <!-- <div class="row" style="display: inline-block;" >
        <div class="tile_count">
            <div class="col-md-12 col-sm-12 tile_stats_count">
                <div class="count">Form Create Outlet Cabang</div>
            </div>
        </div>
    </div> -->

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel" style="border-radius: 8px">
            <div class="x_title">
                <h2 class="font-weight-bold" style="font-size: 2em">Form Create Outlet Cabang</h2>
                <div class="clearfix"></div>
            </div>  
            <div class="x_content">
                <?php if (isset($error_message)): ?>
                    <p class="text-center" style="color: red;"><?php echo $error_message; ?></p>
                <?php endif; ?>
                <form id="formInputOutletCabang" method="POST" action="<?php echo site_url('outlet/add_process_cabang'); ?>" data-parsley-validate class="form-horizontal form-label-left">
                    <!-- <input type="hidden" name="auth_token" value="<?php echo $auth_token; ?>"> -->
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kodecabang">Kode Cabang</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="kodecabang" name="kodecabang" class="form-control" style="border-radius: 6px" placeholder="Kode Cabang" data-error=".errorTxt1">
                            <div class="errorTxt1" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="namacabang">Nama Cabang</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="namacabang" name="namacabang" class="form-control" style="border-radius: 6px" placeholder="Nama Cabang" data-error=".errorTxt2">
                            <div class="errorTxt2" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="wilayah">Wilayah</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select style="border-radius: 6px; color: #495057;" id="wilayah" name="wilayah" class="form-control" data-error=".errorTxt4">
                                <option value="">Pilih Wilayah</option>
                                <?php if(isset($region_list) && !empty($region_list)) : 
                                    foreach ($region_list as $reg) {
                                        echo '<option value="'.$reg->id_region.'">['.$reg->code.'] '.$reg->name.'</option>';
                                    }
                                endif; ?>
                            </select>
                            <div class="errorTxt4" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="startdate">Start Date</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="startdate" name="startdate" class="form-control" style="border-radius: 6px" data-error=".errorTxt5" placeholder="dd/mm/yyyy">
                            <div class="errorTxt5" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="enddate">End Date</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="enddate" name="enddate" class="form-control" style="border-radius: 6px" placeholder="dd/mm/yyyy" data-error=".errorTxt6">
                            <div class="errorTxt6" style="color:red"></div>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <a class="btn btn-secondary" href="<?php echo site_url('outlet/cabang'); ?>" value="Cancel" id="btnCancel" form="formInputOutletWilayah">Cancel</a>
                            <button class="btn btn-success" type="submit" value="Submit" form="formInputOutletCabang">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <!-- /top tiles -->
    <br />
</div>
<!-- /page content-->






