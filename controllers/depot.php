<?php

class depot extends Controller {

    private $depot = './depot/';

    public function __construct() {
        parent::__construct();

        if (isset($_POST['envoyer'])) {
            $this->upload();
        }
        if (isset($_POST['doc'])) {

            mkdir($this->depot . $_POST['nameFile']);
        }

        $fileListe = array();
        foreach ($this->readFolder() as $file) {
            array_push($fileListe, $this->fileProperty($this->depot . $file));
        }

        $variables = array(
            'fileListe' => $fileListe,
        );
        parent::callView('D&eacute;pot', $variables, array('depot.css'));
    }

    private function readFolder($folder = './depot/') {
        $fileList = array();
        $iterator = new DirectoryIterator($folder);
        foreach ($iterator as $file) {
            if (!$file->isDot()) {
                $fileList[] = $file->getFilename();
            }
        }
        return $fileList;
    }

    private function fileProperty($name) {
        $properties = array();
        $stats = stat($name);
        $properties['name'] = basename($name);
        $properties['extension'] = strtolower(substr(strrchr($name, '.'), 1));
        $properties['path'] = dirname($name);
        $properties['icone'] = dirname($name) . '/' . basename($name);
        $properties['size'] = $stats['size'];
        return $properties;
    }

    private function upload() {
        $folder = './depot/';
        $sizeMax = 1000 * 1000 * 50; // En octets
        $extensions = array('.png', '.gif', '.jpg', '.jpeg', '.txt');
        $fileName = basename($_FILES['file']['name']);
        $fileSize = filesize($_FILES['file']['tmp_name']);
        $fileExtension = strrchr($_FILES['file']['name'], '.');

        //Début des vérifications de sécurité...
        if (!in_array($fileExtension, $extensions)) { //Si l'extension n'est pas dans le tableau
            $error = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
        }
        if ($fileSize > $sizeMax) {
            $error = 'Le fichier est trop gros...';
        }
        if (!isset($error)) { //S'il n'y a pas d'erreur, on upload
            //On formate le nom du fichier ici...
            $fileName = strtr($fileName, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $fileName = preg_replace('/([^.a-z0-9]+)/i', '-', $fileName);
            if (move_uploaded_file($_FILES['file']['tmp_name'], $folder . $fileName)) { //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                echo 'Upload effectué avec succès !';
            } else { //Sinon (la fonction renvoie FALSE).
                echo 'Echec de l\'upload !';
            }
        } else {
            echo $error;
        }
    }

    private function donwload($file) {
        $file = './depot/' . $file;
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }
    }

}
