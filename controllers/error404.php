<?php

class error404 extends Controller {

    public function __construct() {
        parent::__construct();

        parent::callView('Erreur 404');
    }

}