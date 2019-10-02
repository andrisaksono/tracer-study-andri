<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class form extends CI_Controller {

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
        $database = $this->QuestionM->get();
        if($database){

            $questionArray = array();
            foreach ($database as $row){
            $questionInside = $row;

                if($row['type']=="select"){
                    $optionArray = explode(PHP_EOL,$row['options']);
                    $questionInside['option_array'] = $optionArray;
                }

                $questionArray[] = $questionInside;
            }

            $data['question'] = $questionArray;
        
        }

        //$data['detail'] = $database;
        //echo "<pre>";
        //var_dump($data);
        $this->load->view('public/header');
        $this->load->view('public/form_view',$data);
        $this->load->view('public/footer');
        
    }

    public function proses()
	{
       $data = $this->input->post();

        $question = $data['question'];
        unset($data['question']);

       $create = $this->UserM->create($data);
        $lastID = $this->db->insert_id();

       $newQuestions = array();
       foreach($question as $index=>$row){
            $newQuestions[] = array(
                'question_id' => $index,
                'the_answer' => $row, 
                'data_id' => $lastID,
            );
       }
        
        $insertBanyak = $this->AnswerM->create($newQuestions,TRUE);

       if($insertBanyak){
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

       $answer = $this->answer->get($database['data_id'],'data_id');

       $data['answer'] = $answer;

        $questionIds=array();
        foreach ($answer as $row){
            $questionIds[] = $row['question_id'];
        }

       $question = $this->QuestionM->get($questionIds);

       $questionNew=array();
       foreach($question as $row){
           $questionNew[$row['question_id']] = $row;
       }
       $data['question'] = $questionNew;
       
       //echo "<pre>";
       //var_dump($questionNew);

       $this->load->view('public/form_detail',$data);
    }


}
