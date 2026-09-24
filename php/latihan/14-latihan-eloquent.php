<?php
$title = 'Eloquent ORM — Simulasi Model';
$meeting = 14;
$slideFile = '14-eloquent-orm.html';
$contohFile = 'pertemuan-14-eloquent.php';
$hint = 'Di Laravel: Mahasiswa::all() atau Mahasiswa::where(...)->get()';
$tasks = [
    'Buat class model yang punya method <code>semua()</code> / <code>all()</code>.',
    'Tampilkan data lewat model (tanpa SQL mentah di View).',
    'Jelaskan beda ORM dengan query mysqli manual.',
];
$starterCode = <<<'CODE'
<?php
class MahasiswaModel {
    public function semua() {
        // TODO: return array data
    }
}
?>
CODE;

class LatihanMahasiswaModel
{
    public function semua(): array
    {
        return [
            ['nama' => 'Andi', 'nim' => '2023001'],
            ['nama' => 'Budi', 'nim' => '2023002'],
        ];
    }
}

ob_start();
$model = new LatihanMahasiswaModel();
echo '<ul>';
foreach ($model->semua() as $row) {
    echo '<li>' . htmlspecialchars($row['nama'] . ' - ' . $row['nim']) . '</li>';
}
echo '</ul><p class="muted">TODO: tambahkan method cariByNim($nim).</p>';
$workspace = ob_get_clean();

require __DIR__ . '/_layout.php';
