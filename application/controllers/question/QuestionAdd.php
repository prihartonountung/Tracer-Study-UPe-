<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuestionAdd extends CI_Controller {

    function __construct(){
        parent::__construct();
    $this->load->model("question/Question_model","questionM");
    }
    public function show()
	{
        $this->load->view('public/header');
        $this->load->view('question/QuestionAdd');
        $this->load->view('public/footer');
    }

    public function proses(){
        $data = $this->input->post();

        $create = $this->questionM->create($data);

        if($create){
            echo "Sukses! lah....";
        }      
        else{
            echo "Gagal!";
        }
    }

    function getJson(){
        $data = $this->questionM->get();
        echo json_encode($data);
    }
}