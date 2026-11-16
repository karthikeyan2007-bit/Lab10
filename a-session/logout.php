<?php
session_start();

$name  = $_SESSION['name']  ?? null;
$start = isset($_SESSION['start']) ? (int) $_SESSION['start'] : null;
$end   = time();

// End the session completely: data, server file, and browser cookie.
$_SESSION = [];
if (ini_get('session.use_cookies')) {
    $p = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $p['path'], $p['domain'], $p['secure'], $p['httponly']);
}
session_destroy();

require __DIR__ . '/../includes/layout.php';
page_head('Logged out');
?>
<main class="narrow">
  <span class="eyebrow">Program a · Sessions</span>
<?php if ($name === null || $start === null): ?>
  <h1>No active session</h1>
  <p class="lede">You weren't signed in, so there's nothing to log out of.</p>
  <a class="btn" href="index.php"><?= icon('login') ?>Sign in</a>
<?php else: ?>
  <h1>Thank You, <span class="grad"><?= e($name) ?></span>!</h1>
  <p class="lede">You've been logged out and your session has been destroyed.</p>

  <div class="card">
    <div class="who" style="margin-bottom:8px">
      <span class="avatar" aria-hidden="true"><?= icon('clock') ?></span>
      <div>
        <div class="lbl">Duration of usage</div>
        <div class="duration"><?= human_duration($end - $start) ?></div>
      </div>
    </div>
    <div class="timeline">
      <span><?= date('h:i:s A', $start) ?></span>
      <span class="bar" aria-hidden="true"></span>
      <span><?= date('h:i:s A', $end) ?></span>
    </div>
    <a class="btn ghost block" href="index.php"><?= icon('login') ?>Sign in again</a>
  </div>
<?php endif; ?>
</main>
<?php page_foot(); ?>
