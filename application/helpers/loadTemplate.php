<?php 
function loadTemplate($headerName, $viewName, $data, $footerName)
{
    $MP = getInstance();
    
    $MP->load->view($headerName, $data);
    $MP->load->view($viewName, $data);
    $MP->load->view($footerName, $data);
}