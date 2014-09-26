<body>
    <?php include_once './views/header.php'; ?>

    <div id="toolbar">
        
    </div>
    <form method="post" action="<?= $host ?>/depot.html" enctype="multipart/form-data">
        Fichier : <input type="file" name="file">
        <input type="submit" name="envoyer" value="Envoyer le fichier">
    </form>
    <form method="post" action="<?= $host ?>/depot.html">
        <input type="texte" name="nameFile"/>
        <input type="submit" name="doc" value="cr&eacute;er"/>
    </form>

    <div class="file">
        <img class="fileImage" src="./resources/icones/folder.png"/>
        <span class="fileName">Fichier test</span>
    </div>
    <?php foreach ($fileListe as $file): ?>
        <div class="file">
            <img class="fileImage" src="./<?= $file['fullPath'] ?>"/>
            <span class="fileName"><?= $file['name'] ?></span>
        </div>
    <?php endforeach; ?>


    <?php include_once './views/footer.php'; ?>
</body>