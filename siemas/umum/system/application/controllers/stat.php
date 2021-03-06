<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
class Stat extends Controller {
    function Stat() {
        parent::Controller();
        $this->load->model('stat_m','stat');
    }


    function index() {
        $data=array();
        $data['p'] = false;
        
        if($this->input->post('tgl_statistik')) {
            $tgl=format_tanggal_database($this->input->post('tgl_statistik'));
        }
        else {
            $tgl=date("Y-m-d");
        }

        $data['tgl']=$tgl;

        $wil1="pabaton";
        $stat1="Luar wilayah";
        $wil2="cibogor";
        $stat2="Luar kota";
        $umum=2;


        $umum_pab=$this->stat->get_kunjungan_umum_wil($wil1,$umum,$tgl);
        $umum_cib=$this->stat->get_kunjungan_umum_wil($wil2,$umum,$tgl);
        $umum_lw=$this->stat->get_kunjungan_umum_status($stat1,$umum,$tgl);
        $umum_lk=$this->stat->get_kunjungan_umum_status($stat2,$umum,$tgl);

        $tbc=$this->stat->get_kunjungan_umum_tbc($umum,$tgl);
        $diare=$this->stat->get_kunjungan_umum_diare($umum,$tgl);
        $ispa=$this->stat->get_kunjungan_umum_ispa($umum,$tgl);
        $umum=$this->stat->get_kunjungan_umum_m($umum,$tgl);

        $grafik=array(

        'umum_pab'=>$umum_pab,
        'umum_cib'=>$umum_cib,
        'umum_lw'=>$umum_lw,
        'umum_lk'=>$umum_lk,

        'tbc'=>$tbc,
        'diare'=>$diare,
        'ispa'=>$ispa,
        'umum'=>$umum,

        );

        $data['grafik']=$grafik;
        $this->load->view('stat_v', $data);
    }

}
?>
