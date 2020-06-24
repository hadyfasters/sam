<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <!-- <div class="row" style="display: inline-block;" >
        <div class="tile_count">
            <div class="col-md-12 col-sm-12 tile_stats_count">
                <div class="count">Form Input Produk</div>
            </div>
        </div>
    </div> -->

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel" style="border-radius: 8px">
            <div class="x_title">
                <h2 class="font-weight-bold" style="font-size: 2em">Form Create Produk</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form id="formInputProduct" method="POST" action="<?php echo site_url('product/add_process'); ?>" data-parsley-validate class="form-horizontal form-label-left">
                    <!-- <input type="hidden" name="auth_token" value="<?php echo $auth_token; ?>"> -->
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="productname">Nama Produk</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="productname" name="productname" class="form-control" style="border-radius: 6px" placeholder="Nama Produk" data-error=".errorTxt1">
                            <div class="errorTxt1" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="productdesc">Deskripsi Produk</label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea name="productdesc" id="productdesc" rows="10" class="form-control" style="border-radius: 6px" data-error=".errorTxt2"></textarea>
                            <div class="errorTxt2" style="color:red"></div>
                        </div>
                    </div>
                    <div id="salesSelected"></div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <a class="btn btn-secondary" type="button" href="<?php echo site_url('product'); ?>" value="Cancel" id="btnCancel" form="formInputProduct">Cancel</a>
                            <button class="btn btn-success" type="submit" value="Submit" form="formInputProduct">Submit</button>
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