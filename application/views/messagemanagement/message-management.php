<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row" style="display: inline-block;" >
    <div class="tile_count">
        <div class="col-md-12 col-sm-12 tile_stats_count">
            <div class="count">Menu Setting</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel" style="border-radius: 8px">
            <div class="x_title">
                <h2>Message After Login/Logout</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form id="formInputMsgCategory" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="form-group p-3">
                        <div class="row">
                            <div class="col-md-1 col-sm-1">
                                <label class="mt-2" for="msgCategory" style="width: 200%">Message</label>
                            </div>
                            <div class="col-md-11 col-sm-11 ">
                                <select style="border-radius: 6px; color: #495057;" id="msgCategory" name="msgCategory" class="form-control" data-error=".errorTxt1" >
                                    <option value="">Pilih..</option>
                                    <option value="login">Login</option>
                                    <option value="logout">Logout</option>
                                    <option value="hapus">Hapus</option>
                                    <option value="access">User Access</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>

                <form id="formInputMsgContent" data-parsley-validate class="form-horizontal">
                    <div class="form-group p-3">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <label for="msgContent" style="width: 200%">Masukkan Message</label>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <textarea class="form-control" id="msgContent" name="msgContent" rows="7" style="border-radius: 6px; width: 100%" data-error=".errorTxt2"></textarea>
                                <div class="errorTxt2" style="color:red"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 offset-md-12">
                                <button class="btn btn-success mt-3" type="submit" value="Submit" id="btnMsgContent" form="formInputMsgContent">Submit</button>
                            </div>
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