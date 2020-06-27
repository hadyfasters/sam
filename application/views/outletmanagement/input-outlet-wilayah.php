 page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <!-- <div class="row" style="display: inline-block;" >
        <div class="tile_count">
            <div class="col-md-12 col-sm-12 tile_stats_count">
                <div class="count">Form Create Wilayah</div>
            </div>
        </div>
    </div> -->

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel" style="border-radius: 8px">
            <div class="x_title">
            <h2 class="font-weight-bold" style="font-size: 2em">Form Create Wilayah</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php if (isset($error_message)): ?>
                    <p class="text-center" style="color: red;"><?php echo $error_message; ?></p>
                <?php endif; ?>
                <form id="formInputOutletWilayah" method="POST" action="<?php echo site_url('outlet/add_process_wilayah'); ?>" data-parsley-validate class="form-horizontal form-label-left">
                    <!-- <input type="hidden" name="auth_token" value="<?php echo $auth_token; ?>"> -->
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kodewilayah">Kode Wilayah</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="kodewilayah" name="kodewilayah" class="form-control" style="border-radius: 6px" placeholder="Kode Wilayah" data-error=".errorTxt1">
                            <div class="errorTxt1" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="namawilayah">Nama Wilayah</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="namawilayah" name="namawilayah" class="form-control" style="border-radius: 6px" placeholder="Nama Wilayah" data-error=".errorTxt2">
                            <div class="errorTxt2" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="startdate">Start Date</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="startdate" name="startdate" class="form-control" style="border-radius: 6px" data-error=".errorTxt3" placeholder="dd/mm/yyyy">
                            <div class="errorTxt3" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="enddate">End Date</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="enddate" name="enddate" class="form-control" style="border-radius: 6px" placeholder="dd/mm/yyyy" data-error=".errorTxt4">
                            <div class="errorTxt4" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="productdesc">Status Produk</label>
                        <div class="col-md-6 col-sm-6 ">
                            <div class="radio">
                                <label>
                                    <input type="radio" class="statuswilayah" name="status" data-error=".errorTxt3" value="1"> Aktif
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" class="statuswilayah" name="status" data-error=".errorTxt3" value="0"> Tidak Aktif
                                </label>
                            </div>
                            <div class="errorTxt3" style="color:red"></div>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <a class="btn btn-secondary" href="<?php echo site_url('outlet/wilayah'); ?>" value="Cancel" id="btnCancel" form="formInputOutletWilayah">Cancel</a>
                            <button class="btn btn-success" type="submit" value="Submit" form="formInputOutletWilayah">Submit</button>
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
<!-- /page content