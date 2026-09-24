<?php
$title = 'Pertemuan 12 · AJAX Cari Mahasiswa';
$meeting = 12;
$slideFile = '12-ajax.html';
$latihanSlug = 'ajax';
$note = 'Input pencarian memanggil endpoint JSON pertemuan 11 tanpa reload.';

ob_start();
?>
<input type="text" id="keyword" placeholder="Cari nama mahasiswa">
<button class="btn btn-primary" type="button" onclick="cariMahasiswa()">Cari</button>
<div id="hasil" style="margin-top:14px;"></div>
<script>
async function cariMahasiswa() {
  const keyword = document.getElementById("keyword").value.toLowerCase();
  const res = await fetch("pertemuan-11-api-json.php?format=json");
  const data = await res.json();
  const filtered = data.filter(item => item.nama.toLowerCase().includes(keyword));
  document.getElementById("hasil").innerHTML =
    "<ul>" + filtered.map(i => `<li>${i.nama} - ${i.nim}</li>`).join("") + "</ul>";
}
</script>
<?php
$output = ob_get_clean();
$source = <<<'CODE'
<!-- HTML + JavaScript -->
<input type="text" id="keyword" placeholder="Cari nama mahasiswa">
<button type="button" onclick="cariMahasiswa()">Cari</button>
<div id="hasil"></div>

<script>
async function cariMahasiswa() {
  const keyword = document.getElementById("keyword").value.toLowerCase();
  const res = await fetch("pertemuan-11-api-json.php?format=json");
  const data = await res.json();
  const filtered = data.filter(item => item.nama.toLowerCase().includes(keyword));
  document.getElementById("hasil").innerHTML =
    "<ul>" + filtered.map(i => `<li>${i.nama} - ${i.nim}</li>`).join("") + "</ul>";
}
</script>
CODE;

require __DIR__ . "/_layout.php";
