<?php 

class notFound  extends CI_Controller
{

	function index()
	{
		$this->load->view('template/header');
		$this->load->view('404/index');
		$this->load->view('template/footer');
	}
}










 ?>
 