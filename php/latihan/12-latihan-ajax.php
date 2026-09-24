<?php
$title = 'AJAX — Pencarian Tanpa Reload';
$meeting = 12;
$slideFile = '12-ajax.html';
$contohFile = 'pertemuan-12-ajax.php';
$hint = 'Fetch: ../contoh/pertemuan-11-api-json.php?format=json';
$tasks = [
    'Buat input pencarian nama mahasiswa.',
    'Ambil data dari endpoint JSON pertemuan 11 dengan <code>fetch</code>.',
    'Filter dan tampilkan hasil tanpa reload halaman.',
];
$starterCode = <<<'CODE'
<script>
async function cari() {
  const res = await fetch("../contoh/pertemuan-11-api-json.php?format=json");
  const data = await res.json();
  // TODO: filter & tampilkan
}
</script>
CODE;

ob_start();
?>
<input type="text" id="keyword" placeholder="Cari nama..." style="padding:8px 10px;min-width:220px;">
<button class="btn btn-primary" type="button" onclick="cari()">Cari</button>
<div id="hasil" style="margin-top:14px;"></div>
<script>
async function cari() {
  const keyword = document.getElementById("keyword").value.toLowerCase();
  const res = await fetch("../contoh/pertemuan-11-api-json.php?format=json");
  const data = await res.json();
  const filtered = data.filter(item => item.nama.toLowerCase().includes(keyword));
  document.getElementById("hasil").innerHTML =
    filtered.length
      ? "<ul>" + filtered.map(i => `<li>${i.nama} — ${i.nim}</li>`).join("") + "</ul>"
      : "<p>Tidak ada hasil.</p>";
}
</script>
<?php
$workspace = ob_get_clean();

require __DIR__ . '/_layout.php';
