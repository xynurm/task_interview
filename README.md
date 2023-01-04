<?php
class Kendaraan {
  public $kecepatan;
  public $jenisRoda;
  public $tenagaPendorong;
  public $jumlahPenumpang;
}

class jenisKendaraan extends Kendaraan {
  public $jenisKendaraan;
}

class Mobil extends jenisKendaraan {
  public function __construct($kecepatan, $jenisRoda, $tenagaPendorong, $jumlahPenumpang) {
    $this->kecepatan = $kecepatan;
    $this->jenisRoda = $jenisRoda;
    $this->tenagaPendorong = $tenagaPendorong;
    $this->jumlahPenumpang = $jumlahPenumpang;
    $this->jenisKendaraan = "mobil";
  }
}

class Motor extends jenisKendaraan {
  public function __construct($kecepatan, $jenisRoda, $tenagaPendorong, $jumlahPenumpang) {
    $this->kecepatan = $kecepatan;
    $this->jenisRoda = $jenisRoda;
    $this->tenagaPendorong = $tenagaPendorong;
    $this->jumlahPenumpang = $jumlahPenumpang;
    $this->jenisKendaraan = "motor";
  }
}
?>


3. Query Mysql
1. SELECT pasien.nama, CASE pasien.sex   WHEN 'M' THEN 'Male' WHEN 'F' THEN 'Female' ELSE 'Other' END AS jenis_kelamin FROM pasien INNER JOIN kunjungan ON kunjungan.id_pasien=pasien.id_pasien;
2. SELECT 
    CASE sex
        WHEN 'L' THEN 'Laki-laki'
        WHEN 'P' THEN 'Perempuan'
        ELSE 'Other'
    END AS jenis_kelamin,
    COUNT(*) as jumlah
FROM pasien
GROUP BY sex;
3. SELECT p.nama, COUNT(v.id_kunjungan) AS jumlah_kunjungan
FROM pasien AS p
JOIN kunjungan AS v ON p.id_pasien = v.id_pasien
GROUP BY p.nama;
4. SELECT
  CASE
    WHEN COUNT(v.id_kunjungan) = 1 THEN 'baru'
    ELSE 'lama'
  END AS classification,
  COUNT(p.id_pasien) AS jumlah_kunjungan
FROM pasien AS p
JOIN kunjungan AS v ON p.id_pasien = v.id_pasien
GROUP BY classification;
