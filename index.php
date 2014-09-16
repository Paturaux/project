<?php
session_start();

if (isset($_GET['page']) && is_file('./controllers/' . $_GET['page'] . '.php')) {
    /* if (!isset($_SESSION['account']) && $_GET['page'] !== 'login' && $_GET['page'] !== 'error404') {
      header('Location: http://' . $_SERVER['HTTP_HOST'] . '/project/login.html');
      } else { */
    $controller = $_GET['page'];
    /* } */
} else {
    header('Location: ' . $host . 'error404.html');
}

require_once './core/controller.php';
require_once './controllers/' . $controller . '.php';
?>

<!DOCTYPE html>
<html>
    <noscript>
        <div id="noscript">Vous devez activez JavaScript pour le bon fonctionnement du site !</div>
    </noscript>    
    <?php new $controller(); ?>
</html>