<?php
require __DIR__ . '/../includes/layout.php';

$name   = trim($_POST['name'] ?? '');
$ageRaw = trim($_POST['age'] ?? '');
$error  = null;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $error = 'Please fill in the form first.';
} elseif ($name === '') {
    $error = 'Please enter your name.';
} elseif (!ctype_digit($ageRaw) || (int) $ageRaw > 150) {
    $error = 'Please enter your age as a whole number between 0 and 150.';
}

page_head('Age check');
?>
<main class="narrow">
  <span class="eyebrow">Program c · $_POST</span>
<?php if ($error !== null): ?>
  <h1>Something's missing</h1>
  <div class="alert" role="alert"><?= icon('alert') ?><?= e($error) ?></div>
<?php elseif ((int) $ageRaw < 18): ?>
  <h1>Access denied</h1>
  <div class="card outcome bad" role="status">
    <span class="badge"><?= icon('x') ?></span>
    <div>
      <p class="msg">Hello <?= e($name) ?>, you are not authorized to visit the site</p>
      <p class="small">Age entered: <?= (int) $ageRaw ?> · minimum is 18</p>
    </div>
  </div>
<?php else: ?>
  <h1>Come on in</h1>
  <div class="card outcome ok" role="status">
    <span class="badge"><?= icon('check') ?></span>
    <div>
      <p class="msg">Welcome to this site</p>
      <p class="small">Good to see you, <?= e($name) ?> (age <?= (int) $ageRaw ?>).</p>
    </div>
  </div>
<?php endif; ?>
  <div class="actions"><a class="btn ghost" href="index.html"><?= icon('back') ?>Back to the form</a></div>
</main>
<?php page_foot(); ?>
