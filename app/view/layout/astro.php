<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $this->titlePage ?></title>
    <base href="/">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/public/layout/astro/css/style.css" type="text/css">
    <?= $this->getMeta() ?>
</head>

<body>
<?= $header ?>
<div id="contents">
    <?= $content ?>
</div>
<?= $footer ?>

<?php
if(DEBUG) {
    debug(PHP_EOL . "----- Debug mode -----" . PHP_EOL);
    $logs = \R::getDatabaseAdapter()
        ->getDatabase()
        ->getLogger();
    print_r($logs->grep('SELECT'));
}
?>
</body>
</html>