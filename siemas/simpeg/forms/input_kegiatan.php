<?php include 'list_pegawai.php'; ?>

<table width="100%" border="0">
    <tbody>
        <tr>
            <td>Pilih pegawai</td>
            <td>

                <select name="sel_pegawai">
                    <option value="0">-</option>
                    <?php for($j = 1; $j < count($pegawai); $j++) {

                        echo "<option>{$pegawai[$j]}</option>";

                    } ?>
                </select>
                
                <input type="button" value="Pilih"/>
            </td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td><input type="text" name="tanggal_kegiatan" maxlength="255" class="datepicker"/></td>
        </tr>
        <tr>
            <td>Lokasi</td>
            <td><input type="text" name="lokasi_kegiatan" maxlength="255"/></td>
        </tr>
        <tr>
            <td>Kegiatan</td>
            <td><textarea cols="30" rows="3" name="kegiatan"></textarea></td>
        </tr>
    </tbody>
</table>