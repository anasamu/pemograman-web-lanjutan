<?php
$title = 'Pertemuan 14 · Simulasi Eloquent';
$meeting = 14;
$slideFile = '14-eloquent-orm.html';
$latihanSlug = 'eloquent';
$note = 'Ilustrasi pola Model Eloquent dengan class PHP sederhana.';

$source = <<<'CODE'
class MahasiswaModel {
    public function semua() {
        return [
            ["nama" => "Andi", "nim" => "2023001"],
            ["nama" => "Budi", "nim" => "2023002"],
        ];
    }
}

$model = new MahasiswaModel();
echo "<h2>Data dari ORM</h2>";
foreach ($model->semua() as $row) {
    echo $row["nama"] . " - " . $row["nim"] . "<br>";
}
CODE;

ob_start();
eval($source);
$output = ob_get_clean();

require __DIR__ . "/_layout.php";
