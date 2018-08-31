<?php // Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=lap$tgl1-$tgl2.xls");
?>
<table border="1">
    <thead>
    	<tr>
            <th colspan="17" style="font-family: arial;font-weight: bold;font-size: 14px;">Laporan Pengunjung Gunung Salak : <?php echo date('d/m/Y', strtotime($tgl1))." - ".date('d/m/Y', strtotime($tgl2));?></th>
        </tr>
        <tr>
			<th>No</th>
            <th>Tgl Masuk</th>
            <th >Node Reg</th>
            <th >Nama</th>
            <th >Tlp</th>
            <th >Masuk</th>
            <th >Keluar</th>
            <th >Alamat</th>
            <th >Email</th>
            <th >Metode Pembayaran</th>
            <th >Bank</th>
            <th >No Rekening</th>
            <th >Tgl Konfirmasi</th>          
            <th style="text-align: center">Daftar Pendaki</th>
            <th >Jml Pendaki</th>
            <th >Tarif</th>
            <th >Total Tagihan</th>
		</tr>	
    </thead>
    <tbody style="font-family: arial;">
        <?php $no=1; foreach ($laporan as $laporan): 
        $id = $laporan->id_reg; $pendaki = $this->Model_halimun->data_where('peserta','id_reg',$id); $jmlpendaki = count($pendaki); ?>
        <tr>
            <td><?php echo $no++;?></td>
            <td><?php echo $this->Model_halimun->konversi_hari($laporan->tgl_masuk,date('d-m-Y', strtotime($laporan->tgl_masuk)));?></td>
            <td><?php echo "ADV/REG/".$laporan->id_reg;?></td>
            <td><?php echo $laporan->nama_reg;?></td>
            <td><?php echo $laporan->tlp_reg;?></td>
            <td><?php echo $laporan->pintu_masuk;?></td>
            <td><?php echo $laporan->pintu_keluar;?></td>
            <td><?php echo $laporan->alamat_reg;?></td>
            <td><?php echo $laporan->email_reg;?></td>
            <td><?php echo $laporan->metode_pembayaran;?></td>
            <td><?php echo $laporan->nama_bank;?></td>
            <td><?php echo $laporan->no_rekening;?></td>
            <td><?php if($laporan->tgl_invoice=='0000-00-00 00:00:00'){ echo "";}else{ echo date('d-m-Y H:i',strtotime($laporan->tgl_invoice));}?></td>
            <td> 
                <table border="1">
                    <tr>
                       <th>Nama</th>
                       <th>TTL</th>
                       <th>JK</th>
                       <th>Pekerjaan</th>
                       <th>Alamat</th>
                       <th>Kartu Identitas</th>
                       <th>No Identitas</th>
                       <th>Tlp</th> 
                       <th>Tlp Rumah</th>
                    </tr>
                    <?php foreach ($pendaki as $pendaki): ?>
                    <tr>
                        <td><?php echo $pendaki->nama_peserta;?></td>
                        <td><?php echo $pendaki->ttl_peserta;?></td>
                        <td><?php echo $pendaki->jenis_kelamin;?></td>
                        <td><?php echo $pendaki->pekerjaan_peserta;?></td>
                        <td><?php echo $pendaki->alamat_peserta.', '.$pendaki->kota.', '.$pendaki->provinsi;?></td>
                        <td><?php echo $pendaki->kartu_identitas;?></td>
                        <td><?php echo $pendaki->no_identitas;?></td>
                        <td><?php echo $pendaki->tlp_peserta;?></td>
                        <td><?php echo $pendaki->tlp_rumah;?></td>
                    </tr>
                    <?php endforeach;?> 
                </table>
            </td>
            <td><?php echo $laporan->jml_peserta;?></td>
            <td><?php echo $laporan->tarif_per_orang;?></td>
            <td><?php echo $laporan->jml_peserta*$laporan->tarif_per_orang;?></td>
        </tr>
        <?php endforeach;?>         
    </tbody>
    <tfoot>
    	<tr>
            <th colspan="14" style="font-family: arial;font-weight: bold;font-size: 14px;">Total</th>
            <th style="font-family: arial;font-weight: bold;font-size: 14px;text-align:right"><?php echo $total->tot_pengunjung;?></th>
            <th colspan="2" style="font-family: arial;font-weight: bold;font-size: 14px;"><?php echo $total->tot_uang;?></th>
        </tr>
    </tfoot>
</table>
                        