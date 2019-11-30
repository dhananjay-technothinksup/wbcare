<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class User extends CI_Controller{
    public function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
  }

  public function logout(){
    $this->session->sess_destroy();
    header('location:'.base_url().'User');
  }

  public function index(){
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    if ($this->form_validation->run() == FALSE) {
    	$this->load->view('User/login');
    }
    else{
      $email = $this->input->post('email');
      $password = $this->input->post('password');

      $login = $this->User_Model->check_login($email, $password);
      if($login == null){
        $this->session->set_flashdata('msg','login_error');
        header('location:'.base_url().'User');
      }
      else{
        foreach ($login as $login){
          $this->session->set_userdata('ch_user_id', $login['user_id']);
          $this->session->set_userdata('ch_company_id', $login['company_id']);
          $this->session->set_userdata('roll_id', $login['roll_id']);
        }
        header('location:'.base_url().'User/dashboard');
      }
    }
  }

  public function dashboard(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/dashboard');
      $this->load->view('Include/footer');
    } else{
      header('location:'.base_url().'User');
    }
  }
  public function manage_banner(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/manage_banner');
      $this->load->view('Include/footer');
    } else{
      header('location:'.base_url().'User');
    }
  }

  public function manage_customer(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/customer');
      $this->load->view('Include/footer');
    } else{
      header('location:'.base_url().'User');
    }
  }

  public function manage_orders(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/orders');
      $this->load->view('Include/footer');
    } else{
      header('location:'.base_url().'User');
    }
  }

  public function manage_product_category(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/product_category');
      $this->load->view('Include/footer');
    } else{
      header('location:'.base_url().'User');
    }
  }

  public function manage_product_info(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/product_info');
      $this->load->view('Include/footer');
    } else{
      header('location:'.base_url().'User');
    }
  }

  public function manage_product_unit(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/product_unit');
      $this->load->view('Include/footer');
    } else{
      header('location:'.base_url().'User');
    }
  }



  /***************************** Company Information ************************/
  // Company list...
  public function company_information_list(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $data['company_list'] = $this->User_Model->get_list($company_id,'company_id','ASC','company');
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/company_information_list',$data);
      $this->load->view('Include/footer',$data);
    } else{
      header('location:'.base_url().'User');
    }
  }
  // Edit Company...
  public function edit_company($company_id){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $company_info = $this->User_Model->get_info('company_id', $company_id, 'company');
      if($company_info){
        foreach($company_info as $info){
          $data['update'] = 'update';
          $data['company_id'] = $info->company_id;
          $data['company_name'] = $info->company_name;
          $data['company_address'] = $info->company_address;
          $data['company_city'] = $info->company_city;
          $data['company_state'] = $info->company_state;
          $data['company_district'] = $info->company_district;
          $data['company_pincode'] = $info->company_pincode;
          $data['company_mob1'] = $info->company_mob1;
          $data['company_mob2'] = $info->company_mob2;
          $data['company_email'] = $info->company_email;
          $data['company_website'] = $info->company_website;
          $data['company_pan_no'] = $info->company_pan_no;
          $data['company_gst_no'] = $info->company_gst_no;
          $data['company_lic1'] = $info->company_lic1;
          $data['company_lic2'] = $info->company_lic2;
          $data['company_start_date'] = $info->company_start_date;
          $data['company_end_date'] = $info->company_end_date;
        }
        $this->load->view('Include/head',$data);
        $this->load->view('Include/navbar',$data);
        $this->load->view('User/company_information',$data);
        $this->load->view('Include/footer',$data);
      }
    } else{
      header('location:'.base_url().'User');
    }
  }
  // Update Company...
  public function update_company(){
    $user_id = $this->session->userdata('ch_user_id');
    $company_id = $this->session->userdata('ch_company_id');
    $roll_id = $this->session->userdata('roll_id');
    if($company_id){
      $company_id = $this->input->post('company_id');
      $data = array(
        'company_name' => $this->input->post('company_name'),
        'company_address' => $this->input->post('company_address'),
        'company_city' => $this->input->post('company_city'),
        'company_state' => $this->input->post('company_state'),
        'company_district' => $this->input->post('company_district'),
        'company_pincode' => $this->input->post('company_pincode'),
        'company_mob1' => $this->input->post('company_mob1'),
        'company_mob2' => $this->input->post('company_mob2'),
        'company_email' => $this->input->post('company_email'),
        'company_website' => $this->input->post('company_website'),
        'company_pan_no' => $this->input->post('company_pan_no'),
        'company_gst_no' => $this->input->post('company_gst_no'),
        'company_lic1' => $this->input->post('company_lic1'),
        'company_lic2' => $this->input->post('company_lic2'),
        'company_start_date' => $this->input->post('company_start_date'),
        'company_end_date' => $this->input->post('company_end_date'),
      );
      $this->User_Model->update_info('company_id', $company_id, 'company', $data);
      header('location:'.base_url().'User/company_information_list');
    } else{
      header('location:'.base_url().'User');
    }
  }



}
?>
