<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row" style="display: inline-block;" >
    <div class="tile_count">
        <div class="col-md-12 col-sm-12 tile_stats_count">
            <div class="count">Call</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel" style="border-radius: 8px">
            <div class="x_title">
                <h2>View Data Call</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-bordered table-responsive-sm">
                    <tbody>
                        <tr class="text-right text-white">
                            <td colspan="2" class="<?php echo $data->approval_color; ?>">
                                <strong>
                                    <?php echo $data->approval_status.(!empty($data->approval_date)?' / '.$data->approval_date:'');?>
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right font-weight-bold" style="width: 30%">Kategori Nasabah</td>
                            <td class=""><?php echo ($data->kategori_nasabah==1?'New':'Exist');?></td>
                        </tr>
                        <tr>
                            <td class="text-right font-weight-bold" style="width: 30%">Nama Prospect</td>
                            <td><?php echo $data->nama_prospek; ?></td>
                        </tr>
                        <tr>
                            <td class="text-right font-weight-bold" style="width: 30%">Jenis Nasabah</td>
                            <td><?php echo ($data->jenis_nasabah==1?'Perorangan':'Institusi');?></td>
                        </tr>
                        <tr>
                            <td class="text-right font-weight-bold" style="width: 30%">Alamat</td>
                            <td><?php echo $data->alamat; ?></td>
                        </tr>
                        <tr>
                            <td class="text-right font-weight-bold" style="width: 30%">Provinsi</td>
                            <td><?php echo $data->provinsi; ?></td>
                        </tr>
                        <tr>
                            <td class="text-right font-weight-bold" style="width: 30%">Kota/Kabupaten</td>
                            <td><?php echo $data->kota_kabupaten; ?></td>
                        </tr>
                        <tr>
                            <td class="text-right font-weight-bold" style="width: 30%">Kecamatan</td>
                            <td><?php echo $data->kecamatan; ?></td>
                        </tr>
                        <tr>
                            <td class="text-right font-weight-bold" style="width: 30%">Kelurahan</td>
                            <td><?php echo $data->kelurahan; ?></td>
                        </tr>
                        <tr>
                            <td class="text-right font-weight-bold" style="width: 30%">Contact Person</td>
                            <td><?php echo ($data->kontak_person?$data->kontak_person:'-'); ?></td>
                        </tr>
                        <tr>
                            <td class="text-right font-weight-bold" style="width: 30%">Contact Number</td>
                            <td><?php echo $data->no_kontak; ?></td>
                        </tr>
                        <tr>
                            <td class="text-right font-weight-bold" style="width: 30%">Potensi Dana Masuk</td>
                            <td><?php echo number_format($data->potensi_dana); ?></td>
                        </tr>
                        <tr>
                            <td class="text-right font-weight-bold" style="width: 30%">Produk Sumber Dana</td>
                            <td><?php echo $data->product_name; ?></td>
                        </tr>
                        <tr>
                            <td class="text-right font-weight-bold" style="width: 30%">Call ke-</td>
                            <td>
                                <table class="table table-borderless" style="margin-top: -10px; margin-bottom: -7px">
                                    <tbody>
                                        <tr>
                                            <td><?php echo $data->attempt; ?></td>
                                            <td style="width: 30%"><strong>Tanggal: </strong><?php echo date('d/m/Y',strtotime($data->issued_date)); ?></td>
                                            <td style="width: 60%"><strong>Pukul: </strong><?php echo date('H:i',strtotime($data->issued_time)); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right font-weight-bold" style="width: 30%">Upload Attachment</td>
                            <td>
                                <table class="table table-borderless nowrap" style="margin-top: -10px; margin-bottom: -7px">
                                    <tbody>
                                        <?php $i=1;
                                            $last_tx = '';
                                            foreach($trx_data as $trx) : 
                                            $last_tx = $trx->tx_id;
                                            $filesize = $trx->file_size*1024; ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><a href="<?php echo site_url('uploads/'.$trx->file_name); ?>" target="_blank"><?php echo ellipsize($trx->file_name,32,.5); ?></a></td>
                                            <td><?php echo formatSizeUnits($filesize); ?></td>
                                            <td><?php echo $trx->created_date; ?></td>
                                        </tr>
                                        <?php $i++; endforeach; ?>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right font-weight-bold" style="width: 30%">Additional Info</td>
                            <td><?php echo ($data->additional_info?$data->additional_info:'-'); ?></td>
                        </tr>
                    </tbody>
                </table>
                <?php if($userdata['acl_approve'] && is_null($data->approval) || $data->approval==0) : ?>
                <form id="formApproveCall" method="POST" action="<?php echo site_url('call/approval'); ?>" data-parsley-validate class="form-horizontal form-label-left">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="item form-group">
                        <div class="col-md-12 col-sm-12 text-right">
                            <input class="btn btn-primary btn-sm" type="submit" name="reject" value="Reject" id="btnRejectCall" form="formApproveCall" onclick="return confirm('Apakah Anda Yakin?')" />
                            <input class="btn btn-success btn-sm" type="submit" name="approve" value="Approve" form="formApproveCall" onclick="return confirm('Apakah Anda Yakin?')" />
                        </div>
                    </div>
                </form>
                <?php else : ?>
                    <div class="item form-group">
                        <div class="col-md-12 col-sm-12 text-right">
                            <button class="btn btn-primary btn-sm" onclick="window.close()">Close</button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


    <!-- /top tiles -->
    <br />
</div>
<!-- /page content-->