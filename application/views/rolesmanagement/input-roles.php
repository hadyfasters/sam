<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <!-- <div class="row" style="display: inline-block;" >
        <div class="tile_count">
            <div class="col-md-12 col-sm-12 tile_stats_count">
                <div class="count">Form Create User Position</div>
            </div>
        </div>
    </div> -->

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel" style="border-radius: 8px">
            <div class="x_title">
                <h2 class="font-weight-bold" style="font-size: 2em">Form Create User Position</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php if (isset($error_message)): ?>
                    <p class="text-center" style="color: red;"><?php echo $error_message; ?></p>
                <?php endif; ?>
                <form id="formInputUserPosition" method="POST" action="<?php echo site_url('userposition/add_process'); ?>" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="userposition">User</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="userposition" name="userposition_title" class="form-control" style="border-radius: 6px" placeholder="User Position" data-error=".errorTxt1">
                            <div class="errorTxt1" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="password" name="default_password" class="form-control" style="border-radius: 6px" placeholder="Default Password" data-error=".errorTxt2">
                            <div class="errorTxt2" style="color:red"></div>
                        </div>
                    </div>
                    <div id="salesSelected"></div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-secondary" type="button" value="Cancel" id="btnCancel" form="formInputUserPosition">Cancel</button>
                            <button class="btn btn-success" type="submit" value="Submit" form="formInputUserPosition">Submit</button>
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