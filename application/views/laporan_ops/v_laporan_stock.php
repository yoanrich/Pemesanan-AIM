<body onload="window.print();">
    <div class="row">
        <div class="col-md-16">
            <div class="card card-info" >
            <div class="card-header" >
                    <h3 class="card-title">List</h3>
                </div>
                    <div class="card-body">
                        <?php
                            $b=$data->row_array();
                        ?>
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                            <div class="col-md-12 invoice-col">
                            Laporan Stock Barang
                            <address>
                                <br>
                                <strong>PT Akurat Intan Madya</strong><br>
                                Jl. Gajah Mada, RT.2/RW.8, Petojo Utara, Kecamatan Gambir.<br>
                                Kel. Petojo Utara, Kecamatan Gambir, Kota Jakarta Pusat<br>
                                Phone: 021-6337715
                            </address>
                            </div>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 table-responsive">
                                <table class="table table-striped">
                                    <thead style="background-color: #9ee">
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jenis Barang</th>
                                        <th>Jumlah</th>
                                        <th>Harga Pokok</th>
                                        <th>Harga Jual</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=0;
                                        foreach ($data->result_array() as $i){
                                            $no++;
                                            $kode_barang=$i['id_barang'];
                                            $nabar=$i['nama_barang'];
                                            $jns=$i['jenis_barang'];
                                            $jumlah=$i['jml_barang'];
                                            $harbel=$i['harga_beli'];
                                            $harjul=$i['harga_jual'];
                                            ?>
                                        <tr>
                                            <td><?=$no;?></td>
                                            <td><?=$kode_barang;?></td>
                                            <td><?=$nabar;?></td>
                                            <td><?=$jns;?></td>
                                            <td><?=$jumlah;?></td>
                                            <td><?=number_format($harbel);?></td>
                                            <td><?=number_format($harjul);?></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</body>