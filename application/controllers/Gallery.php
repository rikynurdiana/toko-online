<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Gallery_model');
        $this->load->database();
        $this->load->library(array('ion_auth','form_validation','session'));
        $this->load->helper(array('url','language','html','form'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
    }

    public function index(){
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login','refresh');
        } else {
            $data = ['images'   => $this->Gallery_model->all()];
            $this->load->view('layout/header', $data);
            $this->load->view('gallery/index', $data);
            $this->load->view('layout/footer', $data);

        }
    }

    public function add(){
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login','refresh');
        } else {
            $rules = [[
                'field' => 'caption',
                'label' => 'Caption',
                'rules' => 'required'],
            [
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required'
            ]];

            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() == FALSE){
                $this->load->view('layout/header');
                $this->load->view('gallery/add_image');
                $this->load->view('layout/footer');
            } else {
                /* Start Uploading File */
                $config = [
                    'upload_path'   => 'uploads/images/',
                    'allowed_types' => 'gif|jpg|png'
                ];
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload()){
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('layout/header');
                    $this->load->view('gallery/add_image', $error);
                    $this->load->view('layout/footer');
                } else {
                    $file = $this->upload->data();
                    //print_r($file);
                    $data = [
                        'file'          => 'uploads/images/' . $file['file_name'],
                        'caption'      => set_value('caption'),
                        'description'   => set_value('description')
                    ];
                    $this->Gallery_model->create($data);
                    $this->session->set_flashdata('message','New image has been added..');
                    redirect('gallery');

                }
            }
        }
    }

    public function edit($id){
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login','refresh');
        } else {
            $rules = [[
                'field' => 'caption',
                'label' => 'Caption',
                'rules' => 'required'],
            [
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required'
            ]];

            $this->form_validation->set_rules($rules);
            $image = $this->Gallery_model->find($id)->row();

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('layout/header');
                $this->load->view('gallery/edit_image',['image'=>$image]);
                $this->load->view('layout/footer');
            } else {
            if(isset($_FILES["userfile"]["name"])) {
                /* Start Uploading File */
                $config = [
                'upload_path'   => 'assets/uploads/',
                'allowed_types' => 'gif|jpg|png'
            ];
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload()) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('layout/header');
                $this->load->view('gallery/edit_image',['image'=>$image,'error'=>$error]);
                $this->load->view('layout/footer');
            } else {
                $file = $this->upload->data();
                $data['file'] = 'assets/uploads/' . $file['file_name'];
                unlink($image->file);
            }
            }

            $data['caption']      = set_value('caption');
            $data['description']   = set_value('description');

            $this->Gallery_model->update($id,$data);
            $this->session->set_flashdata('message','New image has been updated..');
            redirect('gallery');
            }
        }
    }

    public function delete($id) {
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login','refresh');
        } else {
            $this->Gallery_model->delete($id);
            $this->session->set_flashdata('message','Image has been deleted..');
            redirect('gallery');
        }
    }
}