<?php
/**
 * Shared layout for contoh kode pages.
 *
 * Expected variables:
 * - $title, $meeting, $slideFile, $output, $source
 * - $note (optional), $latihanSlug (optional)
 * - $codeLang (optional): php|html|javascript|xml — auto-detected if omitted
 * - $codeFilename (optional): label in editor chrome
 */
$cssHref = '../assets/praktikum.css';
$slideHref = '../slides/' . $slideFile;
$note = $note ?? null;
$latihanSlug = $latihanSlug ?? 'php-dasar';
$latihanFile = sprintf('%02d-latihan-%s.php', (int) $meeting, $latihanSlug);

if (!isset($codeLang)) {
    $trimmed = ltrim($source);
    if (preg_match('/^(?:<!DOCTYPE|<html\b|<script\b|<input\b|<form\b|<button\b|<!--)/i', $trimmed)
        || (str_contains($source, '<script') && !str_contains($source, '<?php') && !str_contains($source, '$'))) {
        $codeLang = 'html';
    } else {
        $codeLang = 'php';
    }
}

// Tampilkan tag pembuka/penutup PHP agar mirip file .php di editor
$displaySource = $source;
if ($codeLang === 'php') {
    $trimSrc = ltrim($source);
    $hasOpen = str_starts_with($trimSrc, '<?php') || str_starts_with($trimSrc, '<?=') || str_starts_with($trimSrc, '<?');
    if (!$hasOpen) {
        $displaySource = "<?php\n" . rtrim($source) . "\n?>";
    } elseif (!str_contains($source, '?>') && !preg_match('/\?>\s*</s', $source)) {
        $displaySource = rtrim($source) . "\n?>";
    }
}

$codeFilename = $codeFilename ?? sprintf('pertemuan-%02d.%s', (int) $meeting, $codeLang === 'html' ? 'html' : 'php');
$langLabel = strtoupper($codeLang === 'javascript' ? 'JS' : $codeLang);
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
        <a href="<?= htmlspecialchars($slideHref) ?>">Slide pertemuan <?= (int) $meeting ?></a>
        <a href="../latihan/<?= htmlspecialchars($latihanFile) ?>">Latihan</a>
      </div>
    </div>
  </div>

  <div class="page" style="max-width:1100px;margin:28px auto 48px;padding:0 18px;">
    <div class="panel">
      <div class="badge">Contoh kode · Pertemuan <?= (int) $meeting ?></div>
      <h1 style="margin-top:14px;"><?= htmlspecialchars($title) ?></h1>
      <?php if ($note): ?>
        <p class="muted"><?= htmlspecialchars($note) ?></p>
      <?php endif; ?>

      <div class="demo-label">
        <h3>Hasil eksekusi</h3>
      </div>
      <div class="demo"><?= $output ?></div>

      <div class="code-label">
        <h3>Kode program</h3>
        <span class="muted" style="font-size:0.85rem;">Syntax highlighting · tag PHP lengkap</span>
      </div>

      <div class="editor">
        <div class="editor-header">
          <div class="editor-dots" aria-hidden="true">
            <span></span><span></span><span></span>
          </div>
          <div class="editor-filename"><?= htmlspecialchars($codeFilename) ?></div>
          <div class="editor-lang"><?= htmlspecialchars($langLabel) ?></div>
        </div>
        <pre><code class="language-<?= htmlspecialchars($codeLang) ?> hljs"><?= htmlspecialchars($displaySource) ?></code></pre>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/highlight.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/languages/php.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/languages/xml.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/languages/javascript.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('pre code').forEach((block) => {
        hljs.highlightElement(block);
      });
    });
  </script>
</body>
</html>
