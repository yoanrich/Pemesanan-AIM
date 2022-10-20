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
                            Laporan Penjualan Barang
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
                                        <th>Kode Transaksi</th>
                                        <th>Tanggal</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jenis Barang</th>
                                        <th>Harga Satuan</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Customer</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=0;
                                        foreach ($data->result_array() as $i){
                                            $no++;
                                            $Kode_Transaksi=$i['Kode_Transaksi'];
                                            $Tanggal=$i['Tanggal'];
                                            $Kode_Barang=$i['Kode_Barang'];
                                            $Nama_Barang=$i['Nama_Barang'];
                                            $Jenis_Barang=$i['Jenis_Barang'];
                                            $Harga=$i['Harga'];
                                            $Jumlah=$i['Jumlah'];
                                            $Total=$i['Total'];
                                            $Status=$i['Status'];
                                            $Customer=$i['Customer'];
                                            ?>
                                        <tr>
                                            <td><?=$no;?></td>
                                            <td><?=$Kode_Transaksi;?></td>
                                            <td><?=$Tanggal;?></td>
                                            <td><?=$Kode_Barang;?></td>
                                            <td><?=$Nama_Barang;?></td>
                                            <td><?=$Jenis_Barang;?></td>
                                            <td><?=number_format($Harga);?></td>
                                            <td><?=$Jumlah;?></td>
                                            <td><?=number_format($Total);?></td>
                                            <td><?=$Status;?></td>
                                            <td><?=$Customer;?></td>
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