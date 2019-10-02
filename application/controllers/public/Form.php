<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model("data/Data_models","dataM");
        $this->load->model("question/Question_model","questionM");
        $this->load->model("answer/Answer_model","answerM");
    }

	public function index()
	{
		$this->load->view('welcome_message');
    }

    public function show()
	{

        $this->load->view('public/header');
        
        $database = $this->questionM->get();

        if($database){

            $questionArray = array();
            foreach ($database as $row){

                $questionInside = $row;

                if($row['type']=="select"){
                    $optionsArray = explode(PHP_EOL,$row['options']);
                    $questionInside['options_array'] = $optionsArray;
                }

                $questionArray[] = $questionInside;
            }

            $data['question'] = $questionArray;
           
        }
               
        //echo "<pre>";
        //var_dump($data);

        
        $this->load->view('public/form_view',$data);
        $this->load->view('public/footer');
    }
    public function proses(){
        $data = $this->input->post();

        //Ambil data question dan dimasukan ke variable
        //hapus d array yang lama, sehingga tidak kebawa ketika inser

        $questions = $data['questions'];
        unset($data['questions']);
        
        $create = $this->dataM->create($data);
        $lastID = $this->db->insert_id();

        //reformating questions
        $newQuestion = array();
        foreach($questions as $index=>$row){
            $newQuestion[] = array(
                'question_id'    => $index,
                'the_answer'    => $row,
                'data_id'   => $lastID, //data/user ID
            );
        }
        
       // echo "<pre>";
        //var_dump($newQuestion);


        $create = $this->answerM->create($newQuestion,TRUE);


        //echo "<pre>";
        //var_dump($data);
        //exit;

       
        if($create){
            echo "Sukses! lah....";
        }      
        else{
            echo "Gagal!";
        }
    }

    public function tampil()
    {
        $database = $this->dataM->get();
        $data['list'] = $database;
        $this->load->view('public/header');
        $this->load->view('public/form_list',$data);
        $this->load->view('public/footer');
        
    }

    public function detail($id)
    {
        $database = $this->dataM->get($id)[0];
        $data['detail'] = $database;
        //echo "<pre>";
        //var_dump($data);
       
        //*********** Get Answer ***********
        $answer = $this->answerM->get(
            $database['data_id'], //user_id/data_id
            'data_id'
        );
        $data['answer'] = $answer;

        //echo "<pre>";
        //var_dump($answer);

        ///*************** Get question Ids *******
        $questionsIds=array();
        foreach ($answer as $row){
            $questionsIds[] = $row['question_id'];
        }

    
        //************ Get question detail **********
        $questions = $this->questionM->get($questionsIds);
        //SELECT * FROM question WHERE 

        //********** Modify question index ********
        $questionNew=array();
        foreach($questions as $row){
            $questionNew[$row['question_id']]=$row;
        }
        $data['question'] = $questionNew;

        $this->load->view('public/form_detail',$data);

    }   
}
