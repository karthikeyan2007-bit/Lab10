<?php
// Shared page header/footer + helpers for every Lab10 page.
date_default_timezone_set('Asia/Kolkata');

function e(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

/** Inline Lucide-style SVG icon. */
function icon(string $name): string
{
    $paths = [
        'user'     => '<circle cx="12" cy="8" r="5"/><path d="M20 21a8 8 0 0 0-16 0"/>',
        'clock'    => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
        'calendar' => '<rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>',
        'sun'      => '<circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>',
        'shield'   => '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/>',
        'arrow'    => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
        'back'     => '<path d="M19 12H5"/><path d="m12 19-7-7 7-7"/>',
        'logout'   => '<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><path d="m16 17 5-5-5-5"/><path d="M21 12H9"/>',
        'login'    => '<path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><path d="m10 17 5-5-5-5"/><path d="M15 12H3"/>',
        'refresh'  => '<path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M8 16H3v5"/>',
        'check'    => '<circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/>',
        'x'        => '<circle cx="12" cy="12" r="10"/><path d="m15 9-6 6M9 9l6 6"/>',
        'alert'    => '<circle cx="12" cy="12" r="10"/><path d="M12 8v4M12 16h.01"/>',
        'hash'     => '<path d="M4 9h16M4 15h16M10 3 8 21M16 3l-2 18"/>',
        'server'   => '<rect x="2" y="2" width="20" height="8" rx="2"/><rect x="2" y="14" width="20" height="8" rx="2"/><path d="M6 6h.01M6 18h.01"/>',
        'code'     => '<path d="m16 18 6-6-6-6M8 6l-6 6 6 6"/>',
    ];
    return '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true">' . ($paths[$name] ?? '') . '</svg>';
}

function page_head(string $title, string $root = '..', string $bodyClass = ''): void
{
    ?><!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($title) ?> · Lab 10</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= e($root) ?>/assets/style.css">
</head>
<body class="<?= e($bodyClass) ?>">
<div class="grid-bg" aria-hidden="true"></div>
<div class="topbar-wrap">
  <header class="topbar">
    <a class="brand" href="<?= e($root) ?>/index.php"><span class="logo">10</span>PHP Lab <small>· Web Technology</small></a>
    <?php if ($root !== '.'): ?><a class="crumb" href="<?= e($root) ?>/index.php"><?= icon('back') ?>All programs</a><?php endif; ?>
  </header>
</div>
<?php
}

function page_foot(): void
{
    echo '<footer class="foot">Rendered by PHP ' . e(PHP_VERSION) . ' · ' . date('d M Y, h:i A') . " IST</footer>\n</body>\n</html>\n";
}

/** "1 hour 2 minutes 5 seconds" — singular/plural aware, never empty. */
function human_duration(int $seconds): string
{
    $seconds = max(0, $seconds);
    $parts = [];
    foreach (['hour' => 3600, 'minute' => 60, 'second' => 1] as $unit => $size) {
        $n = intdiv($seconds, $size);
        $seconds %= $size;
        if ($n > 0) {
            $parts[] = $n . ' ' . $unit . ($n === 1 ? '' : 's');
        }
    }
    return $parts ? implode(' ', $parts) : '0 seconds';
}
