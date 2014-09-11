<?php

class accueil extends Controller {

    public function __construct() {
        parent::__construct();

        parent::callView('Accueil');
    }

}