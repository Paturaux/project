<body>
    <?php include_once './views/header.php'; ?>

<!--    <form method="post" action="<?= $host ?>/depot.html" enctype="multipart/form-data">
        Fichier : <input type="file" name="file">
        <input type="submit" name="envoyer" value="Envoyer le fichier">
    </form>
    <form method="post" action="<?= $host ?>/depot.html">
        <input type="texte" name="nameFile"/>
        <input type="submit" name="doc" value="cr&eacute;er"/>
    </form>-->
    
    <input type="texte" id="nameFile"/>
    <button value="+" onclick="a(document.getElementById('nameFile'));"/>
    
    <?php foreach ($folderContent as $file): ?>
        <div class="file">
            <img class="fileImage" src="<?= $host ?>/<?= $image ?>"/>
            <span class="fileName"><?= $file ?></span>
        </div>
    <?php endforeach; ?>

    <script type="text/javascript">
    a(var nameFile){
        
    }
    </script>
    <?php include_once './views/footer.php'; ?>
</body>