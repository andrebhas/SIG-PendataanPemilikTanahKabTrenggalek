<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slider extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Slider_model');
        $this->load->library('form_validation');
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
    }

    public function index()
    {
        $user = $this->ion_auth->user()->row();
        $slider = $this->Slider_model->get_all();

        $data = array(
            'title' => 'Groups' , 
            'user' => $user,
            'slider_data' => $slider
        );
        $this->load->view('admin/head', $data);
        $this->load->view('admin/navigasi', $data);
        $this->load->view('slider/slider_list', $data);
        $this->load->view('admin/footer');
    }

    public function create() 
    {
        $user = $this->ion_auth->user()->row();
        $data = array(
            'title' => 'Groups' , 
            'user' => $user,
            'button' => 'Tambah',
            'action' => site_url('slider/create_action'),
    	    'id' => set_value('id'),
    	    'gambar' => set_value('gambar'),
    	    'keterangan1' => set_value('keterangan1'),
    	    'keterangan2' => set_value('keterangan2'),
	    );
        $this->load->view('admin/head', $data);
        $this->load->view('admin/navigasi', $data);
        $this->load->view('slider/slider_form', $data);
        $this->load->view('admin/footer');
    }
    
    public function create_action() 
    {
        $config['upload_path'] = './assets/images/slider/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024 * 10;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('gambar')) {
            $errors = $this->upload->display_errors();
            $this->session->set_flashdata('error_gambar', $errors);
        } 

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $upload_data = $this->upload->data();
            $gambar = $upload_data['file_name'];
            $data = array(
        		'gambar' => $gambar,
        		'keterangan1' => $this->input->post('keterangan1',TRUE),
        		'keterangan2' => $this->input->post('keterangan2',TRUE),
    	    );

            $this->Slider_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('slider'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Slider_model->get_by_id($id);
        $user = $this->ion_auth->user()->row();
        if ($row) {
            $data = array(
                'title'       => 'Groups' , 
                'user'        => $user,
                'button'      => 'Update',
                'action'      => site_url('slider/update_action'),
                'id'          => set_value('id', $row->id),
                'gambar'      => set_value('gambar', $row->gambar),
                'keterangan1' => set_value('keterangan1', $row->keterangan1),
                'keterangan2' => set_value('keterangan2', $row->keterangan2),
	        );
            $this->load->view('admin/head', $data);
            $this->load->view('admin/navigasi', $data);
            $this->load->view('slider/slider_form', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('slider'));
        }
    }
    
    public function update_action() 
    {
        $config['upload_path'] = './assets/images/slider/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024 * 10;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('gambar')) {
            $errors = $this->upload->display_errors();
            $this->session->set_flashdata('error_gambar', $errors);
        } 

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $upload_data = $this->upload->data();
            $gambar = $upload_data['file_name'];
            $data = array(
                'gambar' => $gambar,
                'keterangan1' => $this->input->post('keterangan1',TRUE),
                'keterangan2' => $this->input->post('keterangan2',TRUE),
    	    );

            $this->Slider_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('slider'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Slider_model->get_by_id($id);

        if ($row) {
            $this->Slider_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('slider'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('slider'));
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('keterangan1', 'keterangan1', 'trim|required');
    	$this->form_validation->set_rules('keterangan2', 'keterangan2', 'trim|required');
    	$this->form_validation->set_rules('id', 'id', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Slider.php */
/* Location: ./application/controllers/Slider.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-08-06 12:28:02 */
/* http://harviacode.com */