<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <!-- <div class="row" style="display: inline-block;" > -->
    <div class="tile_count">
        <div class="col-md-12 col-sm-12 tile_stats_count">
            <div class="count">Lead</div>
        </div>
    </div>
<!-- </div> -->

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel" style="border-radius: 8px">
            <div class="x_title">
                <h2>Kriteria Pencarian</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form id="search" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group">
                                <label for="produksumberdana" style="font-size: 0.9rem">Produk Sumber Dana</label>
                                <select style="border-radius: 6px; color: #495057;" id="produksumberdana" name="produksumberdana" class="form-control" >
                                    <option value="">Pilih Produk</option>
                                    <?php if(isset($product_list) && !empty($product_list)) : 
                                        foreach ($product_list as $prd) {
                                            $selected = isset($search['produk'])&&$search['produk']==$prd->product_id? 'selected':'';
                                            echo '<option value="'.$prd->product_id.'" '.$selected.'>'.$prd->product_name.'</option>';
                                        }
                                    endif; ?>
                                </select>
                            </div>                                        
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group">
                                <label for="namaprospek" style="font-size: 0.9rem">Nama Prospek</label>
                                <input type="text" style="border-radius: 6px; color: #495057 !important;" class="form-control" placeholder="Nama Prospek" id="namaprospek" name="namaprospek" value="<?php echo (isset($search['nama_prospek'])? $search['nama_prospek']:''); ?>">
                            </div>                                        
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group">
                                <label for="kategorinasabah" style="font-size: 0.9rem">Kategori Nasabah</label>
                                <select style="border-radius: 6px; color: #495057;" class="form-control" id="kategorinasabah" name="kategorinasabah">
                                    <option value="">Pilih Kategori Nasabah</option>
                                    <option value="1" <?php echo (isset($search['kategori_nasabah'])&&$search['kategori_nasabah']==1? 'selected':''); ?>>New</option>
                                    <option value="2" <?php echo (isset($search['kategori_nasabah'])&&$search['kategori_nasabah']==2? 'selected':''); ?>>Exist</option>
                                </select>
                            </div>                                        
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group">
                                <label for="jenisnasabah" style="font-size: 0.9rem">Jenis Nasabah</label>
                                <select style="border-radius: 6px; color: #495057;" id="jenisnasabah" name="jenisnasabah" class="form-control" >
                                    <option value="">Pilih Jenis Nasabah</option>
                                    <option value="1" <?php echo (isset($search['jenis_nasabah'])&&$search['jenis_nasabah']==1? 'selected':''); ?>>Perorangan</option>
                                    <option value="2" <?php echo (isset($search['jenis_nasabah'])&&$search['jenis_nasabah']==2? 'selected':''); ?>>Institusi</option>
                                </select>
                            </div>                                        
                        </div>
                        <div class="col-md-12 col-sm-12 text-right">
                            <div class="form-group">
                                <input style="border-radius: 6px" type="submit" class="btn btn-primary btn-sm" value="Cari">
                                <button style="border-radius: 6px" type="reset" class="btn btn-warning btn-sm" onclick="resetForm()">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12">
        <div class="x_panel" style="border-radius: 8px">
            <div class="x_title">
                <button style="border-radius: 6px" type="button" class="btn btn-primary btn-sm mb-1 mt-2"><i class="fa fa-plus-circle "></i><a style="color: white;" href="<?php echo site_url('lead/add') ?>">  New Data</a></button>   
                <!-- <button style="border-radius: 6px" type="button" class="btn btn-primary mb-1 mt-2"><i class="fa fa-plus-circle "></i><a style="color: white;" href="<?php echo site_url('lead/detail') ?>">  View Data</a></button>
                <button style="border-radius: 6px" type="button" class="btn btn-primary mb-1 mt-2"><i class="fa fa-plus-circle "></i><a style="color: white;" href="<?php echo site_url('lead/edit') ?>">  Edit Data</a></button> -->
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="width: 100%;">
                <div class="row">
                    <div class="col-sm-12">
                        <?php if (isset($error_message)): ?>
                            <p class="text-center" style="color: red;"><?php echo $error_message; ?></p>
                        <?php endif; ?>
                        <!-- <div class="card-box"> -->
                            <table id="dataLead" class="table table-striped table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Nasabah</th>
                                        <th>Potensi Dana</th>
                                        <th>Input Date</th>
                                        <th>FU Call</th>   
                                        <th>FU Meet</th>   
                                        <th>FU Close</th>   
                                        <!-- <th>Time</th> -->
                                        <th>Action</th>       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if(isset($lead_list) && !empty($lead_list)) : 
                                        $no = 1;
                                        foreach ($lead_list as $lead) {
                                            echo '<tr>';
                                            echo '<td width="3%">'.$no.'</td>';
                                            echo '<td width="15%"><a href="'.site_url('lead/detail/'.$lead->lead_id).'" title="View Detail" target="_blank">'.$lead->nama_prospek.'</a></td>';
                                            echo '<td>'.($lead->jenis_nasabah==1?'Perorangan':'Institusi').'</td>';
                                            echo '<td>'.number_format($lead->potensi_dana).'</td>';
                                            echo '<td width="11%">'.date('d-m-Y',strtotime($lead->created_date)).'</td>';
                                            echo '<td width="11%">'.(!is_null($lead->call_date)?date('d-m-Y',strtotime($lead->call_date)):'-').'</td>';
                                            echo '<td width="11%">'.(!is_null($lead->meet_date)?date('d-m-Y',strtotime($lead->meet_date)):'-').'</td>';
                                            echo '<td width="11%">'.(!is_null($lead->close_date)?date('d-m-Y',strtotime($lead->close_date)):'-').'</td>';
                                            // echo '<td>'.date('H:i:s',strtotime($lead->created_date)).'</td>';
                                            echo '<td class="text-center" width="12%">';
                                            if(is_null($lead->approval)) :
                                            // echo '<a class="btn btn-link btn-sm" href="'.site_url('lead/view/'.$lead->lead_id).'" title="View Detail"><i class="fa fa-eye"></i></a>';
                                            // echo '<a class="btn btn-link btn-sm" href="'.site_url('lead/edit/'.$lead->lead_id).'" title="Edit"><i class="fa fa-pencil"></i></a>';
                                            // echo '<a class="btn btn-link btn-sm" href="'.site_url('lead/approve/'.$lead->lead_id).'" title="Approve" onclick="return confirm(\'Apakah Anda Yakin?\')"><i class="fa fa-check"></i></a>';
                                            // echo '<div class="dropdown">';
                                            echo '<a class="btn btn-secondary dropdown-toggle btn-sm" href="#" role="button" id="dropdownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gear"></i></a>';
                                            echo '<div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="dropdownLink">';
                                            // echo '<a class="dropdown-item" href="'.site_url('lead/detail/'.$lead->lead_id).'" title="View Detail"><i class="fa fa-eye"></i> View</a>';
                                            echo '<a class="dropdown-item" href="'.site_url('lead/edit/'.$lead->lead_id).'" title="Edit"><i class="fa fa-pencil"></i> Edit</a>';
                                            echo '<a class="dropdown-item" href="'.site_url('lead/approve/'.$lead->lead_id).'" onclick="return confirm(\'Apakah Anda Yakin?\')" title="Approve"><i class="fa fa-lock"></i> Lock</a>';
                                            echo '<a class="dropdown-item" href="'.site_url('lead/approve/'.$lead->lead_id).'" onclick="return confirm(\'Apakah Anda Yakin?\')" title="Approve"><i class="fa fa-check"></i> Approve</a>';
                                            echo '</div>';
                                            echo '</div>';
                                            elseif($lead->approval==1) :
                                            echo '<i class="fa fa-check"></i> APPROVED';
                                            else :
                                            echo '<i class="fa fa-lock"></i> LOCKED';
                                            endif;
                                            echo '</td>';

                                            $no++;
                                        }
                                    endif;
                                    ?>
                                </tbody>
                            </table>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
					