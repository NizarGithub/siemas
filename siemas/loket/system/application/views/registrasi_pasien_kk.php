<?php $this->load->view('header');?>
<div id="subnav">
    <div class="container_12">
        <div class="grid_12">

        </div>
        <div style="clear: both;"></div>
    </div>
</div>
<!-- END SUBNAV -->
<br/>
<script type="text/javascript">
    $(document).ready(function(){
        $("#test").colorbox({initialHeight: "200px", initialWidth: "200px", width: "50%", height: "65%"})
    });
</script>

<div class="container_12">
    <div>
        <div class="grid_6" style="width: 48%">
            <div class="module">
                <h2><span>Kepala Keluarga (KK)</span></h2>
                <div class="module-body">
                    <table class="noborder" style="width: 100%">
                        <tbody>
                            <tr>
                                <td colspan="2"><strong>Profil KK</strong></td>
                            </tr>
                            <tr  class="odd">
                                <td>Nama KK</td>
                                <td><span style="color: #24cc57; font-weight: bold"><?php echo $kk[0]['nama_kk']?></span></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td><?php echo $kk[0]['jk_kk']?></td>
                            </tr>
                            <tr class="odd">
                                <td>Alamat</td>
                                <td><?php echo $kk[0]['alamat_kk'].",<br/>Kel. ".$kk[0]['kelurahan_kk']." Kec. ".$kk[0]['kecamatan_kk']."<br>".$kk[0]['kota_kab_kk']?></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>

                        </tbody>
                    </table>
                    <h4>Daftar Anggota Keluarga</h4>
                    <table>
                        <thead>
                            <tr>
                                <th style="width:2%">No</th>
                                <th style="width:10%">Nama Anggota</th>
                                <th style="width:10%">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach ($kk as $anggota) {
                                    if($i%2==0) $x="odd";
                                else $x ="even"; ?>
                            <tr class="<?php echo $x;?>">
                                <td align="center"><?php echo $i++; ?></td>
                                <td><a href="index.php/pasien/profil_pasien/<?php echo $anggota['id_kk'] ?>/<?php echo $anggota['id_pasien'] ?>" class="popup"><?php echo $anggota['nama_pasien'] ?></a></td>
                                <td><?php echo $anggota['status_dalam_keluarga'] ?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div class="grid_6" style="width: 48%">
            <div class="module">
                <h2><span>Anggota Keluarga</span></h2>

               <?php $this->load->view('form_daftar_pasien', array('status' => "kk_lama"));?>
            </div>


        </div>

    </div>
</div>
</body>
</html>
