<?php $this->view_header(); ?>

<!-- Header. Main part -->

<div id="header-main">
    <div class="container_12">
        <div class="grid_12">
            <ul id="nav">
                <li><a href="<?php echo $this->base_url ?>index.php/Beranda">Beranda</a></li>
                <li id="current"><a href="<?php echo $this->base_url ?>index.php/riwayat">Riwayat</a></li>
                <li><a href="<?php echo $this->base_url ?>index.php/obat">Obat</a></li>
                <li><a href="<?php echo $this->base_url ?>index.php/kadaluarsa">Kadaluarsa
                        <?php if ($jumlah_kadaluarsa > 0) {
 ?>
                            <div style="display: inline-block; padding: 0px 3px !important; background: red; color: white; font-weight: bold; margin-left: 5px; -moz-border-radius: 5px">
<?php echo $jumlah_kadaluarsa ?>
                        </div>
<?php } ?>
                    </a></li>
                <li><a href="<?php echo $this->base_url ?>index.php/statistik">Statistik</a></li>
            </ul>
            <div class="iconMenu">
                <a href="<?php echo $this->base_url ?>index.php/resep">
                    <img src="<?php echo $this->base_url ?>Template_files/images/resep.png" alt="member" width="50px" height="50px"/></a>
                <span><a href="<?php echo $this->base_url ?>index.php/resep">
						Resep</a></span>
            </div>
            <div class="iconMenu">
                <a href="<?php echo $this->base_url ?>index.php/tambah_obat">
                    <img src="<?php echo $this->base_url ?>Template_files/images/tambah_obat.png" alt="member" width="50px" height="50px"/></a>
                <span><a href="<?php echo $this->base_url ?>index.php/tambah_obat">
						Tambah Obat</a></span>
            </div>
            <div class="iconMenu">
                <a href="<?php echo $this->base_url ?>index.php/laporan">
                    <img src="<?php echo $this->base_url ?>Template_files/images/laporan.png" alt="member" width="50px" height="50px"/></a>
                <span><a href="<?php echo $this->base_url ?>index.php/laporan">
						Laporan</a></span>
            </div>
        </div><!-- End. .grid_12-->

        <div style="clear: both;"></div>

    </div><!-- End. .container_12 -->
</div> <!-- End #header-main -->
<style>
    .kotak {
        width: 250px;
        padding: 8px;
        display: inline-block;
        margin: 15px;
        -moz-border-radius: 10px;
        -moz-box-shadow: 1px 3px 10px #666666;
        text-decoration: none;
        background: -moz-linear-gradient(top, #FFFFFF, #EEEEEE);
        font-size: 15px;
    }
    .kotak:hover {
        background: -moz-linear-gradient(top, #FFFFFF, #DDDDDD);
        color: #0063BE;
    }
</style>
<div style="clear: both;"></div>