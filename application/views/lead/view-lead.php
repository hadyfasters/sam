				<!-- page content -->
				<div class="right_col" role="main">
					<!-- top tiles -->
                    <div class="row" style="display: inline-block;" >
                    <div class="tile_count">
                        <div class="col-md-12 col-sm-12 tile_stats_count">
                            <div class="count">Lead</div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="x_panel" style="border-radius: 8px">
                            <div class="x_title">
                                <h2>View Data Lead</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table table-bordered table-responsive-sm">
                                    <tbody>
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
                                            <td><?php echo $data->kontak_person; ?></td>
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
                                            <td class="text-right font-weight-bold" style="width: 30%">Additional Info</td>
                                            <td><?php echo $data->additional_info; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-right font-weight-bold" style="width: 30%">Data Input</td>
                                            <td>
                                                <table class="table table-borderless" style="margin-top: -10px; margin-bottom: -7px; margin-left: -10px">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 30%"><strong>Tanggal: </strong><?php echo date('d/m/Y',strtotime($data->created_date)); ?></td>
                                                            <td style="width: 60%"><strong>Pukul: </strong><?php echo date('H:i:s',strtotime($data->created_date)); ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                
					<!-- /top tiles -->
					<br />
				</div>
				<!-- /page content-->