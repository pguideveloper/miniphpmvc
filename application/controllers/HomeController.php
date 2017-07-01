<?php 
class homeController extends MPM_Controller
{
    public function index()
    {
        $data = array();
        $this->loadView('home', $data);
    }
}