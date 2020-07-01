<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <!-- <div class="row" style="display: inline-block;" >
        <div class="tile_count">
            <div class="col-md-12 col-sm-12 tile_stats_count">
                <div class="count">Form Edit Outlet Cabang</div>
            </div>
        </div>
    </div> -->

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel" style="border-radius: 8px">
            <div class="x_title">
            <h2 class="font-weight-bold" style="font-size: 2em">Form Edit Outlet Cabang</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php if (isset($error_message)): ?>
                    <p class="text-center" style="color: red;"><?php echo $error_message; ?></p>
                <?php endif; ?>
                <form id="formInputOutletCabang" method="POST" action="<?php echo site_url('outlet/edit_process_cabang'); ?>" data-parsley-validate class="form-horizontal form-label-left">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <!-- <input type="hidden" name="auth_token" value="<?php echo $auth_token; ?>"> -->
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kodecabang">Kode Cabang</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="kodecabang" name="kodecabang" class="form-control" style="border-radius: 6px" placeholder="Kode Cabang" value="<?php echo $data->code; ?>" data-error=".errorTxt1">
                            <div class="errorTxt1" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="namacabang">Nama Cabang</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="namacabang" name="namacabang" class="form-control" style="border-radius: 6px" placeholder="Nama Cabang" value="<?php echo $data->name; ?>" data-error=".errorTxt2">
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
                                        $selected = '';
                                        if($reg->id_region==$data->id_region){
                                            $selected = 'selected';
                                        }
                                        echo '<option value="'.$reg->id_region.'" '.$selected.'>['.$reg->code.'] '.$reg->name.'</option>';
                                    }
                                endif; ?>
                            </select>
                            <div class="errorTxt4" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="startdate">Start Date</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="startdate" name="startdate" class="form-control datepicker" style="border-radius: 6px" data-error=".errorTxt5" placeholder="dd/mm/yyyy" value="<?php echo date_format(date_create(str_replace("/", "-", $data->start_date)),"d/m/Y"); ?>">
                            <div class="errorTxt5" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="enddate">End Date</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="enddate" name="enddate" class="form-control datepicker" style="border-radius: 6px" placeholder="dd/mm/yyyy" value="<?php echo (!is_null($data->end_date)?date_format(date_create(str_replace("/", "-", $data->end_date)),"d/m/Y"):''); ?>" data-error=".errorTxt6">
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






