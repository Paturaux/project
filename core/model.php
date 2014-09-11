<?php

abstract class Model {

    private $database;
    private $mode = 'dev';

    private function getDatabase() {
        if ($this->database == null) {
            $file = './core/' . $this->mode . '.ini';
            if (file_exists($file)) {
                $parameter = parse_ini_file($file);
                $host = $parameter['host'];
                $database = $parameter['database'];
                $charset = $parameter['charset'];
                $login = $parameter['login'];
                $password = $parameter['password'];
                $this->database = new PDO('mysql:host=' . $host . ';dbname=' . $database . ';charset=' . $charset, $login, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            } else {
                throw new Exception($file . ' does not exist');
            }
        }
        return $this->database;
    }

    protected function executeQuery($query, $parameters = null) {
        if ($parameters == null) {
            $result = $this->getDatabase()->query($query);
        } else {
            $result = $this->getDatabase()->prepare($query);
            $result->execute($parameters);
        }
        return $result;
    }
}
