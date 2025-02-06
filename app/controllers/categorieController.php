<?php

class categorieController extends Controller {
    private $currentModal;
    public function __construct(){
        $this->currentModal = $this->model('categories');
    }


}