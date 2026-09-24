<?php
$title = 'Fungsi & Array — Rata-rata Nilai';
$meeting = 3;
$slideFile = '03-fungsi-dan-array.html';
$contohFile = 'pertemuan-03-fungsi-dan-array.php';
$hint = 'Rata-rata = jumlah / banyak data. Pakai array_sum() atau loop manual.';
$tasks = [
    'Lengkapi fungsi <code>rataRata()</code> agar menghitung rata-rata array.',
    'Tampilkan hasil rata-rata dari <code>$nilai</code>.',
    'Buat array asosiatif mahasiswa dan tampilkan isinya dengan <code>foreach</code>.',
];
$starterCode = <<<'CODE'
<?php
$nilai = [80, 85, 90, 75, 88];

function rataRata($arrayNilai) {
    // TODO: return rata-rata
}

// TODO: echo rataRata($nilai);
?>
CODE;

$nilai = [80, 85, 90, 75, 88];
function latihanRataRata(array $arrayNilai): float
{
    if (count($arrayNilai) === 0) {
        return 0.0;
    }
    return array_sum($arrayNilai) / count($arrayNilai);
}

ob_start();
$avg = latihanRataRata($nilai);
echo '<p>Nilai: ' . htmlspecialchars(implode(', ', $nilai)) . '</p>';
echo '<p>Rata-rata: <strong>' . number_format($avg, 2) . '</strong></p>';
$mhs = ['nama' => 'Andi', 'nim' => '2023001', 'kelas' => 'A'];
echo '<p>Data mahasiswa:</p><ul>';
foreach ($mhs as $k => $v) {
    echo '<li>' . htmlspecialchars($k) . ': ' . htmlspecialchars((string) $v) . '</li>';
}
echo '</ul><p class="muted">TODO: ganti implementasi tanpa array_sum() jika diminta dosen.</p>';
$workspace = ob_get_clean();

require __DIR__ . '/_layout.php';
