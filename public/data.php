<?php

class Data
{
    // init db connection
    public $hostname = "localhost";
    public $username = "root";
    public $password = "";
    public $db = "sipp";

    public function __construct()
    {
        $this->mysqli =  new mysqli($this->hostname, $this->username, $this->password, $this->db);
    }
    // function to get data from database
    public function get_jadwal_sidang($nomor_perkara)
    {
        $query = "SELECT tanggal_sidang,agenda FROM perkara LEFT JOIN perkara_jadwal_sidang ON perkara.perkara_id=perkara_jadwal_sidang.perkara_id WHERE nomor_perkara LIKE '$nomor_perkara%'";

        $raw_data = $this->mysqli->query($query);

        $data_exist = $raw_data->num_rows;

        if ($data_exist == 0) {
            $msg = 'Data tidak ditemukan';
            return $msg;
        } else {

            $data = [];
            while ($row = $raw_data->fetch_assoc()) {
                $data[] = $row;
            }


            $tgl_sidang = [];
            foreach ($data as $d) {
                $tgl_sidang[] = date('d-m-Y', strtotime($d['tanggal_sidang'])) . ", agenda : " . $d['agenda'];
            }

            return $tgl_sidang = implode(PHP_EOL, $tgl_sidang);
        }
    }
    public function get_tilang($nomor_polisi)
    {
        $query = "SELECT amar_putusan FROM perkara_putusan LEFT JOIN perkara_lalulintas ON perkara_putusan.perkara_id=perkara_lalulintas.perkara_id WHERE nomor_polisi='$nomor_polisi'";

        $raw_data = $this->mysqli->query($query);

        $data_exist = $raw_data->num_rows;

        if ($data_exist == 0) {
            $msg = 'Data tidak ditemukan';
            return $msg;
        } else {

            $data = [];
            while ($row = $raw_data->fetch_assoc()) {
                $data[] = $row;
            }


            $amar = [];
            foreach ($data as $d) {
                $amar[] = $d['amar_putusan'];
            }

            $amar = explode('<br/>', $amar[0]);

            $amar = implode(' ', $amar);


            return $amar;
        }
    }
    public function get_bas()
    {
        $query = "SELECT nomor_perkara,tanggal_sidang,agenda,panitera_nama FROM perkara LEFT JOIN perkara_jadwal_sidang ON perkara.perkara_id=perkara_jadwal_sidang.perkara_id LEFT JOIN perkara_panitera_pn ON perkara.perkara_id=perkara_panitera_pn.perkara_id WHERE (alur_perkara_id=1 OR alur_perkara_id =2 OR alur_perkara_id=111 OR alur_perkara_id=112 OR alur_perkara_id=118 OR alur_perkara_id=119 OR alur_perkara_id=120 OR alur_perkara_id=121) AND (YEAR(tanggal_sidang)=YEAR(NOW()) AND tanggal_sidang<=CURDATE()-1 AND edoc_bas IS NULL) ORDER BY tanggal_sidang DESC";

        $raw_data = $this->mysqli->query($query);

        if ($raw_data->num_rows > 0) {
            $data = [];
            while ($row = $raw_data->fetch_assoc()) {
                $data[] = $row;
            }

            $data_bas = [];
            foreach ($data as $d) {
                $data_bas[] = 'No Perkara : ' . $d['nomor_perkara'] . ", tanggal sidang : " . $d['tanggal_sidang'] . ', agenda : ' . $d['agenda'] . ", pp : " . $d['panitera_nama'];
            }

            $data_bas = implode(PHP_EOL, $data_bas);
        } else {

            $data_bas = "Tidak ada data";
        }

        return $data_bas;
    }
    public function get_relas()
    {
        $query = "SELECT nomor_perkara,tanggal_sidang,agenda,jurusita_nama FROM perkara LEFT JOIN perkara_jadwal_sidang ON perkara.perkara_id=perkara_jadwal_sidang.perkara_id LEFT JOIN perkara_jurusita ON perkara.perkara_id=perkara_jurusita.perkara_id LEFT JOIN perkara_pelaksanaan_relaas ON perkara_jadwal_sidang.perkara_id=perkara_pelaksanaan_relaas.id WHERE (alur_perkara_id=1 OR alur_perkara_id =2 OR alur_perkara_id =8) AND (YEAR(tanggal_sidang)=YEAR(NOW()) AND ket_temu IS NULL AND (tahapan_terakhir_id = 10 OR tahapan_terakhir_id = 14  ) AND (dihadiri_oleh = 2)) ORDER BY tanggal_sidang DESC";

        $raw_data = $this->mysqli->query($query);
        if ($raw_data->num_rows > 0) {

            $data = [];
            while ($row = $raw_data->fetch_assoc()) {
                $data[] = $row;
            }

            $data_relas = [];
            foreach ($data as $d) {
                $data_relas[] = 'No Perkara : ' . $d['nomor_perkara'] . ", tanggal sidang : " . $d['tanggal_sidang'] . ', agenda : ' . $d['agenda'] . ", js : " . $d['jurusita_nama'];
            }

            $data_relas = implode(PHP_EOL, $data_relas);
        } else {
            $data_relas = "Tidak ada data";
        }
        return $data_relas;
    }
    public function get_dirput_link($nomor_perkara)
    {
        $query = "SELECT DISTINCT(nomor_perkara),tanggal_putusan,link_dirput FROM perkara LEFT JOIN perkara_putusan ON perkara.perkara_id=perkara_putusan.perkara_id LEFT JOIN dirput_dokumen ON perkara.perkara_id=dirput_dokumen.perkara_id WHERE nomor_perkara='$nomor_perkara' AND link_dirput IS NOT NULL ORDER BY tanggal_putusan DESC";

        $raw_data = $this->mysqli->query($query);
        if ($raw_data->num_rows > 0) {

            $data = [];
            while ($row = $raw_data->fetch_assoc()) {
                $data[] = $row;
            }

            $data_relas = [];
            foreach ($data as $d) {
                $data_relas[] = 'No Perkara : ' . $d['nomor_perkara'] . ", tanggal putusan : " . $d['tanggal_putusan'] . ', link : ' . $d['link_dirput'];
            }

            $data_bas = implode(PHP_EOL, $data_relas);
        } else {
            $data_bas = "Tidak ada data";
        }
        return $data_bas;
    }

