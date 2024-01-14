<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $this->titlePage ?></title>
    <base href="/">
    <meta charset="UTF-8">
    <?= $this->getMeta() ?>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/layout/default/css/style.css">
</head>

<body>
<div class="container">
    <?= $header ?>
</div>
<div class="container">
    <?= $content ?>
</div>
<div class="container">
    <?= $footer ?>
</div>

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