<body>
    <?php include_once './views/header.php'; ?>

    <form method="post" action="<?= $host ?>/depot.html" enctype="multipart/form-data">
        Fichier : <input type="file" name="file">
        <input type="submit" name="envoyer" value="Envoyer le fichier">
    </form>

    <?php foreach ($folderContent as $file): ?>
        <div id="file"><?= $file ?></div>
    <?php endforeach; ?>

    <?php include_once './views/footer.php'; ?>
</body>