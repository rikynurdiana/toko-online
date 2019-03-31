<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Pelanggan extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Pelanggan_model');
        $this->load->database();
        $this->load->library('session');
        $this->load->library(array('ion_auth', 'form_validation', 'image_lib', 'image_moo'));
        $this->load->helper(array('url', 'language', 'html', 'form', 'string'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
    }

    public function index(){
        $data = ['barang' => $this->Pelanggan_model->semuaBarang()];
        $this->load->view('layout/header', $data);
        $this->load->view('pelanggan/index', $data);
        $this->load->view('layout/footer', $data);
    }

    public function create(){
        $ses = $this->session->userdata('user_id');
        $data = $this->Pelanggan_model->getUser($ses)->row();
        $this->load->view('layout/header', $data);
        $this->load->view('pelanggan/create',['data'=>$data]);
        $this->load->view('layout/footer', $data);

    }

    public function tambahBarang(){
        $data = array();

        $file_element_name = 'ori_image';

        $user_upload_path = 'uploads/barang/';

        $config['upload_path'] = './' . $user_upload_path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = FALSE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($file_element_name)) {
            $this->upload->display_errors();
        } else {
            $data_upload = $this->upload->data();

            $file_name          = $data_upload["file_name"];
            $file_name_thumb    = $data_upload['raw_name'].'_resize' . $data_upload['file_ext'];
            $file_name_mo       = $data_upload['raw_name'].'_mo' . $data_upload['file_ext'];

            $this->load->library('image_lib');
            $config_resize['image_library'] = 'gd2';
            $config_resize['create_thumb'] = TRUE;
            $config_resize['maintain_ratio'] = TRUE;
            $config_resize['master_dim'] = 'auto';
            $config_resize['quality'] = "100%";
            $config_resize['source_image'] = './' . $user_upload_path . $file_name;

            $config_resize['height'] = 500;
            $config_resize['width'] = 500;
            $this->image_lib->initialize($config_resize);
            $this->image_lib->resize();

            $data["file_name_url"] = base_url() . $user_upload_path . $file_name;
            $data["file_name_thumb_url"] = base_url() . $user_upload_path . $file_name_thumb;

            $this->image_moo
                 ->load('./' . $user_upload_path . $file_name)
                 ->resize_crop(300,300)
                 ->save($user_upload_path . $file_name_mo);

            $ses = $this->session->userdata('user_id');

            $uid = $this->Pelanggan_model->getUser($ses)->row();
            // echo '<pre>'; print_r($uid);

            $pelanggan = [
                    'user_code'             => $uid->user_code,
                    'id_barang'             => rand(11111,99999),
            ];

            $barang = [
                    'user_code'             => $uid->user_code,
                    'id_barang'             => $pelanggan['id_barang'],
                    'nama_barang'           => set_value('nama_barang'),
                    'harga_barang'          => set_value('harga_barang'),
                    'kategori'              => set_value('kategori'),
                    'stock_awal'            => set_value('stock_awal'),
                    'ori_image'             => $user_upload_path . $file_name,
                    'kondisi'               => set_value('kondisi'),
                    'berat'                 => set_value('berat'),
                    'min_pemesanan'         => set_value('min_pemesanan'),
                    'spesifikasi'           => set_value('spesifikasi'),
                    'thumb_image'           => $user_upload_path . $file_name_mo ,
                    'payment_method'        => set_value('payment_method'),
            ];
            // echo '<pre>'; print_r($pelanggan);
            // echo '<pre>'; print_r($barang); die;
            $this->Pelanggan_model->createPelanggan($pelanggan);
            $this->Pelanggan_model->createBarang($barang);

            redirect('pelanggan/index','refresh');

        }

    }

    public function detail($id){
        $data       = $this->Pelanggan_model->detailBarang($id)->row();
        $query      = $this->Pelanggan_model->detailPelanggan($id)->row();
        $result     = $this->Pelanggan_model->getBarangLainnya($id)->row();
        $lainnya    = $this->Pelanggan_model->listBarangLainnya($id)->result();

        $this->load->view('layout/header', $data);
        $this->load->view('pelanggan/detail',['data'=>$data,'query'=>$query,'lainnya'=>$lainnya,'result'=>$result]);
        $this->load->view('layout/footer', $data);
    }

    public function profile($id){
        $data       = $this->Pelanggan_model->getUser($id)->row();
        $lainnya    = $this->Pelanggan_model->listBarangLainnya($id)->result();
        $this->load->view('layout/header', $data);
        $this->load->view('pelanggan/profile',['data'=>$data,'lainnya'=>$lainnya]);
        $this->load->view('layout/footer', $data);
    }

}