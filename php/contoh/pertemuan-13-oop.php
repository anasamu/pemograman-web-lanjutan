<?php
$title = 'Pertemuan 13 · Class Mahasiswa';
$meeting = 13;
$slideFile = '13-oop-php.html';
$latihanSlug = 'oop';
$note = 'Membuat object dari class Mahasiswa lalu memanggil method.';

$source = <<<'CODE'
class Mahasiswa {
    public $nama;
    public $nim;
    public $jurusan;

    public function __construct($nama, $nim, $jurusan) {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->jurusan = $jurusan;
    }

    public function tampilData() {
        return "{$this->nama} ({$this->nim}) - {$this->jurusan}";
    }
}

$mhs = new Mahasiswa("Andi", "2023001", "Informatika");
echo "<h2>OOP PHP</h2>";
echo $mhs->tampilData();
CODE;

ob_start();
eval($source);
$output = ob_get_clean();

require __DIR__ . "/_layout.php";
