<?php
class Review extends CI_Controller {


  private $_view;

    
  public function __construct() 
  {
      parent:: __construct();
      error_reporting(0);
  }
    
  public function index() 
  {      
    $this->load->view('template/header');
    $this->load->view('reviews/index');
    $this->load->view('template/footer');

  }  
  
}
