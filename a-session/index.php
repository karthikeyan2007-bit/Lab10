<?php
session_start();
if (isset($_SESSION['name'])) {
    header('Location: hello.php');
    exit;
}
require __DIR__ . '/../includes/layout.php';
$err = isset($_GET['error']);
page_head('Sign in');
?>
<main class="narrow">
  <span class="eyebrow">Program a · Sessions</span>
  <h1>Who's there?</h1>
  <p class="lede">Your name and start time stay in a PHP session until you log out.</p>

  <div class="card">
    <form action="login.php" method="post" novalidate>
      <div class="field">
        <label for="name">Your name</label>
        <div class="input-wrap">
          <?= icon('user') ?>
          <input type="text" id="name" name="name" maxlength="60" autocomplete="name" placeholder="e.g. Ananya" autofocus required
                 aria-describedby="name-help"<?= $err ? ' aria-invalid="true"' : '' ?>>
        </div>
        <?php if ($err): ?>
          <div class="alert" role="alert" id="name-help"><?= icon('alert') ?>Please enter your name to continue.</div>
        <?php else: ?>
          <span class="help" id="name-help">Shown on the hello page and the thank-you page.</span>
        <?php endif; ?>
      </div>
      <button class="btn block" type="submit"><?= icon('login') ?>Submit</button>
    </form>
  </div>
</main>
<?php page_foot(); ?>
