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