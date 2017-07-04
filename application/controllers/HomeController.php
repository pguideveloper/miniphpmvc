<?php 
class homeController extends MP_Controller
{
    public function __construct()
    {
        parent::__construct();   
    }
    public function index()
    {
        $this->load->view('welcome');
    }
}