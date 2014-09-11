<?php

class tracking extends Model {

    public function find($tag) {
        $query = 'SELECT * FROM tagging WHERE tag=?';
        return $this->executeQuery($query, array($tag));
    }

    /**
     * Insertion d'un Tag en base lors de la visite d'un nouveau visiteur
     * @return Tag du visiteur
     */
    public function insertTag() {
        $query = 'INSERT INTO `tagging` VALUES (?, now(), ?, null)';
        $ip = $_SERVER['REMOTE_ADDR'];
        $tag = time() . str_replace('.', '', $ip);
        $this->executeQuery($query, array($tag, $ip));
        return $tag;
    }

    /**
     * Insertion d'une trace en base lors d'une action de l'internaute
     */
    public function insertTrack($tag) {
        $query = 'INSERT INTO `tracking` VALUES (null, ?, now(), ?)';
        $action = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $this->executeQuery($query, array($tag, $action));
        return mysql_insert_id();
    }

}
