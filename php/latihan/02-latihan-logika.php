<?php
$title = 'Logika & Perulangan — Predikat Nilai';
$meeting = 2;
$slideFile = '02-logika-kontrol-dan-perulangan.html';
$contohFile = 'pertemuan-02-kondisi-dan-perulangan.php';
$hint = 'Pakai if-elseif dan for. Batas: ≥85, ≥70, ≥60.';
$tasks = [
    'Tentukan predikat dari <code>$nilai</code> (Sangat Baik / Baik / Cukup / Perlu Remedial).',
    'Tampilkan bilangan genap dari 1 sampai 20.',
];
$starterCode = <<<'CODE'
<?php
$nilai = 85;

// TODO: if / elseif untuk predikat
// TODO: for untuk bilangan genap 1–20
?>
CODE;

$nilai = 85;
ob_start();
echo '<p>Nilai: <strong>' . (int) $nilai . '</strong></p>';
if ($nilai >= 85) {
    echo '<p>Predikat: Sangat Baik</p>';
} elseif ($nilai >= 70) {
    echo '<p>Predikat: Baik</p>';
} elseif ($nilai >= 60) {
    echo '<p>Predikat: Cukup</p>';
} else {
    echo '<p>Predikat: Perlu Remedial</p>';
}
echo '<p>Bilangan genap 1–20:</p><p>';
for ($i = 1; $i <= 20; $i++) {
    if ($i % 2 === 0) {
        echo $i . ' ';
    }
}
echo '</p><p class="muted">TODO: ubah $nilai dan pastikan predikat berubah.</p>';
$workspace = ob_get_clean();

require __DIR__ . '/_layout.php';
