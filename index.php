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
$action = null;
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

require_once './core/controller.php';
require_once './controllers/' . $controller . '.php';
?>

<!DOCTYPE html>
<html>    
    <?php new $controller($action); ?>
</html>