    public function get_dirput_dokumen()
    {
        $query = "SELECT DISTINCT(nomor_perkara),tanggal_putusan,link_dirput,dokumen_ref_id
        FROM perkara
        LEFT JOIN perkara_putusan ON perkara.perkara_id=perkara_putusan.perkara_id
        LEFT JOIN dirput_dokumen ON perkara.perkara_id=dirput_dokumen.perkara_id
        WHERE (alur_perkara_id=1 OR alur_perkara_id =2 OR alur_perkara_id=8 OR alur_perkara_id=111 OR alur_perkara_id=112 OR alur_perkara_id=118 OR alur_perkara_id=119 OR alur_perkara_id=120 OR alur_perkara_id=121) AND (tanggal_putusan IS NOT NULL AND link_dirput IS NULL AND (dokumen_ref_id BETWEEN 88 AND 100) AND YEAR(tanggal_putusan)= YEAR(CURDATE()))
        ORDER BY tanggal_putusan DESC";

        $raw_data = $this->mysqli->query($query);
        if ($raw_data->num_rows > 0) {

            $data = [];
            while ($row = $raw_data->fetch_assoc()) {
                $data[] = $row;
            }

            $data_dirput_null = [];
            foreach ($data as $d) {
                $data_dirput_null[] = 'No Perkara : ' . $d['nomor_perkara'] . ", tanggal putusan : " . $d['tanggal_putusan'] . ', link : ' . $d['link_dirput'];
            }
            $jml = count($data_dirput_null);

            $data_bas = 'Jumlah : ' . $jml . PHP_EOL . implode(PHP_EOL, $data_dirput_null);
        } else {
            $data_bas = "Tidak ada data";
        }
        return $data_bas;
    }

