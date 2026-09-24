<?php
/**
 * Layout bersama halaman latihan.
 *
 * Variabel yang diharapkan:
 * - $title, $meeting, $slideFile, $contohFile
 * - $tasks (array of HTML strings)
 * - $workspace (HTML string hasil area kerja / form / output)
 * - $hint (string|null)
 * - $starterCode (string|null) — cuplikan kode untuk dikerjakan
 */
$cssHref = '../assets/praktikum.css';
$slideHref = '../slides/' . $slideFile;
$contohHref = '../contoh/' . $contohFile;
$hint = $hint ?? null;
$starterCode = $starterCode ?? null;
$extraNav = $extraNav ?? '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= htmlspecialchars($title) ?></title>
  <link rel="stylesheet" href="<?= htmlspecialchars($cssHref) ?>" />
</head>
<body>
  <div class="topbar">
    <div class="nav-wrap">
      <a href="../index.php">← Beranda</a>
      <div class="nav-group">
        <a href="<?= htmlspecialchars($slideHref) ?>">Slide</a>
        <a href="<?= htmlspecialchars($contohHref) ?>">Contoh</a>
        <?= $extraNav ?>
      </div>
    </div>
  </div>

  <div class="page" style="max-width:980px;margin:28px auto 48px;padding:0 18px;">
    <div class="panel">
      <div class="badge">Latihan · Pertemuan <?= sprintf('%02d', (int) $meeting) ?></div>
      <h1 style="margin-top:14px;"><?= htmlspecialchars($title) ?></h1>
      <p class="muted">Kerjakan tugas di bawah. Edit file latihan ini, lalu refresh browser untuk melihat hasil.</p>

      <h2>Tugas</h2>
      <ol class="task-list">
        <?php foreach ($tasks as $task): ?>
          <li><?= $task ?></li>
        <?php endforeach; ?>
      </ol>

      <?php if ($hint): ?>
        <p class="hint-box"><?= htmlspecialchars($hint) ?></p>
      <?php endif; ?>

      <h2>Area kerja</h2>
      <div class="demo workspace"><?= $workspace ?></div>

      <?php if ($starterCode): ?>
        <h2>Cuplikan kode</h2>
        <div class="editor">
          <div class="editor-header">
            <div class="editor-dots" aria-hidden="true"><span></span><span></span><span></span></div>
            <div class="editor-filename"><?= sprintf('%02d-latihan.php', (int) $meeting) ?></div>
            <div class="editor-lang">PHP</div>
          </div>
          <pre><code class="language-php hljs"><?= htmlspecialchars($starterCode) ?></code></pre>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/highlight.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/languages/php.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('pre code').forEach((el) => hljs.highlightElement(el));
    });
  </script>
</body>
</html>
