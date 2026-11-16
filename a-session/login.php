<?php
session_start();

$name = trim($_POST['name'] ?? '');
if ($name === '') {
    header('Location: index.php?error=1');
    exit;
}

session_regenerate_id(true);
$_SESSION['name']  = $name;
$_SESSION['start'] = time();

header('Location: hello.php');
exit;
