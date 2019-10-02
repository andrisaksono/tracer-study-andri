<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class addquestion extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('user/User_Model','UserM');
        $this->load->model('question/Question_model','QuestionM');
        $this->load->model('answer/Answer_model','answer');
    }

    public function index()
	{
        $this->load->view('welcome_message');
    }

    public function show()
	{
        
        $this->load->view('public/header');
        $this->load->view('public/form_add'); 
        $this->load->view('public/footer');
    
    }
    public function proses()
    {
       $data = $this->input->post();
       $create = $this->QuestionM->create($data);
        
       if($create){
            echo "Sukses";
           } else {
               echo "Gagal!";
           }
        }

    function getJson(){
        $data = $this->QuestionM->get();
        echo json_encode($data);
    }
    }     