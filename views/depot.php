<body>
    <?php include_once './views/header.php'; ?>

    <div id="toolbar">
        <span class="iconToolbar" id="download"></span>
        <span class="iconToolbar" id="upload"></span>
        <span class="iconToolbar" id="filter"></span>
        <span class="iconToolbar" id="sinchronize"></span>
    </div>

    <form method="post" action="<?= $host ?>/depot.html" enctype="multipart/form-data">
        Fichier : <input type="file" name="file">
        <input type="submit" name="envoyer" value="Envoyer le fichier">
    </form>
    <form method="post" action="<?= $host ?>/depot.html">
        <input type="texte" name="nameFile"/>
        <input type="submit" name="doc" value="cr&eacute;er"/>
    </form>
    
    <div id="repository"></div>
    <div class="file typefolder" id="azaz">
        <img class="fileImage" src="./resources/icones/folder.png"/>
        <span class="fileName">Fichier test</span>
    </div>
    
    <!--<?php foreach ($fileListe as $file): ?>
        <div class="file">
            <img class="fileImage" src="./<?= $file['fullPath'] ?>"/>
            <span class="fileName"><?= $file['name'] ?></span>
        </div>
    <?php endforeach; ?>-->

    <?php include_once './views/footer.php'; ?>
</body>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('.typefolder').click(function () {
            readFolder(this);
        });
    });
    
    function readFolder($file){
        $.ajax({
            type: 'GET',
            url: '<?= $host ?>/depot_' + $($file).attr('id') + '.html',
            timeout: 3000,
            cache: true,
            success: function (data) {
                $('#repository').replaceWith(data);
            },
            error: function () {
                alert('La requête n\'a pas abouti');
            }
        });
    }
</script>