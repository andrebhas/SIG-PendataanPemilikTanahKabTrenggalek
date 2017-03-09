<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_bangunan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_bangunan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }

        $user = $user = $this->ion_auth->user()->row();
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenis_bangunan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenis_bangunan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenis_bangunan/index.html';
            $config['first_url'] = base_url() . 'jenis_bangunan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenis_bangunan_model->total_rows($q);
        $jenis_bangunan = $this->Jenis_bangunan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'title' => 'Jenis Bangunan' , 
            'user' => $user,
            'jenis_bangunan_data' => $jenis_bangunan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/head', $data);
        $this->load->view('admin/navigasi');
        $this->load->view('jenis_bangunan/jenis_bangunan_list', $data);
        $this->load->view('admin/footer');
    }

    public function create() 
    {
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }

        $user = $user = $this->ion_auth->user()->row();

        $data = array(
            'title'             => 'Jenis Bangunan' , 
            'user'              => $user,
            'button'            => 'Tambah',
            'action'            => site_url('jenis_bangunan/create_action'),
            'id_jenis_bangunan' => set_value('id_jenis_bangunan'),
            'nama_bangunan'     => set_value('nama_bangunan'),
            'icon_marker'       => set_value('icon_marker'),
	    );
        $this->load->view('admin/head', $data);
        $this->load->view('admin/navigasi');
        $this->load->view('jenis_bangunan/jenis_bangunan_form', $data);
        $this->load->view('admin/footer');
    }
    
    public function create_action() 
    {
        $config['upload_path'] = './gambar/marker/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024 * 10;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('icon_marker')) {
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
        		'nama_bangunan' => $this->input->post('nama_bangunan',TRUE),
        		'icon_marker' => $gambar,
	        );

            $this->Jenis_bangunan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_bangunan'));
        }
    }
    
    public function update($id) 
    {
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }

        $user = $user = $this->ion_auth->user()->row();
        $row = $this->Jenis_bangunan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Jenis Bangunan' , 
                'user' => $user,
                'button' => 'Update',
                'action' => site_url('jenis_bangunan/update_action'),
        		'id_jenis_bangunan' => set_value('id_jenis_bangunan', $row->id_jenis_bangunan),
        		'nama_bangunan' => set_value('nama_bangunan', $row->nama_bangunan),
        		'icon_marker' => set_value('icon_marker', $row->icon_marker),
	        );
            $this->load->view('admin/head', $data);
            $this->load->view('admin/navigasi');
            $this->load->view('jenis_bangunan/jenis_bangunan_form', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_bangunan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis_bangunan', TRUE));
        } else {
            $data = array(
        		'nama_bangunan' => $this->input->post('nama_bangunan',TRUE),
        		'icon_marker' => $this->input->post('icon_marker',TRUE),
	        );

            $this->Jenis_bangunan_model->update($this->input->post('id_jenis_bangunan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_bangunan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenis_bangunan_model->get_by_id($id);

        if ($row) {
            $this->Jenis_bangunan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_bangunan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_bangunan'));
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('nama_bangunan', 'nama bangunan', 'trim|required');
    	$this->form_validation->set_rules('id_jenis_bangunan', 'id_jenis_bangunan', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "jenis_bangunan.xls";
        $judul = "jenis_bangunan";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
    	xlsWriteLabel($tablehead, $kolomhead++, "Nama Bangunan");
    	xlsWriteLabel($tablehead, $kolomhead++, "Icon Marker");

    	foreach ($this->Jenis_bangunan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_bangunan);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->icon_marker);

    	    $tablebody++;
                $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=jenis_bangunan.doc");

        $data = array(
            'jenis_bangunan_data' => $this->Jenis_bangunan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('jenis_bangunan/jenis_bangunan_doc',$data);
    }

}

/* End of file Jenis_bangunan.php */
/* Location: ./application/controllers/Jenis_bangunan.php */