    public function get_biaya($nomor_perkara)
    {
        $query_biaya_masuk = "SELECT nomor_perkara,jumlah,uraian FROM perkara LEFT JOIN perkara_biaya ON perkara.perkara_id=perkara_biaya.perkara_id WHERE nomor_perkara LIKE '$nomor_perkara%' AND jenis_transaksi=1";

        $query_biaya_keluar = "SELECT nomor_perkara,jumlah,uraian FROM perkara LEFT JOIN perkara_biaya ON perkara.perkara_id=perkara_biaya.perkara_id WHERE nomor_perkara LIKE '$nomor_perkara%' AND jenis_transaksi=-1";

        $raw_data_masuk = $this->mysqli->query($query_biaya_masuk);

        if ($raw_data_masuk->num_rows > 0) {

            $data_masuk = [];
            $array_jml_masuk = [];
            while ($row = $raw_data_masuk->fetch_assoc()) {
                $data_masuk[] = $row;
                $array_jml_masuk[] = $row['jumlah'];
            }

            $array_text_biaya_masuk = [];
            foreach ($data_masuk as $d) {
                $array_text_biaya_masuk[] = "- Uraian : " . $d['uraian'] . ', Jumlah : Rp.' . number_format($d['jumlah'], 0, ',', '.');
            }

            $text_biaya_masuk = '*Biaya masuk* :' . PHP_EOL . implode(PHP_EOL, $array_text_biaya_masuk);
            $jml_biaya_masuk = array_sum(($array_jml_masuk));
        } else {
            $text_biaya_masuk = "Tidak ada data";
        }



        $raw_data_keluar = $this->mysqli->query($query_biaya_keluar);
        if ($raw_data_keluar->num_rows > 0) {

            $data_keluar = [];
            $array_jml_keluar = [];
            while ($row = $raw_data_keluar->fetch_assoc()) {
                $data_keluar[] = $row;
                $array_jml_keluar[] = $row['jumlah'];
            }

            $array_text_biaya_keluar = [];
            foreach ($data_keluar as $d) {
                $array_text_biaya_keluar[] = "- Uraian : " . $d['uraian'] . ', Jumlah : Rp.' . number_format($d['jumlah'], 0, ',', '.');
            }

            $text_biaya_keluar = '*Biaya keluar* :' . PHP_EOL . implode(PHP_EOL, $array_text_biaya_keluar);
            $jml_biaya_keluar = array_sum(($array_jml_keluar));
        } else {
            $text_biaya_keluar = "Tidak ada data";
        }



        if ($raw_data_masuk->num_rows > 0 || $raw_data_keluar->num_rows > 0) {
            $sisa = ($jml_biaya_masuk - $jml_biaya_keluar);

            $saldo = '*Saldo* : Rp.' . (string) number_format($sisa, 0, ',', '.');

            $text_fix = $text_biaya_masuk . PHP_EOL . $text_biaya_keluar . PHP_EOL . $saldo;
        } else {
            $text_fix = 'Data tidak ditemukan';
        }

        return $text_fix;
    }

    public function get_penahanan()
    {
        $query = "SELECT DISTINCT(penahanan_terdakwa.perkara_id) FROM penahanan_terdakwa LEFT JOIN perkara ON penahanan_terdakwa.perkara_id = perkara.perkara_id  WHERE YEAR(sampai)='2021' AND tahapan_terakhir_id = 14 ORDER BY perkara_id DESC ";

        $raw_data = $this->mysqli->query($query);

        $data = [];
        while ($row = $raw_data->fetch_assoc()) {
            $data[] = $row;
        }

        $data_tgl_terakhir = [];

        foreach ($data as $row) {

            $id = $row['perkara_id'];
            $query2 = "SELECT perkara_id, MAX(jenis_penahanan_id) as max_id FROM penahanan_terdakwa WHERE perkara_id=$id LIMIT 1";

            $raw_data_2 = $this->mysqli->query($query2);
            $data_tgl_terakhir[] =   $raw_data_2->fetch_assoc();
        }

        $sampai = [];
        foreach ($data_tgl_terakhir as $t) {

            $pen_id = $t['max_id'];
            $perkara_id = $t['perkara_id'];
            $query2 = "SELECT nomor_perkara,penahanan_terdakwa.perkara_id, sampai FROM penahanan_terdakwa LEFT JOIN perkara ON penahanan_terdakwa.perkara_id=perkara.perkara_id WHERE  penahanan_terdakwa.perkara_id=$perkara_id AND jenis_penahanan_id=$pen_id ";

            $raw_data_3 = $this->mysqli->query($query2);
            $sampai[] =   $raw_data_3->fetch_assoc();
        }
        $fix = [];
        foreach ($sampai as $s) {

            if ((strtotime($s['sampai']) >= strtotime(date('Y-m-d'))) && (strtotime($s['sampai']) <= strtotime(date('Y-m-d', strtotime("+10 days"))))) {
                $fix[] = ['sampai' => $s['sampai'], 'perkara_id' => $s['perkara_id'], 'nomor_perkara' => $s['nomor_perkara']];
            }
        }
        $data_last = [];
        foreach ($fix as $f) {

            $data_last[] = 'Nomor perkara : ' . $f['nomor_perkara'] . ', ' . 'Tanggal penahanan terakhir : ' . $f['sampai'];
        }

        $text_last = implode(PHP_EOL, $data_last);

        return $text_last;
    }
}
