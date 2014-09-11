<?php

abstract class Controller {

    protected function __construct() {
        require_once './core/model.php';
    }

    protected function callModel($name) {
        require_once './models/' . $name . '.php';
        return new $name();
    }

    protected function callView($title, $variables = array(), $import = array()) {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/project';
        foreach ($variables as $var) {
            ${key($variables)} = $var;
            next($variables);
        }
        include_once './views/head.php';
        include_once './views/' . get_class($this) . '.php';
        $this->track();
    }

    protected
            function track() {
        $tracking = $this->callModel('tracking');
        if (!isset($_COOKIE['TAG'])) {
            $tag = $tracking->insertTag();
            $time = time() + 3600 * 2;
            setcookie('TAG', $tag, $time);
            $tracking->insertTrack($tag);
        } else {
            $tracking->insertTrack($_COOKIE['TAG']);
        }
    }

}
