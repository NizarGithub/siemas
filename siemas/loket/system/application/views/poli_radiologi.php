<script type="text/javascript">
    $(document).ready(function(){
        $(".popup").colorbox({initialHeight: "900px", initialWidth: "900px", width: "55%", height: "75%", onComplete: function(){
                $( "#datepicker" ).datepicker({
                    changeMonth: true,
                    changeYear: true
                });
            }
        });
    });
</script>

<div style="width: 100%">
                        <h4 align="right">Total Pasien: <?php echo count($antri_radio) ?> orang</h4>
                        <table style="width: 100%">
    <thead>
        <tr>
            <th class="header" style="width: 1%;">No</th>
            <th class="header" style="width: 10%;">Nama</th>
            <th class="header" style="width: 7%;">Alamat</th>
            <th class="header" style="width: 2%;">Pelayanan</th>
            <th class="header" style="width: 5%;">Status</th>
        </tr>
    </thead>
    <tbody>

        <?php $i=1;foreach($antri_radio as $radio){?>
        <tr class="<?php if($i%2==0) echo "odd";?>">
            <td class="align-center"><?php echo $i++?></td>
            <td><a style="font-size: 15px !important;" class="popup" href="index.php/pasien/profil_pasien/<?php echo $radio['id_kk']."/".$radio['id_pasien']?>"><?php echo $radio['nama']?></a>
                <br/>
                <small style="font-size: 10px; color: #777777; font-weight: normal"><?php echo $radio['jk_pasien'] . ', ' . $radio['umur'] . ' th'; ?></small>
            </td>
            <td><?php echo $radio['kelurahan_kk'];?></td>
            <td class="align-center"><?php echo $radio['status_pelayanan']?></td>
            <td class="align-center"><small style="font-size: 12px; color: #777777; font-weight: normal"><?php echo $radio['status']?></small></td>
        </tr>
            <?php }?>


    </tbody>
</table>
                      
                    </div>