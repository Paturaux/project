<!DOCTYPE html>
<html>
    <head>
        <title><?= $title; ?></title>
        <meta name="description" content="Projet web personnel"/>
        <meta name="author" content="Florian Paturaux"/>
        <link rel="stylesheet" type="text/css" href="./resources/css/common.css"/>
        <?php foreach ($import as $file): ?>
            <?php if (substr($file, -4) === '.css'): ?>
                <link rel="stylesheet" type="text/css" href="./resources/css/<?= $file; ?>"/>
            <?php endif; ?>
            <?php if (substr($file, -3) === '.js'): ?>
                <script type="text/javascript" src="./resources/js/<?= $file; ?>"></script>
            <?php endif; ?>
        <?php endforeach; ?>
    </head>