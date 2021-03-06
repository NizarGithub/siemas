<br/>

<form id="pasien_lama" name="status_kartu" method="post" action="index.php/pasien/registrasi_pasien_lama/<?php echo $pasien[0]['id_pasien'] ?>">

<div class="grid_6" style="width: 98%">
    <div class="module">
        <h2><span>Profil Pasien</span></h2>
        <div class="module-body">
            <table class="noborder" style="width: 100% !important">
                <tr class="odd">
                    <td style="width: 22%">ID Pasien</td>
                    <td style="width: 78%"><?php echo $pasien[0]['kode_pasien'];?></td>
                </tr>
                <tr>
                    <td>Nama Kepala Keluarga</td>
                    <td><?php echo $pasien[0]['nama_kk'];?></td>
                </tr>
                <tr class="odd">
                    <td>Nama Pasien</td>
                    <td><span style="color: #2ba234; font-weight: bold"><?php echo $pasien[0]['nama_pasien'];?></span></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td><?php echo $pasien[0]['jk_pasien'];?></td>
                </tr>
                <tr class="odd">
                    <td>Umur</td>
                    <td><span style="color: #2ba234"><?php echo $pasien[0]['umur']." tahun";?></span></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><?php echo $pasien[0]['alamat_kk'].", Kel. ".$pasien[0]['kelurahan_kk']."<br/>Kec. ".$pasien[0]['kecamatan_kk'].", Kab/Kota ".$pasien[0]['kota_kab_kk']?></td>
                </tr>
                <tr class="odd">
                    <td>Status Pelayanan</td>
                    <td><?php echo $pasien[0]['status_pelayanan'];
                    if($this->uri->segment(2)== "registrasi_kunjungan"){
                        if($pasien[0]['status_pelayanan'] == 'Umum') {
                            ?>&nbsp;&nbsp;<input type="button" value="Ubah status" onclick="$('#status_baru').show(); $(this).hide()"></td>
                </tr>
                <tr id="status_baru" style="display: none">
                    <td>Status Baru</td>
                    <td><select name="status_pelayanan" onchange="if($(this).val() == 'Askes' || $(this).val() == 'Jamkesmas') $('#nomer_kartu').show(); else $('#nomer_kartu').hide()">
                                    <option value="">- Pilih -</option>
                                    <option value="Askes">Askes</option>
                                    <option value="Jamkesmas">Jamkesmas</option>
                                    <option value="Lain-lain">GR</option>
                        </select>
                    </td>
                </tr>
                <tr id="nomer_kartu" style="display: none">
                    <td>No.Kartu</td>
                    <td><input class="input-short" type="text" name="nomer_kartu"/></td>
                </tr>
                <?php }}?>
                <?php if(($pasien[0]['status_pelayanan'] == 'Askes')||($pasien[0]['status_pelayanan'] == 'Jamkesmas')){?>
                <tr>
                    <td>No. Kartu</td>
                    <td><?php echo $pasien[0]['no_kartu_layanan'];?></td>
                </tr>
                <?php }?>
                <?php if(isset($x)) {?>
                
                
                <tr class="odd">
                    <td>&nbsp;</td>
                    <td>
                        
                            <?php if(($pasien[0]['status_pelayanan'] == 'Askes')||($pasien[0]['status_pelayanan'] == 'Jamkesmas')){?>
                            <input type="radio" name="status_kartu" checked="checked"  value="Bawa" id="kartu_Y">
                            <label for="kartu_Y" style="display: inline !important" class="btn-gplus gplus-green">Bawa kartu</label>
                            &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="status_kartu"  value="Tidak" id="kartu_T">
                            <label for="kartu_T" style="display: inline !important" class="btn-gplus gplus-red">Tidak Bawa</label>
                            <?php }?>
                            <input type="hidden" id="poli" name="poli" value=""/>
                    </td>
                </tr>
                <?php }?>
            </table>
        </div>
    </div>
</div>

</form>
