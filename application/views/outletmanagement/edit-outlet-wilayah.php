 page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <!-- <div class="row" style="display: inline-block;" >
        <div class="tile_count">
            <div class="col-md-12 col-sm-12 tile_stats_count">
                <div class="count">Form Edit Wilayah</div>
            </div>
        </div>
    </div> -->

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel" style="border-radius: 8px">
            <div class="x_title">
                <h2 class="font-weight-bold" style="font-size: 2em">Form Edit Wilayah</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php if (isset($error_message)): ?>
                    <p class="text-center" style="color: red;"><?php echo $error_message; ?></p>
                <?php endif; ?>
                <form id="formInputOutletWilayah" method="POST" action="<?php echo site_url('outlet/edit_process_wilayah'); ?>" data-parsley-validate class="form-horizontal form-label-left">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <!-- <input type="hidden" name="auth_token" value="<?php echo $auth_token; ?>"> -->
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kodewilayah">Kode Wilayah</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="kodewilayah" name="kodewilayah" class="form-control" style="border-radius: 6px" placeholder="Kode Wilayah" data-error=".errorTxt1" value="<?php echo $data->code; ?>">
                            <div class="errorTxt1" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="namawilayah">Nama Wilayah</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="namawilayah" name="namawilayah" class="form-control" style="border-radius: 6px" placeholder="Nama Wilayah" data-error=".errorTxt2" value="<?php echo $data->name; ?>">
                            <div class="errorTxt2" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="startdate">Start Date</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="startdate" name="startdate" class="form-control datepicker" style="border-radius: 6px" data-error=".errorTxt3" placeholder="dd/mm/yyyy" value="<?php echo date('d/m/Y',strtotime($data->start_date)); ?>">
                            <div class="errorTxt3" style="color:red"></div>
                        </div>
                    </div>
                    <!-- <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="enddate">End Date</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="enddate" name="enddate" class="form-control datepicker" style="border-radius: 6px" placeholder="dd/mm/yyyy" data-error=".errorTxt4" value="<?php echo date('d/m/Y',strtotime($data->end_date)); ?>">
                            <div class="errorTxt4" style="color:red"></div>
                        </div>
                    </div> -->
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="productdesc">Status Wilayah</label>
                        <div class="col-md-6 col-sm-6 ">
                            <div class="radio">
                                <label>
                                    <input type="radio" class="status" name="status" data-error=".errorTxt3" value="1" <?php echo ($data->status==1? 'checked' : '') ?>> Aktif
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" class="status" name="status" data-error=".errorTxt3" value="0" <?php echo ($data->status==0? 'checked' : '') ?>> Tidak Aktif
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