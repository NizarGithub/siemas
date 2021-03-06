<?php

defined('THISPATH') or die('Can\'t access directly!');

class Controller_riwayat extends Panada {

    var $nama_bulan = array(
        "",
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    public function __construct() {
        parent::__construct();
        $this->obat = new Model_obat();
        $this->date = new Model_history();
        $this->session = new Library_session();
    }

    public function index() {
        $views['tanggal'] = date('d-m-Y');
        $views['page_title'] = 'History - Apotek';
        $views['jumlah_kadaluarsa'] = $this->obat->cek_kadaluarsa();
        $this->view_history($views);
    }

    public function isi_pemakaian($poli, $tanggal) {
        $views['tanggal'] = date('d-m-Y');
        $poli2 = str_replace("_", " ", $poli);
        $views['isi'] = $this->obat->history_isi_pemakaian($poli2, $tanggal);
        $views['jumlah_kadaluarsa'] = $this->obat->cek_kadaluarsa();
        $this->view_isi_history_pemakaian($views);
    }

    public function isi_resep($id_pasien, $tanggal) {
        $views['tanggal'] = date('d-m-Y');
        $views['nama_pasien'] = $this->date->nama_pasien($id_pasien);
        $views['isi'] = $this->obat->history_isi_resep($id_pasien, $tanggal);
        $views['jumlah_kadaluarsa'] = $this->obat->cek_kadaluarsa();
        $this->view_isi_history_resep($views);
    }

    public function lihat_isi_pemasukan($tanggal, $sbkk) {
        $tanggalr = $this->date->reverse($tanggal);
        $views['isi'] = $this->obat->history_isi_pemasukan($tanggalr, $sbkk);
        $this->view_isi_history_pemasukan($views);
    }

    public function pemakaian_obat() {
        $views['tanggal'] = date('d-m-Y');
        $this->date->cek_history_harian(date('Y-m-d'));
        $views['page_title'] = 'History Resep - Apotek';
        $views['jumlah_kadaluarsa'] = $this->obat->cek_kadaluarsa();
        $views['hasil'] = NULL;



        if ($_POST) {
            if (isset($_POST['bulan']) && isset($_POST['tahun'])) {
                $hasil = $this->obat->history_pemakaian_bt($_POST['bulan'], $_POST['tahun']);
                if ($hasil) {
                    $views['hasil2'] = $hasil;
                    $views['alert2'] = '<span class="notification n-success"
                        style="width:313px;-moz-border-radius: 10px;-moz-box-shadow: 1px 3px 10px #337733;">
                        Hasil pencarian pada bulan ' . $this->nama_bulan[intval($_POST['bulan'])] . ' tahun ' . $_POST['tahun'] . ' adalah :</span>';
                } else {
                    $views['alert2'] = '<span class="notification n-error" 
                        style="width:313px;-moz-border-radius: 10px;-moz-box-shadow: 1px 3px 10px #773333;">
                        Hasil pencarian pada bulan ' . $this->nama_bulan[intval($_POST['bulan'])] . ' tahun ' . $_POST['tahun'] . ' tidak ada.</span>';
                }
            }
            if (isset($_POST['tanggal'])) {
                $tanggal = $this->date->reverse($_POST['tanggal']);
                $hasil = $this->obat->history_pemakaian($tanggal);
                if (isset($hasil)) {
                    $views['hasil'] = $hasil;
                    $views['tanggal2'] = $tanggal;
                    $views['alert'] = 'Hasil pencarian pada tanggal ' . $_POST['tanggal'] . ' adalah :';
                } else {
                    $views['alert'] = '<span class="notification n-error"
                        style="width:313px;-moz-border-radius: 10px;-moz-box-shadow: 1px 3px 10px #773333;">
                        Hasil pencarian pada tanggal ' . $_POST['tanggal'] . ' tidak ada.</span>';
                }
            }
        }

        $this->view_history_pemakaian($views);
    }

    public function resep() {
        $views['tanggal'] = date('d-m-Y');
        $this->date->cek_history_harian(date('Y-m-d'));
        $views['page_title'] = 'History Resep - Apotek';
        $views['jumlah_kadaluarsa'] = $this->obat->cek_kadaluarsa();
        $views['hasil'] = NULL;
        if ($_POST) {
            if (isset($_POST['tanggal'])) {
                $tanggal = $this->date->reverse($_POST['tanggal']);
                $hasil = $this->obat->history_resep($tanggal);
                if (isset($hasil)) {
                    $views['hasil'] = $hasil;
                    $views['alert'] = 'Hasil pencarian pada tanggal ' . $_POST['tanggal'] . ' adalah :';
                } else {
                    $views['alert'] = '<span class="notification n-error"
                        style="width:757px;-moz-border-radius: 10px;-moz-box-shadow: 1px 3px 10px #773333;">
                        Hasil pencarian resep pada tanggal ' . $_POST['tanggal'] . ' tidak ada.</span>';
                }
            }
        }

        $this->view_history_resep($views);
    }

    public function tambah_obat() {
        $this->date->cek_history_harian(date('Y-m-d'));
        $views['page_title'] = 'History Pemasukan Obat - Apotek';
        $views['jumlah_kadaluarsa'] = $this->obat->cek_kadaluarsa();
        $views['tanggal'] = date('d-m-Y');
        $views['hasil'] = NULL;
        if ($_POST) {
            if (isset($_POST['bulan']) && isset($_POST['tahun'])) {
                $BT = $this->date->gabung2($_POST['bulan'], $_POST['tahun']);
                $hasil = $this->obat->history_bt($BT);
                if (isset($hasil[0]->no_sbkk)) {
                    $views['hasil'] = $hasil;
                    $views['alert'] = 'Hasil pencarian pada bulan ' . $this->nama_bulan[intval($_POST['bulan'])] . ' tahun ' . $_POST['tahun'] . ' adalah :';
                } else {
                    $views['alert'] = '<span class="notification n-error"
                        style="width:757px;-moz-border-radius: 10px;-moz-box-shadow: 1px 3px 10px #773333;">
                        Hasil pencarian pada bulan ' . $this->nama_bulan[$_POST['bulan']] . ' tahun ' . $_POST['tahun'] . ' tidak ada.</span>';
                }
            }
            if (isset($_POST['tanggal'])) {
                $tanggal = $_POST['tanggal'];
            }
        }
        $this->view_history_pemasukan($views);
    }

}
