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
                            Laporan Pemasukan Barang
                            <address>
                                <br>
                                <strong>PT Akurat Intan Madya</strong><br>
                                Jl. Gajah Mada, RT.2/RW.8, Petojo Utara, Kecamatan Gambir.<br>
                                Kel. Petojo Utara, Kecamatan Gambir, Kota Jakarta Pusat<br>
                                Phone: 021-6337715
                            </address>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 table-responsive">
                                <table class="table table-striped">
                                    <thead style="background-color: #9ee">
                                        <th>No</th>
                                        <th>No. Faktur</th>
                                        <th>Kode Beli</th>
                                        <th>Tanggal Input</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jenis Barang</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                        <th>Data Entry</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=0;
                                        foreach ($data->result_array() as $i){
                                            $no++;
                                            $No_Faktur=$i['No_Faktur'];
                                            $Kode_Beli=$i['Kode_Transaksi'];
                                            $Tanggal_Inputan=$i['Tanggal_Inputan'];
                                            $Kode_Barang=$i['Kode_Barang'];
                                            $Nama_Barang=$i['Nama_Barang'];
                                            $Jenis_Barang=$i['Jenis_Barang'];
                                            $Harga_Beli=$i['Harga_Beli'];
                                            $Harga_Jual=$i['Harga_Jual'];
                                            $Jumlah=$i['Jumlah'];
                                            $Total=$i['Total'];
                                            $Data_Entry=$i['Data_Entry'];
                                            ?>
                                        <tr>
                                            <td><?=$no;?></td>
                                            <td><?=$No_Faktur;?></td>
                                            <td><?=$Kode_Beli;?></td>
                                            <td><?=$Tanggal_Inputan;?></td>
                                            <td><?=$Kode_Barang;?></td>
                                            <td><?=$Nama_Barang;?></td>
                                            <td><?=$Jenis_Barang;?></td>
                                            <td><?=number_format($Harga_Beli);?></td>
                                            <td><?=number_format($Harga_Jual);?></td>
                                            <td><?=$Jumlah;?></td>
                                            <td><?=number_format($Total);?></td>
                                            <td><?=$Data_Entry;?></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <p>
                </div>
            </div>
        </div>        
    </div>
</body>