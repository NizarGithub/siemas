<?php $this->load->view('header');

?>
<!-- SUBNAV -->
<?php $this->load->view('subnav_laporan');?>
<!-- END SUBNAV -->
<div style="font-size: 14px !important;padding: 4px; margin-left: 10px;"><a href="index.php/c_laporan">Laporan</a> > <a href="index.php/c_laporan/rekapitulasi_kunjungan">Kunjungan Harian</a> > <a href="index.php/kunjungan/kunjungan_harian_umum">Pasien Umum </a>> Rekapan</div>
<div>
    <div class="grid_6" style="width: 98%">
        <div class="module">
            <h2><span>Rekapitulasi Kunjungan: UMUM</span></h2>
            <div class="module-body">
                <div>
                    <form method="post" action="">
                    <table class="noborder" style="width: 100%">
                        <tr>
                            <td width="11%">Pilih Bulan/Tahun</td>
                            <td>:</td>
                            <td width="11%">
                                <?php $bulan = array('','Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agt','Sept','Okt','Nov','Des'); ?>
                                <select name="bulan_kunjungan" style="width: 100%">
                                    <?php for($i=1;$i<=12;$i++) {?>
                                    <option  value="<?php echo $i; ?>" <?php if($laporan[0]['bulan'] == $i) echo 'selected="selected"' ?>><?php echo $bulan[$i]; ?></option>
                                        <?php } ?>
                                </select>
                            </td>
                            <td width="11%">
                                <select name="tahun_kunjungan" style="width: 100%">
                                    <?php foreach($tahun as $thn) {?>
                                    <option value="<?php echo $thn['tahun'];?>" <?php if($laporan[0]['tahun'] == $thn) echo 'selected="selected"' ?>><?php echo $thn['tahun'];?></option>
                                        <?php }?>
                                </select>
                            </td>
                            <td width="7%">
                                <div align="right">
                                    <input type="submit" value="Pilih" class="submit-green" name="pilih">
                                </div>
                            </td>
                            <td align="right" width="67%">
                                <a href="index.php/c_laporan/rekap_umum_xls/<?php echo intval($laporan[0]['bulan'])."/".$laporan[0]['tahun']?>" class="submit-green xls-button" style="margin-left: 10px" title="Simpan sebagai file Excel">
                                    <img src="images/ms-excel.png" alt=""/>
                                    Simpan ke Excel
                                </a>
                            </td>
                        </tr>
                    </table>
                        
                    </form>
                    
                    <div style="font-size: 14px;"><a href="index.php/kunjungan/kunjungan_harian_umum">Daftar Nama Pasien</a></div>
                    
                    <hr/>
                </div>
                <?php $nama_bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember")

                        ?>
                <h3 align="center" class="style2">REKAPITULASI KUNJUNGAN PUSKESMAS BOGOR TENGAH</h3>
                <h3 align="center"><strong>BULAN: <?php echo $nama_bulan[intval($laporan[0]['bulan'])]." ".$laporan[0]['tahun']?></strong></h3>
                <br/>
                <table style="width: 101%" border="1">
                    <thead>
                    <tr>
                    <th width="2%" rowspan="2"><div align="center"><strong>Tgl</strong></div></th>
                    <th colspan="4"><div align="center"><strong>KUNJUNGAN LAMA</strong></div></th>
                    <th colspan="4"><div align="center"><strong>KUNJUNGAN BARU</strong></div></th>
                    <th colspan="4"><div align="center"><strong>KUNJUNGAN UMUM</strong></div></th>
                    <th colspan="4"><div align="center"><strong>KUNJUNGAN GIGI</strong></div></th>
                    <th colspan="4"><div align="center"><strong>KUNJUNGAN KIA</strong></div></th>
                    <th colspan="4"><div align="center"><strong>KUNJUNGAN KB</strong></div></th>
                  </tr>
                  <tr>
                    <th width="4%"><div align="center"><strong>Pab</strong></div></th>
                    <th width="4%"><div align="center"><strong>Cib</strong></div></th>
                    <th width="4%"><div align="center"><strong>LPKM</strong></div></th>
                    <th width="4%"><div align="center"><strong>LKota</strong></div></th>
                    <th width="4%"><div align="center"><strong>Pab</strong></div></th>
                    <th width="4%"><div align="center"><strong>Cib</strong></div></th>
                    <th width="4%"><div align="center"><strong>LPKM</strong></div></th>
                    <th width="4%"><div align="center"><strong>LKota</strong></div></th>
                    <th width="4%"><div align="center"><strong>Pab</strong></div></th>
                    <th width="4%"><div align="center"><strong>Cib</strong></div></th>
                    <th width="4%"><div align="center"><strong>LPKM</strong></div></th>
                    <th width="4%"><div align="center"><strong>LKota</strong></div></th>
                    <th width="4%"><div align="center"><strong>Pab</strong></div></th>
                    <th width="4%"><div align="center"><strong>Cib</strong></div></th>
                    <th width="4%"><div align="center"><strong>LPKM</strong></div></th>
                    <th width="4%"><div align="center"><strong>LKota</strong></div></th>
                    <th width="4%"><div align="center"><strong>Pab</strong></div></th>
                    <th width="4%"><div align="center"><strong>Cib</strong></div></th>
                    <th width="4%"><div align="center"><strong>LPKM</strong></div></th>
                    <th width="4%"><div align="center"><strong>LKota</strong></div></th>
                    <th width="4%"><div align="center"><strong>Pab</strong></div></th>
                    <th width="4%"><div align="center"><strong>Cib</strong></div></th>
                    <th width="4%"><div align="center"><strong>LPKM</strong></div></th>
                    <th width="4%"><div align="center"><strong>LKota</strong></div></th>
                  </tr>
              </thead>
                     <?php $lama_pab = 0; $lama_cib = 0; $lama_LW=0; $lama_LKot=0;
                           $baru_pab = 0; $baru_cib = 0; $baru_LW=0; $baru_LKot=0;
                           $umum_pab = 0; $umum_cib = 0; $umum_LW=0; $umum_LKot=0;
                           $gigi_pab = 0; $gigi_cib = 0; $gigi_LW=0; $gigi_LKot=0;
                           $kia_pab = 0; $kia_cib = 0; $kia_LW=0; $kia_LKot=0;
                           $kb_pab = 0; $kb_cib = 0; $kb_LW=0; $kb_LKot=0;
                          $i=1;foreach($laporan as $lap){

                                $lama_pab += $lap['lama_pab'];
                                $lama_cib += $lap['lama_cib'];
                                $lama_LW += $lap['lama_LW'];
                                $lama_LKot += $lap['lama_LKot'];

                                $baru_pab += $lap['baru_pab'];
                                $baru_cib += $lap['baru_cib'];
                                $baru_LW += $lap['baru_LW'];
                                $baru_LKot += $lap['baru_LKot'];

                                $umum_pab += $lap['umum_pab'];
                                $umum_cib += $lap['umum_cib'];
                                $umum_LW += $lap['umum_LW'];
                                $umum_LKot += $lap['umum_LKot'];

                                $gigi_pab += $lap['gigi_pab'];
                                $gigi_cib += $lap['gigi_cib'];
                                $gigi_LW += $lap['gigi_LW'];
                                $gigi_LKot += $lap['gigi_LKot'];

                                $kia_pab += $lap['kia_pab'];
                                $kia_cib += $lap['kia_cib'];
                                $kia_LW += $lap['kia_LW'];
                                $kia_LKot += $lap['kia_LKot'];

                                $kb_pab += $lap['kb_pab'];
                                $kb_cib += $lap['kb_cib'];
                                $kb_LW += $lap['kb_LW'];
                                $kb_LKot += $lap['kb_LKot'];


                      ?>
              <tr class="<?if($i%2==0) echo "odd"?>" align="center">
                       <td><b><?php echo $i++;?></b></td>
                    <td><?php echo $lap['lama_pab']?></td>
                    <td><?php echo $lap['lama_cib']?></td>
                    <td><?php echo $lap['lama_LW']?></td>
                    <td><?php echo $lap['lama_LKot']?></td>
                    <td><?php echo $lap['baru_pab']?></td>
                    <td><?php echo $lap['baru_cib']?></td>
                    <td><?php echo $lap['baru_LW']?></td>
                    <td><?php echo $lap['baru_LKot']?></td>
                    <td><?php echo $lap['umum_pab']?></td>
                    <td><?php echo $lap['umum_cib']?></td>
                    <td><?php echo $lap['umum_LW']?></td>
                    <td><?php echo $lap['umum_LKot']?></td>
                    <td><?php echo $lap['gigi_pab']?></td>
                    <td><?php echo $lap['gigi_cib']?></td>
                    <td><?php echo $lap['gigi_LW']?></td>
                    <td><?php echo $lap['gigi_LKot']?></td>
                    <td><?php echo $lap['kia_pab']?></td>
                    <td><?php echo $lap['kia_cib']?></td>
                    <td><?php echo $lap['kia_LW']?></td>
                    <td><?php echo $lap['kia_LKot']?></td>
                    <td><?php echo $lap['kb_pab']?></td>
                    <td><?php echo $lap['kb_cib']?></td>
                    <td><?php echo $lap['kb_LW']?></td>
                    <td><?php echo $lap['kb_LKot']?></td>
                  </tr>
                   
                 <?php }?>
                   <tr class="header">
                      <th><b>Jumlah</b></th>
                    <th><?php echo $lama_pab?></th>
                    <th><?php echo $lama_cib?></th>
                    <th><?php echo $lama_LW?></th>
                    <th><?php echo $lama_LKot?></th>
                    <th><?php echo $baru_pab?></th>
                    <th><?php echo $baru_cib?></th>
                    <th><?php echo $baru_LW?></th>
                    <th><?php echo $baru_LKot?></th>
                    <th><?php echo $umum_pab?></th>
                    <th><?php echo $umum_cib?></th>
                    <th><?php echo $umum_LW?></th>
                    <th><?php echo $umum_LKot?></th>
                    <th><?php echo $gigi_pab?></th>
                    <th><?php echo $gigi_cib?></th>
                    <th><?php echo $gigi_LW?></th>
                    <th><?php echo $gigi_LKot?></th>
                    <th><?php echo $kia_pab?></th>
                    <th><?php echo $kia_cib?></th>
                    <th><?php echo $kia_LW?></th>
                    <th><?php echo $kia_LKot?></th>
                    <th><?php echo $kb_pab?></th>
                    <th><?php echo $kb_cib?></th>
                    <th><?php echo $kb_LW?></th>
                    <th><?php echo $kb_LKot?></th>
                    
                  </tr>
                </table>
                <br/>
                
            </div>
        </div>
    </div>
</div>
