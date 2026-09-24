<?php
$title = 'OOP PHP — Class Mahasiswa';
$meeting = 13;
$slideFile = '13-oop-php.html';
$contohFile = 'pertemuan-13-oop.php';
$hint = 'Gunakan public function __construct(...) { ... }';
$tasks = [
    'Buat class <code>Mahasiswa</code> dengan property nama, nim, jurusan.',
    'Tambahkan constructor dan method <code>tampilData()</code>.',
    'Buat object dan tampilkan hasilnya.',
];
$starterCode = <<<'CODE'
<?php
class Mahasiswa {
    // TODO: property, constructor, tampilData()
}
$mhs = new Mahasiswa("Andi", "2023001", "Informatika");
?>
CODE;

class LatihanMahasiswa
{
    public string $nama;
    public string $nim;
    public string $jurusan;

    public function __construct(string $nama, string $nim, string $jurusan)
    {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->jurusan = $jurusan;
    }

    public function tampilData(): string
    {
        return "{$this->nama} ({$this->nim}) — {$this->jurusan}";
    }
}

ob_start();
$mhs = new LatihanMahasiswa('Andi', '2023001', 'Informatika');
echo '<p>' . htmlspecialchars($mhs->tampilData()) . '</p>';
echo '<p class="muted">TODO: buat object kedua dengan data Anda.</p>';
$workspace = ob_get_clean();

require __DIR__ . '/_layout.php';
