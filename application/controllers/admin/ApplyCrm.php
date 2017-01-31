<?php
class ApplyCrm extends CI_Controller {

  function __construct()
	{
       parent:: __construct();
      
      error_reporting(0);

      if(isset($_SESSION['logged_in'])){
        $sess = $this->session->userdata();
        if(( $sess['logged_in']['user_level'] != '1' && $sess['logged_in']['user_level_status'] != '1' ) || ( $sess['logged_in']['user_level'] != '2' && $sess['logged_in']['user_level_status'] != '1' ) ){  redirect('home','refresh');}//header ('Location: '.base_url().'home '); }
      }else{
        redirect('login','refresh');
      }      


		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('admin/applyModelCrm','model');
    
	}
  
  public function index() 
  {
    $applys = $this->model->allApplys(); 

     $data=array('headlines' => 'All Applies','applys'=>$applys);
     $data1=array('page_title'=>"All Applies | MiConsulting");
     
     
     $this->load->view('admin/temp/headercrm',$data1);
     $this->load->view('admin/applycrm/index',$data);
     $this->load->view('admin/temp/footercrm');
  }  
  public function profil(){
   
       $applys = $this->model->applyById($this->uri->segment('4')); 
       $data=array('headline' => 'Applicant Profile','apply'=>$applys);
     $data1=array('page_title'=>"Profile | MiConsulting");
     
      $this->load->view('admin/temp/headercrm',$data1);
     $this->load->view('admin/applycrm/profil',$data);
     $this->load->view('admin/temp/footercrm');
      
  }
  public function updateNotice(){
   
      $appid = $this->input->post('appid');
      $notice = $this->input->post('notice');
      $send = $this->input->post('send');

       if($send == "update_notice"){
          $update = $this->model->updateNotice($appid, $notice); 
          header('Location:'.base_url().'admin/applyCrm/profil/'.$appid);
       }
  }

  public function updateStatus(){
    $send = $this->input->post('send');
    $appid = $this->input->post('appid');
    $status = $this->input->post('status');
    $embassy_id = $this->input->post('embassy_id');
    $visa_id = $this->input->post('visa_id');

    if(isset($send)){

      if($status == '1'){ // it will only update Embassy Id
        $this->model->updateEmbassyId($appid, $embassy_id, $status);
      }elseif($status == '2'){ // it will only update Visa Id
        $this->model->updateVisaId($appid, $visa_id, $status);
      }else{
        $this->model->updateStatus($appid, $status);
      }

      header('Location:'.base_url().'admin/applyCrm/profil/'.$appid);
    }


  }

}
