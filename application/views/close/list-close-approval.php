<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row" style="display: inline-block;" >
    <div class="tile_count">
        <div class="col-md-12 col-sm-12 tile_stats_count">
            <div class="count">Close</div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel" style="border-radius: 8px">
            <div class="x_title">
                <h2>Kriteria Pencarian</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form>
                    <div class="row">
                        <div class="col-md-2 col-sm-2">
                            <label for="inputPassword2" class="mt-2" style="font-size: 0.9rem">Produk Sumber Dana</label>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <select style="border-radius: 6px; color: #495057;" id="produksumberdana" name="produksumberdana" class="form-control" >
                                    <option value="">Pilih Rentang Waktu..</option>
                                    <option value="press">Year to Month</option>
                                    <option value="net">Year to Date</option>
                                </select>
                            </div>                                        
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <label for="inputPassword2" class="mt-2" style="font-size: 0.9rem">Nama Prospek</label>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <input type="text" style="border-radius: 6px; color: #495057 !important;" class="form-control" placeholder="Nama Prospek" id="namaprospek" name="namaprospek">
                            </div>                                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-sm-2">
                            <label for="inputPassword2" class="mt-2" style="font-size: 0.9rem">Kategori Nasabah</label>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <select style="border-radius: 6px; color: #495057;" class="form-control" id="kategorinasabah" name="kategorinasabah">
                                    <option value="">Pilih Kategori Nasabah..</option>
                                    <option value="press">Year to Month</option>
                                    <option value="net">Year to Date</option>
                                </select>
                            </div>                                        
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <label for="inputPassword2" class="mt-2" style="font-size: 0.9rem">Jenis Nasabah</label>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <select style="border-radius: 6px; color: #495057;" id="jenisnasabah" name="jenisnasabah" class="form-control" >
                                    <option value="">Pilih Jenis Nasabah..</option>
                                    <option value="press">Year to Month</option>
                                    <option value="net">Year to Date</option>
                                </select>
                            </div>                                        
                        </div>
                    </div class="justify-content-center">
                    <button style="border-radius: 6px" type="submit" id="search" name="search" class="btn btn-primary mb-1 mt-2">Cari</button>
                    <button style="border-radius: 6px" type="submit" id="empty" name="empty" class="btn btn-warning mb-1 mt-2">Kosongkan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel" style="border-radius: 8px">
            <div class="x_title">
                <button style="border-radius: 6px" type="submit" class="btn btn-primary mb-1 mt-2"><i class="fa fa-plus-circle "></i><a style="color: white;" href="<?php echo site_url('close_approve/detail') ?>"> View Data</a></button>  
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="dataApproveClose" class="table table-striped table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Sales</th>
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
                                        <th>Checklist</th>	  
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