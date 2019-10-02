<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model("data/Data_models","dataM");
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
    public function proses(){
        $data = $this->input->post();
        $create = $this->data->create($data);
        if($create){
            echo "Sukses! lah....";
        }      
        else{
            echo "Gagal!";
        }
    }

    public function tampil()
    {
        $ids = array(1,5,6);
        $database = $this->dataM->get($ids);
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
       
    }   
}
