<?php
$title = 'Pertemuan 06 · Routing & Controller';
$meeting = 6;
$slideFile = '06-routing-dan-controller.html';
$latihanSlug = 'routing-controller';
$note = 'Simulasi pemetaan route ke controller/method.';

$source = <<<'CODE'
$route = "/mahasiswa";
$controller = "MahasiswaController";
$method = "index";

echo "Route: $route <br>";
echo "Controller: $controller <br>";
echo "Method: $method <br>";
echo "Hasil: Menampilkan halaman daftar mahasiswa.";
CODE;

ob_start();
eval($source);
$output = ob_get_clean();

require __DIR__ . "/_layout.php";
