<?php

include 'data.php';



header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type,Accept");

$x = file_get_contents("php://input");
$x = json_decode($x);
$rawmessage = trim(strtolower($x->text));
$message = explode('#', $rawmessage);

$msg_typ = $x->type;

$response = [['text' => '', 'type' => 'message']];

if ($message[0] == 'layanan') {
    $response = [['text' => 'Silahkan balas pesan ini dengan mengetikkan layanan yang anda inginkan' . PHP_EOL .
        '*- Pidana*' . PHP_EOL .
        '*- Perdata*'  . PHP_EOL .
        '*- Hukum*', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'pidana') {
    $response = [['text' => 'Silahkan ketik layanan pidana yang anda inginkan :' . PHP_EOL .
        '*- Pelimpahan_biasa*' . PHP_EOL .
        '*- Pelimpahan_tipiring*' . PHP_EOL .
        '*- Perpanjangan_penahanan*' . PHP_EOL .
        '*- Penetapan_diversi*' . PHP_EOL .
        '*- Sita_geledah*', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'pelimpahan_biasa') {
    $response = [['text' => 'Persyaratan pelimpahan berkas perkara pidana biasa adalah :' . PHP_EOL .
        '1. Surat Pengantar' . PHP_EOL .
        '2. Berkas Perkara Penyidik' . PHP_EOL .
        '3. Surat Dakwaan/Soft Copy Dakwaan ' . PHP_EOL .
        '4. Penetapan Penahanan' . PHP_EOL .
        '5. Barang Bukti beserta Surat Pelimpahan Barang Bukti dan  Soft Copy', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'pelimpahan_tipiring') {
    $response = [['text' => 'Persyaratan pelimpahan berkas perkara pidana biasa adalah :' . PHP_EOL .
        '1. Surat Pengantar' . PHP_EOL .
        '2. Berkas Perkara Penyidik' . PHP_EOL .
        '3. Surat Dakwaan/Soft Copy Dakwaan ' . PHP_EOL .
        '4. Barang Bukti' . PHP_EOL .
        '5. Saat persidangan menghadirkan minimal satu orang saksi', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'perpanjangan_penahanan') {
    $response = [['text' => 'Persyaratan permohonan perpanjangan penahanan adalah :' . PHP_EOL .
        '1. Surat Permohonan' . PHP_EOL .
        '2. Surat Perintah Penahanan' . PHP_EOL .
        '3. Berita Acara Penahanan ' . PHP_EOL .
        '4. Surat perpanjangan penahanan dari Kejaksaan' . PHP_EOL .
        'Juga dapat diakses melalui https://e-ptsp.pn-bangli.go.id atau https://sipinter.pn-bangli.go.id', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'penetapan_diversi') {
    $response = [['text' => 'Persyaratan permohonan penetapan diversi adalah :' . PHP_EOL .
        '1. Surat Permohonan' . PHP_EOL .
        '2. Laporan Polisis' . PHP_EOL .
        '3. Kesepakatan Diversi ' . PHP_EOL .
        '4. Berita Acara' . PHP_EOL .
        '5. Surat Perintah dimulainya penyidikan' . PHP_EOL .
        '6. Surat Perintah Penyidikan' . PHP_EOL .
        '7. Surat Tanda Terima' . PHP_EOL .
        '8. Resume' . PHP_EOL . 'Juga dapat diakses melalui https://e-ptsp.pn-bangli.go.id atau https://sipinter.pn-bangli.go.id', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'sita_geledah') {
    $response = [['text' => 'Persyaratan permohonan penetapan peyitaan/penggeledahan adalah :' . PHP_EOL .
        '1. Surat Pengantar' . PHP_EOL .
        '2.Surat Laporan Polisis' . PHP_EOL .
        '3. Surat Perintah Penyitaan/Penggeledahan ' . PHP_EOL .
        '4. Berita Acara Penyitaan atau Penggeledahan' . PHP_EOL .
        '5. Surat Perintah dimulainya penyidikan' . PHP_EOL .
        '6. Surat Perintah Penyidikan' . PHP_EOL .
        '7. Surat Tanda Penyitaan/Penggeledahan' . PHP_EOL .
        '8. Soft Copy BB' . PHP_EOL . 'Juga dapat diakses melalui https://e-ptsp.pn-bangli.go.id atau https://sipinter.pn-bangli.go.id', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'hukum') {
    $response = [['text' => 'Silahkan ketik layanan hukum yang anda inginkan :' . PHP_EOL .
        '*- Badan_hukum*' . PHP_EOL .
        '*- Surat_kuasa*' . PHP_EOL .
        '*- Waarmeking*' . PHP_EOL .
        '*- Kuasa_insidentil*' . PHP_EOL .
        '*- Ijin_penelitian*' . PHP_EOL .
        '*- Mediator*' . PHP_EOL .
        '*- Surat_keterangan*' . PHP_EOL .
        '*- Legalisir*' . PHP_EOL .
        '*- Salinan_putusan*' . PHP_EOL .
        '*- Informasi*' . PHP_EOL .
        '*- Pengaduan*', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'badan_hukum') {
    $response = [['text' => 'Persyaratan permohonan pendaftaran badan hukum adalah :' . PHP_EOL .
        '1. Asli dan fotokopi akta pendirian badan hukum' . PHP_EOL .
        '2. Fotokopi NPWP badan hukum' . PHP_EOL .
        '3. Fotokopi KTP Pengurus ' . PHP_EOL .
        '4. Materai Rp.10.000,-', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'surat_kuasa') {
    $response = [['text' => 'Persyaratan  pendaftaran surat kuasa khusus adalah :' . PHP_EOL .
        '1. Asli dan salinan surat kuasa khusus' . PHP_EOL .
        '2. Fotokopi kartu advokat' . PHP_EOL .
        '3. Fotokopi berita acara sumpah advokat ' . PHP_EOL .
        '4. Fotokopi KTP,-' . PHP_EOL .
        '5. Materai Rp.10.000,-', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'waarmeking') {
    $response = [['text' => 'Persyaratan  permohonan legalisasi akta dibawah tangan/waarmeking adalah :' . PHP_EOL .
        '1. Surat permohonan' . PHP_EOL .
        '2.Fotokopi masing-masing ahli waris' . PHP_EOL .
        '3. Fotokopi Kartu Keluarga ' . PHP_EOL .
        '4. Fotokopi buku tabungan atau objek waarmeking' . PHP_EOL .
        '5. Surat Keterangan Waris' . PHP_EOL .
        '6. Fotocopy Akta/Surat keterangan Kematian ' . PHP_EOL .
        '7. Fotokopi akta kelahiran masing-masing ahli waris' .   PHP_EOL .
        '8. Materai Rp.10.000,-', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'kuasa_insidentil') {
    $response = [['text' => 'Persyaratan  permohonan ijin kuasa insidentil adalah :' . PHP_EOL .
        '1. Surat permohonan' . PHP_EOL .
        '2. Surat Keterangan Kepala Desa' . PHP_EOL .
        '3. Fotocopy KTP pemberi kuasa' . PHP_EOL .
        '4. Fotokopi KTP penerima kuasa' .   PHP_EOL .
        '5. Materai Rp.10.000,-', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'ijin_penelitian') {
    $response = [['text' => 'Persyaratan  permohonan ijin penelitian adalah :' . PHP_EOL .
        '1. Surat permohonan' . PHP_EOL .
        '2. Fotocopy KTP' . PHP_EOL .
        '3. Surat pengantar universitas/instansi' .   PHP_EOL .
        '4. Proposal' . PHP_EOL .
        'Juga dapat diakses melalui https://e-ptsp.pn-bangli.go.id atau https://e-penelitian.ozavo.my.id', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'mediator') {
    $response = [['text' => 'Persyaratan  permohonan penempatan dalam daftar mediator adalah :' . PHP_EOL .
        '1. Salinan sah sertifikat mediator' . PHP_EOL .
        '2. Salinan sah ijazah terakhi' . PHP_EOL .
        '3. Pas foto berwarna 4x6 latar merah' .   PHP_EOL .
        '4. Daftar riwayat hidup (minimal memuat latar belakang pendidikan dan/atau pengalaman)' . PHP_EOL . 'Juga dapat diakses melalui https://e-ptsp.pn-bangli.go.id atau https://e-mediator.ozavo.my.id', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'surat_keterangan') {
    $response = [['text' => 'Persyaratan  permohonan surat keterangan dalam hal : ' . PHP_EOL .
        '_1.Tidak pernah sebagai terpidana_' . PHP_EOL .
        '_2.Tidak sedang dicabut hak pilihnya_' . PHP_EOL .
        '3._Dipidana karena kealpaan ringan atau alasan politik_' . PHP_EOL .
        '_4.Tidak memiliki tanggungan utang secara perorangan dan/atau secara badan hukum yang menjadi tanggung jawabnya yang merugikan keuangan negara_' . PHP_EOL . '  adalah :' . PHP_EOL .
        '1. Surat Permohonan' . PHP_EOL .
        '2. Fotokopi SKCK (dilegalisir)' . PHP_EOL .
        '3. Fotokopi KTP (Dilegalisir)' .   PHP_EOL .
        '4. Surat keterangan tidak pernah tersangkut perkara dan tidak pernah dicabut hak pilihnya dari Kantor Desa/Lurah' .   PHP_EOL .
        '5. Surat pernyataan tidak pernah terpidana dan tidak pernah dicabut hak pilihnya' . PHP_EOL . '6. Foto berwarna 4x6' . PHP_EOL .
        '7. PNBP Rp. 10.000,-' . PHP_EOL .
        'Juga dapat diakses melalui https://e-ptsp.pn-bangli.go.id atau https://eraterang.badilum.mahkamahgung.go.id', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'legalisir') {
    $response = [['text' => 'Persyaratan  untuk permohonan legalisir surat  adalah :' . PHP_EOL .
        '1. Surat Permohonan' . PHP_EOL .
        '2. Fotokopi KTP (Dilegalisir)' .   PHP_EOL .
        '3. Asli surat yang dilegalisir', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'salinan_putusan') {
    $response = [['text' => 'Persyaratan  untuk permohonan salinan putusan BHT  adalah :' . PHP_EOL .
        '1. Surat Permohonan' . PHP_EOL .
        '2. Fotokopi KTP ' .   PHP_EOL .
        '3. PNBP Rp 500,- dikalikan jml lembar dan PNBP Penyerahan sebesar Rp.10.000,-', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'informasi') {
    $response = [['text' => 'Permohonan informasi pada Pengadilan Negeri Bangli dapat diperoleh melalui website resmi Pengadilan Negeri bangli di https://pn-bangli.go.id atau dengan datang langsung ke meja informasi Pengadilan Negeri Bangli', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'pengaduan') {
    $response = [['text' => 'Masyarakat dapat melaporkan indikasi pelanggaran yang terjadi di lingkungan Pengadilan Negeri Bangli, namun bukan pengaduan terkait masalah perkara ke https://siwas.mahkamahagung.go.id', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'perdata') {
    $response = [['text' => 'Silahkan ketik layanan perdata yang anda inginkan :' . PHP_EOL .
        '*- Pengajuan_gugatan*' . PHP_EOL .
        '*- Pengajuan_permohonan*' . PHP_EOL .
        '*- Gugatan_sederhana*' . PHP_EOL .
        '*- Eksekusi*' . PHP_EOL .
        '*- Konsinyasi*', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'pengajuan_gugatan') {
    $response = [['text' => 'Persyaratan  untuk pengajuan gugatan  adalah :' . PHP_EOL .
        '1. Surat gugatan' . PHP_EOL .
        '2. Surat kuasa apabila dikuasakan ' .
        PHP_EOL . '3. KTP Kuasa (apabila dikuasakan Kuasa)' .   PHP_EOL .
        '3. Berita Acara Sumpah Advokat (apabila dikuasakan Kuasa)' . PHP_EOL .
        'Dan sekarang masyarakat dapat menggunakan ecourt untuk mendaftarkan perkara perdata di alamat https://ecourt.mahkamahagung.go.id', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'pengajuan_permohonan') {
    $response = [['text' => 'Persyaratan  untuk pengajuan permohonan  adalah :' . PHP_EOL .
        '1. Surat permohonan' . PHP_EOL .
        '2. Surat kuasa apabila dikuasakan ' .   PHP_EOL .
        '3. KTP Kuasa (apabila dikuasakan Kuasa)' .   PHP_EOL .
        '3. Berita Acara Sumpah Advokat (apabila dikuasakan Kuasa)' . PHP_EOL .
        'Dan sekarang masyarakat dapat menggunakan ecourt untuk mendaftarkan perkara perdata di alamat https://ecourt.mahkamahagung.go.id', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'gugatan_sederhana') {
    $response = [['text' => 'Persyaratan  untuk pengajuan gugatan sederhana  adalah :' . PHP_EOL .
        '1. Surat gugatan' . PHP_EOL .
        '2. Bukti surat yang telah dilegalisir di kantor pos' .    PHP_EOL .
        'Dan sekarang masyarakat dapat menggunakan ecourt untuk mendaftarkan perkara perdata di alamat https://ecourt.mahkamahagung.go.id', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'gugatan_sederhana') {
    $response = [['text' => 'Silahkan ketik jenis eksekusi :' . PHP_EOL .
        '*- Eksekusi_putusan*' . PHP_EOL .
        '*- Eksekusi_akta_perdamaian*' . PHP_EOL .
        '*- Eksekusi_serta_merta*' . PHP_EOL .
        '*- Eksekusi_provisi*' . PHP_EOL .
        '*- Eksekusi_lanjutan*' . PHP_EOL .
        '*- Eksekusi_lelang*' .    PHP_EOL .
        '*- Eksekusi_kep_umum*', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'eksekusi_putusan') {
    $response = [['text' => 'Persyaratan  untuk pengajuan eksekusi terhadap putusan pengadilan  adalah :' . PHP_EOL .
        '1. Permohonan' . PHP_EOL .
        '2. Surat kuasa khusus apabila dikuasakan' . PHP_EOL .
        '3. FC salinan putusan' . PHP_EOL .
        '4. Relaas pemberitahuan putusan' . PHP_EOL .
        '5. Surat pernyataan yang menyatakan bahwa obyek eksekusi tidak terkait perkara lain' . PHP_EOL .
        '6. Surat-surat lainnya yang dipandang perlu', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'eksekusi_akta_perdamaian') {
    $response = [['text' => 'Persyaratan  untuk pengajuan eksekusi terhadap akta perdamaian adalah : ' . PHP_EOL .
        '1. Permohonan' . PHP_EOL .
        '2. Surat kuasa khusus apabila dikuasakan' . PHP_EOL .
        '3. FC Akta perdamaian', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'eksekusi_serta_merta') {
    $response = [['text' => 'Persyaratan  untuk pengajuan eksekusi terhadap putusan serta merta  adalah :' . PHP_EOL .
        '1. Permohonan' . PHP_EOL .
        '2. Surat kuasa khusus apabila dikuasakan' . PHP_EOL .
        '3. FC salinan putusan serta merta' . PHP_EOL .
        '4. Fotokopi akta otentik' . PHP_EOL .
        '5. Jaminan/uang yang disimpan di bank', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'eksekusi_provisi') {
    $response = [['text' => 'Persyaratan  untuk pengajuan eksekusi terhadap putusan provisi  adalah :' . PHP_EOL .
        '1. Permohonan' . PHP_EOL .
        '2. Surat kuasa khusus apabila dikuasakan' . PHP_EOL .
        '3. FC salinan putusan provisi' . PHP_EOL .
        '4. Akta otentik' . PHP_EOL .
        '5. Jaminan pelaksanaan eksekusi provisi' . PHP_EOL .
        '6. Surat-surat lainnya yang dipandang perlu', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'eksekusi_lanjutan') {
    $response = [['text' => 'Persyaratan  untuk pengajuan eksekusi lanjutan  adalah :' . PHP_EOL .
        '1. Permohonan' . PHP_EOL .
        '2. Surat kuasa khusus apabila dikuasakan' . PHP_EOL .
        '3. FC BA Eksekusi pertama', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'eksekusi_lelang') {
    $response = [['text' => 'Persyaratan  untuk pengajuan eksekusi lelang adalah :' . PHP_EOL .
        '1. Permohonan' . PHP_EOL .
        '2. Surat kuasa khusus apabila dikuasakan' . PHP_EOL .
        '3. FC SHM (IMB bila ada)' . PHP_EOL .
        '4. Fotokopi sertifikat HT dan APHT' . PHP_EOL .
        '5. Fotokopi SKMHT' . PHP_EOL .
        '6. Fotokopi surat peringatan kepada debitur' . PHP_EOL .
        '7. Fotokopi pembukuan bank mengenai jml utang debitur' . PHP_EOL .
        '8. Fotokopi surat peringatan kepada debitur' . PHP_EOL .
        '9. Permohonan penunnjukan apraisal atau penilai publik atas aset' . PHP_EOL .
        '10. Surat-surat lainnya yang dipandang perlu', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'eksekusi_kep_umum') {
    $response = [['text' => 'Persyaratan  pengosongan tanah untuk kepentingan umum  adalah :' . PHP_EOL .
        '1. Permohonan' . PHP_EOL .
        '2. Surat penetapan konsinyasi' . PHP_EOL .
        '3. BA Konsinyasi' . PHP_EOL .
        '4. Dokumen obyek eksekusi' . PHP_EOL .
        '5. Surat pelepasa hak dari BPN' . PHP_EOL .
        '6. Surat-surat lainnya yang dipandang perlu', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'konsinyasi') {
    $response = [['text' => 'Persyaratan pencairan konsinyasi  adalah :' . PHP_EOL .
        '1. Permohonan' . PHP_EOL .
        '2. Surat kuasa khusus' . PHP_EOL .
        '3. FC Salinan penetapan KPN tentang uang konsinyasi' . PHP_EOL .
        '4. Surat pengantar dari ketua pelaksana pengadaan tanah' . PHP_EOL .
        '5. Surat-surat lainnya yang dipandang perlu', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'ecourt') {
    $response = [['text' => 'Ecourt Adalah layanan bagi Pengguna Terdaftar dan Pengguna Lain untuk Pendaftaran Perkara Secara Online, Mendapatkan Taksiran Panjar Biaya Perkara secara online, Pembayaran secara online, Pemanggilan yang dilakukan dengan saluran elektronik, dan Persidangan yang dilakukan secara Elektronik. Untuk memulai silahkan kunjungi https://ecourt.mahkamahagung.go.id', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'eraterang') {
    $response = [['text' => 'ERATERANG adalah layanan Permohonan Surat keterangan secara Elektronik yang dapat diakses oleh pemohon dimanapun ia berada (selama ada akses internet via HP/Gawai dan Komputer/PC). Untuk memulai silahkan kunjungi https://eraterang.badilum.mahkamahagung.go.id', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'survei') {
    $response = [['text' => 'Untuk mengevaluasi kinerja pelayanan pada *Pengadilan Negeri Bangli*, kami telah menyediakan sarana survei elektronik yang bisa Bapak/Ibu akses di  http://esurvey.badilum.mahkamahagung.go.id/index.php/pengadilan/099858', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'covid') {

    // persiapkan curl
    $ch = curl_init();

    // set url 
    curl_setopt($ch, CURLOPT_URL, "https://api.kawalcorona.com/indonesia/");

    // return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // $output contains the output string 
    $output = curl_exec($ch);

    // tutup curl 
    curl_close($ch);

    $data = json_decode($output, true);


    $response = [['text' => "Jml Positif : {$data[0]['positif']} \nJml sembuh : {$data[0]['sembuh']} \nJml meninggal : {$data[0]['meninggal']} ", 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'jadwal_sidang') {
    if (count($message) == 1) {
        $response = [['text' => 'Perintah salah', 'type' => 'message']];
        $response = json_encode($response);
        echo ($response);
        return;
    }
    $data = new Data;
    $tgl_sidang = $data->get_jadwal_sidang($message[1]);

    $response = [['text' => $tgl_sidang, 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'tilang') {

    if (count($message) == 1) {
        $response = [['text' => 'Perintah salah', 'type' => 'message']];
        $response = json_encode($response);
        echo ($response);
        return;
    }

    $data = new Data;
    $tilang = $data->get_tilang($message[1]);

    $response = [['text' => $tilang, 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'perkara') {


    $response = [['text' => 'Untuk mendapatkan salinan putusan yang bukan salinan resmi (SK-KMA 1-144/KMA/SK/I/2011) silahkan ketikkan : ' . PHP_EOL .
        '*Putusan#nomor perkara*. _Contoh : Putusan#123/Pdt.G/2021/PN Bli_' . PHP_EOL . PHP_EOL .
        'Untuk mengetahui rincian biaya perkara silahkan ketikkan : ' . PHP_EOL .
        '*Biaya#nomor perkara*. _Contoh : Biaya#123/Pdt.G/2021/PN Bli_' . PHP_EOL . PHP_EOL .
        'Untuk mengetahui jadwal sidang silahkan ketikkan : ' . PHP_EOL .
        '*Jadwal_sidang#nomor perkara*. _Contoh : Jadwal_sidang#123/Pdt.G/2021/PN Bli_' . PHP_EOL . PHP_EOL .
        'Untuk mengetahui informasi denda tilang silahkan ketikkan : ' . PHP_EOL .
        '*Tilang#nomor polisi*. _Contoh : Tilang#DK1234P (nomor polisi tanpa spasi)_', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'halo') {
    $response = [['text' => 'Halo sobat *PN Bangli*. Sekarang kami menyediakan beberapa informasi yang bisa Bapak/Ibu akses. Silahkan balas pesan ini dengan mengetik ' . PHP_EOL . PHP_EOL .
        '*- Perkara*' . PHP_EOL .
        '_Untuk salinan putusan (bukan salinan resmi), detail biaya perkara, informasi jadwal sidang dan tilang pada *Pengadilan Negeri Bangli*_' . PHP_EOL .
        PHP_EOL .
        '*- Layanan*' . PHP_EOL .
        '_Untuk informasi Pelayanan Terpadu Satu Pintu pada *Pengadilan Negeri Bangli*_' . PHP_EOL .
        PHP_EOL .
        '*- Ecourt*' . PHP_EOL .
        '_Untuk informasi berperkara secara elektronik pada *Pengadilan Negeri Bangli*_' . PHP_EOL .
        PHP_EOL .
        '*- Pengaduan*' . PHP_EOL .
        '_Untuk informasi mengenai tata cara pengaduan pada *Pengadilan Negeri Bangli*_' . PHP_EOL .
        PHP_EOL .
        '*- Survei*' . PHP_EOL .
        '_Untuk informasi mengenai survei elektronik pada *Pengadilan Negeri Bangli*_' . PHP_EOL .
        PHP_EOL .
        '*- Covid*' . PHP_EOL .
        '_Untuk informasi mengenai update jumlah Covid-19 di Indonesia_', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'monev_bas') {


    $data = new Data;
    $bas = $data->get_bas();

    $response = [['text' => $bas, 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
    // } elseif ($message[0] == 'monev_relas') {


    //     $data = new Data;
    //     $relas = $data->get_relas();


    //     $response = [['text' => $relas, 'type' => 'message']];
    //     $response = json_encode($response);
    //     echo ($response);
} elseif ($message[0] == 'monev_tahanan') {


    $data = new Data;
    $relas = $data->get_penahanan();
    $relas == "" ? $content = 'Data tidak ada' : $content = $relas;


    $response = [['text' => $content, 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'monev') {


    $response = [['text' => 'Silahkan ketik : ' . PHP_EOL .
        '*- Monev_bas*' . PHP_EOL .
        '_Untuk mencari perkara yang belum diupload berita acara sidang_' . PHP_EOL .
        // '*- Monev_relas*' . PHP_EOL .
        // '_Untuk mencari perkara yang belum diupload relas panggilan_' . PHP_EOL .
        '*- Monev_tahanan*' . PHP_EOL .
        '_Untuk mencari perkara yang masa tahanan habis kurang dari 10 hari_', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'monev') {


    $response = [['text' => 'Silahkan ketik : ' . PHP_EOL .
        '*- Monev_bas*' . PHP_EOL .
        '_Untuk mencari perkara yang belum diupload berita acara sidang_' . PHP_EOL .
        '*- Monev_relas*' . PHP_EOL .
        '_Untuk mencari perkara yang belum diupload relas panggilan_', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'putusan') {

    if (count($message) == 1) {
        $response = [['text' => 'Perintah salah', 'type' => 'message']];
        $response = json_encode($response);
        echo ($response);
        return;
    }

    $data = new Data;
    $putusan = $data->get_dirput_link($message[1]);

    $response = [['text' => $putusan, 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'dirput_hukum') {



    $data = new Data;
    $dirput = $data->get_dirput_dokumen();

    $response = [['text' => $dirput, 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} elseif ($message[0] == 'biaya') {

    if (count($message) == 1) {
        $response = [['text' => 'Perintah salah', 'type' => 'message']];
        $response = json_encode($response);
        echo ($response);
        return;
    }

    $data = new Data;
    $biaya = $data->get_biaya($message[1]);

    $response = [['text' => $biaya, 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
} else {
    $response = [['text' => 'Silahkan ketik _Halo_ untuk memulai', 'type' => 'message']];
    $response = json_encode($response);
    echo ($response);
}
