<?php
require __DIR__ . '/../includes/layout.php';

$now  = time();
$date = date('d F Y', $now);
$time = date('h:i:s A', $now);
$day  = date('l', $now);

page_head('Date, time & day');
?>
<main>
  <span class="eyebrow">Program b · date()</span>
  <h1>Right now, <span class="grad">on the server.</span></h1>
  <p class="lede">Printed by PHP when this page was requested, in the <?= e(date_default_timezone_get()) ?> timezone.</p>

  <div class="stats">
    <div class="card stat">
      <div class="head"><span class="label">Date</span><?= icon('calendar') ?></div>
      <div class="value"><?= $date ?></div>
      <code>date('d F Y')</code>
    </div>
    <div class="card stat">
      <div class="head"><span class="label">Time</span><?= icon('clock') ?></div>
      <div class="value mono"><?= $time ?></div>
      <code>date('h:i:s A')</code>
    </div>
    <div class="card stat">
      <div class="head"><span class="label">Day</span><?= icon('sun') ?></div>
      <div class="value"><?= $day ?></div>
      <code>date('l')</code>
    </div>
  </div>

  <div class="actions">
    <a class="btn" href="index.php"><?= icon('refresh') ?>Refresh</a>
    <span class="small">Reloading asks the server for a fresh timestamp.</span>
  </div>
</main>
<?php page_foot(); ?>
