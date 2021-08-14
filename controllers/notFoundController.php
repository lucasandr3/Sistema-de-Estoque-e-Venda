<?php
class notFoundController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
        
        $this->loadView('404/404', $data);
    }

}