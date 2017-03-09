<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penduduk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Penduduk_model');
    }

    public function index()
    {
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }

        $user = $user = $this->ion_auth->user()->row();
        $penduduk = $this->Penduduk_model->get_all();
        $data = array(
            'penduduk_data' => $penduduk,
            'title' => 'Data Tanah' , 
            'user' => $user,
        );
        $this->load->view('admin/head', $data);
        $this->load->view('admin/navigasi');
        $this->load->view('penduduk/penduduk_list', $data);
        $this->load->view('admin/footer');
    }

    public function read($id) 
    {
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }

        $user = $user = $this->ion_auth->user()->row();
        $row = $this->Penduduk_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Data Tanah' , 
                'user' => $user,
                'id_penduduk' => $row->id_penduduk,
                'no_induk'    => $row->no_induk,
                'nama'        => $row->nama,
                'alamat'      => $row->alamat,
                'no_telepon'  => $row->no_telepon,
            );
            $this->load->view('admin/head', $data);
            $this->load->view('admin/navigasi');
            $this->load->view('penduduk/penduduk_read', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penduduk'));
        }
    }

    public function create() 
    {
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }

        $user = $user = $this->ion_auth->user()->row();
        $penduduk = $this->Penduduk_model->get_all();
        $data = array(
            'penduduk_data' => $penduduk,
            'title'         => 'Data Tanah' , 
            'user'          => $user,
            'button'        => 'Tambah',
            'action'        => site_url('penduduk/create_action'),
            'id_penduduk'   => set_value('id_penduduk'),
            'no_induk'      => set_value('no_induk'),
            'nama'          => set_value('nama'),
            'alamat'        => set_value('alamat'),
            'no_telepon'    => set_value('no_telepon'),
            'cek'           => 0,
        );
        $this->load->view('admin/head', $data);
        $this->load->view('admin/navigasi');
        $this->load->view('penduduk/penduduk_form', $data);
        $this->load->view('admin/footer');
        
    }
    
    public function create_action() 
    {
        $no_induk = $this->input->post('no_induk',TRUE);
        $this->form_validation->set_rules('no_induk', 'no induk', 'trim|required|numeric|is_unique[penduduk.no_induk]',
            array('required' => 'harus di isi', 
                    'numeric' => 'harus angka',
                    'is_unique'=> 'no induk sudah terdaftar'
                ));
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
            'no_induk'   => $no_induk,
            'nama'       => $this->input->post('nama',TRUE),
            'alamat'     => $this->input->post('alamat',TRUE),
            'no_telepon' => $this->input->post('no_telepon',TRUE),
    	    );

            $this->Penduduk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('penduduk'));
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
        $row = $this->Penduduk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title'       => 'Data Tanah' , 
                'user'        => $user,
                'button'      => 'Update',
                'action'      => site_url('penduduk/update_action'),
                'id_penduduk' => set_value('id_penduduk', $row->id_penduduk),
                'no_induk'    => set_value('no_induk', $row->no_induk),
                'nama'        => set_value('nama', $row->nama),
                'alamat'      => set_value('alamat', $row->alamat),
                'no_telepon'  => set_value('no_telepon', $row->no_telepon),
                'cek'         => 1,
            );
            $this->load->view('admin/head', $data);
            $this->load->view('admin/navigasi');
            $this->load->view('penduduk/penduduk_form', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penduduk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_penduduk', TRUE));
        } else {
            $data = array(
                'no_induk'   => $this->input->post('no_induk',TRUE),
                'nama'       => $this->input->post('nama',TRUE),
                'alamat'     => $this->input->post('alamat',TRUE),
                'no_telepon' => $this->input->post('no_telepon',TRUE),
	        );

            $this->Penduduk_model->update($this->input->post('id_penduduk', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('penduduk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Penduduk_model->get_by_id($id);

        if ($row) {
            $this->Penduduk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('penduduk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penduduk'));
        }
    }

    public function _rules() 
    {
        
    	$this->form_validation->set_rules('nama', 'nama', 'trim|required',array('required' => 'harus di isi', ));
    	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required',array('required' => 'harus di isi', ));
    	$this->form_validation->set_rules('no_telepon', 'no telepon', 'trim|required|numeric',
            array('required' => 'harus di isi', 
                     'numeric'=> 'harus angka'
                ));
    	$this->form_validation->set_rules('id_penduduk', 'id_penduduk', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "penduduk.xls";
        $judul = "penduduk";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "No Induk");
    	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
    	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
    	xlsWriteLabel($tablehead, $kolomhead++, "No Telepon");

	   foreach ($this->Penduduk_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->no_induk);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->no_telepon);

    	    $tablebody++;
            $nourut++;
        }
        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=penduduk.doc");

        $data = array(
            'penduduk_data' => $this->Penduduk_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('penduduk/penduduk_doc',$data);
    }

}

/* End of file Penduduk.php */
/* Location: ./application/controllers/Penduduk.php */