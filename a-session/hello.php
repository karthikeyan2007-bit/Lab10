<?php
session_start();
if (!isset($_SESSION['name'], $_SESSION['start'])) {
    header('Location: index.php');
    exit;
}
require __DIR__ . '/../includes/layout.php';

$name    = $_SESSION['name'];
$start   = (int) $_SESSION['start'];
$elapsed = time() - $start;
// First character (UTF-8 safe without needing the mbstring extension).
$initial = preg_match('/^./u', $name, $m) ? strtoupper($m[0]) : '?';

page_head('Hello', '..', 'has-clock');
?>
<div class="start-time" title="Session start time">
  <span class="ic"><?= icon('clock') ?></span>
  <span>
    <span class="lbl">Started at</span>
    <b><?= date('h:i:s A', $start) ?></b>
    <span class="date"><?= date('D, d M Y', $start) ?></span>
  </span>
</div>

<main class="narrow">
  <span class="eyebrow">Program a · Sessions</span>
  <h1>Hello, <span class="grad"><?= e($name) ?></span>!</h1>
  <p class="lede">You're signed in. Your name and start time are stored in <code>$_SESSION</code>.</p>

  <div class="card">
    <div class="who">
      <span class="avatar" aria-hidden="true"><?= e($initial) ?></span>
      <div>
        <div class="lbl">Signed in as</div>
        <div class="nm"><?= e($name) ?></div>
      </div>
    </div>

    <dl class="kv">
      <div><dt>Session ID</dt><dd><?= e(substr(session_id(), 0, 10)) ?>…</dd></div>
      <div><dt>Time on site</dt><dd class="live"><span class="pulse"></span><span id="elapsed" data-start="<?= $elapsed ?>"><?= gmdate('H:i:s', $elapsed) ?></span></dd></div>
    </dl>

    <form action="logout.php" method="post">
      <button class="btn block" type="submit"><?= icon('logout') ?>Logout</button>
    </form>
  </div>
</main>
<script>
  // Cosmetic live counter; the real duration is computed by PHP on logout.
  (function () {
    var el = document.getElementById('elapsed');
    var s = +el.dataset.start, t0 = Date.now();
    var pad = function (n) { return String(n).padStart(2, '0'); };
    setInterval(function () {
      var x = s + Math.floor((Date.now() - t0) / 1000);
      el.textContent = pad(Math.floor(x / 3600)) + ':' + pad(Math.floor(x % 3600 / 60)) + ':' + pad(x % 60);
    }, 1000);
  })();
</script>
<?php page_foot(); ?>
