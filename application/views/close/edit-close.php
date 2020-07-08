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
                <h2>Form Edit Data Close</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form id="formInputClose" method="POST" action="<?php echo site_url('close/saveData'); ?>" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <input type="hidden" name="lead_id" value="<?php echo $data->lead_id; ?>" />
                    <input type="hidden" name="call_id" value="<?php echo $data->call_id; ?>" />
                    <input type="hidden" name="meet_id" value="<?php echo $data->meet_id; ?>" />
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kategorinasabah">Kategori Nasabah</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select style="border-radius: 6px; color: #495057;" id="kategorinasabah" name="kategorinasabah" class="form-control" data-error=".errorTxt1" >
                                <option value="">Kategori Nasabah</option>
                                <option value="1" <?php echo ($data->kategori_nasabah==1?'selected':''); ?>>New</option>
                                <option value="2" <?php echo ($data->kategori_nasabah==2?'selected':''); ?>>Existing</option>
                            </select>
                            <div class="errorTxt1" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="namaprospect">Nama Prospect</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="namaprospects" name="namaprospect" class="form-control" style="border-radius: 6px" placeholder="Nama Prospect" data-error=".errorTxt2" value="<?php echo $data->nama_prospek; ?>" disabled>
                            <div class="errorTxt2" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="jenisnasabah">Jenis Nasabah</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select style="border-radius: 6px; color: #495057;" id="jenisnasabah" name="jenisnasabah" class="form-control" data-error=".errorTxt3" disabled >
                                <option value="">Pilih Jenis Nasabah</option>
                                <option value="1" <?php echo ($data->jenis_nasabah==1?'selected':''); ?>>Perorangan</option>
                                <option value="2" <?php echo ($data->jenis_nasabah==2?'selected':''); ?>>Institusi</option>
                            </select>
                            <div class="errorTxt3" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat">Alamat</label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea type="text" style="border-radius: 6px;" id="alamat" name="alamat" class="date-picker form-control" rows="3" data-error=".errorTxt4" disabled ><?php echo $data->alamat; ?></textarea>
                            <div class="errorTxt4" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="provinsi">Provinsi </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select style="border-radius: 6px; color: #495057;" id="provinsi" name="provinsi" class="form-control" data-error=".errorTxt5" disabled>
                                <option value="">Pilih Provinsi</option>
                                <?php if(isset($province_list) && !empty($province_list)) : 
                                    foreach ($province_list as $prv) {
                                        $selected = ($data->provinsi_id==$prv->id?'selected':'');
                                        echo '<option value="'.$prv->id.'" '.$selected.'>'.$prv->name.'</option>';
                                    }
                                endif; ?>
                            </select>
                            <div class="errorTxt5" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kota">Kota/Kabupaten</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select style="border-radius: 6px; color: #495057;" id="kota" name="kota" class="form-control" data-error=".errorTxt6" disabled>
                                <option value="">Pilih Kota/Kabupaten</option>
                                <?php if(isset($regency_list) && !empty($regency_list)) : 
                                    foreach ($regency_list as $rgc) {
                                        $selected = ($data->kota_kabupaten_id==$rgc->id?'selected':'');
                                        echo '<option value="'.$rgc->id.'" '.$selected.'>'.$rgc->name.'</option>';
                                    }
                                endif; ?>
                            </select>
                            <div class="errorTxt6" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kecamatan">Kecamatan</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select style="border-radius: 6px; color: #495057;" id="kecamatan" name="kecamatan" class="form-control" data-error=".errorTxt7" disabled>
                                <option value="">Pilih Kecamatan</option>
                                <?php if(isset($district_list) && !empty($district_list)) : 
                                    foreach ($district_list as $dst) {
                                        $selected = ($data->kecamatan_id==$dst->id?'selected':'');
                                        echo '<option value="'.$dst->id.'" '.$selected.'>'.$dst->name.'</option>';
                                    }
                                endif; ?>
                            </select>
                            <div class="errorTxt7" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kelurahan">Kelurahan</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select style="border-radius: 6px; color: #495057;" id="kelurahan" name="kelurahan" class="form-control" data-error=".errorTxt8" disabled>
                                <option value="">Pilih Kelurahan</option>
                                <?php if(isset($village_list) && !empty($village_list)) : 
                                    foreach ($village_list as $vlg) {
                                        $selected = ($data->kelurahan_id==$vlg->id?'selected':'');
                                        echo '<option value="'.$vlg->id.'" '.$selected.'>'.$vlg->name.'</option>';
                                    }
                                endif; ?>
                            </select>
                            <div class="errorTxt8" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="contactperson">Contact Person</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="contactperson" name="contactperson" class="form-control" style="border-radius: 6px" placeholder="Contact Person" data-error=".errorTxt9" value="<?php echo $data->kontak_person; ?>" disabled>
                            <div class="errorTxt9" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="contactnumber">Contact Number</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="contactnumber" name="contactnumber" class="form-control" style="border-radius: 6px" placeholder="Contact Number" data-error=".errorTxt10" value="<?php echo $data->no_kontak; ?>" disabled>
                            <div class="errorTxt10" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="accountnumber">No. Rekening</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="accountnumber" name="accountnumber" class="form-control" style="border-radius: 6px" placeholder="No. Rekening" data-error=".errorTxt11" value="<?php echo $data->no_rekening; ?>">
                            <div class="errorTxt11" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="potensidana">Potensi Dana Masuk</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="potensidana" name="potensidana" class="form-control" style="border-radius: 6px" placeholder="Rp." data-error=".errorTxt12" value="<?php echo $data->potensi_dana; ?>" disabled>
                            <div class="errorTxt12" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="realisasidana">Realisasi Dana Masuk</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="realisasidana" name="realisasidana" class="form-control" style="border-radius: 6px" placeholder="Rp." data-error=".errorTxt13" value="<?php echo $data->realisasi_dana; ?>">
                            <div class="errorTxt13" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="produksumberdana">Produk Sumber Dana</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select style="border-radius: 6px; color: #495057;" id="produksumberdana" name="produksumberdana" class="form-control" data-error=".errorTxt14" disabled>
                                <option value="">Pilih Produk</option>
                                <?php if(isset($product_list) && !empty($product_list)) : 
                                    foreach ($product_list as $prd) {
                                        $selected = ($data->produk==$prd->product_id?'selected':'');
                                        echo '<option value="'.$prd->product_id.'" '.$selected.'>'.$prd->product_name.'</option>';
                                    }
                                endif; ?>
                            </select>
                            <div class="errorTxt14" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="closing">Closing</label>
                        <div class="col-md-6 col-sm-6 ">
                            <div class="row">
                                <label class="col-form-label col-md-1 col-sm-1 label-align" for="dateclose" >Date</label>
                                <div class="col-md-5 col-sm-5">
                                    <input type="text" id="dateclose" name="dateclose" class="datepicker form-control" style="border-radius: 6px" data-error=".errorTxt15" placeholder="dd/mm/yyyy" value="<?php echo date('d/m/Y',strtotime($data->issued_date));?>">
                                </div>
                                <label class="col-form-label col-md-1 col-sm-1 label-align" for="timeclose">Time</label>
                                <div class="col-md-5 col-sm-5">
                                    <input type="text" id="timeclose" name="timeclose" class="timepicker form-control" style="border-radius: 6px" data-error=".errorTxt15" placeholder="HH:mm" value="<?php echo date('H:i:s',strtotime($data->issued_time));?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 ">
                                    <div class="errorTxt15" style="color:red"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="additionalinfo">Upload Attachment</label>
                        <div class="col-md-6 col-sm-6">
                            <div class="input-group">
                                <div>
                                    <input type="file" id="attach" name="attachment"/>
                                    <!-- <input type="file" class="custom-file-input" id="attach" onclick="attachment()">
                                    <label class="custom-file-label" for="attach" style="border-radius:6px"><span id="file-name"></span></label> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="attach_list"></label>
                        <div class="col-md-6 col-sm-6">
                            <table class="table nowrap">
                                <?php $i=1;
                                    $last_tx = '';
                                    foreach($trx_data as $trx) : 
                                    $last_tx = $trx->tx_id;
                                    $filesize = $trx->file_size*1024; 
                                    if($trx->file_name<>''){
                                        $file_anchor = '<a href="'.site_url('uploads'.$trx->file_name).'" target="_blank">'.ellipsize($trx->file_name,32,.5).'</a>';
                                    }else{
                                        $file_anchor = 'N/A';
                                    }
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $file_anchor; ?></td>
                                    <td><?php echo ($trx->file_size<>''?formatSizeUnits($filesize):'N/A'); ?></td>
                                    <td><?php echo $trx->created_date; ?></td>
                                </tr>
                                <?php $i++; endforeach; ?>
                            </table>    
                            <input type='hidden' name='tx_id' value="<?php echo $last_tx; ?>"/>     
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="meet_ke">Dari Meet ke-</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="meet_ke" name="meet_ke" class="form-control" style="border-radius: 6px" placeholder="Meet ke-" data-error=".errorTxt16" value="<?php echo $data->meet_attempt; ?>" disabled>
                            <div class="errorTxt16" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="call_ke">Dari Call ke-</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="call_ke" name="call_ke" class="form-control" style="border-radius: 6px" placeholder="Call ke-" data-error=".errorTxt17" value="<?php echo $data->call_attempt; ?>" disabled>
                            <div class="errorTxt17" style="color:red"></div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="additionalinfo">Additional Info </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea type="text" style="border-radius: 6px;" id="additionalinfo" name="additionalinfo" class="date-picker form-control" rows="3"><?php echo $data->additional_info; ?></textarea>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <a class="btn btn-secondary btn-sm" type="button" href="<?php echo site_url('close'); ?>" value="Cancel" id="btnCancel" form="formInputClose">Cancel</a>
                            <button class="btn btn-primary btn-sm" type="submit" name="save" value="save" id="btnSaveLead" form="formInputClose">Save</button>
                            <button class="btn btn-success btn-sm" type="submit" name="submit" value="submit" form="formInputClose">Submit</button>
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