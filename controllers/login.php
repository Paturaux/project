<?php

class login extends Controller {

    public function __construct() {
        parent::__construct();

        parent::callView('Connexion');
    }

}
