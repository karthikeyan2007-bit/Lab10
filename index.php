<?php
require __DIR__ . '/includes/layout.php';
page_head('Programs', '.');
?>
<main>
  <span class="eyebrow">Lab 10 · Server-side scripting</span>
  <h1>Three small apps,<br><span class="grad">all rendered by PHP.</span></h1>
  <p class="lede">Sessions, the date() function and form handling. Pick a program to run it on this server.</p>

  <div class="programs">
    <a class="card program" href="a-session/index.php">
      <span class="ic"><?= icon('user') ?></span>
      <span class="tag">a · $_SESSION</span>
      <h2>Hello &amp; logout</h2>
      <p>Enter a name, get a hello page with your start time in the corner. Log out to see how long you stayed.</p>
      <span class="go">Run program <?= icon('arrow') ?></span>
    </a>
    <a class="card program" href="b-datetime/index.php">
      <span class="ic"><?= icon('calendar') ?></span>
      <span class="tag">b · date()</span>
      <h2>Date, time &amp; day</h2>
      <p>The server's current date, time and weekday, printed with PHP format strings.</p>
      <span class="go">Run program <?= icon('arrow') ?></span>
    </a>
    <a class="card program" href="c-age/index.html">
      <span class="ic"><?= icon('shield') ?></span>
      <span class="tag">c · $_POST</span>
      <h2>Age check</h2>
      <p>Submit a name and age. Under 18 is turned away; 18 and over is welcomed.</p>
      <span class="go">Run program <?= icon('arrow') ?></span>
    </a>
  </div>

  <div class="meta-row">
    <span><?= icon('server') ?>PHP <?= e(PHP_VERSION) ?></span>
    <span><?= icon('clock') ?><?= e(date_default_timezone_get()) ?></span>
    <span><?= icon('code') ?>No frameworks</span>
  </div>
</main>
<?php page_foot(); ?>
