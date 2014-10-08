<?php foreach ($fileListe as $file): ?>
<!--    <div id="name"><?= $file['name'] ?></div>
    <div id="extension"><?= $file['extension'] ?></div>
    <div id="path"><?= $file['path'] ?></div>
    <div id="icone"><?= $file['icone'] ?></div>
    <div id="size"><?= $file['size'] ?></div>-->
<div class="file type<?= $file['type'] ?>" id="<?= $file['name'] ?>">
        <!--<img class="fileImage" src="./resources/icones/folder.png"/>-->
        ---------------------<span class="fileName"><?= $file['name'] ?></span>
        <!--<span class="fileExtension"><?= $file['extension'] ?></span>-->
        <span class="fileType"><?= $file['type'] ?></span>
    </div>
<?php endforeach; ?>