<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class form extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('user/User_Model','UserM');
    }

	public function index()
	{
        $this->load->view('welcome_message');
    }

    public function show()
	{
        $this->load->view('public/header');
        $this->load->view('public/form_view');
        $this->load->view('public/footer');
    }

    public function proses()
	{
       $data = $this->input->post();
       $create = $this->UserM->create($data);
       if($create){
        echo "Sukses";
       } else {
           echo "Gagal!";
       }
    }

    public function tampil()
	{
        $database = $this->UserM->get();
       $data['list'] = $database;
       $this->load->view('public/header');
       $this->load->view('public/user_list',$data);
        $this->load->view('public/footer');
      
    }

    public function detail($id)
	{
        $database = $this->UserM->get($id)[0];
       $data['detail'] = $database;
        //echo "<pre>";
       //var_dump($data);
       $this->load->view('public/form_detail',$data);
    }


}
